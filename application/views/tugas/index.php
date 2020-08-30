<!-- Content Wrapper. Contains page content -->
<!-- Main content -->
<section class="content">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
    <!-- Default box -->
    <div class="card mb-4 ml-2 mr- shadow p-3 mb-5 bg-white rounded">

        <div class="card-header ">
            <img src="<?= base_url() ?>assets/icon/task.png" class="float-left mr-2 " width="50px">
            <h3 class="card-title mt-3"><b>Daftar Uraian Tugas Pegawai</b></h3>
            <div class="float-right">
                <div class="shadow bg-green rounded">
                    <div class="btn btn-success shadow" data-toggle="modal" data-target="#tambah"> Tambah</div>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table id="tabelKU" class="table  table-striped">
                <thead class="table-dark text-center">
                    <tr>
                        <!-- <th>No</th> -->
                        <th>ID Tugas</th>
                        <th>Jenis Tugas</th>
                        <th>Uraian Tugas</th>
                        <th>Id Jabatan</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>


                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->

<!-- /.content-wrapper -->
<!-- Ajax Ambil Data -->
<script>
    $(document).ready(function() {
        $('#tabelKU').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= base_url('tugas/get_ajax') ?>",
                "type": "POST"
            }
        })
    })
</script>


<!-- Modal Tambah-->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Uraian Tugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() . 'tugas/tambah_data_tugas' ?>" method="POST">
                    <div class="form-group">
                        <label>Jabatan</label>
                        <select name="id_jabatan" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <?php foreach ($jabatan as $jabat) {
                            ?>
                                <option value="<?= $jabat['id_jabatan']; ?>"><?= $jabat['nama_jabatan']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jenis Tugas</label>
                        <select name="id_jenis_tugas" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <?php foreach ($jenis_tugas as $jenis) {
                            ?>
                                <option value="<?= $jenis['id']; ?>"><?= $jenis['jenis_jobs'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Uraian Tugas</label>
                        <textarea name="uraian" class="form-control" rows="4" placeholder="Isi disini ..." required></textarea>
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
<?php foreach ($isi as $row) { ?>

    <div class="modal fade" id="modalEdit<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info ">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Uraian Tugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() . 'tugas/ubah_data_tugas' ?>" method="POST">
                        <div class="form-group">
                            <input type="hidden" name="idubah" value="<?= $row['id'] ?>">
                            <label>Jabatan</label>
                            <select name="id_jabatan" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <?php foreach ($jabatan as $jabat) {
                                    if ($jabat['id_jabatan'] == $row['id_jabatan']) {
                                ?>
                                        <option value="<?= $jabat['id_jabatan']; ?>" selected><?= $jabat['nama_jabatan']; ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $jabat['id_jabatan']; ?>"><?= $jabat['nama_jabatan']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jenis Tugas</label>
                            <select name="id_jenis_tugas" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <?php foreach ($jenis_tugas as $jenis) {
                                    if ($jenis['id'] == $row['id_jns_jobs']) {
                                ?>
                                        <option value="<?= $jenis['id']; ?>" selected><?= $jenis['jenis_jobs'] ?></option> -->
                                    <?php } else { ?>
                                        <option value="<?= $jenis['id']; ?>"><?= $jenis['jenis_jobs'] ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Uraian Tugas</label>
                            <textarea name="uraian" class="form-control" rows="4" placeholder="Isi disini ... " required><?= $row['jobs']; ?></textarea>
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
                <form method="POST" action="tugas/hapus_data_tugas">
                    <img src="<?= base_url() ?>assets/icon/delete.png" class="float-right mr-2 mt-1" width="80px">
                    <input type="hidden" name="idhapus" value="<?= $row['id'] ?>">
                    <div class="modal-body">
                        <h4> Yakin akan menghapus data? </h4>
                        <p>ID Tugas <?= $row['id'] ?>, dengan uraian "<?= $row['jobs'] ?>"</p>
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
<!-- <script>
    $(document).ready(function() {
        $('#tabelKU').DataTable();
    });
</script> -->