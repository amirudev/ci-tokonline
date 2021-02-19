<?= $this->include('layout/header'); ?>
<div class="container">
    <div class="row">
        <div class="col-6 text-center py-4">
            <h3 class="my-3"><?= $barang->nama ?></h3>
            <img src="<?= base_url("uploads/$barang->gambar") ?>" alt="" style="max-height: 400px">
        </div>
        <div class="col-6">
            <h3>Pengiriman</h3>
            <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <select id="provinsi" class="form-control">
                    <option>Select Provinsi</option>
                    <?php foreach($provinsis as $provinsi): ?>
                        <option value="<?= $provinsi->province_id ?>"><?= $provinsi->province ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="kabupaten">Kabupaten / Kota</label>
                <select id="kabupaten" class="form-control">
                    <option>Select Kabupaten / Kota</option>
                </select>
            </div>
            <div class="form-group">
                <label for="service">Pilih Service</label>
                <select id="service" class="form-control">
                    <option>Select Service</option>
                </select>
            </div>
            <strong>Estimasi : <span id="estimasi">0</span> Hari</strong>
            <hr>
            <?php
                $id_pembeli = [
                    'name' => 'id_pembeli',
                    'id' => 'id_pembeli',
                    'value' => session()->get('id'),
                    'type' => 'hidden'
                ];
                $id_barang = [
                    'name' => 'id_barang',
                    'id' => 'id_barang',
                    'value' => $barang->id,
                    'type' => 'hidden'
                ];
                $harga_barang = [
                    'name' => 'harga_barang',
                    'id' => 'harga_barang',
                    'value' => $barang->harga,
                    'type' => 'hidden'
                ];
                $jumlah = [
                    'name' => 'jumlah',
                    'id' => 'jumlah',
                    'value' => 1,
                    'min' => 1,
                    'max' => $barang->stok,
                    'type' => 'number',
                    'class' => 'form-control'
                ];
                $total_harga = [
                    'name' => 'total_harga',
                    'id' => 'total_harga',
                    'readonly' => TRUE,
                    'type' => 'number',
                    'class' => 'form-control'
                ];
                $alamat = [
                    'name' => 'alamat',
                    'id' => 'alamat',
                    'type' => 'text',
                    'class' => 'form-control'
                ];
                $ongkir = [
                    'name' => 'ongkir',
                    'id' => 'ongkir',
                    'type' => 'number',
                    'readonly' => TRUE,
                    'class' => 'form-control'
                ];
                $submit = [
                    'name' => 'submit',
                    'id' => 'submit',
                    'type' => 'submit',
                    'value' => 'Beli',
                    'class' => 'btn btn-success'
                ];
            ?>
            <?= form_open(); ?>
            <div class="form-group">
                <?= form_input($id_pembeli) ?>
                <?= form_input($id_barang) ?>
                <?= form_input($harga_barang) ?>
            </div>
            <div class="form-group">
                <?= form_label('Jumlah', 'jumlah') ?>
                <?= form_input($jumlah) ?>
            </div>
            <div class="form-group">
                <?= form_label('Ongkos Kirim', 'ongkir') ?>
                <?= form_input($ongkir) ?>
            </div>
            <div class="form-group">
                <?= form_label('Total Harga', 'total_harga') ?>
                <?= form_input($total_harga) ?>
            </div>
            <div class="form-group">
                <?= form_label('Alamat Lengkap', 'alamat') ?>
                <?= form_input($alamat) ?>
            </div>
            <?= form_input($submit) ?>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<script src="<?= base_url('js/jquery-3.5.1.min.js') ?>"></script>
<script>
    $('document').ready(function(){
        $('#provinsi').on('change', function(){
            console.log('Retrieving kabupaten data ...');
            $('#kabupaten').empty();
            var id_province = $(this).val();
            $.ajax({
                url: '<?= site_url('etalase/getCity') ?>',
                type: 'GET',
                data: {
                    'id_province': id_province
                },
                dataType: 'json',
                success: function(data){
                    var results = data['rajaongkir']['results'];
                    results.forEach((result) => {
                        console.log('Kabupaten data complete.')
                        $('#kabupaten').append(`<option value="${result.city_id}">${result.city_name}</option>`);
                    });
                },
                failed: function(){
                    console.log('Failed to fetch data');
                }
            });
        });

        $('#kabupaten').on('change', function(){
            var id_city = $(this)[0].value;
            console.log('Retrieving service data ...');
            $.ajax({
                url: '<?= site_url('etalase/getCost') ?>',
                type: 'GET',
                data: {
                    'origin_city': 152,
                    'id_city': id_city,
                    'weight': 500,
                    'courier': 'jne'
                },
                dataType: 'json',
                success: function(data){
                    var results = data['rajaongkir']['results'][0]['costs'];
                    results.forEach((result) => {
                        console.log('Service data completed. Retrieving estimasi data ...')
                        $('#service').append(`<option value="${result.service}" cost="${result.cost[0].value}" etd="${result.cost[0].etd}">${result.description}</option>`);
                    });
                    $('#service').on('change', function(){
                        var selected = $(this)[0].selectedIndex;
                        var value = $(this)[0][selected].attributes.cost.value;
                        var etd = $(this)[0][selected].attributes.etd.value;
                        $('#estimasi')[0].textContent = etd;
                        $('#ongkir')[0].value = value;
                        var jumlah = $('#jumlah')[0].value;
                        const harga_barang = $('#harga_barang')[0].value;
                        console.log(harga_barang);
                        var totalharga = parseInt(jumlah) * parseInt(harga_barang) + parseInt(value);
                        $('#jumlah').on('change', function(){
                            jumlah = $('#jumlah')[0].value;
                            totalharga = parseInt(jumlah) * parseInt(harga_barang) + parseInt(value);
                            $('#total_harga')[0].value = totalharga;
                        });
                        $('#total_harga')[0].value = totalharga;
                    });
                }
            });
        });
    });
</script>
<?= $this->include('layout/footer'); ?>