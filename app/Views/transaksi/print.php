<html>
    <head>
        <style>
            table {
                border-collapse: border;
                width: 100%;
            }
            td, th {
                border: 1px solid black;
            }
        </style>
    </head>
    <body style="text-align: center">
        <h2>Invoice Print</h2>
        <p></p>
        <p><i>Wahyu Ammirulloh CodeIgniter4 Shop</i></p>
        <p><i>Your daily code and programming need is available here!</i></p>
        <p><i>Jl. Raya Kh. Umar Rawailat No. 17, Cileungsi, Bogor</i></p>
        <hr style="text-align: left">
        <p>Pembeli : <?= $user->username ?></p>
        <p>Alamat : <?= $transaksi->alamat ?></p>
        <p>ID Transaksi : <?= $transaksi->id ?></p>
        <p>Tanggal : <?= $transaksi->created_date ?></p>
        <p></p>
        <table>
            <thead>
                <tr>
                    <th><strong>Nama Barang</strong></th>
                    <th><strong>Harga Satuan</strong></th>
                    <th><strong>Jumlah</strong></th>
                    <th><strong>Ongkir</strong></th>
                    <th><strong>Total Harga</strong></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $barang->nama ?></td>
                    <td><?= $barang->harga ?></td>
                    <td><?= $transaksi->jumlah ?></td>
                    <td><?= $transaksi->ongkir ?></td>
                    <td><?= $transaksi->total_harga ?></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>