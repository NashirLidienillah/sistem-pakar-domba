<!DOCTYPE html>
<html lang="id">
<head><title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body>
          <div class="container mt-5">
          <div class="row justify-content-center">
          <div class="col-md-6">
          <div class="card">
          <div class="card-header text-center">
          <h3>Login Sistem Pakar</h3>
          </div>
          <div class="card-body">
                    <?php if(session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?>
                    </div>
          <?php endif; ?><?php if(session()->getFlashdata('success')): ?>
          <div class="alert alert-success"><?= session()->getFlashdata('success') ?>
          </div>
          <?php endif; ?><?= form_open('login/process') ?>
          <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" class="form-control" required></div>
          <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" required></div>
          <div class="d-grid">
          <button type="submit" class="btn btn-primary">Login</button></div>
          <?= form_close() ?></div><div class="card-footer text-center">
          <p>Belum punya akun? <a href="<?= site_url('register') ?>">Daftar di sini</a>
          </p>
</div>
</div>
</div>
</div>
</div>
</body>
</html>