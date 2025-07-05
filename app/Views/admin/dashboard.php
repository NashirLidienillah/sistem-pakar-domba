<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-primary shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3><?= $jumlah_gejala ?></h3>
                            <p class="mb-0">Total Gejala</p>
                        </div>
                        <i class="fas fa-th-list fa-3x"></i>
                    </div>
                </div>
                <a href="<?= site_url('admin/gejala') ?>" class="card-footer text-white text-decoration-none">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card text-white bg-success shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3><?= $jumlah_penyakit ?></h3>
                            <p class="mb-0">Total Penyakit</p>
                        </div>
                        <i class="fas fa-bug fa-3x"></i>
                    </div>
                </div>
                <a href="<?= site_url('admin/penyakit') ?>" class="card-footer text-white text-decoration-none">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card text-white bg-warning shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3><?= $jumlah_aturan ?></h3>
                            <p class="mb-0">Total Aturan</p>
                        </div>
                        <i class="fas fa-project-diagram fa-3x"></i>
                    </div>
                </div>
                <a href="<?= site_url('admin/aturan') ?>" class="card-footer text-white text-decoration-none">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>