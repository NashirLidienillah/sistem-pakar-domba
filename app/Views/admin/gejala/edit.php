<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="card shadow">
        <div class="card-header">
            <h5 class="card-title">Form Edit Gejala</h5>
        </div>
        <div class="card-body">
            <form action="<?= site_url('admin/gejala/update/'.$gejala['id']) ?>" method="post">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="kode_gejala" class="form-label">Kode Gejala</label>
                    <input type="text" class="form-control" name="kode_gejala" value="<?= esc($gejala['kode_gejala']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nama_gejala" class="form-label">Nama Gejala</label>
                    <input type="text" class="form-control" name="nama_gejala" value="<?= esc($gejala['nama_gejala']) ?>" required>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                <a href="<?= site_url('admin/gejala') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>