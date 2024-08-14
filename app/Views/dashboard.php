<!-- <!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

    </body>
</html> -->
<?= $this->extend('/layouts/user_layout') ?>
<?= $this->section('customStyles') ?>
<link rel="stylesheet" href="/css/dashboard.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1>Welcome to the Dashboard</h1>
<h1>Welcome, <?= $email ?>!</h1>
<p>User ID: <?= $user_id ?></p>
<!-- Your content here -->
<?= $this->endSection() ?>