-- ==========================================================
-- SKRIP DATABASE LENGKAP: PT PENERBIT POJOK PUBLISHER
-- ==========================================================

-- 1. Buat dan Gunakan Database
CREATE DATABASE IF NOT EXISTS db_pojok_publisher;
USE db_pojok_publisher;

-- 2. Tabel Users (Akun Admin & Penulis/Customer)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'customer') DEFAULT 'customer',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Masukkan akun default Admin
INSERT INTO users (id, nama, email, password, role) VALUES 
(1, 'Admin Pojok Publisher', 'admin@pojokpublisher.com', 'admin123', 'admin')
ON DUPLICATE KEY UPDATE id=id;


-- 3. Tabel Katalog Buku (Dilengkapi Sinopsis & Link Shopee)
CREATE TABLE IF NOT EXISTS katalog_buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul_buku VARCHAR(255) NOT NULL,
    penulis VARCHAR(100) NOT NULL,
    sinopsis TEXT DEFAULT NULL,
    link_shopee VARCHAR(255) DEFAULT NULL,
    gambar VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- 4. Tabel Informasi Event & Program Menulis
CREATE TABLE IF NOT EXISTS informasi_event (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_event VARCHAR(255) NOT NULL,
    deskripsi TEXT NOT NULL,
    gambar VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- 5. Tabel Naskah Masuk (Pengajuan & Workflow Produksi)
CREATE TABLE IF NOT EXISTS naskah_masuk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    nama_penulis VARCHAR(100) NOT NULL,
    judul_naskah VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    status ENUM('Submitted', 'In Review', 'Accepted', 'Rejected', 'Proses Edit', 'Proses Layout', 'Proses Cetak', 'Proses Publish') DEFAULT 'Submitted',
    catatan_editor TEXT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);


-- 6. Tabel Diskusi Catatan Naskah (Dua Arah antara Admin & Penulis)
CREATE TABLE IF NOT EXISTS naskah_diskusi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    naskah_id INT NOT NULL,
    sender_id INT NOT NULL,
    pesan TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (naskah_id) REFERENCES naskah_masuk(id) ON DELETE CASCADE,
    FOREIGN KEY (sender_id) REFERENCES users(id) ON DELETE CASCADE
);