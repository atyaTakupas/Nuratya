<?= $this->extend('admin/dashboard') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
<center>
    <h1 class="mb-4" style="color: #000000; font-size: 1.75rem;">Halaman Dashboard</h1>
</center>
<div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3"> 
        
        <div class="col">
            <div class="card mb-3 shadow-sm h-100" style="background-color: #ffffff; color: #000000; border: 1px solid #007bff;">
                <div class="card-header d-flex justify-content-between align-items-center p-2" style="background-color: #ff0000; color: #ffffff;">
                    <span style="font-size: 0.875rem;">Jumlah List Barang</span> <!-- Ukuran teks lebih kecil -->
                    <i class="fas fa-book fa-lg"></i> <!-- Ukuran ikon lebih kecil -->
                </div>
                <div class="card-body p-2">
                    <h6 class="card-title m-0"><?= $jumlah_produk ?></h6> <!-- Ukuran teks judul lebih kecil -->
                    <p class="card-text m-0" style="font-size: 0.75rem;">Total produk yang tersedia.</p> <!-- Ukuran teks paragraf lebih kecil -->
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card mb-3 shadow-sm h-100" style="background-color: #ffffff; color: #000000; border: 1px solid #007bff;">
                <div class="card-header d-flex justify-content-between align-items-center p-2" style="background-color: #ff0000; color: #ffffff;">
                    <span style="font-size: 0.875rem;">Jumlah Pelanggan</span>
                    <i class="fas fa-users fa-lg"></i>
                </div>
                <div class="card-body p-2">
                    <h6 class="card-title m-0"><?= $jumlah_pelanggan ?></h6>
                    <p class="card-text m-0" style="font-size: 0.75rem;">Total pelanggan terdaftar.</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card mb-3 shadow-sm h-100" style="background-color: #ffffff; color: #000000; border: 1px solid #007bff;">
                <div class="card-header d-flex justify-content-between align-items-center p-2" style="background-color: #ff0000; color: #ffffff;">
                    <span style="font-size: 0.875rem;">Jumlah Kategori</span>
                    <i class="fas fa-th-large fa-lg"></i>
                </div>
                <div class="card-body p-2">
                    <h6 class="card-title m-0"><?= $jumlah_kategori ?></h6>
                    <p class="card-text m-0" style="font-size: 0.75rem;">Total kategori barang yang tersedia.</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card mb-3 shadow-sm h-100" style="background-color: #ffffff; color: #000000; border: 1px solid #007bff;">
                <div class="card-header d-flex justify-content-between align-items-center p-2" style="background-color: #ff0000; color: #ffffff;">
                    <span style="font-size: 0.875rem;">Jumlah Pesanan</span>
                    <i class="fas fa-shopping-cart fa-lg"></i>
                </div>
                <div class="card-body p-2">
                    <h6 class="card-title m-0"><?= $jumlah_pesanan ?></h6>
                    <p class="card-text m-0" style="font-size: 0.75rem;">Total pesanan yang dibuat.</p>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- FontAwesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<style>
    /* Interactive Card Hover Effect */
    .card:hover {
        transform: scale(1.05); /* Scale up on hover */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Enhanced shadow effect */
    }
</style>

<?= $this->endSection() ?>
