<!DOCTYPE html>
<html lang="id">
<head>
<title>Register</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
          <div class="container mt-5">
          <div class="row justify-content-center">
          <div class="col-md-6">
          <div class="card">
          <div class="card-header text-center">
          <h3>Registrasi Akun</h3></div>
          <div class="card-body"><?php if(session()->get('errors')): ?>
          <div class="alert alert-danger">
          <ul class="mb-0"><?php foreach (session()->get('errors') as $error) : ?>
          <li><?= esc($error) ?></li><?php endforeach ?></ul>
          </div><?php endif ?><?= form_open('register/process') ?>
          <div class="mb-3"><label class="form-label">Nama Lengkap</label>
          <input type="text" name="nama_lengkap" class="form-control" value="<?= old('nama_lengkap') ?>"></div>
          <div class="mb-3"><label class="form-label">Username</label>
          <input type="text" name="username" class="form-control" value="<?= old('username') ?>"></div>
          <div class="mb-3"><label class="form-label">Password</label>
          <input type="password" name="password" class="form-control"></div>
          <div class="mb-3"><label class="form-label">Konfirmasi Password</label>
          <input type="password" name="pass_confirm" class="form-control"></div>
          <div class="d-grid"><button type="submit" class="btn btn-primary">Daftar</button>
          </div><?= form_close() ?></div>
          <div class="card-footer text-center">
                    <p>Sudah punya akun? <a href="<?= site_url('login') ?>">Login</a></p>
          </div>
</div>
</div>
</div>
</div>
</body>
</html>