# 🤝 Panduan Kontribusi

Terima kasih atas minat Anda untuk berkontribusi pada **Sistem Manajemen Penjualan Kelompok 6**!

## 📋 Cara Berkontribusi

### 1. Fork Repository
```bash
# Fork repository ini ke akun GitHub Anda
# Kemudian clone fork tersebut
git clone https://github.com/YOUR_USERNAME/sistem-manajemen-penjualan.git
cd sistem-manajemen-penjualan
```

### 2. Buat Branch Baru
```bash
# Buat branch untuk fitur atau perbaikan Anda
git checkout -b fitur/nama-fitur-anda
# atau
git checkout -b perbaikan/nama-perbaikan-anda
```

### 3. Lakukan Perubahan
- Pastikan kode mengikuti standar yang ada
- Tambahkan komentar yang jelas
- Test perubahan Anda secara menyeluruh

### 4. Commit Perubahan
```bash
git add .
git commit -m "✨ Menambahkan fitur baru: [deskripsi singkat]"
# atau
git commit -m "🐛 Memperbaiki bug: [deskripsi singkat]"
```

### 5. Push dan Buat Pull Request
```bash
git push origin fitur/nama-fitur-anda
```

## 📝 Standar Commit Message

Gunakan emoji dan format yang konsisten:

- ✨ `:sparkles:` - Fitur baru
- 🐛 `:bug:` - Perbaikan bug
- 📝 `:memo:` - Update dokumentasi
- 🎨 `:art:` - Perbaikan struktur/format kode
- ⚡ `:zap:` - Peningkatan performa
- 🔒 `:lock:` - Perbaikan keamanan
- 🔧 `:wrench:` - Perubahan konfigurasi

## 🛠️ Setup Development

### Prasyarat
- PHP 8.0+
- MySQL/MariaDB
- XAMPP/WAMP/LAMP
- Git

### Instalasi
1. Clone repository
2. Setup database dengan file `database/dbphpjual.sql`
3. Konfigurasi `config/koneksi.php` jika diperlukan
4. Jalankan di local server

## 🧪 Testing

Sebelum submit pull request, pastikan:
- [ ] Aplikasi berjalan tanpa error
- [ ] Semua fitur CRUD berfungsi normal
- [ ] Responsive design tetap berfungsi
- [ ] Tidak ada SQL injection vulnerability
- [ ] Input validation bekerja dengan baik

## 📋 Code Style

### PHP
- Gunakan PSR-12 coding standard
- Indentasi 4 spasi
- Nama variabel menggunakan camelCase
- Nama function menggunakan snake_case

### CSS
- Gunakan CSS custom properties (variables)
- Mobile-first responsive design
- Konsisten dengan design system yang ada

### HTML
- Semantic HTML5
- Accessibility friendly
- Clean dan readable structure

## 🎯 Area yang Membutuhkan Kontribusi

### High Priority
- [ ] Unit testing implementation
- [ ] Enhanced security features
- [ ] API endpoints development
- [ ] Advanced search functionality

### Medium Priority
- [ ] Export data features (PDF/Excel)
- [ ] Email notifications
- [ ] Advanced reporting
- [ ] Multi-language support

### Low Priority
- [ ] Dark mode theme
- [ ] Progressive Web App features
- [ ] Advanced animations
- [ ] Social media integration

## 📞 Kontak

Jika ada pertanyaan, silakan hubungi tim pengembang:

- **Rizki Ramadhan Lubis** - NPM: 202243500763
- **Vicry Putra Mahendra** - NPM: 202243501638

## 📄 Lisensi

Dengan berkontribusi, Anda setuju bahwa kontribusi Anda akan dilisensikan di bawah lisensi yang sama dengan proyek ini.

---

**🎓 Proyek Akademik - Universitas Indraprasta PGRI Jakarta**