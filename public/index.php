<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student CRUD System</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<nav class="navbar">

    <a href="#" onclick="goHome()">
        <img src="logo1.jpeg" id="logo" alt="Logo">
    </a>

    <button class="navbarbuttons" onclick="showSection('home')">Home</button>
    <button class="navbarbuttons" onclick="showSection('create')">Create</button>
    <button class="navbarbuttons" onclick="showSection('read')">Read</button>
    <button class="navbarbuttons" onclick="showSection('update')">Update</button>
    <button class="navbarbuttons" onclick="showSection('delete')">Delete</button>

</nav>


<section id="home" class="section homecontent">
    <h1>Welcome to Student Management System</h1>
</section>


<section id="create" class="section content">

    <h1>Insert Student</h1>

    <form id="studentForm" action="../includes/insert.php" method="POST">

        <input type="text" name="surname" placeholder="Surname" required><br>
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="text" name="middlename" placeholder="Middle Name"><br>
        <input type="text" name="address" placeholder="Address"><br>
        <input type="text" name="contact" placeholder="Contact"><br>

        <button type="submit">Save</button>
        <button type="button" id="clrbtn">Clear</button>

    </form>

</section>


<section id="read" class="section content">

    <h1>Student Records</h1>

    <?php
    require_once "../includes/db.php";

    $stmt = $pdo->query("SELECT * FROM students ORDER BY id DESC");
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <table border="1" width="100%">
        <tr>
            <th>ID</th>
            <th>Surname</th>
            <th>Name</th>
            <th>Middle</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($students as $s): ?>
        <tr>
            <td><?= $s['id'] ?></td>
            <td><?= $s['surname'] ?></td>
            <td><?= $s['name'] ?></td>
            <td><?= $s['middlename'] ?></td>
            <td><?= $s['address'] ?></td>
            <td><?= $s['contact'] ?></td>
            <td>
                <a href="update.php?id=<?= $s['id'] ?>">Edit</a> |
                <a href="delete.php?id=<?= $s['id'] ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>

    </table>

</section>


<section id="update" class="section content">
    <h1>Update Section</h1>
    <p>Click edit in Read section to update student.</p>
</section>


<section id="delete" class="section content">
    <h1>Delete Section</h1>
    <p>Click delete in Read section.</p>
</section>

<script src="script.js"></script>

</body>
</html>