# Inventory Barang - Sistem Manajemen Inventory Komputer

Aplikasi **Inventory Barang** adalah sistem manajemen inventory berbasis web yang dirancang khusus untuk mengelola perangkat komputer dan menangani keluhan teknis karyawan di suatu organisasi. Aplikasi ini dibangun menggunakan PHP native dengan database MySQL.

## Fitur Utama

### 📊 Dashboard & Monitoring
- Dashboard admin untuk monitoring keseluruhan inventory
- Dashboard karyawan untuk melihat status komputer dan keluhan pribadi
- Statistik real-time jumlah komponen, karyawan, dan komputer

### 🖥️ Manajemen Komponen Komputer
- **Processor**: Kelola data processor dengan informasi nama dan stok
- **RAM**: Manage RAM dengan detail tipe memory (DDR), kapasitas (GB), dan stok
- **Storage**: Administrasi storage (SSD/HDD) dengan kapasitas dan stok
- **VGA/Graphics Card**: Kelola kartu grafis dengan brand, nama, VRAM, dan stok

### 👥 Manajemen Karyawan & Komputer
- Data karyawan lengkap (nama, NIP, jenis kelamin, divisi)
- Sistem assignment komputer ke karyawan (1 karyawan = 1 komputer)
- Spesifikasi lengkap komputer setiap karyawan

### 📋 Sistem Keluhan (Helpdesk)
- Karyawan dapat melaporkan keluhan teknis komputer
- Tracking status keluhan: **Pending** → **Proses** → **Selesai**
- Admin/teknisi dapat memberikan solusi dan menghitung biaya perbaikan
- Riwayat lengkap keluhan dengan tanggal masuk, proses, dan selesai

### 📦 Transaksi Barang
- Pencatatan keluar-masuk komponen komputer
- Filter data berdasarkan tanggal
- Laporan yang dapat dicetak
- Status transaksi (Masuk/Keluar)

### 🔐 Sistem Multi-Level User
- **Admin**: Akses penuh ke seluruh sistem
- **Karyawan**: Akses terbatas untuk melihat komputer pribadi dan melaporkan keluhan

## Preview Aplikasi
![Dashboard Admin](https://github.com/Delendins/pkl/blob/main/pages/src/image/Preview/1.png?raw=true)

![Dashboard Karyawan](https://github.com/Delendins/pkl/blob/main/pages/src/image/Preview/2.png?raw=true)

## Teknologi yang Digunakan
- **Backend**: PHP 8.2+
- **Database**: MySQL
- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap 5
- **Dependencies**: Composer (mPDF untuk generate laporan)
- **Libraries**: 
  - DataTables untuk tabel interaktif
  - SweetAlert untuk notifikasi
  - AOS (Animate On Scroll) untuk animasi
  - mPDF untuk generate PDF laporan

## Struktur Database
Aplikasi menggunakan database `inventory_barang` dengan tabel utama:
- `users` - Data admin/petugas
- `karyawan` - Data karyawan
- `processor`, `ram`, `storage`, `vga` - Komponen komputer
- `komputer` - Assignment komputer ke karyawan
- `keluhan` - Sistem ticketing keluhan
- `barang` - Transaksi inventory

## Login Information
- **Admin**: 
    - Username: admin
    - Password: admin
- **Karyawan**:
    - Username: erwinsusanto
    - Password: erwin

## Instalasi
1. Clone repository ini
2. Install dependencies menggunakan Composer:

   ```bash
   composer install
   ```
3. Import file `database/inventory_barang.sql` ke MySQL
4. Konfigurasi koneksi database di `pages/src/config/connect.php`
5. Pastikan menggunakan PHP 8.2 atau versi yang lebih baru
6. Jalankan aplikasi melalui web server (XAMPP/Laragon/WAMP)

## Use Case
Aplikasi ini cocok untuk:
- Perusahaan IT yang perlu mengelola perangkat komputer karyawan
- Departemen IT untuk tracking keluhan dan maintenance
- Organisasi yang membutuhkan sistem inventory komponen komputer
- Sistem helpdesk internal perusahaan