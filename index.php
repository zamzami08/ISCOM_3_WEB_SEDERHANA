<?php
// 1. Mengisap/menghubungkan file koneksi
require_once 'services/config.php';

// 2. Query SELECT menggunakan JOIN untuk mengambil data dari 3 tabel yang berelasi
$query = "SELECT 
            t.id_transaksi, 
            t.tanggal_transaksi, 
            t.jumlah_beli, 
            p.nama_produk, 
            p.harga, 
            k.nama_kategori
          FROM transaksi t
          JOIN produk p ON t.id_produk = p.id_produk
          JOIN kategori k ON p.id_kategori = k.id_kategori";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Transaksi Penjualan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Navbar dengan Warna Brand -->
    <nav class="navbar">
        <h2>Toko Serba Ada</h2>
    </nav>

    <!-- Kontainer Utama -->
    <main class="container">
        <h1>Daftar Transaksi Terbaru</h1>
        <p>Data diambil secara dinamis dari database MySQL (Tabel Kategori, Produk, & Transaksi).</p>

        <!-- Container Flexbox untuk Card Grid -->
        <div class="card-grid">
            <?php 
            // 3. Menggunakan while dan mysqli_fetch_assoc() untuk membaca hasil query secara dinamis
            while ($row = mysqli_fetch_assoc($result)) : 
                $total_bayar = $row['jumlah_beli'] * $row['harga'];
            ?>
                <div class="card">
                    <span class="badge"><?= htmlspecialchars($row['nama_kategori']); ?></span>
                    <h3><?= htmlspecialchars($row['nama_produk']); ?></h3>
                    <p class="date">Tanggal: <?= htmlspecialchars($row['tanggal_transaksi']); ?></p>
                    <hr>
                    <div class="details">
                        <p><strong>Harga Satuan:</strong> Rp <?= number_format($row['harga'], 0, ',', '.'); ?></p>
                        <p><strong>Jumlah Beli:</strong> <?= htmlspecialchars($row['jumlah_beli']); ?></p>
                        <p class="total"><strong>Total Bayar:</strong> Rp <?= number_format($total_bayar, 0, ',', '.'); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </main>

</body>
</html>