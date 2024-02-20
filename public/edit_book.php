<?php
require_once 'db/Connection.php';
require_once 'helper/helper.php';
require_once 'helper/Authenticate.php';

if(!Authenticate::check()){
    to('index.php');
}

if(isset($_GET['id'])){
    $data = Connection::table('books')->findById($_GET['id']);

}else{
    to('books.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit book</title>
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
            <a class="nav-link " aria-current="page" href="books.php">Books</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="borrowing.php">Peminjaman</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="students.php">Students</a>
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
    <form method="POST" action="proccess/edit_book.php">
        <input type="hidden" name="id" value="<?= e($data['id']) ?>">
  <div class="form-group mb-2">
    <label for="title">Title</label>
    <input type="text" value="<?= e($data['title']) ?>" class="form-control" id="title" name="title" placeholder="Tittle Book">
  </div>
  <div class="form-group mb-2">
    <label for="description">Description :</label>
    <textarea class="form-control" id="description" name="description" rows="3">
    <?= e($data['description']) ?>
    </textarea>
  </div>
  <button type="submit" class="btn primary mt-2">Edit</button>
</form>
    </section>

</body>
</html>

