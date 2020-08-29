<!-- Content Wrapper. Contains page content -->
<div class="card mb-3 ml-3 shadow p-3 mb-5 bg-white rounded " style="max-width: 540px;">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="<?= base_url('assets/img/') . $this->session->userdata('foto') ?>" class="card-img" alt="...">
        </div>
        <div class="col-md-8">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
            <!-- <?= $this->session->flashdata('pesan') ?> -->
            <div class="card-body">
                <h5 class="card-title">Selamat Datang <?= $this->session->userdata('nama') ?></h5>
                <p class="card-text">NIP : <?= $this->session->userdata('nip') ?></p>

                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>

            </div>
        </div>
    </div>
</div>