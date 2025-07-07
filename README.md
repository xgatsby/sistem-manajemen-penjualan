# 🏪 Sistem Manajemen Penjualan

> **Aplikasi web modern untuk mengelola data barang dan kasir dengan antarmuka yang user-friendly**

## 📚 Informasi Tugas

**Mata Kuliah:** Pemrograman Web  
**Dosen Pengampu:** Han Sulaiman  
**Semester:** 6 (Enam)  
**Kelas:** SJ  

## 👥 Tim Pengembang Kelompok 6

<table>
<tr>
<td align="center">
<img src="https://github.com/xgatsby.png" width="100px;" alt="Rizki"/><br />
<sub><b>Rizki Ramadhan Lubis</b></sub><br />
<sub>NPM: 202243500763</sub><br />
<sub>Teknik Informatika</sub>
</td>
<td align="center">
<img src="https://github.com/xgatsby.png" width="100px;" alt="Vicry"/><br />
<sub><b>Vicry Putra Mahendra</b></sub><br />
<sub>NPM: 202243501638</sub><br />
<sub>Teknik Informatika</sub>
</td>
</tr>
</table>

**🎓 Universitas Indraprasta PGRI Jakarta**

---

## Struktur Folder Profesional

```
Kelompok 6/
├── assets/                 # Asset statis
│   ├── css/               # File CSS
│   │   └── style.css      # Stylesheet utama
│   ├── js/                # File JavaScript
│   └── images/            # Gambar dan media
├── config/                # Konfigurasi sistem
│   └── koneksi.php        # Konfigurasi database
├── includes/              # File include/helper
│   └── auth.php           # Autentikasi dan session
├── pages/                 # Halaman utama aplikasi
│   ├── barang.php         # Halaman data barang
│   ├── tambah.php         # Form tambah barang
│   ├── edit.php           # Form edit barang
│   └── hapus.php          # Script hapus barang
├── admin/                 # Halaman administrasi
│   ├── kasir.php          # Halaman data kasir
│   ├── tambah_kasir.php   # Form tambah kasir
│   ├── edit_kasir.php     # Form edit kasir
│   ├── hapus_kasir.php    # Script hapus kasir
│   └── update_data_kasir.php # Update data kasir
├── database/              # File database
│   └── dbphpjual.sql      # Database SQL
├── docs/                  # Dokumentasi
├── index.php              # Halaman utama (redirect)
├── login.php              # Halaman login
├── halaman_utama.php      # Dashboard utama
├── .htaccess              # Konfigurasi Apache
└── README.md              # Dokumentasi proyek
```

---

## ✨ Fitur Unggulan

### 🔐 Sistem Keamanan
- 🔑 **Login Aman** - Autentikasi dengan username dan password
- 🛡️ **Session Management** - Pengelolaan sesi pengguna yang aman
- 🚪 **Logout Otomatis** - Keluar sistem dengan konfirmasi

### 📦 Manajemen Barang
- ➕ **Tambah Barang** - Form input yang user-friendly
- ✏️ **Edit Data** - Modifikasi informasi barang dengan mudah
- 🗑️ **Hapus Data** - Penghapusan dengan konfirmasi keamanan
- 🔍 **Pencarian Cerdas** - Filter berdasarkan kode atau nama barang
- 📄 **Pagination** - Navigasi halaman yang smooth
- 📊 **Status Stok** - Indikator visual (Aman/Sedang/Menipis)
- 💰 **Format Harga** - Tampilan mata uang Rupiah yang rapi

### 👥 Manajemen Kasir
- 👤 **Profil Kasir** - Data lengkap kasir dengan foto
- 📝 **CRUD Lengkap** - Create, Read, Update, Delete
- 🔍 **Multi-Search** - Pencarian berdasarkan berbagai kriteria
- 📊 **Statistik Gender** - Analisis demografi kasir
- 📱 **Kontak Management** - Nomor telepon dan alamat

### 📊 Dashboard Interaktif
- 📈 **Real-time Statistics** - Data yang selalu update
- 🎯 **Quick Navigation** - Navigasi cepat dengan card design
- 📱 **Responsive Design** - Tampilan optimal di semua device
- 🎨 **Modern UI/UX** - Antarmuka yang menarik dan intuitif

---

## Teknologi yang Digunakan

- **Backend:** PHP 8.x
- **Database:** MySQL/MariaDB
- **Frontend:** HTML5, CSS3, JavaScript
- **Framework CSS:** Custom CSS dengan design system modern
- **Server:** Apache (XAMPP/WAMP)

---

## 🚀 Cara Menjalankan Aplikasi

### 📋 Prasyarat Sistem
- 🔧 **XAMPP/WAMP/LAMP** - Local server environment
- 🐘 **PHP 8.0+** - Server-side scripting
- 🗄️ **MySQL/MariaDB** - Database management
- 🌐 **Browser Modern** - Chrome, Firefox, Safari, Edge

### 📥 Langkah Instalasi

#### 1️⃣ Clone Repository
```bash
git clone https://github.com/xgatsby/sistem-manajemen-penjualan.git
cd sistem-manajemen-penjualan
```

#### 2️⃣ Setup Web Server
```bash
# Untuk XAMPP (Windows)
copy folder ke C:/xampp/htdocs/

# Untuk WAMP (Windows)  
copy folder ke C:/wamp64/www/

# Untuk LAMP (Linux)
copy folder ke /var/www/html/
```

#### 3️⃣ Setup Database
1. 🔗 Buka **phpMyAdmin** di browser: `http://localhost/phpmyadmin`
2. 🆕 Buat database baru dengan nama: `dbphpjual`
3. 📂 Import file: `database/dbphpjual.sql`
4. ✅ Pastikan tabel `barang` dan `kasir` berhasil dibuat

#### 4️⃣ Konfigurasi (Opsional)
Jika diperlukan, edit file `config/koneksi.php`:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'dbphpjual');
```

#### 5️⃣ Akses Aplikasi
🌐 Buka browser dan kunjungi: `http://localhost/sistem-manajemen-penjualan/`

### 🔑 Informasi Login
- **Username:** `admin`
- **Password:** `admin`

> 💡 **Tips:** Pastikan Apache dan MySQL sudah berjalan di XAMPP/WAMP sebelum mengakses aplikasi

---

## 🎥 Demo Aplikasi

### 📱 Screenshot Aplikasi

#### 🏠 Dashboard Utama
![Dashboard](https://via.placeholder.com/800x400/1ABC9C/FFFFFF?text=Dashboard+Sistem+Manajemen+Penjualan)
*Dashboard dengan statistik real-time dan navigasi yang user-friendly*

#### 📦 Halaman Data Barang
![Data Barang](https://via.placeholder.com/800x400/3498DB/FFFFFF?text=Manajemen+Data+Barang+dengan+CRUD)
*Manajemen data barang lengkap dengan fitur pencarian dan pagination*

#### 👥 Halaman Data Kasir
![Data Kasir](https://via.placeholder.com/800x400/E74C3C/FFFFFF?text=Manajemen+Data+Kasir+dengan+Filter)
*Manajemen data kasir dengan statistik gender dan pencarian multi-field*

### 🚀 Cara Menjalankan untuk Demo

#### Opsi 1: Local Development
```bash
# 1. Clone repository
git clone https://github.com/xgatsby/sistem-manajemen-penjualan.git

# 2. Pindahkan ke htdocs (XAMPP) atau www (WAMP)
# 3. Import database dari database/dbphpjual.sql
# 4. Akses: http://localhost/sistem-manajemen-penjualan/
```

#### Opsi 2: Download ZIP
1. Klik tombol **"Code"** → **"Download ZIP"** di GitHub
2. Extract ke folder `htdocs` (XAMPP) atau `www` (WAMP)
3. Import database dari `database/dbphpjual.sql` ke phpMyAdmin
4. Akses via browser: `http://localhost/sistem-manajemen-penjualan/`

### 🔑 Informasi Login
- **Username:** `admin`
- **Password:** `admin`

### ✨ Fitur Utama yang Dapat Didemonstrasikan
- 🏠 **Dashboard Interaktif** - Statistik total barang, kasir, dan stok
- 📦 **CRUD Barang** - Tambah, edit, hapus, dan pencarian data barang
- 👥 **CRUD Kasir** - Manajemen data kasir dengan filter gender
- 🔍 **Pencarian & Filter** - Sistem pencarian yang responsif
- 📄 **Pagination** - Navigasi data dengan pembatasan per halaman
- 📱 **Responsive Design** - Tampilan optimal di desktop, tablet, dan mobile
- 🎨 **Modern UI/UX** - Antarmuka yang clean dan user-friendly

> 🎓 **Untuk Pak Han Sulaiman:** Aplikasi dapat dijalankan secara lokal untuk evaluasi lengkap semua fitur

---

## Struktur Database

### Tabel `barang`
- `id` (VARCHAR) - Kode barang (Primary Key)
- `nmbrg` (VARCHAR) - Nama barang
- `harga` (INT) - Harga barang
- `stok` (INT) - Jumlah stok

### Tabel `kasir`
- `idksr` (VARCHAR) - ID kasir (Primary Key)
- `nmksr` (VARCHAR) - Nama kasir
- `jkksr` (VARCHAR) - Jenis kelamin
- `ntksr` (VARCHAR) - Nomor telepon
- `alksr` (VARCHAR) - Alamat

---

## Keamanan

- Input validation dan sanitization
- SQL injection prevention
- Session-based authentication
- XSS protection
- CSRF protection (basic)

---

## Browser Support

- Chrome 90+
- Firefox 88+
- Safari 14+
- Edge 90+

---

## 📸 Screenshot Aplikasi

### 🏠 Dashboard Utama
![Dashboard](https://via.placeholder.com/800x400/1ABC9C/FFFFFF?text=Dashboard+Sistem+Manajemen+Penjualan)

### 📦 Halaman Data Barang
![Data Barang](https://via.placeholder.com/800x400/3498DB/FFFFFF?text=Manajemen+Data+Barang)

### 👥 Halaman Data Kasir
![Data Kasir](https://via.placeholder.com/800x400/E74C3C/FFFFFF?text=Manajemen+Data+Kasir)

---

## 🤝 Kontribusi

Proyek ini dikembangkan sebagai tugas kelompok untuk mata kuliah **Pemrograman Web** di bawah bimbingan **Bapak Han Sulaiman**. 

Kami terbuka untuk saran dan masukan yang membangun untuk pengembangan lebih lanjut.

---

## 📄 Lisensi

Proyek ini dibuat untuk keperluan akademik di **Universitas Indraprasta PGRI Jakarta** dan dapat digunakan sebagai referensi pembelajaran.

---

## 📞 Kontak Tim

<div align="center">

| Nama | NPM | Role | Kontak |
|------|-----|------|--------|
| **Rizki Ramadhan Lubis** | 202243500763 | Full-Stack Developer | 📧 [Email](mailto:rizki@example.com) |
| **Vicry Putra Mahendra** | 202243501638 | Full-Stack Developer | 📧 [Email](mailto:vicry@example.com) |

</div>

---

<div align="center">

**🎓 Dibuat dengan ❤️ oleh Kelompok 6**  
**Teknik Informatika - Universitas Indraprasta PGRI Jakarta**

### 📋 Panduan Khusus untuk Dosen

**Pak Han Sulaiman** dapat mengevaluasi proyek ini dengan cara:

#### 🔗 **Melihat Source Code:**
- Repository GitHub: https://github.com/xgatsby/sistem-manajemen-penjualan
- Semua file source code tersedia untuk review

#### 💻 **Menjalankan Aplikasi Lokal:**
1. Download ZIP dari GitHub atau clone repository
2. Extract ke folder `htdocs` (XAMPP) atau `www` (WAMP)
3. Import database dari `database/dbphpjual.sql`
4. Akses: `http://localhost/sistem-manajemen-penjualan/`
5. Login: `admin` / `admin`

#### 📱 **Testing Fitur:**
- Dashboard dengan statistik real-time
- CRUD lengkap untuk barang dan kasir
- Pencarian dan filter data
- Responsive design di berbagai device
- Modern UI/UX dengan animasi

#### 📊 **Evaluasi Teknis:**
- Struktur kode yang terorganisir
- Keamanan input validation
- Database design yang normalized
- CSS modern dengan custom properties
- Git history yang profesional

[![GitHub](https://img.shields.io/badge/GitHub-xgatsby-181717?style=for-the-badge&logo=github)](https://github.com/xgatsby)
[![PHP](https://img.shields.io/badge/PHP-8.0+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://mysql.com)

</div>