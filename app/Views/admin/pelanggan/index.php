<?= $this->extend('admin/dashboard') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <center>
        <h1>Daftar Pelanggan</h1>
    </center>

    <!-- Tampilkan pesan flashdata jika ada -->
    <?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('message') ?>
    </div>
    <?php endif; ?>

    <!-- Tombol tambah pelanggan -->
    <div class="d-flex justify-content-end mb-3">
        <a href="admin/pelanggan/create" class="btn btn-danger">Tambah Pelanggan</a>
    </div>

    <!-- Tabel daftar pelanggan -->
    <table class="table table-striped table-hover table-bordered">
        <thead class="thead-light" style="background-color: #007bff; color: #ffffff;">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($pelanggan)): ?>
            <tr>
                <td colspan="3" class="text-center">Tidak ada data pelanggan</td>
            </tr>
            <?php else: ?>
            <?php foreach ($pelanggan as $i => $p): ?>
            <tr>
                <td><?= $i + 1 ?></td> <!-- Dinamis untuk pagination -->
                <td><?= esc($p['nama_pelanggan']) ?></td>
                <td>
                    <!-- Tombol edit -->
                    <a href="<?= site_url('admin/pelanggan/edit/' . $p['id_pelanggan']) ?>"
                        class="btn btn-warning btn-sm">Edit</a>

                    <!-- Tombol hapus dengan form POST -->
                    <form action="<?= site_url('admin/pelanggan/delete/' . $p['id_pelanggan']) ?>" method="get"
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

<style>
/* Custom Styles for Table */
table {
    border-collapse: collapse;
    /* Ensures borders don't overlap */
}

th,
td {
    padding: 12px;
    /* Adds padding to table cells */
    text-align: left;
    /* Aligns text to the left */
    border: 1px solid #007bff;
    /* Blue border for cells */
}

tr:hover {
    background-color: #e7f1ff;
    /* Light blue background on hover */
}
</style>

<?= $this->endSection() ?>