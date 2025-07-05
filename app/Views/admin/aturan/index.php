<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="card shadow">
        <div class="card-body">
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>
            <a href="<?= site_url('admin/aturan/create') ?>" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Aturan</a>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead><tr><th>Penyakit</th><th>Gejala</th><th>Nilai CF Pakar</th><th>Aksi</th></tr></thead>
                    <tbody>
                        <?php foreach($aturan as $item): ?>
                        <tr>
                            <td><?= esc($item['nama_penyakit']) ?></td>
                            <td><?= esc($item['nama_gejala']) ?></td>
                            <td><?= esc($item['cf_pakar']) ?></td>
                            <td>
                                <a href="<?= site_url('admin/aturan/delete/'.$item['id']) ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>