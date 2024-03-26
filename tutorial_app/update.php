<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>



<?php

$id = '';
//query to GET ID based element
if(isset($_GET['id'])){
    $id = $_GET['id'];

// stuff comes here from <TBODY></TBODY> in the index.php with modified to id
// if the id in db and in here match 
        $query = "select * from `students` where `id` = '$id'";
        
        $result = mysqli_query($connection, $query);

        if(!$result){
          die("query failed".mysqli_error());

        }
        else {
            $row = mysqli_fetch_assoc($result);
        
            
    }    

}
?>

<!--LOGIC HERE-->

<?php
if(isset($_POST['update_students'])){

    if(isset($_GET['id_new'])){
        $idnew = $_GET['id_new'];
    }

    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];

    $query = "update `students` set `first_name` = '$fname', `last_name` = '$lname', `age` = '$age' where `id` = '$idnew'";

        $result = mysqli_query($connection, $query);

        if(!$result){
        die("query failed".mysqli_error());

        }

        else {
            header('location:index.php?update_msg=You have successfully updated data');
        }

}

?>

<!--copy form from index.php AFTER header footer and DB SHORTCODE files-->
<form action="update.php?id_new=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="f_name">First Name</label>
        <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name'] ?>">

    </div>

    <div class="form-group">
        <label for="l_name">Last Name</label>
        <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name'] ?>">

    </div>

    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" name="age" class="form-control" value="<?php echo $row['age'] ?>">

    </div>

    <!--SUBMIT BUTTON -->
    <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">

</form>




<?php include('footer.php'); ?>