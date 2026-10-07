# Web Sederhana Penjualan

Aplikasi web sederhana menggunakan PHP Native dan MySQL yang terhubung dengan database untuk menampilkan data transaksi penjualan secara dinamis.

## Cara Menjalankan Project
1. Pastikan aplikasi **XAMPP** telah terinstall dan jalankan service **Apache** serta **MySQL**.
2. Simpan folder project ini di direktori `C:\xampp\htdocs\web-sederhana`.
3. Jalankan script `database/schema.sql` di phpMyAdmin (Database name: `tugas_iscom_3`).
4. Buka browser dan akses URL: `http://localhost/web-sederhana/`

## Informasi Database & Penjelasan Relasi

### 1. Entitas dan Atribut
- **`kategori`**: `id_kategori` (Primary Key), `nama_kategori`, `deskripsi`
- **`produk`**: `id_produk` (Primary Key), `nama_produk`, `harga`, `id_kategori` (Foreign Key)
- **`transaksi`**: `id_transaksi` (Primary Key), `tanggal_transaksi`, `jumlah_beli`, `id_produk` (Foreign Key)

### 2. Relasi dan Kardinalitas
- **Kategori ke Produk**: Relasi *One-to-Many* (1:N). Satu kategori dapat memiliki banyak produk, namun satu produk hanya memiliki satu kategori.
- **Produk ke Transaksi**: Relasi *One-to-Many* (1:N). Satu produk dapat ditransaksikan berulang kali dalam beberapa entri transaksi.