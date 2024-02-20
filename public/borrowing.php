<?php

require_once 'db/Connection.php';
require_once 'helper/helper.php';
require_once 'helper/Authenticate.php';

if(!Authenticate::check()){
    to('index.php');
}
$connection = Connection::getConnection();
$sql = "SELECT borrowing_records.id,borrowing_records.status,borrowing_records.borrow_date,borrowing_records.return_date, borrowing_records.book_id, borrowing_records.student_id, students.name as student_name, students.class as student_class, students.phone as student_phone, books.title as book_title, books.description as book_description FROM `borrowing_records` INNER JOIN students ON borrowing_records.student_id = students.id INNER JOIN books ON borrowing_records.book_id = books.id";
$query = $connection->query($sql);
$data = $query->fetchAll(PDO::FETCH_ASSOC);
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowing</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <header class="container-fluid position-fixed">
    <nav class="navbar container navbar-expand-lg bg-body-tertiary">
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
            <a class="nav-link active" href="borrowing.php">Peminjaman</a>
            </li>
            <li class="nav-item">
            <a class="nav-link " href="students.php">Students</a>
            </li>
            <li class="nav-item">
                <form action="proccess/logout.php" method="POST">
                <button class="btn btn-danger" type="submit">Logout</button>
                </form>
            </li>
        </ul>
        </div>
    </nav>
    </header>

    <section class="container">
    <h1>Borrowing Management</h1>
    <p>This page to manage borrowing(peminjaman)</p>
    <a href="add_borrowing.php" class="btn primary mb-5">Create borrowing</a>
            <table class="table table-md table-striped">
        <thead>
            <tr>
            <th scope="col">Id Pinjam</th>
            <th scope="col">Student name</th>
            <th scope="col">Phone student</th>
            <th scope="col">Title Book</th>
            <th scope="col">Status</th>
            <th scope="col">Borrow date</th>
            <th scope="col">Return date</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $key => $borrowing) { ?>
            <tr>
                <td><?= e($borrowing['id']) ?></td>
                <td><?= e($borrowing['student_name'] . " - ".$borrowing['student_class']) ?></td>
                <td><?= e($borrowing['student_phone']) ?></td>
                <td><?= e($borrowing['book_title']) ?></td>
                <td><?= e($borrowing['status']) ?></td>
                <td><?= e($borrowing['borrow_date']) ?></td>
                <td><?= e(!$borrowing['return_date'] ? 'Belum dikembalikan' : $borrowing['return_date']) ?></td>
                <td class="d-flex gap-2">
                    <?php if($borrowing['status'] == 'hold'){ ?>
                    <form action="proccess/delete_borrowing.php" method="POST">
                        <input type="hidden" name="id" value="<?= e($borrowing['id']) ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                        <form action="proccess/return_borrowing.php" method="POST">
                        <input type="hidden" name="id" value="<?= e($borrowing['id']) ?>">
                        <button type="submit" class="btn btn-success">Return</button>
                    </form>
                    <a type="submit" href="edit_borrowing.php?id=<?= e($borrowing['id']) ?>" class="btn btn-info text-white">Edit</a>
                    <?php }else{
                        echo "<p class='text-success'> Borrowing done </p>";
                    } ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
        </table>
    </section>

</body>
</html>

