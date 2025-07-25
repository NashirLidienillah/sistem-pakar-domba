<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="card shadow">
        <div class="card-header">
            <h5 class="card-title">Form Edit Penyakit</h5>
        </div>
        <div class="card-body">
            <form action="<?= site_url('admin/penyakit/update/'.$penyakit['id']) ?>" method="post">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="kode_penyakit" class="form-label">Kode Penyakit</label>
                    <input type="text" class="form-control" name="kode_penyakit" value="<?= esc($penyakit['kode_penyakit']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nama_penyakit" class="form-label">Nama Penyakit</label>
                    <input type="text" class="form-control" name="nama_penyakit" value="<?= esc($penyakit['nama_penyakit']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="3"><?= esc($penyakit['deskripsi']) ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="solusi" class="form-label">Solusi</label>
                    <textarea class="form-control" name="solusi" rows="3"><?= esc($penyakit['solusi']) ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                <a href="<?= site_url('admin/penyakit') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>