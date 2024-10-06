<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentID = $_POST['studentID'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("INSERT INTO attendance (studentID, date, status) VALUES (?, ?, ?)");
    $stmt->execute([$studentID, $date, $status]);
}

$students = $pdo->query("SELECT * FROM students")->fetchAll(PDO::FETCH_ASSOC);
?>

<form method="POST">
    Select Student: 
    <select name="studentID">
        <?php foreach ($students as $student): ?>
            <option value="<?php echo $student['studentID']; ?>"><?php echo $student['studentName']; ?></option>
        <?php endforeach; ?>
    </select><br>
    Date: <input type="date" name="date" required><br>
    Status: 
    <select name="status">
        <option value="present">Present</option>
        <option value="absent">Absent</option>
    </select><br>
    <button type="submit">Mark Attendance</button>
</form>
