<?= $this->extend('templates/dashboard/app2'); ?>

<?= $this->section('content'); ?>

<div class="card mt-4 p-5">
    <h2 class="mb-4 text-center fw-bolder mt-0">Tambah Cuti Karyawan</h2>

    <!-- Display validation errors -->
    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="alert alert-danger">
            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                <p><?= $error ?></p>
            <?php endforeach ?>
        </div>
    <?php endif ?>

    <!-- Form for creating a new leave request -->
    <form action="<?= base_url('/leave_requests/store') ?>" method="POST">
        <div class="row">
            <!-- Employee Selection -->
            <div class="col-md-6 mb-3">
                <label for="employee_id" class="form-label">Nama Karyawan</label>
                <select name="employee_id" id="employee_id" class="form-control" required>
                    <option value="">Pilih Karyawan</option>
                    <?php foreach ($employees as $employee) : ?>
                        <option value="<?= $employee['id'] ?>">
                            <?= $employee['first_name'] . ' ' . $employee['last_name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Leave Type -->
            <div class="col-md-6 mb-3">
                <label for="leave_type" class="form-label">Jenis Cuti</label>
                <input type="text" class="form-control" id="leave_type" name="leave_type" value="<?= old('leave_type') ?>" placeholder="Masukkan Jenis Cuti" required>
            </div>

            <!-- Start Date -->
            <div class="col-md-6 mb-3">
                <label for="start_date" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="<?= old('start_date') ?>" required>
            </div>

            <!-- End Date -->
            <div class="col-md-6 mb-3">
                <label for="end_date" class="form-label">Tanggal Selesai</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="<?= old('end_date') ?>" required>
            </div>

            <div class="text-end">
                <a class="btn btn-primary submit-button mt-3 px-4" href="/leave_requests">Kembali</a>
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-success submit-button mt-3 px-5">Kirim</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>
