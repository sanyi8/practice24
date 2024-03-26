
<?php
include 'dbcon.php';
//CHECK IF SOMEONE CLICK ON ADD_STUDENTS BTN
if(isset($_POST['add_students'])) {


    // left side variables here can be anything
    // right side exactly what we gave in index.php
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];

    // DO VALIDATION
    if($fname == "" || empty($fname)){

        // if either met we do this
        header('location:index.php?message=You need to fill in the First Name');    // we pass with get method 
    }

    else{
        $query = "insert into `students` (`first_name`, `last_name`, `age`) values ('$fname', '$lname', '$age')";

        $result = mysqli_query($connection, $query);

        if(!$result){       // if query fail
        
            die("Query Failed".mysqli_error());

        }    
        else{
            header('location:index.php?insert_msg=Your data has been added successfully');

        }
        
    }
}
?>