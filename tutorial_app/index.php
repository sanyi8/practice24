
<!--include header file with header from HTML code-->
<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>


<!--webpage removed header and footer without style-->
  <h2>ALL STUDENTS</h2>
     <!--create buttons to add data from the FORM not from _db-->
<button class="btn btn-success">ADD STUDENTS</button>

   <!--create a table-->
   <table class="table table-hover table-bordered table-striped">
          <!--create a table HEAD-->
      <thead>
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Age</th>
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

        </tr>


            <?php

          }
        }

        ?>

      </tbody>
    </table>

    <!--include footer file with HTML code-->

    <?php include('footer.php') ?>