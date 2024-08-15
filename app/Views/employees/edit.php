<?= $this->extend('templates/dashboard/app'); ?>

<?= $this->section('content'); ?>

<div class="card mt-4 p-5">
    <h2 class="mb-4 text-center fw-bolder mt-0">Edit Data Karyawan</h2>

    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="alert alert-danger">
            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                <p><?= $error ?></p>
            <?php endforeach ?>
        </div>
    <?php endif ?>

    <form action="<?= base_url('employees/' . $employee['id']) ?>" method="POST">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="first_name" class="form-label">Nama Depan</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?= old('first_name', $employee['first_name']) ?>" placeholder="Masukkan Nama Depan" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="last_name" class="form-label">Nama Belakang</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?= old('last_name', $employee['last_name']) ?>" placeholder="Masukkan Nama Belakang" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?= old('email', $employee['email']) ?>" placeholder="Masukkan Email" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="address" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="address" name="address" value="<?= old('address', $employee['address']) ?>" placeholder="Masukkan Alamat" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="phone_number" class="form-label">No Telepon</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= old('phone_number', $employee['phone_number']) ?>" placeholder="Masukkan No Telepon" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="job_title" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="job_title" name="job_title" value="<?= old('job_title', $employee['job_title']) ?>" placeholder="Masukkan Jabatan" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="department" class="form-label">Divisi</label>
                <input type="text" class="form-control" id="department" name="department" value="<?= old('department', $employee['department']) ?>" placeholder="Masukkan Divisi" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="salary" class="form-label">Gaji</label>
                <input type="number" class="form-control" id="salary" name="salary" value="<?= old('salary', $employee['salary']) ?>" placeholder="Masukkan Gaji" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="allowances" class="form-label">Tunjangan</label>
                <input type="number" class="form-control" id="allowances" name="allowances" value="<?= old('allowances', $employee['allowances']) ?>" placeholder="Masukkan Tunjangan" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="deductions" class="form-label">Potongan</label>
                <input type="number" class="form-control" id="deductions" name="deductions" value="<?= old('deductions', $employee['deductions']) ?>" placeholder="Masukkan Potongan" required>
            </div>
            <div class="text-end">
                <a class="btn btn-primary submit-button mt-3 px-4" href="/employees">Kembali</a>
                <input type="hidden" name="_method" value="PUT">
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-success submit-button mt-3 px-5">Kirim</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>
