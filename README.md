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

[![GitHub](https://img.shields.io/badge/GitHub-xgatsby-181717?style=for-the-badge&logo=github)](https://github.com/xgatsby)
[![PHP](https://img.shields.io/badge/PHP-8.0+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://mysql.com)

</div>