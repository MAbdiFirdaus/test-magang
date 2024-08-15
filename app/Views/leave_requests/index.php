<?= $this->extend('templates/dashboard/app'); ?>

<?= $this->section('content'); ?>

<div class="card mt-4 p-5">
    <h2 class="mb-4 text-center fw-bolder mt-0">Daftar Cuti Karyawan</h2>

    <!-- Display success or error messages -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif ?>
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif ?>

    <!-- Table for leave requests -->
    <table class="table table-responsive">
        <thead class="table-bordered">
            <tr>
                <th>ID</th>
                <th>Nama Karyawan</th>
                <th>Jenis Cuti</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($leave_requests)) : ?>
                <?php foreach ($leave_requests as $request) : ?>
                    <tr>
                        <td><?= $request['id'] ?></td>
                        <td class="fw-bolder"><?= $request['employee_name'] ?></td>
                        <td><?= $request['leave_type'] ?></td>
                        <td><?= date('d M Y', strtotime($request['start_date'])) ?></td>
                        <td><?= date('d M Y', strtotime($request['end_date'])) ?></td>
                        <td><?= ucfirst($request['status']) ?></td>
                        <td>
                            <form action="<?= base_url('/leave_requests/update_status/' . $request['id']) ?>" method="POST">
                                <select name="status" onchange="this.form.submit()">
                                    <option value="pending" <?= $request['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                                    <option value="approved" <?= $request['status'] == 'approved' ? 'selected' : '' ?>>Approved</option>
                                    <option value="rejected" <?= $request['status'] == 'rejected' ? 'selected' : '' ?>>Rejected</option>
                                </select>
                                <?= csrf_field() ?>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data cuti</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>
