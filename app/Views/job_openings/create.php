<?= $this->extend('templates/dashboard/app'); ?>

<?= $this->section('content'); ?>
    <h1>Create Job Opening</h1>
    <form action="<?= base_url('/job_openings/store') ?>" method="POST">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea>
        <label for="requirements">Requirements:</label>
        <textarea name="requirements" id="requirements" required></textarea>
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="open">Open</option>
            <option value="closed">Closed</option>
        </select>
        <button type="submit">Submit</button>
    </form>
    <?= $this->endSection() ?>