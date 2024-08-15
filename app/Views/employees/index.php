<?= $this->extend('templates/dashboard/app'); ?>

<?= $this->section('content'); ?>

<div class="card" style="background: #EEF7FF">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Data Karyawan</h5>
        <div class="row">
            <div class="col-md-6">
                <a href="/employees/create" class="btn btn-primary me-2">
                    <span><i class="ti ti-plus"></i></span> Tambah Data
                </a>
                <a href="<?= base_url('/employees/export') ?>" class="btn btn-success px-4">
                    <span><i class="ti ti-file-spreadsheet"></i></span> Export
                </a>
                <a href="<?= base_url('/employees/export-pdf') ?>" class="btn btn-danger px-4">
                    <span><i class="ti ti-file-spreadsheet"></i></span> Export
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <table class="table table-responsive">
        <thead class="table-bordered">
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-2">Nama</th>
                <th class="col-md-2">Alamat</th>
                <th class="col-md-1">Email</th>
                <th class="col-md-1">No Telpon</th>
                <th class="col-md-1">Jabatan</th>
                <th class="col-md-1">Divisi</th>
                <th class="col-md-2">Gaji</th>
                <th class="col-md-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($employees)): ?>
            <?php $no = 1; ?>
            <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><?=$no++?></td>
                    <td class="fw-bolder"><?= $employee['first_name'] . ' ' . $employee['last_name'] ?></td>
                    <td><?= $employee['address'] ?></td>
                    <td><?= $employee['email'] ?></td>
                    <td><?= $employee['phone_number'] ?></td>
                    <td><?= $employee['job_title'] ?></td>
                    <td><?= $employee['department'] ?></td>
                    <td>Rp. <?= $employee['salary'] ?></td>
                    <td>
                        <a href="/employees/edit/<?= $employee['id'] ?>" class="btn btn-secondary me-2">
                            <i class="ti ti-pencil"></i>
                            <span>Edit</span>
                        </a>
                        <a href="/employees/delete/<?= $employee['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?');">
                            <i class="ti ti-trash"></i>
                            <span>Hapus</span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td class="text-center" colspan="7">Data tidak ditemukan</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>
