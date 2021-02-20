<?= $this->include('layout/header') ?>
<div class="container my-5">
    <?php 
    $session = session();
    $message = $session->getFlashdata('message');
    if($message){ ?>
        <div class="alert alert-<?= $message['status'] ?>" role="alert">
            <?= $message['message'] ?>
        </div>
    <?php }
    ?>
    <h3>Transaksi</h3>
    <table class="table w-100 text-center">
        <thead>
            <th>No</th>
            <th>Barang</th>
            <th>Pembeli</th>
            <th>Alamat</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php foreach($transaksis as $index=>$transaksi): ?>
                <tr>
                    <td><?= $transaksi->id ?></td>
                    <td><?= $transaksi->id_barang ?></td>
                    <td><?= $transaksi->id_pembeli ?></td>
                    <td><?= $transaksi->alamat ?></td>
                    <td><?= $transaksi->jumlah ?></td>
                    <td><?= $transaksi->total_harga ?></td>
                    <td>
                        <a href="/transaksi/view/<?= $transaksi->id ?>" class="btn btn-success">View</a>
                        <a href="/transaksi/print/<?= $transaksi->id ?>" class="btn btn-primary">Print Invoice</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->include('layout/footer') ?>