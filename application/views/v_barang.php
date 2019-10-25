<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Data Barang</title>
    <link href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/jquery.dataTables.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/style.css' ?>" rel="stylesheet">
</head>

<body>
    <p class="h1 bg-primary text-center menu">KELOLA DATA BARANG</p>
    <div class="container">
        <h1>Data <small>Barang</small>
            <div class="pull-right"><a class="btn btn-sm btn-success tambah" data-toggle="modal" data-target="#modal_add_new"> Tambah</a></div>
        </h1>

        <table class="table table-bordered table-striped" id="mydata">
            <thead>
                <tr>
                    <th>Kode Barang</td>
                    <th>Nama Barang</td>
                    <th>Harga</td>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data->result_array() as $i) :
                    $barang_id = $i['kode'];
                    $barang_nama = $i['nama'];
                    $barang_harga = $i['harga'];
                    ?>
                    <tr>
                        <td><?php echo $barang_id; ?></td>
                        <td><?php echo $barang_nama; ?></td>

                        <td><?php echo 'Rp ' . number_format($barang_harga); ?></td>
                        <td><a class="btn btn-xs btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $barang_id; ?>"> Edit</a>
                            <a class="btn btn-xs btn-danger" data-toggle="modal" href="barang/delete/<?php echo $barang_id; ?>"> Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>


    <!-- ============ MODAL ADD BARANG =============== -->
    <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 class="modal-title" id="myModalLabel">Input Data Barang</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/barang/simpan_barang' ?>">
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3">Kode Barang</label>
                            <div class="col-xs-8">
                                <input name="kode_barang" class="form-control" type="text" placeholder="Kode Barang..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Nama Barang</label>
                            <div class="col-xs-8">
                                <input name="nama_barang" class="form-control" type="text" placeholder="Nama Barang..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Deskripsi Barang</label>
                            <div class="col-xs-8">
                                <textarea name="deskripsi" id="deskripsi" cols="43" rows="5" placeholder="Deskripsi Barang..."></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Stok</label>
                            <div class="col-xs-8">
                                <input name="stok" class="form-control" type="text" placeholder="Stok..." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Harga</label>
                            <div class="col-xs-8">
                                <input name="harga" class="form-control" type="text" placeholder="Harga..." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Berat</label>
                            <div class="col-xs-4">
                                <input name="berat" class="form-control" type="text" placeholder="Berat pergram" required>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-info">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END MODAL ADD BARANG-->

    <!-- ============ MODAL EDIT BARANG =============== -->
    <?php
    foreach ($data->result_array() as $i) :
        $barang_id = $i['kode'];
        $barang_nama = $i['nama'];
        $deskripsi = $i['deskripsi'];
        $stok = $i['stok'];
        $barang_harga = $i['harga'];
        $berat = $i['berat'];
        ?>
        <div class="modal fade" id="modal_edit<?php echo $barang_id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h3 class="modal-title" id="myModalLabel">Edit Barang</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/barang/edit_barang' ?>">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-xs-3">Kode Barang</label>
                                <div class="col-xs-8">
                                    <input name="kode_barang" value="<?php echo $barang_id; ?>" class="form-control" type="text" placeholder="Kode Barang..." readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Nama Barang</label>
                                <div class="col-xs-8">
                                    <input name="nama_barang" value="<?php echo $barang_nama; ?>" class="form-control" type="text" placeholder="Nama Barang..." required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3">Deskripsi Barang</label>
                                <div class="col-xs-8">
                                    <input name="deskripsi" value="<?php echo $deskripsi; ?>" class="form-control" type="text" placeholder="Deskripsi Barang..." required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3">Stok</label>
                                <div class="col-xs-8">
                                    <input name="stok" value="<?php echo $stok; ?>" class="form-control" type="text" placeholder="Stok Barang..." required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3">Harga</label>
                                <div class="col-xs-8">
                                    <input name="harga" value="<?php echo $barang_harga; ?>" class="form-control" type="text" placeholder="Harga..." required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3">Berat</label>
                                <div class="col-xs-8">
                                    <input name="berat" value="<?php echo $berat; ?>" class="form-control" type="text" placeholder="Berat Barang..." required>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
    <!--END MODAL ADD BARANG-->

    <script src="<?php echo base_url() . 'assets/js/jquery-2.2.4.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
</body>

</html>