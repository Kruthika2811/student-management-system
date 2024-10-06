<?php
include 'db.php';

if (isset($_GET['generate'])) {
    $attendanceData = $pdo->query("SELECT * FROM attendance")->fetchAll(PDO::FETCH_ASSOC);
    // Generate PDF or Excel report logic here
    // Use libraries like FPDF or PHPExcel for actual report generation
}
?>

<form method="GET">
    <button type="submit" name="generate">Generate Attendance Report</button>
</form>
