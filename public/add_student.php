<?php
require_once 'helper/Authenticate.php';

if(!Authenticate::check()){
    to('index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create student</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
        <header class="container-fluid position-fixed">
    <nav class="navbar navbar-expand-lg container">
    <div class="container-fluid ">
        <a class="navbar-brand heading-primary" href="#">SMK HIDAYAH Perpustakaan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="students.php">Books</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="borrowing.php">Peminjaman</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="students.php">Students</a>
            </li>
            <li class="nav-item">
            </li>
        </ul>
        </div>
    </div>
    </nav>
    </header>

    <section class="container">
    <h1>Create book</h1>
    <p>Create book</p>
    <a href="students.php" class="btn primary mb-2">Back to show students</a>
    <form method="POST" action="proccess/add_student.php">
    <div class="form-group mb-3">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
  </div>
  <div class="form-group mb-3">
    <label for="nisn">Nisn</label>
    <input type="text" class="form-control" id="nisn" name="nisn" placeholder="NISN">
  </div>
  <div class="form-group mb-3">
    <label for="phone">Phone</label>
    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
  </div>
  <div class="form-group mb-3">
    <label for="class">Class :</label>
    <input type="text" class="form-control" id="class" name="class" placeholder="class">
  </div>

  <button type="submit" class="btn primary mt-2">Create</button>
</form>
    </section>

</body>
</html>

