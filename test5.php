<?php
if (isset($_POST['year']) && isset($_POST['month'])) {
    $year = $_POST['year'];
    $month = $_POST['month'];
} else {
    $year = date('Y');
    $month = date('m');
}
$first_day = strtotime("{$year}-{$month}-01");
$days_in_month = date('t', $first_day);
$month_name = date('F', $first_day);
$day_of_week = date('w', $first_day);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>달력테이블</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid black;
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: green;
            color: white;
        }
    </style>
</head>
<body>
    <h1>달력테이블</h1>
    <form method="post" action="">
        <label for="year">년도:</label>
        <input type="number" name="year" id="year" value="<?= $year ?>" required>
        <br>
        <label for="month">월:</label>
        <input type="number" name="month" id="month" min="1" max="12" value="<?= $month ?>" required>
        <br>
        <input type="submit" value="표시">
    </form>
    <h2><?= $year ?>년 <?= $month ?>월</h2>
    <table>
        <tr>
            <th>일</th>
            <th>월</th>
            <th>화</th>
            <th>수</th>
            <th>목</th>
            <th>금</th>
            <th>토</th>
        </tr>
        <?php for ($i = 0; $i < 6; $i++): ?>
        <tr>
            <?php for ($j = 0; $j < 7; $j++): ?>
            <?php
                $day_number = $i * 7 + $j + 1 - $day_of_week;
                if ($day_number < 1 || $day_number > $days_in_month) {
                    echo "<td>&nbsp;</td>";
                } else {
                    echo "<td>{$day_number}</td>";
                }
            ?>
            <?php endfor; ?>
        </tr>
        <?php endfor; ?>
    </table>
</body>
</html>