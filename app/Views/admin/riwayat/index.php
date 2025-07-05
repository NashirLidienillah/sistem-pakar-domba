<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table id="data-table" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>User</th>
                            <th>Penyakit Terdiagnosa</th>
                            <th>Tingkat Keyakinan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php if (empty($riwayat)): ?>
        <?php else: ?>
        <?php $no = 1; foreach($riwayat as $item): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= date('d M Y, H:i', strtotime($item['tanggal_diagnosa'])) ?></td>
            <td><?= esc($item['nama_user']) ?></td>
            <td><?= esc($item['nama_penyakit']) ?></td>
            <td><?= esc($item['hasil_cf'] * 100) ?>%</td>
            <td class="text-center">
                <a href="<?= site_url('admin/riwayat/detail/'.$item['id']) ?>" class="btn btn-sm btn-info" title="Lihat Detail"><i class="fas fa-eye"></i></a>
                
                <a href="<?= site_url('admin/riwayat/hapus/'.$item['id']) ?>" onclick="return confirm('Anda yakin ingin menghapus riwayat ini secara permanen?')" class="btn btn-sm btn-danger" title="Hapus"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</tbody>
                </table>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>