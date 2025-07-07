# 🚀 PANDUAN LENGKAP SETUP GITHUB - FINAL

## ✅ Status Saat Ini
- ✅ Git repository sudah diinisialisasi
- ✅ Semua file sudah di-commit
- ✅ Remote GitHub sudah ditambahkan
- ❌ Perlu authentication untuk push

## 🔑 SOLUSI: Setup Authentication

### **Metode 1: Personal Access Token (RECOMMENDED)**

#### Langkah 1: Buat Personal Access Token
1. Buka https://github.com/settings/tokens
2. Klik "Generate new token (classic)"
3. Isi form:
   - **Note**: `Sistem Manajemen Penjualan - Kelompok 6`
   - **Expiration**: `90 days` atau `No expiration`
   - **Scopes**: Centang `repo` (Full control of private repositories)
4. Klik "Generate token"
5. **COPY TOKEN** dan simpan (contoh: `ghp_xxxxxxxxxxxxxxxxxxxx`)

#### Langkah 2: Update Remote dengan Token
```bash
# Ganti TOKEN dengan token yang sudah di-copy
git remote set-url origin https://TOKEN@github.com/xgatsby/sistem-manajemen-penjualan.git

# Contoh:
# git remote set-url origin https://ghp_xxxxxxxxxxxxxxxxxxxx@github.com/xgatsby/sistem-manajemen-penjualan.git
```

#### Langkah 3: Push ke GitHub
```bash
git push -u origin main
```

### **Metode 2: GitHub CLI (Alternative)**

#### Install GitHub CLI
```bash
# Download dari: https://cli.github.com/
# Atau install via winget (Windows 11)
winget install GitHub.cli
```

#### Login dan Push
```bash
gh auth login
git push -u origin main
```

### **Metode 3: GitHub Desktop (Paling Mudah)**

1. Download GitHub Desktop: https://desktop.github.com/
2. Login dengan akun GitHub
3. Add existing repository dari folder ini
4. Publish repository

## 🎯 SETELAH BERHASIL PUSH

### Verifikasi
- Repository terlihat di: https://github.com/xgatsby/sistem-manajemen-penjualan
- README.md tampil dengan baik
- Semua file terupload

### Link untuk Dosen
Berikan link ini kepada **Pak Han Sulaiman**:
```
https://github.com/xgatsby/sistem-manajemen-penjualan
```

## 📱 Cara Dosen Menjalankan Aplikasi

### Opsi 1: Download ZIP
1. Klik tombol "Code" → "Download ZIP"
2. Extract ke folder `htdocs` (XAMPP) atau `www` (WAMP)
3. Import database dari `database/dbphpjual.sql`
4. Akses: `http://localhost/sistem-manajemen-penjualan/`

### Opsi 2: Clone Repository
```bash
git clone https://github.com/xgatsby/sistem-manajemen-penjualan.git
```

### Login Info
- **Username**: `admin`
- **Password**: `admin`

## 🏆 HASIL AKHIR

Repository GitHub yang profesional dengan:
- ✅ README.md yang informatif dan menarik
- ✅ Struktur folder yang rapi
- ✅ Commit history yang jelas
- ✅ Dokumentasi lengkap (CHANGELOG, CONTRIBUTING)
- ✅ Informasi tim dan dosen yang lengkap
- ✅ Panduan instalasi yang detail

## 📞 Bantuan
Jika masih ada masalah, hubungi:
- **Rizki Ramadhan Lubis** - NPM: 202243500763
- **Vicry Putra Mahendra** - NPM: 202243501638

---
**🎓 Tugas Kelompok 6 - Pemrograman Web - UNINDRA**