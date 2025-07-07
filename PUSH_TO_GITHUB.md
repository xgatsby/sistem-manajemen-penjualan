# 🚀 Panduan Push ke GitHub

## Setelah membuat repository di GitHub, jalankan perintah berikut:

```bash
# 1. Push ke GitHub
git push -u origin main

# 2. Jika ada error, coba dengan force push (hati-hati!)
git push -u origin main --force

# 3. Verifikasi push berhasil
git remote -v
git status
```

## 🔗 Link Repository
Setelah berhasil push, repository akan tersedia di:
**https://github.com/xgatsby/sistem-manajemen-penjualan**

## 📋 Checklist Setelah Push
- [ ] Repository terlihat di GitHub
- [ ] README.md tampil dengan baik
- [ ] Semua file dan folder terupload
- [ ] Commit history terlihat
- [ ] Repository bersifat Public

## 🎓 Untuk Dosen
Berikan link ini kepada dosen:
**https://github.com/xgatsby/sistem-manajemen-penjualan**

## 📱 Cara Menjalankan Aplikasi
1. Clone atau download repository
2. Extract ke folder htdocs (XAMPP) atau www (WAMP)
3. Import database dari file `database/dbphpjual.sql`
4. Akses via browser: `http://localhost/sistem-manajemen-penjualan/`
5. Login dengan username: `admin`, password: `admin`