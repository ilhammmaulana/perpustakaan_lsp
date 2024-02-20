<?php

require_once 'db/Connection.php';
require_once 'helper/helper.php';

$data = Connection::table('students')->get();



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
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
            <a class="nav-link" href="borrowing.php">Peminjaman</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="students.php">Students</a>
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
    <h1>Students Management</h1>
    <p>This page to manage student</p>
    <a href="add_student.php" class="btn primary mb-5">Create student</a>
            <table class="table table-md table-striped">
        <thead>
            <tr>
            <th scope="col">Id Student</th>
            <th scope="col">Name</th>
            <th scope="col">NISN</th>
            <th scope="col">Phone</th>
            <th scope="col">Class</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $key => $student) { ?>
            <tr>
                <th scope="row"><?= e($key + 1) ?></th>
                <td><?= e($student['name']) ?></td>
                <td><?= e($student['nisn']) ?></td>
                <td><?= e($student['phone']) ?></td>
                <td><?= e($student['class']) ?></td>
                <td class="d-flex gap-2">
                    <form action="proccess/delete_student.php" method="POST">
                        <input type="hidden" name="id" value="<?= e($student['id']) ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a type="submit" href="edit_student.php?id=<?= e($student['id']) ?>" class="btn btn-info text-white">Edit</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
        </table>
    </section>

</body>
</html>

