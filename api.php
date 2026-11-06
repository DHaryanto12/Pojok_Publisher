<?php
session_start();
header('Content-Type: application/json');
require_once 'koneksi.php';

$action = $_GET['action'] ?? '';

// --- 1. AUTENTIKASI ---
if ($action === 'login') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = mysqli_prepare($conn, "SELECT id, nama, password, role FROM users WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($user = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $user['password']) || $password === $user['password']) { // support plaintext demo
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['role'] = $user['role'];

            echo json_encode([
                'status' => 'success',
                'user' => ['id' => $user['id'], 'nama' => $user['nama'], 'role' => $user['role']]
            ]);
            exit();
        }
    }
    echo json_encode(['status' => 'error', 'message' => 'Email atau password salah.']);
    exit();
}

if ($action === 'register') {
    $nama = $_POST['nama'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Cek apakah email sudah terdaftar
    $check = mysqli_prepare($conn, "SELECT id FROM users WHERE email = ?");
    mysqli_stmt_bind_param($check, "s", $email);
    mysqli_stmt_execute($check);
    mysqli_stmt_store_result($check);

    if (mysqli_stmt_num_rows($check) > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Email sudah digunakan oleh akun lain.']);
        exit();
    }

    // Insert user baru dengan role 'customer' (penulis)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = mysqli_prepare($conn, "INSERT INTO users (nama, email, password, role) VALUES (?, ?, ?, 'customer')");
    mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $hashed_password);
    
    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success', 'message' => 'Registrasi berhasil! Silakan login.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal mendaftarkan akun.']);
    }
    exit();
}

if ($action === 'logout') {
    session_destroy();
    echo json_encode(['status' => 'success']);
    exit();
}

if ($action === 'check_session') {
    if (isset($_SESSION['user_id'])) {
        echo json_encode([
            'logged_in' => true,
            'user' => ['id' => $_SESSION['user_id'], 'nama' => $_SESSION['nama'], 'role' => $_SESSION['role']]
        ]);
    } else {
        echo json_encode(['logged_in' => false]);
    }
    exit();
}

// --- 2. FITUR PUBLIK (TIDAK PERLU LOGIN) ---
if ($action === 'get_katalog') {
    $res = mysqli_query($conn, "SELECT * FROM katalog_buku ORDER BY id DESC");
    $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
    echo json_encode(['status' => 'success', 'data' => $data]);
    exit();
}

if ($action === 'get_events') {
    $res = mysqli_query($conn, "SELECT * FROM informasi_event ORDER BY id DESC");
    $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
    echo json_encode(['status' => 'success', 'data' => $data]);
    exit();
}

// --- 3. FITUR PENULIS (BUTUH LOGIN ROLE 'customer' / 'penulis') ---
if ($action === 'submit_naskah') {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Silakan login terlebih dahulu.']);
        exit();
    }

    $penulis_id = $_SESSION['user_id'];
    $judul = $_POST['judul_naskah'] ?? '';
    $sinopsis = $_POST['sinopsis'] ?? '';

    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $file_name = time() . '_' . basename($_FILES["file_naskah"]["name"]);
    $target_file = $target_dir . $file_name;

    if (move_uploaded_file($_FILES["file_naskah"]["tmp_name"], $target_file)) {
        $stmt = mysqli_prepare($conn, "INSERT INTO naskah_masuk (penulis_id, judul_naskah, sinopsis, file_path, status) VALUES (?, ?, ?, ?, 'Submitted')");
        mysqli_stmt_bind_param($stmt, "isss", $penulis_id, $judul, $sinopsis, $target_file);
        mysqli_stmt_execute($stmt);

        echo json_encode(['status' => 'success', 'message' => 'Naskah berhasil dikirim!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal mengunggah berkas naskah.']);
    }
    exit();
}

if ($action === 'get_my_naskah') {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
        exit();
    }
    $uid = $_SESSION['user_id'];
    $stmt = mysqli_prepare($conn, "SELECT * FROM naskah_masuk WHERE penulis_id = ? ORDER BY id DESC");
    mysqli_stmt_bind_param($stmt, "i", $uid);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    echo json_encode(['status' => 'success', 'data' => mysqli_fetch_all($res, MYSQLI_ASSOC)]);
    exit();
}

// --- 4. FITUR ADMIN (KHUSUS ROLE 'admin') ---
if ($action === 'get_all_naskah') {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        echo json_encode(['status' => 'error', 'message' => 'Akses ditolak.']);
        exit();
    }
    $query = "SELECT n.*, u.nama as nama_penulis FROM naskah_masuk n JOIN users u ON n.penulis_id = u.id ORDER BY n.id DESC";
    $res = mysqli_query($conn, $query);
    echo json_encode(['status' => 'success', 'data' => mysqli_fetch_all($res, MYSQLI_ASSOC)]);
    exit();
}

if ($action === 'update_status_naskah') {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        echo json_encode(['status' => 'error', 'message' => 'Akses ditolak.']);
        exit();
    }
    $id = $_POST['naskah_id'];
    $status = $_POST['status'];
    $catatan = $_POST['catatan_editor'] ?? '';

    $stmt = mysqli_prepare($conn, "UPDATE naskah_masuk SET status = ?, catatan_editor = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "ssi", $status, $catatan, $id);
    mysqli_stmt_execute($stmt);

    echo json_encode(['status' => 'success', 'message' => 'Status naskah berhasil diperbarui.']);
    exit();
}

//  add_katalog di api.php ---
if ($action === 'add_katalog') {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        echo json_encode(['status' => 'error', 'message' => 'Akses ditolak.']);
        exit();
    }
    $judul_buku = $_POST['judul_buku'] ?? '';
    $penulis = $_POST['penulis'] ?? '';
    $sinopsis = $_POST['sinopsis'] ?? '';
    $link_shopee = $_POST['link_shopee'] ?? '';
    $gambar_path = '';

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $file_name = time() . '_buku_' . basename($_FILES["gambar"]["name"]);
        $target_file = $target_dir . $file_name;
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            $gambar_path = $target_file;
        }
    }

    $stmt = mysqli_prepare($conn, "INSERT INTO katalog_buku (judul_buku, penulis, sinopsis, link_shopee, gambar) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssss", $judul_buku, $penulis, $sinopsis, $link_shopee, $gambar_path);
    mysqli_stmt_execute($stmt);

    echo json_encode(['status' => 'success', 'message' => 'Katalog buku dan sinopsis berhasil ditambahkan!']);
    exit();
}

// --- UPDATE add_event di api.php ---
if ($action === 'add_event') {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        echo json_encode(['status' => 'error', 'message' => 'Akses ditolak.']);
        exit();
    }
    $nama = $_POST['nama_event'] ?? '';
    $deskripsi = $_POST['deskripsi'] ?? '';
    $gambar_path = '';

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $file_name = time() . '_event_' . basename($_FILES["gambar"]["name"]);
        $target_file = $target_dir . $file_name;
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            $gambar_path = $target_file;
        }
    }

    $stmt = mysqli_prepare($conn, "INSERT INTO informasi_event (nama_event, deskripsi, gambar) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $nama, $deskripsi, $gambar_path);
    mysqli_stmt_execute($stmt);

    echo json_encode(['status' => 'success', 'message' => 'Event dan gambar berhasil ditambahkan!']);
    exit();
}
// --- CRUD KATALOG BUKU ---
if ($action === 'update_katalog') {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        echo json_encode(['status' => 'error', 'message' => 'Akses ditolak.']);
        exit();
    }
    $id = $_POST['id'];
    $judul = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $sinopsis = $_POST['sinopsis'];
    $link_shopee = $_POST['link_shopee'];

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        $target_file = $target_dir . time() . '_buku_' . basename($_FILES["gambar"]["name"]);
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            $stmt = mysqli_prepare($conn, "UPDATE katalog_buku SET judul_buku = ?, penulis = ?, sinopsis = ?, link_shopee = ?, gambar = ? WHERE id = ?");
            mysqli_stmt_bind_param($stmt, "sssssi", $judul, $penulis, $sinopsis, $link_shopee, $target_file, $id);
            mysqli_stmt_execute($stmt);
            echo json_encode(['status' => 'success', 'message' => 'Katalog berhasil diperbarui.']);
            exit();
        }
    }

    $stmt = mysqli_prepare($conn, "UPDATE katalog_buku SET judul_buku = ?, penulis = ?, sinopsis = ?, link_shopee = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "ssssi", $judul, $penulis, $sinopsis, $link_shopee, $id);
    mysqli_stmt_execute($stmt);
    echo json_encode(['status' => 'success', 'message' => 'Katalog berhasil diperbarui.']);
    exit();
}

if ($action === 'delete_katalog') {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        echo json_encode(['status' => 'error', 'message' => 'Akses ditolak.']);
        exit();
    }
    $id = $_POST['id'];
    $stmt = mysqli_prepare($conn, "DELETE FROM katalog_buku WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    echo json_encode(['status' => 'success', 'message' => 'Katalog berhasil dihapus.']);
    exit();
}

// --- CRUD EVENT & INFO ---
if ($action === 'update_event') {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        echo json_encode(['status' => 'error', 'message' => 'Akses ditolak.']);
        exit();
    }
    $id = $_POST['id'];
    $nama = $_POST['nama_event'];
    $deskripsi = $_POST['deskripsi'];

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        $target_file = $target_dir . time() . '_event_' . basename($_FILES["gambar"]["name"]);
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            $stmt = mysqli_prepare($conn, "UPDATE informasi_event SET nama_event = ?, deskripsi = ?, gambar = ? WHERE id = ?");
            mysqli_stmt_bind_param($stmt, "sssi", $nama, $deskripsi, $target_file, $id);
            mysqli_stmt_execute($stmt);
            echo json_encode(['status' => 'success', 'message' => 'Event berhasil diperbarui dengan gambar baru.']);
            exit();
        }
    }

    $stmt = mysqli_prepare($conn, "UPDATE informasi_event SET nama_event = ?, deskripsi = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "ssi", $nama, $deskripsi, $id);
    mysqli_stmt_execute($stmt);
    echo json_encode(['status' => 'success', 'message' => 'Event berhasil diperbarui.']);
    exit();
}

if ($action === 'delete_event') {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        echo json_encode(['status' => 'error', 'message' => 'Akses ditolak.']);
        exit();
    }
    $id = $_POST['id'];
    $stmt = mysqli_prepare($conn, "DELETE FROM informasi_event WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    echo json_encode(['status' => 'success', 'message' => 'Event berhasil dihapus.']);
    exit();
}

// 1. Update Tahapan Proses Naskah oleh Admin
if ($action === 'update_tahapan_naskah') {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        echo json_encode(['status' => 'error', 'message' => 'Akses ditolak.']);
        exit();
    }
    $id = $_POST['naskah_id'];
    $status = $_POST['status']; // Contoh: 'Proses Edit', 'Proses Layout', dll.
    $catatan = $_POST['catatan_editor'] ?? '';

    $stmt = mysqli_prepare($conn, "UPDATE naskah_masuk SET status = ?, catatan_editor = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "ssi", $status, $catatan, $id);
    mysqli_stmt_execute($stmt);

    echo json_encode(['status' => 'success', 'message' => 'Tahapan naskah berhasil diperbarui ke: ' . $status]);
    exit();
}

// 2. Ambil Riwayat Diskusi Catatan Naskah
if ($action === 'get_diskusi') {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
        exit();
    }
    $naskah_id = $_GET['naskah_id'] ?? 0;
    
    $query = "SELECT d.*, u.nama as nama_sender, u.role FROM naskah_diskusi d JOIN users u ON d.sender_id = u.id WHERE d.naskah_id = ? ORDER BY d.id ASC";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $naskah_id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    
    echo json_encode(['status' => 'success', 'data' => mysqli_fetch_all($res, MYSQLI_ASSOC)]);
    exit();
}

// 3. Kirim Pesan Diskusi Baru (Penulis / Admin)
if ($action === 'send_diskusi') {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
        exit();
    }
    $naskah_id = $_POST['naskah_id'];
    $sender_id = $_SESSION['user_id'];
    $pesan = $_POST['pesan'];

    $stmt = mysqli_prepare($conn, "INSERT INTO naskah_diskusi (naskah_id, sender_id, pesan) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "iis", $naskah_id, $sender_id, $pesan);
    mysqli_stmt_execute($stmt);

    echo json_encode(['status' => 'success', 'message' => 'Pesan diskusi terkirim.']);
    exit();
}

echo json_encode(['status' => 'error', 'message' => 'Action tidak valid.']);
?>