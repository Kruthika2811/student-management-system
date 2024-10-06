<?php
include 'db.php';
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'add_student':
            $stmt = $pdo->prepare("INSERT INTO students (studentName, studentID, class) VALUES (?, ?, ?)");
            $stmt->execute([$_POST['studentName'], $_POST['studentID'], $_POST['class']]);
            break;

        case 'delete_student':
            $stmt = $pdo->prepare("DELETE FROM students WHERE id = ?");
            $stmt->execute([$_POST['id']]);
            break;
    }
}

$students = $pdo->query("SELECT * FROM students")->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Admin Dashboard</h1>
<h2>Add Student</h2>
<form method="POST">
    Student Name: <input type="text" name="studentName" required><br>
    Student ID: <input type="text" name="studentID" required><br>
    Class: <input type="text" name="class" required><br>
    <button type="submit" name="action" value="add_student">Add Student</button>
</form>

<h2>Registered Students</h2>
<table>
    <tr>
        <th>Name</th>
        <th>Student ID</th>
        <th>Class</th>
        <th>Action</th>
    </tr>
    <?php foreach ($students as $student): ?>
    <tr>
        <td><?php echo $student['studentName']; ?></td>
        <td><?php echo $student['studentID']; ?></td>
        <td><?php echo $student['class']; ?></td>
        <td>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
                <button type="submit" name="action" value="delete_student">Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
