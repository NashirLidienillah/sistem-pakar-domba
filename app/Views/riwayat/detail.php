<!DOCTYPE html>
<html lang="id">
<head>
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3><?= esc($title) ?></h3>
            <p class="text-muted mb-0">Diagnosa pada: <?= date('d M Y, H:i', strtotime($riwayat['tanggal_diagnosa'])) ?></p>
        </div>
        <div class="card-body">
            <?php if (!empty($hasil_diagnosa_lengkap)): 
                $topResult = $hasil_diagnosa_lengkap[0];
            ?>
            <div class="alert alert-success">
                <h4 class="alert-heading">Hasil Diagnosa Teratas: <?= esc($topResult['nama_penyakit']) ?></h4>
                <p>Berdasarkan gejala yang Anda pilih, sistem paling yakin domba Anda menderita penyakit ini dengan tingkat keyakinan <strong><?= $topResult['cf_hasil'] ?>%</strong>.</p>
                <hr>
                <p><strong>Solusi yang disarankan:</strong><br><?= nl2br(esc($topResult['solusi'])) ?></p>
            </div>
            <?php endif; ?>

            <h4 class="mt-4">Daftar Semua Kemungkinan Penyakit</h4>
            <div class="accordion" id="accordionHasil">
                <?php foreach ($hasil_diagnosa_lengkap as $index => $hasil): ?>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button <?= $index > 0 ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $hasil['kode_penyakit'] ?>">
                            <strong>[<?= esc($hasil['kode_penyakit']) ?>] <?= esc($hasil['nama_penyakit']) ?> - Keyakinan: <?= esc($hasil['cf_hasil']) ?>%</strong>
                        </button>
                    </h2>
                    <div id="collapse-<?= $hasil['kode_penyakit'] ?>" class="accordion-collapse collapse <?= $index === 0 ? 'show' : '' ?>" data-bs-parent="#accordionHasil">
                        <div class="accordion-body">
                            <strong>Deskripsi:</strong>
                            <p><?= nl2br(esc($hasil['deskripsi'])) ?></p>
                            <strong>Solusi:</strong>
                            <p><?= nl2br(esc($hasil['solusi'])) ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <h4 class="mt-4">Gejala yang Anda Pilih Saat Itu</h4>
            <ul class="list-group">
                <?php foreach ($gejala_terpilih as $item): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?= esc($item['nama_gejala']) ?>
                        <span class="badge bg-primary rounded-pill">Keyakinan Anda: <?= esc($item['cf_user'] * 100) ?>%</span>
                    </li>
                <?php endforeach; ?>
            </ul>

            <hr>
            <a href="<?= site_url('riwayat') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali ke Daftar Riwayat</a>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>