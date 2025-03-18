<!DOCTYPE html>
<html lang="en">
<body>

<?php
// $no_stud="";
$mark = $error = [];

if($_SERVER['REQUEST_METHOD']=="POST"){
        $mark[]=$_POST['tam'];
        $mark[]=$_POST['eng'];
        $mark[]=$_POST['math'];
        $mark[]=$_POST['sci'];
        $mark[]=$_POST['soc'];
        print_r($mark);
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
</html>