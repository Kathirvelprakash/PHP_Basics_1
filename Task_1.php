<!DOCTYPE html>
<html lang="en">
<body>

<?php
// $no_stud="";
$mark = $error = [];

if($_SERVER['REQUEST_METHOD']=="POST"){

    if (empty($_POST['tam']) || empty($_POST['eng']) || empty($_POST['math']) || empty($_POST['sci']) || empty($_POST['soc'])) {
        echo "One or more fields are empty!";
    }elseif(!is_numeric($_POST['tam']) || !is_numeric($_POST['eng']) || !is_numeric($_POST['math']) || !is_numeric($_POST['sci']) || !is_numeric($_POST['soc'])){
        echo "Enter the value in number format!";
    }else{
        $mark[]=$_POST['tam'];
        $mark[]=$_POST['eng'];
        $mark[]=$_POST['math'];
        $mark[]=$_POST['sci'];
        $mark[]=$_POST['soc'];
    }
    
    function calc($mark){
        $total = $mark[0] + $mark[1] + $mark[2] + $mark[3] + $mark[4];
        global $avg;
        $avg = $total / 5;
        echo "Average Marks: ".$avg."<br>";
    }
}
?>

</body>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <!-- <input type="text" name="no_stud" value="<?php echo $no_stud ?? "" ;?>"> <br> -->
     <h1>Enter 5 Subjects Mark</h1>
    Tamil : 
    <input type="text" name="tam" value="<?php echo $no_stud ?? "" ;?>"> <br>
    English : 
    <input type="text" name="eng" value="<?php echo $no_stud ?? "" ;?>"> <br>
    Maths : 
    <input type="text" name="math" value="<?php echo $no_stud ?? "" ;?>"> <br>
    Science : 
    <input type="text" name="sci" value="<?php echo $no_stud ?? "" ;?>"> <br>
    Social : 
    <input type="text" name="soc" value="<?php echo $no_stud ?? "" ;?>"> <br>
    <input type="submit" value="submit">
</form>
<?php
    calc($mark);
    $avg = 101;
    if($avg<=100 && $avg>=90){
        echo "Grade : A+";
    }elseif($avg<=89 && $avg>=80){
        echo "Grade : A";
    }elseif($avg<=79 && $avg>=70){
        echo "Grade : B+";
    }elseif($avg<=69 && $avg>=60){
        echo "Grade : B";
    }else{
        echo "Grade : Fail";
    }
?>
</html>