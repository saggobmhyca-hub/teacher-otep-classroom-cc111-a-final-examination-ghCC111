<?php

require_once "db.php";
header("Content-Type: application/json");

$action = $_GET['action'] ?? '';


if ($action == "read") {

    try {
        $stmt = $pdo->query("SELECT * FROM students ORDER BY id DESC");
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode([
            "status" => "success",
            "data" => $students
        ]);

    } catch (PDOException $e) {
        echo json_encode([
            "status" => "error",
            "message" => $e->getMessage()
        ]);
    }
}



if ($action == "insert") {

    $surname = $_POST['surname'] ?? '';
    $name = $_POST['name'] ?? '';
    $middlename = $_POST['middlename'] ?? '';
    $address = $_POST['address'] ?? '';
    $contact = $_POST['contact'] ?? '';

    try {
        $sql = "INSERT INTO students (surname, name, middlename, address, contact)
                VALUES (:surname, :name, :middlename, :address, :contact)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':surname' => $surname,
            ':name' => $name,
            ':middlename' => $middlename,
            ':address' => $address,
            ':contact' => $contact
        ]);

        echo json_encode([
            "status" => "success",
            "message" => "Student inserted"
        ]);

    } catch (PDOException $e) {
        echo json_encode([
            "status" => "error",
            "message" => $e->getMessage()
        ]);
    }
}



if ($action == "update") {

    $id = $_POST['id'] ?? '';

    $surname = $_POST['surname'] ?? '';
    $name = $_POST['name'] ?? '';
    $middlename = $_POST['middlename'] ?? '';
    $address = $_POST['address'] ?? '';
    $contact = $_POST['contact'] ?? '';

    try {
        $sql = "UPDATE students 
                SET surname=:surname, name=:name, middlename=:middlename, address=:address, contact=:contact
                WHERE id=:id";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':id' => $id,
            ':surname' => $surname,
            ':name' => $name,
            ':middlename' => $middlename,
            ':address' => $address,
            ':contact' => $contact
        ]);

        echo json_encode([
            "status" => "success",
            "message" => "Student updated"
        ]);

    } catch (PDOException $e) {
        echo json_encode([
            "status" => "error",
            "message" => $e->getMessage()
        ]);
    }
}



if ($action == "delete") {

    $id = $_POST['id'] ?? '';

    try {
        $stmt = $pdo->prepare("DELETE FROM students WHERE id=:id");
        $stmt->execute([':id' => $id]);

        echo json_encode([
            "status" => "success",
            "message" => "Student deleted"
        ]);

    } catch (PDOException $e) {
        echo json_encode([
            "status" => "error",
            "message" => $e->getMessage()
        ]);
    }
}

?>