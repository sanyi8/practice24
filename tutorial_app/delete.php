<!--require database file-->
<?php include('dbcon.php');


// DELETE create id and pull from the right data

    if(isset($_GET['id'])){
        $id = $_GET['id'];

    $query = "delete from `students` where `id` = '$id'";

    $result = mysqli_query($connection, $query);
    // if query fail
        if(!$result){
            // error
            die("query failed".mysqli_error());
        }

        else{

            // otherwise go to index.php and message
            header('location:index.php?delete_msg=You deleted the record');
        }
    }
?>