<?= $this->include('layout/header') ?>
<table class="table container">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Harga</th>
      <th scope="col">Stok</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $indexid = 1; foreach($barangs as $index=>$barang): ?>
    <tr>
        <th><?= $indexid; $indexid++ ?></th>
        <td><?= $barang->nama ?></td>
        <td><?= $barang->harga ?></td>
        <td><?= $barang->stok ?></td>
        <td>
            <a href="<?= base_url("barang/view/$barang->id") ?>"><button class="btn btn-primary">Lihat</button></a>
            <a href="<?= base_url("barang/update/$barang->id") ?>"><button class="btn btn-warning">Edit</button></a>
            <a href="<?= base_url("barang/delete/$barang->id") ?>"><button class="btn btn-danger">Delete</button></a>
        </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?= $this->include('layout/footer') ?>