<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Job Openings</title>
  <link rel="stylesheet" href="<?= base_url('assets/dashboard/css/styles.min.css'); ?>" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <h1 class="mb-4">Job Openings</h1>
    <div class="row">
      <?php foreach ($job_openings as $job): ?>
        <div class="col-md-4 mb-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?= esc($job['title']) ?></h5>
              <p class="card-text"><?= esc($job['description']) ?></p>
              <p class="card-text"><strong>Requirements:</strong> <?= esc($job['requirements']) ?></p>
              <p class="card-text"><strong>Status:</strong> <?= esc($job['status']) ?></p>
              <a href="<?= base_url('job_openings/' . $job['id']) ?>" class="btn btn-primary">Apply Now</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
