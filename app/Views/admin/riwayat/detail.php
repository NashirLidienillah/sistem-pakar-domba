<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="card-title">Perhitungan Ulang Hasil Diagnosa</h5>
                    <p class="text-muted mb-0">
                        Menampilkan semua kemungkinan penyakit berdasarkan gejala yang dipilih.
                    </p>
                </div>
                <div class="card-body">
                    <?php if (!empty($hasil_diagnosa_lengkap)): ?>
                        <ul class="list-group">
                            <?php foreach ($hasil_diagnosa_lengkap as $hasil): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong class="d-block">[<?= esc($hasil['kode_penyakit']) ?>] <?= esc($hasil['nama_penyakit']) ?></strong>
                                </div>
                                <span class="badge bg-primary rounded-pill fs-6"><?= esc($hasil['cf_hasil']) ?>%</span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="text-center">Tidak ada hasil yang bisa dihitung ulang dari data riwayat ini.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="card-title">Info Diagnosa</h5>
                </div>
                <div class="card-body">
                    <p>
                        <strong>Pengguna:</strong><br>
                        <?= esc($riwayat['nama_user']) ?>
                    </p>
                    <p>
                        <strong>Tanggal:</strong><br>
                        <?= date('d M Y, H:i', strtotime($riwayat['tanggal_diagnosa'])) ?>
                    </p>
                </div>
            </div>

            <div class="card shadow mt-3">
                <div class="card-header">
                    <h5 class="card-title">Gejala yang Dipilih</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <?php foreach ($gejala_terpilih as $item): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= esc($item['nama_gejala']) ?>
                                <span class="badge bg-secondary rounded-pill"><?= esc($item['cf_user'] * 100) ?>%</span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3">
         <a href="<?= site_url('admin/riwayat') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali ke Daftar Riwayat</a>
    </div>
<?= $this->endSection() ?>