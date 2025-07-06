<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title) ?> | Admin Sistem Pakar Domba</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"/>
    
    <style>
        body { display: flex; min-height: 100vh; flex-direction: column; }
        .main-wrapper { display: flex; flex: 1; }
        .sidebar { width: 250px; background-color: #343a40; color: white; }
        .sidebar a { color: rgba(255, 255, 255, 0.8); text-decoration: none; }
        .sidebar a:hover, .sidebar .active a { color: white; background-color: #495057; }
        .content { flex: 1; padding: 2rem; background-color: #f4f6f9; }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <div class="sidebar p-3">
            <h4 class="text-center mb-4">Admin Panel</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a class="nav-link p-2" href="<?= site_url('admin/dashboard') ?>"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a></li>
                <li class="nav-item mb-2"><a class="nav-link p-2" href="<?= site_url('admin/gejala') ?>"><i class="fas fa-th-list me-2"></i> Kelola Gejala</a></li>
                <li class="nav-item mb-2"><a class="nav-link p-2" href="<?= site_url('admin/penyakit') ?>"><i class="fas fa-bug me-2"></i> Kelola Penyakit</a></li>
                <li class="nav-item mb-2"><a class="nav-link p-2" href="<?= site_url('admin/aturan') ?>"><i class="fas fa-project-diagram me-2"></i> Kelola Aturan</a></li>
                <li class="nav-item mb-2"><a class="nav-link p-2" href="<?= site_url('admin/riwayat') ?>"><i class="fas fa-history me-2"></i> Riwayat Diagnosa</a></li>
                <hr class="bg-light">
                <li class="nav-item"><a class="nav-link p-2" href="<?= site_url('logout') ?>"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
            </ul>
        </div>

        <div class="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light rounded mb-4">
                <div class="container-fluid">
                    <h5 class="mb-0"><?= esc($title) ?></h5>
                    <span class="navbar-text">Selamat Datang, <strong><?= session()->get('username') ?></strong>!</span>
                </div>
            </nav>
            
            <?= $this->renderSection('content') ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#data-table').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.13.4/i18n/id.json"
                }
            });
        });
    </script>
</body>
</html>