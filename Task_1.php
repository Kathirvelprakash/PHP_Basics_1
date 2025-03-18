<!DOCTYPE html>
<html lang="en">
<body>

<?php
$mark = [];
$avg = null;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (
        empty($_POST['tam']) || empty($_POST['eng']) || empty($_POST['math']) || 
        empty($_POST['sci']) || empty($_POST['soc'])
    ) {
        echo "<div style='color:red;'>One or more fields are empty!</div>";
    } elseif (
        !is_numeric($_POST['tam']) || $_POST['tam'] < 0 || $_POST['tam'] > 100 ||
        !is_numeric($_POST['eng']) || $_POST['eng'] < 0 || $_POST['eng'] > 100 ||
        !is_numeric($_POST['math']) || $_POST['math'] < 0 || $_POST['math'] > 100 ||
        !is_numeric($_POST['sci']) || $_POST['sci'] < 0 || $_POST['sci'] > 100 ||
        !is_numeric($_POST['soc']) || $_POST['soc'] < 0 || $_POST['soc'] > 100
    ) {
        echo "<div style='color:red;'>Enter valid marks (0-100) only!</div>";
    } else {
        $mark = [
            $_POST['tam'],
            $_POST['eng'],
            $_POST['math'],
            $_POST['sci'],
            $_POST['soc']
        ];

        $avg = calc($mark);
    }
}

// Function to Calculate Average
function calc($mark) {
    $total = array_sum($mark);
    $avg = $total / count($mark);
    echo "<div>Average Marks: " . number_format($avg, 2) . "</div>";
    return $avg;
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <h1>Enter 5 Subjects Marks</h1>
    Tamil: <input type="text" name="tam" value="<?php echo $_POST['tam'] ?? ""; ?>"> <br>
    English: <input type="text" name="eng" value="<?php echo $_POST['eng'] ?? ""; ?>"> <br>
    Maths: <input type="text" name="math" value="<?php echo $_POST['math'] ?? ""; ?>"> <br>
    Science: <input type="text" name="sci" value="<?php echo $_POST['sci'] ?? ""; ?>"> <br>
    Social: <input type="text" name="soc" value="<?php echo $_POST['soc'] ?? ""; ?>"> <br>
    <input type="submit" value="Submit">
</form>

<?php
// Display Grade if Average is Calculated
if ($avg !== null) {
    echo "<br><b>Grade: ";
    if ($avg >= 90) {
        echo "A+";
    } elseif ($avg >= 80) {
        echo "A";
    } elseif ($avg >= 70) {
        echo "B+";
    } elseif ($avg >= 60) {
        echo "B";
    } else {
        echo "Fail";
    }
    echo "</b>";
}
?>

</body>
</html>