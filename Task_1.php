<!DOCTYPE html>
<html lang="en">
<body>

<?php
$no_stud = $error = null;
$marks = [];
$averages = [];

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['nxt'])) {
    if (empty($_POST['no_stud'])) {
        $error = "<div style='color:red;'>Please enter the number of students!</div>";
    } elseif (!is_numeric($_POST['no_stud']) || $_POST['no_stud'] < 1) {
        $error = "<div style='color:red;'>Enter a valid positive number!</div>";
    } else {
        $no_stud = (int)$_POST['no_stud'];
        $_SESSION['no_stud'] = $no_stud; // Store student count in session
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['Submit'])) {
    $no_stud = $_POST['student_count'] ?? 0;
    
    for ($i = 0; $i < $no_stud; $i++) {
        $marks[$i] = [
            'tam'  => $_POST["tam"][$i] ?? '',
            'eng'  => $_POST["eng"][$i] ?? '',
            'math' => $_POST["math"][$i] ?? '',
            'sci'  => $_POST["sci"][$i] ?? '',
            'soc'  => $_POST["soc"][$i] ?? ''
        ];

        foreach ($marks[$i] as $subject => $score) {
            if (!is_numeric($score) || $score < 0 || $score > 100) {
                echo "<div style='color:red;'>Invalid input in Student " . ($i + 1) . " ($subject)!</div>";
                $marks[$i][$subject] = '';
            }
        }


        if (!in_array('', $marks[$i], true)) {
            $averages[$i] = calc($marks[$i]);
        }
    }
}

// Function to Calculate Average
function calc($mark) {
    $total = array_sum($mark);
    return round($total / count($mark), 2);
}
?>

<?php if (!isset($_POST['nxt']) && !isset($_POST['Submit'])): ?>
<!-- Step 1: Enter Number of Students -->
<form action="" method="post">
    <h3>Enter Number of Students</h3>
    <input type="text" name="no_stud" value="<?php echo htmlspecialchars($no_stud); ?>">
    <input type="submit" name="nxt" value="Next">
</form>
<?php endif; ?>

<?php if (isset($_POST['nxt']) && empty($_POST['Submit'])): ?>
<!-- Step 2: Enter Marks for Each Student -->
<form action="" method="post">
    <input type="hidden" name="student_count" value="<?php echo $no_stud; ?>">
    <h3>Enter Marks for <?php echo $no_stud; ?> Students</h3>
    
    <?php for ($i = 0; $i < $no_stud; $i++): ?>
        <h4>Student <?php echo $i + 1; ?></h4>
        Tamil: <input type="text" name="tam[]" value="<?php echo $_POST["tam"][$i] ?? ""; ?>"> <br>
        English: <input type="text" name="eng[]" value="<?php echo $_POST["eng"][$i] ?? ""; ?>"> <br>
        Maths: <input type="text" name="math[]" value="<?php echo $_POST["math"][$i] ?? ""; ?>"> <br>
        Science: <input type="text" name="sci[]" value="<?php echo $_POST["sci"][$i] ?? ""; ?>"> <br>
        Social: <input type="text" name="soc[]" value="<?php echo $_POST["soc"][$i] ?? ""; ?>"> <br><br>
    <?php endfor; ?>
    
    <input type="submit" name="Submit" value="Submit">
</form>
<?php endif; ?>

<?php if (isset($_POST['Submit'])): ?>
<!-- Step 3: Display Results -->
<h3>Results:</h3>
<?php
if (!empty($averages)) {
    foreach ($averages as $index => $avg) {
        echo "<b>Student " . ($index + 1) . " - Average Marks: $avg | Grade: ";

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
        echo "</b><br>";
    }
}
?>
<?php endif; ?>

</body>
</html>