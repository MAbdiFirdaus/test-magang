<?= $this->extend('templates/dashboard/app'); ?>

<?= $this->section('content'); ?>
<h1>Add Attendance</h1>

<form action="<?= base_url('/attendance/store') ?>" method="POST">
<div class="form-group">
        <label for="user_id">Employee</label>
        <select name="user_id" id="user_id" class="form-control" required>
            <?php foreach ($users as $user): ?>
                <option value="<?= $user->id ?>"><?= $user->first_name . ' ' . $user->last_name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" name="date" id="date" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="check_in_time">Check-In Time</label>
        <input type="time" name="check_in_time" id="check_in_time" class="form-control">
    </div>
    <div class="form-group">
        <label for="check_out_time">Check-Out Time</label>
        <input type="time" name="check_out_time" id="check_out_time" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>

<?= $this->endSection() ?>
