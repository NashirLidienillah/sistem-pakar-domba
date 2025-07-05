<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="card shadow">
        <div class="card-header">
            <h5 class="card-title">Form Tambah Aturan</h5>
        </div>
        <div class="card-body">
            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <form action="<?= site_url('admin/aturan/store') ?>" method="post">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="penyakit_id" class="form-label">Pilih Penyakit</label>
                    <select name="penyakit_id" class="form-select" required>
                        <option value="">-- Pilih Penyakit --</option>
                        <?php foreach($penyakit as $p): ?>
                            <option value="<?= $p['id'] ?>" <?= old('penyakit_id') == $p['id'] ? 'selected' : '' ?>>
                                [<?= esc($p['kode_penyakit']) ?>] <?= esc($p['nama_penyakit']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="gejala_id" class="form-label">Pilih Gejala</label>
                    <select name="gejala_id" class="form-select" required>
                        <option value="">-- Pilih Gejala --</option>
                        <?php foreach($gejala as $g): ?>
                            <option value="<?= $g['id'] ?>" <?= old('gejala_id') == $g['id'] ? 'selected' : '' ?>>
                                [<?= esc($g['kode_gejala']) ?>] <?= esc($g['nama_gejala']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="cf_pakar" class="form-label">Nilai Certainty Factor (CF) Pakar</label>
                    <input type="number" step="0.1" min="0" max="1" class="form-control" name="cf_pakar" placeholder="Contoh: 0.8" value="<?= old('cf_pakar') ?>" required>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Aturan</button>
                <a href="<?= site_url('admin/aturan') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>