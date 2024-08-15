<?= $this->extend('templates/dashboard/app'); ?>

<?= $this->section('content'); ?>


<h1>Attendance Records</h1>
<a href="<?= base_url('/attendance/create') ?>" class="btn btn-primary">Add Attendance</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Employee Name</th>
            <th>Date</th>
            <th>Check-In Time</th>
            <th>Check-Out Time</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($attendance as $record): ?>
            <tr>
                <td><?= $record['id'] ?></td>
                <td><?= $record['first_name'] . ' ' . $record['last_name'] ?></td>
                <td><?= $record['date'] ?></td>
                <td><?= $record['check_in_time'] ?></td>
                <td><?= $record['check_out_time'] ?></td>
                <td>
                    <a href="<?= base_url('/attendance/edit/' . $record['id']) ?>" class="btn btn-warning">Edit</a>
                    <a href="<?= base_url('/attendance/delete/' . $record['id']) ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
