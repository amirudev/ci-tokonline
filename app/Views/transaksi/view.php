<?= $this->include('layout/header'); ?>
<div class="container my-5">
    <h3>No Transaksi : <?= $transaksi->id ?></h3>
    <table class="table">
        <tr>
            <th class="w-25">Nama Barang</th>
            <td><?= $transaksi->nama ?></td>
        </tr>
        <tr>
            <th class="w-25">Pembeli</th>
            <td><?= $transaksi->pembeli ?></td>
        </tr>
        <tr>
            <th class="w-25">Alamat</th>
            <td><?= $transaksi->alamat ?></td>
        </tr>
        <tr>
            <th class="w-25">Jumlah</th>
            <td><?= $transaksi->jumlah ?></td>
        </tr>
        <tr>
            <th class="w-25">Total Harga</th>
            <td><?= $transaksi->total_harga ?></td>
        </tr>
    </table>
</div>
<?= $this->include('layout/footer'); ?>