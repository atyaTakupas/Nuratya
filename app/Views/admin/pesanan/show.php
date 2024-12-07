<h2>Detail Pesanan</h2>

<p><strong>ID Pesanan: </strong><?= $pesanan['id']; ?></p>
<p><strong>Nama Pelanggan: </strong><?= $pesanan['nama_pelanggan']; ?></p>
<p><strong>Tanggal Pesanan: </strong><?= $pesanan['tanggal_pesanan']; ?></p>
<p><strong>Total Harga: </strong><?= $pesanan['total_harga']; ?></p>
<p><strong>Status: </strong><?= $pesanan['status']; ?></p>

<h3>Item Pesanan</h3>
<table class="table">
    <thead>
        <tr>
            <th>Nama Produk</th>
            <th>Kuantitas</th>
            <th>Harga</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($detail_pesanan as $item) : ?>
            <tr>
                <td><?= $item['nama_produk']; ?></td>
                <td><?= $item['kuantitas']; ?></td>
                <td><?= $item['harga']; ?></td>
                <td><?= $item['total']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="/pesanan" class="btn btn-secondary">Kembali</a>