
<!--include header file with header from HTML code-->
<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<div class="box1">
<!--webpage removed header and footer without style-->
  <h2>ALL STUDENTS</h2>
     <!--create buttons to add data from the FORM not from _db-->
<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD STUDENTS</button>
</div>
   <!--create a table-->
   <table class="table table-hover table-bordered table-striped">
          <!--create a table HEAD-->
      <thead>
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Age</th>
          <th>Update</th>
          <th>Delete</th>
        </tr>
      </thead>
          <!--create a table body-->
      <tbody>

       <!--ADD PHP DATA HERE with PULLING FROM SQL using QUERY USE dbcon.php-->
       <!--INCLUDE dbcon.php-->

        <?php

        // where we want DATA FROM
        $query = "select * from `students` ";
        
        // EXECUTE QUERY this will howld all the query
        $result = mysqli_query($connection, $query);

        if(!$result){
          die("query failed".mysqli_error());

        }
        else {
          while($row = mysqli_fetch_assoc($result)){
            ?>
        <tr>
          <!--PLACE TO DISPLAY DATA-->
          <!--FILL UP WITH OWN DATA-->

<!--First Table data comes HERE as thats just a TEMPORARY DATA TO SEE HOW ITS GONNA LOOK-->

          <!--INSERT PHP into OUR Temp Data and use DATABASE TABLE STRUCTURE to FETCH Dinamic data-->

          <td><?php echo $row['id']?></td>
          <td><?php echo $row['first_name']?></td>
          <td><?php echo $row['last_name']?></td>
          <td><?php echo $row['age']?></td>
          <td><a href="update.php?id=<?php echo $row['id']?>" class="btn btn-success">Update</a></td>  <!-- add php code from above  -->
          <td><a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete</a></td>

        </tr>


            <?php

          }
        }

        ?>

      </tbody>
    </table>

<!-- After TABLE WE ADD PHP TO SEND MESSAGE WHEN ADD STUDENTS First name MISSING-->

<?php
  if(isset($_GET['message'])){
    echo "<h6>".$_GET['message']."</h6>";
  }
?>
<!-- SECOND VALIDATION FOR insert.php SECOND  isset -->

<?php
  if(isset($_GET['insert_msg'])) {
    echo "<h6>".$_GET['insert_msg']."</h6>";
  }
?>
<!-- THIRD UPDATE_MSG will be displayed here-->
<?php
  if(isset($_GET['update_msg'])) {
    echo "<h6>".$_GET['update_msg']."</h6>";
  }
?>
<!-- FORTH DELETE_MSG will be displayed here-->
<?php
  if(isset($_GET['delete_msg'])) {
    echo "<h6>".$_GET['delete_msg']."</h6>";
  }
?>

<!-- Modal from bootstrap BEFORE Footer-->

<form action="insert.php"  method="POST">

<!-- CHECK IF SOMEONE CLICK ON ADD_STUDENTS BTN * insert.php-->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD STUDENTS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <!--FORM COMES HERE FOR POPUP WINDOWs-->

        
          <div class="form-group">
            <label for="f_name">First Name</label>  
            <input type="text" name="f_name" class="form-control">

          </div>

          <div class="form-group">
            <label for="l_name">Last Name</label>  
            <input type="text" name="l_name" class="form-control">

          </div>

          <div class="form-group">
            <label for="age">Age</label>  
            <input type="number" name="age" class="form-control">

          </div>

        
<!--HTML FORM ENDS -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-warning" name="add_students" value="ADD">
    </div>
  </div>
</div>
</form>
    <!--include footer file with HTML code-->

<?php include('footer.php') ?>