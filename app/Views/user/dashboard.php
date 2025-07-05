<!DOCTYPE html>
<html lang="id">
<head>
<title>Dashboard User</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
          <div class="container mt-5">
          <div class="card">
          <div class="card-body">
          <h1 class="card-title">Selamat Datang, <?= esc(session()->get('username')) ?>!</h1>
          <p class="card-text">Silakan mulai melakukan diagnosa penyakit domba Anda atau lihat riwayat diagnosa sebelumnya.</p>
          <a href="<?= site_url('diagnosa') ?>" class="btn btn-primary">Mulai Diagnosa Baru</a>
          <a href="<?= site_url('riwayat') ?>" class="btn btn-success">Lihat Riwayat Diagnosa</a>
          <a href="<?= site_url('logout') ?>" class="btn btn-danger mt-2">Logout</a>
</div>
</div>
</div>
</body>
</html>