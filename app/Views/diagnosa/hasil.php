<!DOCTYPE html>
<html lang="id">
<head>
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2><?= esc($title) ?></h2>
        </div>
        <div class="card-body">
            
            <?php if(isset($kesimpulan_text)): ?>
            <div class="alert alert-info" role="alert">
                <h4 class="alert-heading">Ringkasan Kesimpulan</h4>
                <p><?= $kesimpulan_text ?></p>
            </div>
            <hr>
            <?php endif; ?>
            
            <?php if (!empty($hasil)): ?>
                <div class="alert alert-light border-success">
                    <h4 class="alert-heading text-success">Detail Kemungkinan Penyakit</h4>
                    <p>Berikut adalah rincian dari semua kemungkinan penyakit yang cocok, diurutkan dari yang paling mungkin:</p>
                </div>

                <div class="accordion" id="accordionHasil">
                    <?php foreach ($hasil as $index => $item): ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-<?= $item['kode_penyakit'] ?>">
                            <button class="accordion-button <?= $index > 0 ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $item['kode_penyakit'] ?>" aria-expanded="<?= $index === 0 ? 'true' : 'false' ?>" aria-controls="collapse-<?= $item['kode_penyakit'] ?>">
                                <strong>[<?= $item['kode_penyakit'] ?>] <?= esc($item['nama_penyakit']) ?> - Tingkat Keyakinan: <?= $item['cf_hasil'] ?>%</strong>
                            </button>
                        </h2>
                        <div id="collapse-<?= $item['kode_penyakit'] ?>" class="accordion-collapse collapse <?= $index === 0 ? 'show' : '' ?>" aria-labelledby="heading-<?= $item['kode_penyakit'] ?>" data-bs-parent="#accordionHasil">
                            <div class="accordion-body">
                                <strong>Deskripsi:</strong>
                                <p><?= nl2br(esc($item['deskripsi'])) ?></p>
                                <strong>Solusi / Penanganan:</strong>
                                <p><?= nl2br(esc($item['solusi'])) ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

            <?php else: ?>
                <div class="alert alert-warning">
                    <h4 class="alert-heading">Diagnosa Tidak Ditemukan</h4>
                    <p>Sistem tidak dapat menemukan penyakit yang cocok dengan kombinasi gejala yang Anda pilih. Silakan coba lagi atau hubungi pakar/dokter hewan terdekat.</p>
                </div>
            <?php endif; ?>

            <hr>
            <a href="<?= site_url('diagnosa') ?>" class="btn btn-primary"><i class="fas fa-stethoscope"></i> Diagnosa Ulang</a>
            <a href="<?= site_url('user/dashboard') ?>" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>