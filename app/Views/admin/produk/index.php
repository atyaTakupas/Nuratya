<?= $this->extend('admin/dashboard') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1>Daftar Barang</h1>

    <!-- Tampilkan pesan flashdata jika ada -->
    <?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('message') ?>
    </div>
    <?php endif; ?>

    <!-- Tombol tambah produk -->
    <div class="d-flex justify-content-end mb-3">
        <a href="<?= site_url('admin/produk/create') ?>" class="btn btn-danger">Tambah Barang</a>
    </div>

    <!-- Tabel daftar produk -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($produk)): ?>
            <tr>
                <td colspan="6" class="text-center">Tidak ada data barang</td>
            </tr>
            <?php else: ?>
            <?php foreach ($produk as $i => $p): ?>
            <tr>
                <td><?= esc($i + 1) ?></td>
                <td><?= esc($p['nama_produk']) ?></td>
                <td><?= esc($p['kategori_produk']) ?></td>
                <!-- Anda mungkin perlu menyesuaikan ini jika kategori tidak tersedia dalam data -->
                <td>Rp.<?= esc(number_format($p['harga'], 2)) ?></td>
                <td><?= esc($p['stok']) ?></td>
                <td>
                    <!-- Tombol edit -->
                    <a href="<?= site_url('admin/produk/edit/' . $p['id_produk']) ?>" class="btn btn-warning btn-sm">Edit</a>

                    <!-- Tombol hapus dengan form POST -->
                    <form action="<?= site_url('admin/produk/delete/' . $p['id_produk']) ?>" method="post"
                        style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>