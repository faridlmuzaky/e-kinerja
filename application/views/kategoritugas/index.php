<!-- Content Wrapper. Contains page content -->



<!-- Main content -->
<section class="content">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
    <!-- Default box -->
    <div class="card mb-4 ml-2 mr-3 shadow p-3 mb-5 bg-white rounded">
        <div class="card-header ">
            <img src="<?= base_url() ?>assets/icon/category.png" class="float-left mr-2 " width="50px">
            <h3 class="card-title mt-3"><b>Daftar Kategori Tugas Pegawai</b></h3>
            <div class="float-right">
                <div class="shadow bg-green rounded">
                    <div class="btn btn-success shadow" data-toggle="modal" data-target="#tambah"> Tambah</div>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table id="tabelKU" class="table  table-hover">
                <thead class="table-dark text-center">
                    <tr>
                        <!-- <th>No</th> -->
                        <th>ID </th>
                        <th>Kategori Tugas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <?= var_dump($isi) ?> -->
                    <?php
                    $n = 1;
                    foreach ($jenis_tugas as $row) {
                    ?>
                        <tr>
                            <!-- <td><?= $n++; ?></td> -->
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['jenis_jobs']; ?></td>
                            <td width="120px" class="text-center">
                                <a href="#" class="badge badge-warning" data-toggle="modal" data-target="#modalEdit<?= $row['id'];  ?>">Ubah</a>
                                <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#modalHapus<?= $row['id'];  ?>">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-muted bg-success">
            <!-- <marquee direction="left"> Daftar Kategori Tugas Pegawai</marquee> -->
        </div>
        <!-- /.cardfoo-ter-->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->

<!-- /.content-wrapper -->
<!-- Ajax Ambil Data -->



<!-- Modal tambah -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kategori Tugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() . 'kategoritugas/tambah_data_tugas' ?>" method="POST">
                    <div class="form-group">
                        <label>Kategori Tugas</label>
                        <input type="text" name="jenis_tugas" class="form-control" required>
                    </div>
                    <div class="float-right">
                        <button type="reset" class="btn btn-secondary"><i class="fas fa-sync-alt"></i> Reset</button>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- modal edit -->
<?php foreach ($jenis_tugas as $row) { ?>

    <div class="modal fade" id="modalEdit<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info ">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Kategori Tugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() . 'kategoritugas/ubah_data_tugas' ?>" method="POST">
                        <div class="form-group">
                            <input type="hidden" name="idubah" value="<?= $row['id'] ?>">
                            <label>Kategori Tugas</label>
                            <input type="text" name="ubah_jenis_tugas" class="form-control" value="<?= $row['jenis_jobs'] ?>" required>
                        </div>
                        <div class="float-right">
                            <button type="reset" class="btn btn-secondary"><i class="fas fa-sync-alt"></i> Reset</button>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- akhir modal edit -->

    <!-- Modal Hapus -->
    <div class="modal fade" id="modalHapus<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="kategoritugas/hapus_data_tugas">
                    <img src="<?= base_url() ?>assets/icon/delete.png" class="float-right mr-2 mt-1" width="80px">
                    <input type="hidden" name="idhapus" value="<?= $row['id'] ?>">
                    <div class="modal-body">
                        <h4> Yakin akan menghapus data? </h4>
                        <p>ID Tugas <?= $row['id'] ?>, dengan uraian "<?= $row['jenis_jobs'] ?>"</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Akhir Modal Hapus -->
<?php } ?>
<script>
    $(document).ready(function() {
        $('#tabelKU').DataTable();
    });

    // grup data table berdasarkan jabatan oder by ketua
    //  $(document).ready(function() {
    //      $('#tabelKU').DataTable({
    //          order: [
    //              [3, 'asc']
    //          ],
    //          rowGroup: {
    //              dataSrc: 4
    //          }
    //      });
    //  });

    //  $(document).ready(function() {
    //      $('#tabelKU').DataTable({
    //          "processing": true,
    //          "serverSide": true,
    //          "ajax": "<?= base_url() ?>Tugas/data_tugas"
    //      });
    //  });
</script>