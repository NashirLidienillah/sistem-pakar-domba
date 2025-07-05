<!DOCTYPE html><html lang="id"><head><title><?= esc($title) ?></title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"></head><body>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3><?= esc($title) ?></h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal Diagnosa</th>
                        <th>Penyakit Terdiagnosa</th>
                        <th>Tingkat Keyakinan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($riwayat)): ?>
                        <tr>
                            <td colspan="5" class="text-center">Anda belum memiliki riwayat diagnosa.</td>
                        </tr>
                    <?php else: ?>
                        <?php $no = 1; foreach($riwayat as $item): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= date('d M Y, H:i', strtotime($item['tanggal_diagnosa'])) ?></td>
                            <td><?= esc($item['nama_penyakit']) ?></td>
                            <td><?= esc($item['hasil_cf'] * 100) ?>%</td>
                            <td>
                                <a href="<?= site_url('riwayat/detail/'.$item['id']) ?>" class="btn btn-sm btn-info">Lihat Detail</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <a href="<?= site_url('user/dashboard') ?>" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>
    </div>
</div>
</body></html>