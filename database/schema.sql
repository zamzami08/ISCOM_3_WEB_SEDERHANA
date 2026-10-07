-- 1. Tabel Kategori
CREATE TABLE IF NOT EXISTS kategori (
    id_kategori INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(100) NOT NULL,
    deskripsi TEXT
);

-- 2. Tabel Produk
CREATE TABLE IF NOT EXISTS produk (
    id_produk INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(100) NOT NULL,
    harga INT NOT NULL,
    id_kategori INT,
    FOREIGN KEY (id_kategori) REFERENCES kategori(id_kategori)
);

-- 3. Tabel Transaksi
CREATE TABLE IF NOT EXISTS transaksi (
    id_transaksi INT AUTO_INCREMENT PRIMARY KEY,
    tanggal_transaksi DATE NOT NULL,
    jumlah_beli INT NOT NULL,
    id_produk INT,
    FOREIGN KEY (id_produk) REFERENCES produk(id_produk)
);

-- Data Sample
INSERT INTO kategori (nama_kategori, deskripsi) VALUES
('Elektronik', 'Berbagai macam gadget dan alat elektronik'),
('Pakaian', 'Baju, celana, dan aksesoris fashion'),
('Makanan', 'Makanan ringan dan berat'),
('Minuman', 'Minuman dingin dan panas'),
('Buku', 'Buku pelajaran dan novel');

INSERT INTO produk (nama_produk, harga, id_kategori) VALUES
('Laptop Asus', 7500000, 1),
('Kaos Polos', 50000, 2),
('Keripik Kentang', 15000, 3),
('Kopi Susu', 20000, 4),
('Buku Pemrograman PHP', 85000, 5);

INSERT INTO transaksi (tanggal_transaksi, jumlah_beli, id_produk) VALUES
('2023-10-01', 1, 1),
('2023-10-02', 3, 2),
('2023-10-03', 5, 3),
('2023-10-04', 2, 4),
('2023-10-05', 1, 5);