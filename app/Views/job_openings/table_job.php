<?= $this->extend('templates/dashboard/app'); ?>

<?= $this->section('content'); ?>
  <div class="container mt-5">
    <h1 class="mb-4">Job Openings Management</h1>
    <a href="<?= base_url('/job_openings/create') ?>" class="btn btn-primary mb-3">Add New Job Opening</a>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Description</th>
          <th>Requirements</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($job_openings as $job): ?>
          <tr>
            <td><?= esc($job['id']) ?></td>
            <td><?= esc($job['title']) ?></td>
            <td><?= esc($job['description']) ?></td>
            <td><?= esc($job['requirements']) ?></td>
            <td><?= esc($job['status']) ?></td>
            <td>
              <a href="<?= base_url('job_openings/edit/' . $job['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
              <a href="<?= base_url('job_openings/delete/' . $job['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this job opening?')">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <?= $this->endSection() ?>
