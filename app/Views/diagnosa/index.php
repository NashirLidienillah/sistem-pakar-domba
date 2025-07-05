<!DOCTYPE html><html lang="id"><head><title><?= esc($title) ?></title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"></head><body>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3><?= esc($title) ?></h3>
            <p>Pilih tingkat keyakinan Anda pada setiap gejala yang sesuai dengan kondisi domba.</p>
        </div>
        <div class="card-body">
            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <form action="<?= site_url('diagnosa/process') ?>" method="post">
                <?= csrf_field() ?>
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Kode</th>
                            <th>Gejala</th>
                            <th>Tingkat Keyakinan (CF User)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($gejala as $g): ?>
                        <tr>
                            <td><?= esc($g['kode_gejala']) ?></td>
                            <td><?= esc($g['nama_gejala']) ?></td>
                            <td>
                                <select name="gejala[<?= $g['id'] ?>]" class="form-select">
                                    <option value="0" selected>-- Tidak Tahu / Tidak Ada --</option>
                                    <option value="0.2">Tidak Yakin</option>
                                    <option value="0.4">Sedikit Yakin</option>
                                    <option value="0.6">Cukup Yakin</option>
                                    <option value="0.8">Yakin</option>
                                    <option value="1.0">Sangat Yakin</option>
                                </select>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Lihat Hasil Diagnosa</button>
                    <a href="<?= site_url('user/dashboard') ?>" class="btn btn-secondary">Kembali ke Dashboard</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body></html>