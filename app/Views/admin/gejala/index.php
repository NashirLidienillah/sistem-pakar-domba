// File: app/Views/admin/gejala/index.php (Setelah diubah)

<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="card shadow">
        <div class="card-body">
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>
            <a href="<?= site_url('admin/gejala/create') ?>" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Gejala</a>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead><tr><th>Kode</th><th>Nama Gejala</th><th>Aksi</th></tr></thead>
                    <tbody>
                        <?php foreach($gejala as $item): ?>
                        <tr>
                            <td><?= esc($item['kode_gejala']) ?></td>
                            <td><?= esc($item['nama_gejala']) ?></td>
                            <td>
                                <a href="<?= site_url('admin/gejala/edit/'.$item['id']) ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                <a href="<?= site_url('admin/gejala/delete/'.$item['id']) ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>