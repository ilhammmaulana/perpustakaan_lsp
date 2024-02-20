<?php
require_once 'db/Connection.php';
require_once 'helper/helper.php';

if(isset($_GET['id'])){
    $data = Connection::table('students')->findById($_GET['id']);

}else{
    to_route('books.php');
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
            <a class="nav-link" aria-current="page" href="books.php">Books</a>
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
    <h1>Create student</h1>
    <p>Create student</p>
<form method="POST" action="proccess/edit_student.php">
    <input type="hidden" name="id" value="<?= e($data['id']) ?>">
    <div class="form-group mb-3">
    <label for="name">Name</label>
    <input type="text" value="<?= e($data['name']) ?>" class="form-control" id="name" name="name" placeholder="Name">
  </div>
  <div class="form-group mb-3">
    <label for="nisn">Nisn</label>
    <input type="text"  value="<?= e($data['nisn']) ?>" class="form-control" id="nisn" name="nisn" placeholder="NISN">
  </div>
  <div class="form-group mb-3">
    <label for="phone">Phone</label>
    <input type="text"  value="<?= e($data['phone']) ?>" class="form-control" id="phone" name="phone" placeholder="Phone">
  </div>
  <div class="form-group mb-3">
    <label for="class">Class :</label>
    <input type="text" class="form-control"  value="<?= e($data['class']) ?>" id="class" name="class" placeholder="class">
  </div>

  <button type="submit" class="btn primary mt-2">Edit</button>
</form>
    </section>

</body>
</html>

