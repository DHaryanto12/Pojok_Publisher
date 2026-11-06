<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pojok Publisher - Website Percetakan & Kurasi Naskah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .hidden { display: none; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    <!-- Header / Navbar -->
    <header class="bg-teal-900 text-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold cursor-pointer flex items-center" onclick="showSection('beranda')"><img src="logo.png" alt="Logo Pojok Publisher" class="h-14 w-14 object-contain mr-2">Pojok Publisher</h1>
            <nav class="space-x-4">
                <button onclick="showSection('beranda')" class="hover:underline">Beranda</button>
                <button onclick="showSection('tentang-kami')" class="hover:underline">Tentang Kami</button>
                <button onclick="showSection('kontak')" class="hover:underline">Kontak</button>
                <button onclick="showSection('katalog')" class="hover:underline">Katalog Buku</button>
                <button onclick="showSection('tentang')" class="hover:underline">Event & Info</button>
                <button onclick="requireAuth('pesan')" class="hover:underline">Kirim Naskah</button>
                
                <span id="nav-user-area">
                    <button onclick="openAuthModal()" class="bg-teal-500 px-3 py-1.5 rounded hover:bg-teal-600 font-semibold">Login</button>
                </span>
            </nav>
        </div>
    </header>

    <!-- Main Content Sections -->
    <main class="container mx-auto px-4 py-8 flex-grow">
        
        <!-- 1. Beranda -->
        <section id="sec-beranda">
            <div class="relative isolate overflow-hidden rounded-3xl bg-gradient-to-br from-sky-700 via-teal-700 to-emerald-800 px-6 py-16 text-center shadow-xl sm:px-12 sm:py-20 mb-8">
                <div class="absolute -right-16 -top-20 -z-10 h-64 w-64 rounded-full bg-cyan-300/20 blur-3xl" aria-hidden="true"></div>
                <div class="absolute -bottom-24 -left-16 -z-10 h-72 w-72 rounded-full bg-emerald-300/20 blur-3xl" aria-hidden="true"></div>
                <span class="mb-5 inline-block rounded-full border border-white/30 bg-white/10 px-4 py-1.5 text-sm font-semibold tracking-wide text-cyan-50">TEMUKAN CERITA, TERBITKAN KARYA</span>
                <h2 class="mx-auto mb-4 max-w-4xl text-3xl font-extrabold leading-tight text-white sm:text-4xl md:text-5xl">Selamat Datang di PT Penerbit Pojok Publisher</h2>
                <p class="mx-auto mb-8 max-w-2xl text-base leading-relaxed text-teal-50 sm:text-lg">Platform percetakan buku dan penerbitan terpadu. Unggah karya terbaikmu dan pantau proses kurasi secara langsung.</p>
                <button onclick="requireAuth('pesan')" class="rounded-lg bg-white px-6 py-3 font-bold text-teal-800 shadow-md transition hover:-translate-y-0.5 hover:bg-cyan-50 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-white/40">Kirim Naskah Sekarang <span aria-hidden="true">&rarr;</span></button>
            </div>
        </section>

        <!-- Tentang Kami / Profil Perusahaan -->
        <section id="sec-tentang-kami" class="hidden mx-auto max-w-4xl overflow-hidden rounded-2xl bg-white shadow-xl ring-1 ring-teal-100">
                <div class="mb-8 overflow-hidden rounded-2xl bg-white shadow-lg">
                <div class="bg-gradient-to-br from-sky-800 via-teal-700 to-emerald-600 px-6 py-12 text-center text-white md:px-12">
                    <span class="mb-4 inline-block rounded-full border border-white/25 bg-white/10 px-4 py-1.5 text-sm font-semibold tracking-wide text-teal-50">MENGENAL KAMI</span>
                    <h2 class="mb-4 text-3xl font-extrabold md:text-4xl">Tentang Pojok Publisher</h2>
                    <p class="mx-auto max-w-3xl text-base leading-relaxed text-cyan-50 md:text-lg">PT Penerbit Pojok Publisher bergerak di bidang percetakan buku dan penerbitan terpadu. Kami mendampingi penulis dalam menerbitkan karya melalui proses yang transparan, terarah, dan efisien.</p>
                </div>

                <div class="grid gap-6 bg-gradient-to-b from-white to-teal-50/70 px-6 py-8 md:grid-cols-2 md:px-10">
                    <div class="rounded-xl border border-teal-100 bg-white p-6 shadow-sm">
                        <h3 class="mb-3 text-xl font-bold text-teal-900">Visi</h3>
                        <p class="leading-relaxed text-gray-600">Menjadi penerbit buku resmi yang profesional, terpercaya, dan inklusif dalam membangun budaya literasi masyarakat, serta menjadi wadah utama bagi para penulis untuk mempublikasikan karya-karya berkualitas dan solutif.</p>
                    </div>
                    <div class="rounded-xl border border-cyan-100 bg-white p-6 shadow-sm">
                        <h3 class="mb-3 text-xl font-bold text-teal-900">Misi</h3>
                        <ul class="list-disc space-y-2 pl-5 leading-relaxed text-gray-600">
                            <li>Menyediakan layanan penerbitan terintegrasi, mulai dari pengurusan ISBN resmi IKAPI, proses penyuntingan (editing), desain tata letak (layout), hingga pencetakan buku secara cepat dengan biaya yang kompetitif.</li>
                            <li>Berkomitmen mempublikasikan hasil penelitian serta naskah edukatif (sastra, pendidikan, hingga pengembangan diri) yang relevan dan bermanfaat bagi kemajuan masyarakat.</li>
                            <li>Menjamin jangkauan penyebaran buku yang luas agar karya para penulis dapat diakses dengan mudah oleh target pembaca.</li>
                            <li>Mengembangkan Perpustakaan Pojok Publisher sebagai ruang diskusi dan belajaryang nyaman untuk menumbuhkan minat baca pelajar, pendidik, dan masyarakat umum.</li>
                            <li>Aktif berkontribusi dalam kegiatan sosial budaya melalui program CSR dan kemitraan kreatif untuk mendukung ekosistem literasi dan kesenian. </li>
                        </ul>
                    </div>
                </div>

                <div class="grid gap-4 bg-gradient-to-b from-teal-50/70 to-white p-6 md:grid-cols-3 md:p-8">
                    <div class="rounded-xl border border-teal-100 bg-gradient-to-br from-teal-50 to-cyan-50 p-5 text-center shadow-sm">
                        <div class="mb-2 text-2xl" aria-hidden="true">✍️</div>
                        <h3 class="font-bold text-teal-950">Dukung Penulis</h3>
                        <p class="mt-1 text-sm text-gray-600">Membantu setiap ide berkembang menjadi karya yang siap dibaca.</p>
                    </div>
                    <div class="rounded-xl border border-cyan-100 bg-gradient-to-br from-cyan-50 to-sky-50 p-5 text-center shadow-sm">
                        <div class="mb-2 text-2xl" aria-hidden="true">📚</div>
                        <h3 class="font-bold text-teal-950">Penerbitan Terpadu</h3>
                        <p class="mt-1 text-sm text-gray-600">Menghubungkan proses kurasi, penerbitan, dan percetakan.</p>
                    </div>
                    <div class="rounded-xl border border-emerald-100 bg-gradient-to-br from-emerald-50 to-teal-50 p-5 text-center shadow-sm">
                        <div class="mb-2 text-2xl" aria-hidden="true">🤝</div>
                        <h3 class="font-bold text-teal-950">Proses Transparan</h3>
                        <p class="mt-1 text-sm text-gray-600">Mengutamakan komunikasi yang jelas dalam setiap tahap.</p>
                    </div>
                </div>

                <div class="border-t border-teal-100 bg-white px-6 py-8 md:px-10">
                    <div class="mb-7 text-center">
                        <span class="text-sm font-semibold uppercase tracking-widest text-teal-700">Tim Kami</span>
                        <h3 class="mt-1 text-2xl font-bold text-teal-950">Struktur Organisasi</h3>
                        <p class="mt-2 text-gray-600">Kolaborasi setiap divisi untuk menghadirkan karya berkualitas.</p>
                    </div>
                    <div class="mx-auto flex max-w-4xl flex-col items-center">
                        <div class="w-full max-w-sm rounded-xl bg-gradient-to-r from-sky-800 to-teal-700 p-4 text-center text-white shadow-md">
                            <p class="text-xs font-semibold uppercase tracking-wider text-cyan-100">Direktur</p>
                            <p class="mt-1 text-lg font-bold">Hamdan</p>
                        </div>
                        <div class="h-7 w-px bg-teal-300"></div>
                        <div class="w-full max-w-sm rounded-xl border-2 border-teal-200 bg-teal-50/50 p-4 text-center shadow-sm">
                            <p class="text-xs font-semibold uppercase tracking-wider text-teal-700">Wakil Direktur dan Bid. Percetakan</p>
                            <p class="mt-1 text-lg font-bold text-teal-950">Dewi Sri</p>
                        </div>
                        <div class="h-7 w-px bg-teal-300"></div>
                        <div class="grid w-full gap-4 md:grid-cols-4">
                            <div class="rounded-xl border border-teal-100 bg-gradient-to-br from-teal-50 to-white p-4 text-center shadow-sm">
                                <p class="font-bold text-teal-900">Bidang Multimedia</p>
                                <p class="mt-1 text-sm text-gray-600">Annas Suharwan</p>
                            </div>
                            <div class="rounded-xl border border-cyan-100 bg-gradient-to-br from-cyan-50 to-white p-4 text-center shadow-sm">
                                <p class="font-bold text-teal-900">Bidang Program Literasi</p>
                                <p class="mt-1 text-sm text-gray-600">Tifani Kautsar</p>
                            </div>
                            <div class="rounded-xl border border-emerald-100 bg-gradient-to-br from-emerald-50 to-white p-4 text-center shadow-sm">
                                <p class="font-bold text-teal-900">Bidang Pemasaran</p>
                                <p class="mt-1 text-sm text-gray-600">Iwan Kurniawan</p>
                            </div>
                            <div class="rounded-xl border border-emerald-100 bg-gradient-to-br from-emerald-50 to-white p-4 text-center shadow-sm">
                                <p class="font-bold text-teal-900">Bidang Penerbitan</p>
                                <p class="mt-1 text-sm text-gray-600">Talitha Dinda Tiara</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Kontak -->
        <section id="sec-kontak" class="hidden mx-auto max-w-4xl space-y-6 rounded-2xl bg-gradient-to-br from-emerald-50 via-white to-cyan-50 p-6 shadow-md sm:p-8">
            <div class="mb-8 rounded-2xl border border-teal-100 bg-gradient-to-r from-teal-100 to-cyan-100 p-8 text-center shadow-sm">
                <h2 class="mb-3 text-3xl font-bold text-teal-950">Masih ada pertanyaan?</h2>
                <p class="text-gray-600 max-w-2xl mx-auto mb-6">Segera Hubungi Kami dan Konsultasikan Karya Terbaikmu</p>
            </div>
            <div class="grid gap-4 md:grid-cols-3">
                <div class="rounded-xl border border-teal-100 bg-white p-5 shadow-sm">
                    <h3 class="font-bold text-teal-900">Nomor Kontak</h3>
                    <p class="mt-2 text-sm text-gray-600">+6287888464445</p>
                </div>
                <div class="rounded-xl border border-cyan-100 bg-white p-5 shadow-sm">
                    <h3 class="font-bold text-cyan-900">Email</h3>
                    <p class="mt-2 text-sm text-gray-600">Pojokpublisher@gmail.com</p>
                </div>
                <div class="rounded-xl border border-emerald-100 bg-white p-5 shadow-sm">
                    <h3 class="font-bold text-emerald-900">Alamat</h3>
                    <p class="mt-2 text-sm text-gray-600">Jalan Kuningan-Nangka (Otista) Perumahan Graha Alana Blok C2 Nomor 12, Kelurahan Kuningan, Kecamatan Kuningan, Kabupaten Kuningan, Jawa Barat, 45511</p>
                </div>
            </div>
            <div class="rounded-xl border border-teal-100 bg-white p-5 text-center shadow-sm">
                <p class="font-semibold text-teal-950">Petunjuk arah ke kantor</p>
                <a href="https://maps.app.goo.gl/TqMiDecBJ7EguiGL7"
                   target="_blank" rel="noopener noreferrer"
                   class="mt-4 inline-block rounded-lg bg-teal-600 px-5 py-2.5 font-semibold text-white transition hover:bg-teal-700">
                    Buka Petunjuk Arah Google Maps
                </a>
            </div>
        </section>

        <!-- 2. Katalog Buku (Publik) -->
        <section id="sec-katalog" class="hidden rounded-2xl border border-teal-100 bg-gradient-to-br from-emerald-50 via-white to-cyan-50 px-4 py-8 shadow-sm sm:px-6 lg:px-8">
            <div class="mx-auto max-w-7xl">
                <header class="mb-8 text-center">
                    <span class="inline-flex rounded-full bg-teal-100 px-4 py-1.5 text-sm font-semibold text-teal-800">Jelajahi Koleksi Kami</span>
                    <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-emerald-950 sm:text-4xl">Katalog Buku Terbitan</h2>
                    <p class="mx-auto mt-3 max-w-2xl text-sm leading-6 text-gray-600 sm:text-base">Temukan bacaan pilihan dan karya inspiratif dari Pojok Publisher.</p>
                    <div class="mx-auto mt-5 h-1 w-16 rounded-full bg-gradient-to-r from-emerald-500 to-cyan-500"></div>
                </header>
                <div id="katalog-list" class="grid grid-cols-1 items-stretch gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Data katalog di-render via JS -->
                </div>
            </div>
        </section>

        <!-- 3. Event & Info (Publik) -->
        <section id="sec-tentang" class="hidden rounded-2xl border border-teal-100 bg-gradient-to-br from-emerald-50 via-white to-cyan-50 px-4 py-10 shadow-sm sm:px-6 lg:px-8">
            <div class="mx-auto max-w-7xl">
                <header class="mb-8 text-center">
                    <span class="inline-flex items-center gap-2 rounded-full bg-teal-100 px-4 py-1.5 text-sm font-semibold text-teal-800">
                        <span aria-hidden="true">✍️</span> Ruang Berkarya
                    </span>
                    <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-emerald-950 sm:text-4xl">Event &amp; Program Menulis</h2>
                    <p class="mx-auto mt-3 max-w-2xl text-sm leading-6 text-gray-600 sm:text-base">Ikuti kegiatan seru, kembangkan ide, dan temukan inspirasi bersama komunitas penulis Pojok Publisher.</p>
                    <div class="mx-auto mt-5 h-1 w-16 rounded-full bg-gradient-to-r from-emerald-500 to-cyan-500"></div>
                </header>
                <div id="event-list" class="space-y-5">
                    <!-- Data event di-render via JS -->
                </div>
            </div>
        </section>

        <!-- 4. Form Kirim Naskah (Butuh Auth Penulis) -->
        <section id="sec-pesan" class="hidden mx-auto max-w-3xl overflow-hidden rounded-3xl border border-teal-100 bg-gradient-to-br from-emerald-50 via-white to-cyan-50 shadow-xl shadow-teal-900/5">
            <div class="px-6 pt-8 sm:px-10 sm:pt-10">
                <span class="inline-flex items-center gap-2 rounded-full bg-teal-100 px-4 py-1.5 text-sm font-semibold text-teal-800">
                    <span aria-hidden="true">✍️</span> Ruang Berkarya
                </span>
                <h2 class="mt-4 text-2xl font-extrabold tracking-tight text-emerald-950 sm:text-3xl">Kirim Naskah Terbaikmu</h2>
                <p class="mt-2 max-w-xl text-sm leading-6 text-slate-600 sm:text-base">Ceritakan karya yang sedang kamu siapkan dan unggah berkasnya. Tim Pojok Publisher siap meninjau naskahmu.</p>
                <div class="mt-6 h-1 w-16 rounded-full bg-gradient-to-r from-emerald-500 to-cyan-500"></div>
            </div>
            <form id="form-submit-naskah" onsubmit="handleFormSubmitNaskah(event)" enctype="multipart/form-data" class="space-y-5 px-6 py-7 sm:px-10 sm:py-8">
                <div>
                    <label for="judul-naskah" class="mb-2 block text-sm font-semibold text-slate-700">Judul Naskah</label>
                    <input id="judul-naskah" type="text" name="judul_naskah" required placeholder="Contoh: Langkah Kecil" class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-slate-800 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-teal-500 focus:ring-4 focus:ring-teal-100">
                </div>
                <div>
                    <label for="sinopsis-naskah" class="mb-2 block text-sm font-semibold text-slate-700">Sinopsis</label>
                    <textarea id="sinopsis-naskah" name="sinopsis" rows="5" required placeholder="Ceritakan gambaran singkat tentang naskahmu..." class="w-full resize-y rounded-xl border border-slate-200 bg-white px-4 py-3 text-slate-800 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-teal-500 focus:ring-4 focus:ring-teal-100"></textarea>
                </div>
                <div>
                    <label for="file-naskah" class="mb-2 block text-sm font-semibold text-slate-700">Berkas Naskah <span class="font-normal text-slate-500">(DOCX atau PDF)</span></label>
                    <input id="file-naskah" type="file" name="file_naskah" accept=".docx,.pdf" required class="w-full cursor-pointer rounded-xl border border-dashed border-teal-300 bg-teal-50/60 p-3 text-sm text-slate-600 file:mr-4 file:cursor-pointer file:rounded-lg file:border-0 file:bg-teal-100 file:px-4 file:py-2 file:font-semibold file:text-teal-800 hover:file:bg-teal-200 focus:outline-none focus:ring-4 focus:ring-teal-100">
                </div>
                <button type="submit" class="w-full rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 px-5 py-3.5 font-bold text-white shadow-lg shadow-teal-900/15 transition hover:-translate-y-0.5 hover:from-emerald-700 hover:to-teal-700 focus:outline-none focus:ring-4 focus:ring-teal-200">
                    Kirim Naskah <span aria-hidden="true" class="ml-1">→</span>
                </button>
            </form>
        </section>

        <!-- Halaman Penuh Detail Katalog Buku -->
<section id="sec-detail-katalog" class="hidden mx-auto max-w-4xl overflow-hidden rounded-3xl border border-emerald-100 bg-gradient-to-br from-white via-emerald-50 to-cyan-50 shadow-2xl shadow-teal-900/10">
    <div class="relative overflow-hidden bg-gradient-to-r from-emerald-700 via-teal-700 to-cyan-700 px-6 py-6 sm:px-8">
        <div class="pointer-events-none absolute -right-8 -top-12 h-40 w-40 rounded-full bg-white/10 blur-2xl"></div>
        <button onclick="showSection('katalog')" class="relative inline-flex items-center gap-2 rounded-full border border-white/30 bg-white/10 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-white/20 focus:outline-none focus:ring-4 focus:ring-white/30">&larr; Kembali ke Katalog</button>
    </div>
    <div id="detail-katalog-body" class="p-6 sm:p-8">
        <!-- Konten detail katalog dirender via JS -->
    </div>
</section>

<!-- Halaman Penuh Detail Event -->
<section id="sec-detail-event" class="hidden mx-auto max-w-3xl overflow-hidden rounded-3xl border border-emerald-100 bg-gradient-to-br from-white via-emerald-50 to-cyan-50 shadow-2xl shadow-teal-900/10">
    <div class="bg-gradient-to-r from-emerald-700 via-teal-700 to-cyan-700 px-6 py-6 sm:px-8">
        <button onclick="showSection('tentang')" class="inline-flex items-center gap-2 rounded-full border border-white/30 bg-white/10 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-white/20 focus:outline-none focus:ring-4 focus:ring-white/30">&larr; Kembali ke Daftar Event</button>
    </div>
    <div id="detail-event-body" class="p-6 sm:p-8">
        <!-- Konten detail event dirender via JS -->
    </div>
</section>

        <!-- 5. Dashboard Customer / Penulis -->
        <section id="sec-dash-customer" class="hidden">
            <h2 class="text-2xl font-bold mb-4">Dashboard Penulis - Status Naskah Saya</h2>
            <div class="bg-white rounded shadow overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-100 border-b">
                        <tr>
                            <th class="p-3">Judul Naskah</th>
                            <th class="p-3">Tanggal Kirim</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Catatan Editor</th>
                        </tr>
                    </thead>
                    <tbody id="tbl-customer-naskah"></tbody>
                </table>
            </div>
        </section>

        <!-- 6. Dashboard Admin / Editor -->
        <!-- Dashboard Admin & Editor -->
<!-- Dashboard Admin & Editor -->
<section id="sec-dash-admin" class="hidden">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Dashboard Admin & Editor</h2>
        <div class="space-x-2">
            <button onclick="openModalAddKatalog()" class="bg-teal-600 text-white px-4 py-2 rounded text-sm font-semibold hover:bg-teal-700">+ Tambah Karya Buku</button>
            <button onclick="openModalAddEvent()" class="bg-cyan-600 text-white px-4 py-2 rounded text-sm font-semibold hover:bg-cyan-700">+ Tambah Event Baru</button>
        </div>
    </div>
    
    <!-- 1. Tabel Naskah Masuk -->
    <div class="bg-white rounded-xl shadow-lg shadow-teal-900/10 overflow-hidden mb-8 border border-teal-100">
        <h3 class="font-bold p-4 bg-gradient-to-r from-teal-700 to-cyan-700 text-white border-b border-teal-600">Antrean & Seleksi Naskah Masuk</h3>
        <table class="w-full text-left border-collapse">
            <thead class="bg-teal-50 border-b border-teal-100 text-teal-900">
                <tr>
                    <th class="p-3">Penulis</th>
                    <th class="p-3">Judul Naskah</th>
                    <th class="p-3">Berkas</th>
                    <th class="p-3">Status Saat Ini</th>
                    <th class="p-3">Aksi / Kurasi</th>
                </tr>
            </thead>
            <tbody id="tbl-admin-naskah"></tbody>
        </table>
    </div>

    <!-- 2. Tabel Manajemen Katalog Buku (Lengkap dengan tombol Edit & Hapus) -->
    <div class="bg-white rounded-xl shadow-lg shadow-teal-900/10 ring-1 ring-teal-100 overflow-x-auto mb-8">
            <div class="p-4 bg-gradient-to-r from-teal-700 to-cyan-700 text-white font-bold">Data Katalog Buku</div>
            <table class="w-full text-left border-collapse">
                <thead class="bg-teal-50 border-b border-teal-100 text-sm text-teal-900">
                <tr>
                        <th class="p-3 font-semibold">Judul Buku</th>
                        <th class="p-3 font-semibold">Penulis</th>
                        <th class="p-3 font-semibold">Link Shopee</th>
                        <th class="p-3 font-semibold">Aksi</th>
                </tr>
            </thead>
                <tbody id="tbl-admin-katalog" class="divide-y divide-teal-100 text-slate-700 [&>tr:hover]:bg-cyan-50"></tbody>
        </table>
    </div>

    <!-- 3. Tabel Manajemen Event (Lengkap dengan tombol Edit & Hapus) -->
    <div class="bg-white rounded-xl shadow-lg ring-1 ring-teal-100 overflow-hidden mb-8">
            <div class="p-4 bg-gradient-to-r from-teal-700 to-cyan-700 text-white font-bold">Data Event & Informasi</div>
        <table class="w-full text-left border-collapse">
                <thead class="bg-teal-50 border-b border-teal-100 text-sm text-teal-900">
                <tr>
                        <th class="p-3 font-semibold">Nama Event</th>
                        <th class="p-3 font-semibold">Deskripsi Singkat</th>
                        <th class="p-3 font-semibold">Aksi</th>
                </tr>
            </thead>
                <tbody id="tbl-admin-events" class="divide-y divide-teal-100 text-slate-700 [&>tr:hover]:bg-cyan-50"></tbody>
        </table>
    </div>
</section>

<!-- Modal Diskusi Catatan Naskah -->
<div id="diskusi-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
    <div class="bg-white rounded-lg p-6 max-w-lg w-full relative flex flex-col max-h-[80vh]">
        <div class="flex justify-between items-center mb-4 border-b pb-2">
            <h3 class="text-lg font-bold text-indigo-900">Diskusi Catatan Editor</h3>
            <button onclick="closeDiskusiModal()" class="text-gray-500 font-bold text-xl">&times;</button>
        </div>
        
        <!-- Ruang Pesan Chat / Diskusi -->
        <div id="diskusi-container" class="flex-grow overflow-y-auto space-y-3 mb-4 p-2 bg-gray-50 rounded border h-64">
            <!-- Pesan dimuat dinamis via JS -->
        </div>

        <!-- Form Kirim Pesan -->
        <form id="form-send-diskusi" onsubmit="handleSendDiskusi(event)" class="flex gap-2">
            <input type="hidden" id="diskusi-naskah-id" name="naskah_id">
            <input type="text" name="pesan" id="input-pesan-diskusi" placeholder="Tulis balasan atau tanggapan..." required class="flex-grow border p-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded text-sm font-semibold">Kirim</button>
        </form>
    </div>
</div>

<!-- Modal Tambah Event -->
<div id="event-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
    <div class="bg-white rounded-lg p-6 max-w-md w-full">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold">Tambah Event / Program</h3>
            <button onclick="closeModalAddEvent()" class="text-gray-500 font-bold">&times;</button>
        </div>
        <!-- Tambahkan enctype="multipart/form-data" -->
        <form id="form-add-event" onsubmit="handleAddEvent(event)" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Nama Event</label>
                <input type="text" name="nama_event" required class="w-full border p-2 rounded">
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Deskripsi / Ketentuan</label>
                <textarea name="deskripsi" rows="3" required class="w-full border p-2 rounded"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Banner / Gambar Event</label>
                <input type="file" name="gambar" accept="image/*" class="w-full border p-2 rounded">
            </div>
            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded font-semibold hover:bg-green-700">Simpan Event</button>
        </form>
    </div>
</div>

<!-- Modal Tambah Katalog Buku -->
<div id="katalog-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
    <div class="bg-white rounded-lg p-6 max-w-md w-full">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold">Tambah Katalog Buku</h3>
            <button onclick="closeModalAddKatalog()" class="text-gray-500 font-bold">&times;</button>
        </div>
        <!-- Tambahkan enctype="multipart/form-data" -->
        <form id="form-add-katalog" onsubmit="handleAddKatalog(event)" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Judul Buku</label>
                <input type="text" name="judul_buku" required class="w-full border p-2 rounded">
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Nama Penulis</label>
                <input type="text" name="penulis" required class="w-full border p-2 rounded">
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Sinopsis Buku</label>
                <textarea name="sinopsis" rows="3" placeholder="Tulis ringkasan isi buku..." required class="w-full border p-2 rounded"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Sampul Buku (Cover)</label>
                <input type="file" name="gambar" accept="image/*" class="w-full border p-2 rounded">
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Link Shopee Buku</label>
                <input type="url" name="link_shopee" placeholder="https://s.shopee.co.id/3B8dqepcV9" class="w-full border p-2 rounded">
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded font-semibold hover:bg-indigo-700">Simpan ke Katalog</button>
        </form>
    </div>
</div>

    </main>

    <footer class="mt-auto bg-gradient-to-br from-teal-950 via-teal-900 to-emerald-950 text-teal-50">
        <div class="container mx-auto grid gap-8 px-4 py-10 sm:grid-cols-2 lg:grid-cols-4">
            <div class="sm:col-span-2">
                <h2 class="mb-3 text-xl font-bold text-white"><img src="logo.png" alt="Logo Pojok Publisher" class="h-14 w-14 object-contain mr-2">Pojok Publisher</h2>
                <p class="max-w-md text-sm leading-6 text-teal-100">Mendampingi penulis menerbitkan karya dan menghadirkan cerita bermakna bagi pembaca.</p>
            </div>
            <div>
                <h3 class="mb-3 font-semibold text-white">Jelajahi</h3>
                <ul class="space-y-2 text-sm">
                    <li><button onclick="showSection('beranda')" class="hover:text-cyan-200">Beranda</button></li>
                    <li><button onclick="showSection('katalog')" class="hover:text-cyan-200">Katalog Buku</button></li>
                    <li><button onclick="showSection('tentang')" class="hover:text-cyan-200">Event &amp; Info</button></li>
                </ul>
            </div>
            <div>
                <h3 class="mb-3 font-semibold text-white">Mulai Berkarya</h3>
                <p class="mb-3 text-sm leading-6 text-teal-100">Punya naskah yang siap dibagikan? Kirimkan kepada tim kami untuk ditinjau.</p>
                <button onclick="requireAuth('pesan')" class="rounded-lg bg-white px-4 py-2 text-sm font-bold text-teal-900 transition hover:bg-cyan-100">Kirim Naskah <span aria-hidden="true">&rarr;</span></button>
            </div>
        </div>
        <div class="border-t border-white/15">
            <div class="container mx-auto flex flex-col gap-2 px-4 py-4 text-xs text-teal-200 sm:flex-row sm:items-center sm:justify-between">
                <p>&copy; <span id="footer-year"></span> Pojok Publisher. Hak cipta dilindungi.</p>
                <p>Mendukung tumbuhnya budaya literasi Indonesia.</p>
            </div>
        </div>
    </footer>
    <script>document.getElementById('footer-year').textContent = new Date().getFullYear();</script>

<!-- Modal Detail Katalog / Buku -->
<div id="detail-katalog-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
    <div class="bg-white rounded-lg p-6 max-w-lg w-full relative">
        <button onclick="closeDetailKatalog()" class="absolute top-4 right-4 text-gray-500 font-bold text-xl">&times;</button>
        <div id="detail-katalog-content">
            <!-- Konten detail dimuat via JS -->
        </div>
    </div>
</div>

<!-- Modal Detail Event -->
<div id="detail-event-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
    <div class="bg-white rounded-lg p-6 max-w-lg w-full relative">
        <button onclick="closeDetailEvent()" class="absolute top-4 right-4 text-gray-500 font-bold text-xl">&times;</button>
        <div id="detail-event-content">
            <!-- Konten detail dimuat via JS -->
        </div>
    </div>
</div>

<!-- Modal Edit Katalog -->
<div id="edit-katalog-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
    <div class="bg-white rounded-lg p-6 max-w-md w-full relative">
        <h3 class="text-lg font-bold mb-4">Edit Katalog Buku</h3>
        <form id="form-edit-katalog" onsubmit="handleUpdateKatalog(event)" enctype="multipart/form-data">
            <input type="hidden" name="id" id="edit-katalog-id">
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Judul Buku</label>
                <input type="text" name="judul_buku" id="edit-katalog-judul" required class="w-full border p-2 rounded">
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Penulis</label>
                <input type="text" name="penulis" id="edit-katalog-penulis" required class="w-full border p-2 rounded">
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Sinopsis Buku</label>
                <textarea name="sinopsis" id="edit-katalog-sinopsis" rows="3" required class="w-full border p-2 rounded"></textarea>
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Link Shopee</label>
                <input type="url" name="link_shopee" id="edit-katalog-shopee" class="w-full border p-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Ganti Gambar (Opsional)</label>
                <input type="file" name="gambar" accept="image/*" class="w-full border p-2 rounded">
            </div>
            <div class="flex space-x-2">
                <button type="submit" class="flex-1 bg-indigo-600 text-white py-2 rounded font-semibold">Simpan Perubahan</button>
                <button type="button" onclick="closeEditKatalog()" class="bg-gray-300 px-4 py-2 rounded">Batal</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Event -->
<div id="edit-event-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
    <div class="bg-white rounded-lg p-6 max-w-md w-full relative">
        <h3 class="text-lg font-bold mb-4">Edit Event / Info</h3>
        <form id="form-edit-event" onsubmit="handleUpdateEvent(event)" enctype="multipart/form-data">
            <input type="hidden" name="id" id="edit-event-id">
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Nama Event</label>
                <input type="text" name="nama_event" id="edit-event-nama" required class="w-full border p-2 rounded">
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Deskripsi</label>
                <textarea name="deskripsi" id="edit-event-deskripsi" rows="3" required class="w-full border p-2 rounded"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Ganti Gambar (Opsional)</label>
                <input type="file" name="gambar" accept="image/*" class="w-full border p-2 rounded">
            </div>
            <div class="flex space-x-2">
                <button type="submit" class="flex-1 bg-green-600 text-white py-2 rounded font-semibold">Simpan Perubahan</button>
                <button type="button" onclick="closeEditEvent()" class="bg-gray-300 px-4 py-2 rounded">Batal</button>
            </div>
        </form>
    </div>
</div>

    <!-- Auth Modal (Login) -->
    <div id="auth-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg p-6 max-w-sm w-full">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold">Login Sistem</h3>
                <button onclick="closeAuthModal()" class="text-gray-500 font-bold">&times;</button>
            </div>
            <form id="form-login" onsubmit="handleLogin(event)">
                <div class="mb-3">
                    <label class="block text-sm font-medium">Email</label>
                    <input type="email" id="login-email" required class="w-full border p-2 rounded">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium">Password</label>
                    <input type="password" id="login-password" required class="w-full border p-2 rounded">
                </div>
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded font-semibold">Masuk</button>
                <p class="text-xs text-center text-gray-600 mt-3">Belum punya akun? <button type="button" onclick="switchToRegister()" class="text-indigo-600 font-semibold underline">Daftar sebagai Penulis</button></p>
            </form>
        </div>
    </div>
    <!-- Modal Register (Pendaftaran Akun Penulis) -->
<div id="register-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
    <div class="bg-white rounded-lg p-6 max-w-sm w-full relative">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold">Daftar Akun Penulis</h3>
            <button onclick="closeRegisterModal()" class="text-gray-500 font-bold">&times;</button>
        </div>
        <form id="form-register" onsubmit="handleRegister(event)">
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
                <input type="text" id="reg-nama" required class="w-full border p-2 rounded">
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" id="reg-email" required class="w-full border p-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Password</label>
                <input type="password" id="reg-password" required class="w-full border p-2 rounded">
            </div>
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded font-semibold mb-3">Daftar Sekarang</button>
            <p class="text-xs text-center text-gray-600">Sudah punya akun? <button type="button" onclick="switchToLogin()" class="text-indigo-600 font-semibold underline">Login di sini</button></p>
        </form>
    </div>
</div>

    <!-- Script Navigation & App Logic (Melanjutkan kode dari screenshot kamu) -->
    <script>
        let currentUser = null;

        function requireAuth(sectionId) {
            if (!currentUser) {
                openAuthModal();
            } else {
                showSection(sectionId);
            }
        }

        // Navigation Management
        function showSection(sectionId) {
            const sections = [
                'beranda',
                'tentang-kami',
                'kontak',
                'katalog',
                'tentang',
                'pesan',
                'dash-customer',
                'dash-admin',
                'detail-katalog',
                'detail-event'
            ];

            sections.forEach(id => {
                const section = document.getElementById(`sec-${id}`);
                if (section) section.classList.add('hidden');
            });

            const activeSection = document.getElementById(`sec-${sectionId}`);
            if (activeSection) activeSection.classList.remove('hidden');

            if (sectionId === 'katalog') renderKatalog();
            if (sectionId === 'tentang') renderEvents();
            if (sectionId === 'dash-customer') renderCustomerTable();

            if (sectionId === 'dash-admin') {
                renderAdminTable();
                renderAdminKatalogTable();
                renderAdminEventTable();
            }
        }


        // Auth Modal Controls
        function openAuthModal() {
            document.getElementById('auth-modal').classList.remove('hidden');
        }

        function closeAuthModal() {
            document.getElementById('auth-modal').classList.add('hidden');
        }

        // Handle Login
        async function handleLogin(e) {
            e.preventDefault();
            const formData = new FormData();
            formData.append('email', document.getElementById('login-email').value);
            formData.append('password', document.getElementById('login-password').value);

            const res = await fetch('api.php?action=login', { method: 'POST', body: formData });
            const data = await res.json();

            if (data.status === 'success') {
                currentUser = data.user;
                closeAuthModal();
                updateNavUI();
                if (currentUser.role === 'admin') {
                    showSection('dash-admin');
                } else {
                    showSection('dash-customer');
                }
            } else {
                alert(data.message);
            }
        }

        // Kontrol Modal Register & Pindah Tab
function openRegisterModal() {
    document.getElementById('auth-modal').classList.add('hidden');
    document.getElementById('register-modal').classList.remove('hidden');
}

function closeRegisterModal() {
    document.getElementById('register-modal').classList.add('hidden');
}

function switchToRegister() {
    closeAuthModal();
    openRegisterModal();
}

function switchToLogin() {
    closeRegisterModal();
    openAuthModal();
}

// Handle Proses Register
async function handleRegister(e) {
    e.preventDefault();
    const formData = new FormData();
    formData.append('nama', document.getElementById('reg-nama').value);
    formData.append('email', document.getElementById('reg-email').value);
    formData.append('password', document.getElementById('reg-password').value);

    const res = await fetch('api.php?action=register', { method: 'POST', body: formData });
    const data = await res.json();

    alert(data.message);
    if (data.status === 'success') {
        document.getElementById('form-register').reset();
        switchToLogin(); // Pindah kembali ke modal login
    }
}

        async function handleLogout() {
            await fetch('api.php?action=logout');
            currentUser = null;
            updateNavUI();
            showSection('beranda');
        }

        function updateNavUI() {
            const area = document.getElementById('nav-user-area');
            if (currentUser) {
                let dashBtn = currentUser.role === 'admin' 
                    ? `<button onclick="showSection('dash-admin')" class="hover:underline">Dashboard Admin</button>`
                    : `<button onclick="showSection('dash-customer')" class="hover:underline">Dashboard Saya</button>`;

                area.innerHTML = `
                    ${dashBtn}
                    <span class="ml-2 font-semibold text-amber-300">Hi, ${currentUser.nama}</span>
                    <button onclick="handleLogout()" class="ml-2 bg-red-600 px-3 py-1 rounded text-sm">Logout</button>
                `;
            } else {
                area.innerHTML = `<button onclick="openAuthModal()" class="bg-amber-500 px-3 py-1.5 rounded hover:bg-amber-600 font-semibold">Login</button>`;
            }
        }

       // Global variable untuk menyimpan data cache sementara
let cacheKatalog = [];
let cacheEvents = [];

// Render Katalog dengan tombol Detail & Beli Sekarang
// Render Katalog Publik
async function renderKatalog() {
    const res = await fetch('api.php?action=get_katalog');
    const data = await res.json();
    const container = document.getElementById('katalog-list');
    if (data.status === 'success' && data.data.length > 0) {
        cacheKatalog = data.data;
        container.innerHTML = data.data.map((item) => `
            <div class="bg-white rounded shadow border overflow-hidden flex flex-col justify-between">
                <div>
                    ${item.gambar ? `<img src="${item.gambar}" class="w-full h-48 object-cover">` : `<div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">Tidak ada gambar</div>`}
                    <div class="p-4">
                        <h4 class="font-bold text-lg">${item.judul_buku}</h4>
                        <p class="text-sm text-gray-600 mb-2">Penulis: ${item.penulis}</p>
                        <p class="text-xs text-gray-500 line-clamp-2">${item.sinopsis || 'Belum ada sinopsis.'}</p>
                    </div>
                </div>
                <div class="p-4 pt-0 flex space-x-2">
                    <button onclick="openDetailKatalogById(${item.id})" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-800 py-1.5 rounded text-sm font-semibold">Detail</button>
                    <button onclick="copyShareLink('buku', ${item.id})" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-2.5 py-1.5 rounded text-sm" title="Salin Link Buku">🔗</button>
                    ${item.link_shopee ? `<a href="${item.link_shopee}" target="_blank" class="flex-1 bg-red-500 hover:bg-red-600 text-white py-1.5 rounded text-sm font-semibold text-center">Beli Shopee</a>` : ``}
                </div>
            </div>
        `).join('');
    } else {
        container.innerHTML = `<p class="text-gray-500">Belum ada katalog buku.</p>`;
    }
}

// Render Event dengan tombol Detail
async function renderEvents() {
    const res = await fetch('api.php?action=get_events');
    const data = await res.json();
    const container = document.getElementById('event-list');
    if (data.status === 'success' && data.data.length > 0) {
        cacheEvents = data.data;
        container.innerHTML = data.data.map((item, index) => `
            <div class="bg-white rounded shadow border overflow-hidden flex flex-col md:flex-row">
                ${item.gambar ? `<img src="${item.gambar}" class="w-full md:w-64 h-48 object-cover">` : ``}
                <div class="p-4 flex-grow flex flex-col justify-between">
                    <div>
                        <h4 class="font-bold text-lg text-indigo-900">${item.nama_event}</h4>
                        <p class="text-gray-700 mt-1 line-clamp-2">${item.deskripsi}</p>
                    </div>
                    <div class="mt-4">
                        <button onclick="openDetailEvent(${index})" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-1.5 rounded text-sm font-semibold">Lihat Detail Event</button>
                    </div>
                </div>
            </div>
        `).join('');
    } else {
        container.innerHTML = `<p class="text-gray-500">Belum ada informasi event.</p>`;
    }
}

// Handler Modal Detail Katalog
async function openDetailKatalogById(id, pushHistory = true) {
    if (cacheKatalog.length === 0) {
        const res = await fetch('api.php?action=get_katalog');
        const data = await res.json();
        if (data.status === 'success') cacheKatalog = data.data;
    }
    
    const item = cacheKatalog.find(b => b.id == id);
    if (!item) return;

    if (pushHistory) {
        history.pushState({ type: 'buku', id: id }, '', `?buku=${id}`);
    }

    const shareUrl = `${window.location.origin}${window.location.pathname}?buku=${item.id}`;
    const container = document.getElementById('detail-katalog-body');
    
    container.innerHTML = `
        ${item.gambar ? `<img src="${item.gambar}" class="w-full h-80 object-cover rounded-lg mb-6 shadow">` : ``}
        <div class="flex justify-between items-start mb-2">
            <h2 class="text-3xl font-bold text-gray-900">${item.judul_buku}</h2>
            <button onclick="copyShareLinkDirect('${shareUrl}')" class="bg-indigo-50 text-indigo-600 hover:bg-indigo-100 px-3 py-1.5 rounded text-sm font-semibold border border-indigo-200">📋 Salin Link Buku</button>
        </div>
        <p class="text-lg text-gray-600 mb-6 font-medium">Penulis: ${item.penulis}</p>
        
        <div class="mb-6">
            <h3 class="text-xl font-bold text-gray-800 mb-2">Sinopsis</h3>
            <div class="text-gray-700 whitespace-pre-line leading-relaxed bg-gray-50 p-4 rounded-lg border">
                ${item.sinopsis || 'Belum ada sinopsis yang ditambahkan untuk buku ini.'}
            </div>
        </div>

        ${item.link_shopee ? `<a href="${item.link_shopee}" target="_blank" class="inline-block bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-3 rounded-lg shadow">Beli Sekarang di Shopee</a>` : `<p class="text-sm text-gray-400 italic">Link pembelian Shopee belum tersedia untuk buku ini.</p>`}
    `;
    
    showSection('detail-katalog');
}
function closeDetailKatalog() {
    document.getElementById('detail-katalog-modal').classList.add('hidden');
}

// Handler Modal Detail Event
function openDetailEvent(index) {
    const item = cacheEvents[index];
    const content = document.getElementById('detail-event-content');
    content.innerHTML = `
        ${item.gambar ? `<img src="${item.gambar}" class="w-full h-64 object-cover rounded mb-4">` : ``}
        <h3 class="text-2xl font-bold mb-2 text-indigo-900">${item.nama_event}</h3>
        <div class="text-gray-700 whitespace-pre-line mb-6">${item.deskripsi}</div>
        <button onclick="requireAuth('pesan')" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2.5 rounded font-semibold">Kirim Naskah untuk Event Ini</button>
    `;
    document.getElementById('detail-event-modal').classList.remove('hidden');
}
function closeDetailEvent() {
    document.getElementById('detail-event-modal').classList.add('hidden');
}

        async function renderCustomerTable() {
    const res = await fetch('api.php?action=get_my_naskah');
    const data = await res.json();
    const tbody = document.getElementById('tbl-customer-naskah');
    if (data.status === 'success' && data.data.length > 0) {
        tbody.innerHTML = data.data.map(item => `
            <tr class="border-b">
                <td class="p-3 font-semibold">${item.judul_naskah}</td>
                <td class="p-3 text-sm">${item.created_at || '-'}</td>
                <td class="p-3"><span class="px-2 py-1 rounded bg-blue-100 text-blue-800 text-xs font-bold">${item.status}</span></td>
                <td class="p-3 text-sm text-gray-700">${item.catatan_editor || 'Belum ada catatan'}</td>
                <td class="p-3">
                    <button onclick="openDiskusiModal(${item.id})" class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 rounded text-xs font-semibold">💬 Diskusi / Balas Catatan</button>
                </td>
            </tr>
        `).join('');
    } else {
        tbody.innerHTML = `<tr><td colspan="5" class="p-4 text-center text-gray-500">Belum ada naskah yang dikirim.</td></tr>`;
    }
}

        async function renderAdminTable() {
    const res = await fetch('api.php?action=get_all_naskah');
    const data = await res.json();
    const tbody = document.getElementById('tbl-admin-naskah');
    if (data.status === 'success' && data.data.length > 0) {
        tbody.innerHTML = data.data.map(item => `
            <tr class="border-b">
                <td class="p-3 font-medium">${item.nama_penulis}</td>
                <td class="p-3 font-semibold">${item.judul_naskah}</td>
                <td class="p-3"><a href="${item.file_path}" target="_blank" class="text-indigo-600 underline text-sm">Download</a></td>
                <td class="p-3"><span class="px-2 py-1 rounded bg-blue-100 text-blue-800 text-xs font-bold">${item.status}</span></td>
                <td class="p-3 space-y-1">
                    <div class="flex gap-1 flex-wrap">
                        <button onclick="updateTahapan(${item.id}, 'Accepted')" class="bg-green-500 text-white px-2 py-0.5 rounded text-xs">Terima</button>
                        <button onclick="updateTahapan(${item.id}, 'Proses Edit')" class="bg-amber-500 text-white px-2 py-0.5 rounded text-xs">Edit</button>
                        <button onclick="updateTahapan(${item.id}, 'Proses Layout')" class="bg-purple-500 text-white px-2 py-0.5 rounded text-xs">Layout</button>
                        <button onclick="updateTahapan(${item.id}, 'Proses Cetak')" class="bg-blue-600 text-white px-2 py-0.5 rounded text-xs">Cetak</button>
                        <button onclick="updateTahapan(${item.id}, 'Proses Publish')" class="bg-emerald-700 text-white px-2 py-0.5 rounded text-xs">Publish</button>
                        <button onclick="updateTahapan(${item.id}, 'Rejected')" class="bg-red-600 text-white px-2 py-0.5 rounded text-xs">Tolak</button>
                    </div>
                    <button onclick="openDiskusiModal(${item.id})" class="mt-1 bg-gray-800 text-white px-2 py-1 rounded text-xs w-full">💬 Diskusi Catatan</button>
                </td>
            </tr>
        `).join('');
    } else {
        tbody.innerHTML = `<tr><td colspan="5" class="p-4 text-center text-gray-500">Belum ada naskah masuk.</td></tr>`;
    }
}

async function updateTahapan(id, statusTarget) {
    const catatan = prompt('Masukkan catatan atau feedback editor untuk tahapan ini:');
    const formData = new FormData();
    formData.append('naskah_id', id);
    formData.append('status', statusTarget);
    formData.append('catatan_editor', catatan || '');

    const res = await fetch('api.php?action=update_tahapan_naskah', { method: 'POST', body: formData });
    const data = await res.json();
    alert(data.message);
    renderAdminTable();
}

        async function handleFormSubmitNaskah(e) {
            e.preventDefault();
            const formData = new FormData(e.target);
            const res = await fetch('api.php?action=submit_naskah', { method: 'POST', body: formData });
            const data = await res.json();
            alert(data.message);
            if (data.status === 'success') {
                e.target.reset();
                showSection('dash-customer');
            }
        }

        async function updateStatus(id, newStatus) {
            const catatan = prompt('Masukkan catatan/feedback editor (opsional):');
            const formData = new FormData();
            formData.append('naskah_id', id);
            formData.append('status', newStatus);
            formData.append('catatan_editor', catatan || '');

            const res = await fetch('api.php?action=update_status_naskah', { method: 'POST', body: formData });
            const data = await res.json();
            alert(data.message);
            renderAdminTable();
        }

        // Init Check Session on Load
        window.onload = async () => {
            const res = await fetch('api.php?action=check_session');
            const data = await res.json();
            if (data.logged_in) {
                currentUser = data.user;
                updateNavUI();
            }
            showSection('beranda');
        };

        // Modal Controls untuk Event
function openModalAddEvent() {
    document.getElementById('event-modal').classList.remove('hidden');
}
function closeModalAddEvent() {
    document.getElementById('event-modal').classList.add('hidden');
}

// Modal Controls untuk Katalog Buku
function openModalAddKatalog() {
    document.getElementById('katalog-modal').classList.remove('hidden');
}
function closeModalAddKatalog() {
    document.getElementById('katalog-modal').classList.add('hidden');
}

// Submit Event Baru
async function handleAddEvent(e) {
    e.preventDefault();
    const formData = new FormData(e.target);
    const res = await fetch('api.php?action=add_event', { method: 'POST', body: formData });
    const data = await res.json();
    alert(data.message);
    if (data.status === 'success') {
        e.target.reset();
        closeModalAddEvent();
        renderEvents();
    }
}

// Submit Katalog Buku Baru
async function handleAddKatalog(e) {
    e.preventDefault();
    const formData = new FormData(e.target);
    const res = await fetch('api.php?action=add_katalog', { method: 'POST', body: formData });
    const data = await res.json();
    alert(data.message);
    if (data.status === 'success') {
        e.target.reset();
        closeModalAddKatalog();
        renderKatalog();
    }
}

// Panggil fungsi render admin tambahan di dalam showSection('dash-admin')
// Pastikan baris ini ada di dalam fungsi showSection:
// if (sectionId === 'dash-admin') { renderAdminTable(); renderAdminKatalogTable(); renderAdminEventTable(); }

async function renderAdminKatalogTable() {
    const res = await fetch('api.php?action=get_katalog');
    const data = await res.json();
    const tbody = document.getElementById('tbl-admin-katalog');
    if (data.status === 'success' && data.data.length > 0) {
        cacheKatalog = data.data;
        tbody.innerHTML = data.data.map((item, index) => `
            <tr class="border-b">
                <td class="p-3 font-medium">${item.judul_buku}</td>
                <td class="p-3 text-sm">${item.penulis}</td>
                <td class="p-3 text-xs text-blue-600 truncate max-w-xs"><a href="${item.link_shopee}" target="_blank">${item.link_shopee || '-'}</a></td>
                <td class="p-3 space-x-1">
                    <button onclick="openEditKatalog(${index})" class="bg-amber-500 text-white px-2 py-1 rounded text-xs font-semibold">Edit</button>
                    <button onclick="deleteKatalog(${item.id})" class="bg-red-600 text-white px-2 py-1 rounded text-xs font-semibold">Hapus</button>
                </td>
            </tr>
        `).join('');
    } else {
        tbody.innerHTML = `<tr><td colspan="4" class="p-4 text-center text-gray-500">Belum ada katalog.</td></tr>`;
    }
}

async function renderAdminEventTable() {
    const res = await fetch('api.php?action=get_events');
    const data = await res.json();
    const tbody = document.getElementById('tbl-admin-events');
    if (data.status === 'success' && data.data.length > 0) {
        cacheEvents = data.data;
        tbody.innerHTML = data.data.map((item, index) => `
            <tr class="border-b">
                <td class="p-3 font-medium">${item.nama_event}</td>
                <td class="p-3 text-sm truncate max-w-xs">${item.deskripsi}</td>
                <td class="p-3 space-x-1">
                    <button onclick="openEditEvent(${index})" class="bg-amber-500 text-white px-2 py-1 rounded text-xs font-semibold">Edit</button>
                    <button onclick="deleteEvent(${item.id})" class="bg-red-600 text-white px-2 py-1 rounded text-xs font-semibold">Hapus</button>
                </td>
            </tr>
        `).join('');
    } else {
        tbody.innerHTML = `<tr><td colspan="3" class="p-4 text-center text-gray-500">Belum ada event.</td></tr>`;
    }
}

// Fungsi Edit & Delete Katalog
function openEditKatalog(index) {
    const item = cacheKatalog[index];
    document.getElementById('edit-katalog-id').value = item.id;
    document.getElementById('edit-katalog-judul').value = item.judul_buku;
    document.getElementById('edit-katalog-penulis').value = item.penulis;
    document.getElementById('edit-katalog-sinopsis').value = item.sinopsis || '';
    document.getElementById('edit-katalog-shopee').value = item.link_shopee || '';
    document.getElementById('edit-katalog-modal').classList.remove('hidden');
}
function closeEditKatalog() {
    document.getElementById('edit-katalog-modal').classList.add('hidden');
}
async function handleUpdateKatalog(e) {
    e.preventDefault();
    const formData = new FormData(e.target);
    const res = await fetch('api.php?action=update_katalog', { method: 'POST', body: formData });
    const data = await res.json();
    alert(data.message);
    if (data.status === 'success') {
        closeEditKatalog();
        renderAdminKatalogTable();
        renderKatalog();
    }
}
async function deleteKatalog(id) {
    if (confirm('Yakin ingin menghapus katalog buku ini?')) {
        const formData = new FormData();
        formData.append('id', id);
        const res = await fetch('api.php?action=delete_katalog', { method: 'POST', body: formData });
        const data = await res.json();
        alert(data.message);
        renderAdminKatalogTable();
        renderKatalog();
    }
}

// Fungsi Edit & Delete Event
function openEditEvent(index) {
    const item = cacheEvents[index];
    document.getElementById('edit-event-id').value = item.id;
    document.getElementById('edit-event-nama').value = item.nama_event;
    document.getElementById('edit-event-deskripsi').value = item.deskripsi;
    document.getElementById('edit-event-modal').classList.remove('hidden');
}
function closeEditEvent() {
    document.getElementById('edit-event-modal').classList.add('hidden');
}
async function handleUpdateEvent(e) {
    e.preventDefault();
    const formData = new FormData(e.target);
    const res = await fetch('api.php?action=update_event', { method: 'POST', body: formData });
    const data = await res.json();
    alert(data.message);
    if (data.status === 'success') {
        closeEditEvent();
        renderAdminEventTable();
        renderEvents();
    }
}
async function deleteEvent(id) {
    if (confirm('Yakin ingin menghapus event ini?')) {
        const formData = new FormData();
        formData.append('id', id);
        const res = await fetch('api.php?action=delete_event', { method: 'POST', body: formData });
        const data = await res.json();
        alert(data.message);
        renderAdminEventTable();
        renderEvents();
    }
}

// Tampilkan Halaman Penuh Detail Katalog
function openDetailKatalog(index) {
    const item = cacheKatalog[index];
    const container = document.getElementById('detail-katalog-body');
    container.innerHTML = `
        ${item.gambar ? `<img src="${item.gambar}" class="w-full h-80 object-cover rounded-lg mb-6 shadow">` : ``}
        <h2 class="text-3xl font-bold mb-2 text-gray-900">${item.judul_buku}</h2>
        <p class="text-lg text-gray-600 mb-6 font-medium">Penulis: ${item.penulis}</p>
        <div class="prose max-w-none text-gray-700 mb-8">
            <p>Buku resmi terbitan PT Penerbit Pojok Publisher. Karya terpilih yang telah melewati proses kurasi editorial profesional guna menghadirkan bacaan berkualitas tinggi bagi masyarakat.</p>
        </div>
        ${item.link_shopee ? `<a href="${item.link_shopee}" target="_blank" class="inline-block bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-3 rounded-lg shadow">Beli Sekarang di Shopee</a>` : `<p class="text-sm text-gray-400 italic">Link pembelian Shopee belum tersedia untuk buku ini.</p>`}
    `;
    showSection('detail-katalog');
}

// Buka Detail Buku Berdasarkan ID & Update URL Browser
async function openDetailKatalogById(id, pushHistory = true) {
    if (cacheKatalog.length === 0) {
        const res = await fetch('api.php?action=get_katalog');
        const data = await res.json();
        if (data.status === 'success') cacheKatalog = data.data;
    }
    
    const item = cacheKatalog.find(b => b.id == id);
    if (!item) return;

    // Ubah URL di address bar browser agar bisa di-bookmark/disalin
    if (pushHistory) {
        history.pushState({ type: 'buku', id: id }, '', `?buku=${id}`);
    }

    const shareUrl = `${window.location.origin}${window.location.pathname}?buku=${item.id}`;
    const container = document.getElementById('detail-katalog-body');
    
    container.innerHTML = `
        ${item.gambar ? `<img src="${item.gambar}" class="w-full h-80 object-cover rounded-lg mb-6 shadow">` : ``}
        <div class="flex justify-between items-start mb-2">
            <h2 class="text-3xl font-bold text-gray-900">${item.judul_buku}</h2>
            <button onclick="copyShareLinkDirect('${shareUrl}')" class="bg-indigo-50 text-indigo-600 hover:bg-indigo-100 px-3 py-1.5 rounded text-sm font-semibold border border-indigo-200">📋 Salin Link Buku</button>
        </div>
        <p class="text-lg text-gray-600 mb-6 font-medium">Penulis: ${item.penulis}</p>
        <div class="prose max-w-none text-gray-700 mb-8">
            <p>Buku resmi terbitan PT Penerbit Pojok Publisher. Karya terpilih yang telah melewati proses kurasi editorial profesional guna menghadirkan bacaan berkualitas tinggi bagi masyarakat.</p>
        </div>
        ${item.link_shopee ? `<a href="${item.link_shopee}" target="_blank" class="inline-block bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-3 rounded-lg shadow">Beli Sekarang di Shopee</a>` : `<p class="text-sm text-gray-400 italic">Link pembelian Shopee belum tersedia untuk buku ini.</p>`}
    `;
    
    showSection('detail-katalog');
}

// Fungsi Salin Link ke Clipboard
function copyShareLink(type, id) {
    const url = `${window.location.origin}${window.location.pathname}?${type}=${id}`;
    navigator.clipboard.writeText(url).then(() => {
        alert(`Link ${type} telah disalin:\n${url}`);
    });
}

function copyShareLinkDirect(url) {
    navigator.clipboard.writeText(url).then(() => {
        alert(`Link buku berhasil disalin:\n${url}`);
    });
}

// Tampilkan Halaman Penuh Detail Event
function openDetailEvent(index) {
    const item = cacheEvents[index];
    const container = document.getElementById('detail-event-body');
    container.innerHTML = `
        ${item.gambar ? `<img src="${item.gambar}" class="w-full h-80 object-cover rounded-lg mb-6 shadow">` : ``}
        <h2 class="text-3xl font-bold mb-4 text-indigo-900">${item.nama_event}</h2>
        <div class="text-gray-700 whitespace-pre-line leading-relaxed mb-8 text-base">${item.deskripsi}</div>
        <button onclick="requireAuth('pesan')" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-lg shadow">Kirim Naskah untuk Event Ini</button>
    `;
    showSection('detail-event');
}

// Buka Modal Diskusi & Muat Pesan
async function openDiskusiModal(naskahId) {
    document.getElementById('diskusi-naskah-id').value = naskahId;
    document.getElementById('diskusi-modal').classList.remove('hidden');
    loadDiskusiMessages(naskahId);
}

function closeDiskusiModal() {
    document.getElementById('diskusi-modal').classList.add('hidden');
}

async function loadDiskusiMessages(naskahId) {
    const container = document.getElementById('diskusi-container');
    container.innerHTML = `<p class="text-center text-gray-400 text-sm">Memuat diskusi...</p>`;

    const res = await fetch(`api.php?action=get_diskusi&naskah_id=${naskahId}`);
    const data = await res.json();

    if (data.status === 'success' && data.data.length > 0) {
        container.innerHTML = data.data.map(msg => {
            const isMe = msg.sender_id == currentUser.id;
            const alignClass = isMe ? 'ml-auto bg-indigo-100 text-indigo-900' : 'mr-auto bg-white text-gray-800 border';
            return `
                <div class="p-3 rounded-lg max-w-[80%] text-sm ${alignClass} shadow-sm">
                    <div class="flex justify-between items-center mb-1 text-xs text-gray-500 font-semibold">
                        <span>${msg.nama_sender} (${msg.role})</span>
                        <span class="ml-2 text-[10px]">${msg.created_at}</span>
                    </div>
                    <p>${msg.pesan}</p>
                </div>
            `;
        }).join('');
        container.scrollTop = container.scrollHeight;
    } else {
        container.innerHTML = `<p class="text-center text-gray-400 text-sm italic">Belum ada diskusi pada naskah ini. Mulai percakapan di bawah.</p>`;
    }
}

async function handleSendDiskusi(e) {
    e.preventDefault();
    const formData = new FormData(e.target);
    const naskahId = document.getElementById('diskusi-naskah-id').value;

    const res = await fetch('api.php?action=send_diskusi', { method: 'POST', body: formData });
    const data = await res.json();

    if (data.status === 'success') {
        document.getElementById('input-pesan-diskusi').value = '';
        loadDiskusiMessages(naskahId);
    } else {
        alert(data.message);
    }
}

window.onload = async () => {
    // 1. Cek sesi login
    const res = await fetch('api.php?action=check_session');
    const data = await res.json();
    if (data.logged_in) {
        currentUser = data.user;
        updateNavUI();
    }

    // 2. Cek apakah ada parameter direct link di URL
    const urlParams = new URLSearchParams(window.location.search);
    const bukuId = urlParams.get('buku');
    const eventId = urlParams.get('event');

    if (bukuId) {
        openDetailKatalogById(bukuId, false);
    } else if (eventId) {
        openDetailEventById(eventId, false);
    } else {
        // Jika tidak ada parameter buku/event di URL, pastikan selalu membuka Beranda
        showSection('beranda');
    }
};

    </script>
</body>
</html>