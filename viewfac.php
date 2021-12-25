<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JEC Diamond Jubilee</title>
    <link rel="stylesheet" href="css/st.css">
    </head>

<body>

   

    <?php include('nav.php'); ?>


    <main>

    <center>
    <div class="search">
                <input type="text" id="search" placeholder="Type here to Search...">
            </div>
    </center>

        <div id="myModal" class="modal">
        <table id="datatable" class="mdl-data-table">
                <thead style="background-color: #394867; color: white;">
                    <th>ID</th>
                    <th >Name</th>
                    <th >Department</th>
                    <th >Mode of payment</th>
                    <th >Reciept no.</th>
                    <th >Contribution</th>
                    <th >Actions</th>
                </thead>
                <tbody>

                    <?php
                      include "connect.php";
                      $sql="select * from faculty";
                      $result=mysqli_query($con,$sql);
                      while($row=mysqli_fetch_array($result))
                          {
                            ?>
                            <tr>
                            <td><?php echo $row[0]; ?></td>
                            
                            <td  ><?php echo $row[1]; ?></td>
                            
                            <td  ><?php echo $row[2]; ?></td>

                            <td ><?php echo $row[3]; ?></td>

                            <td ><?php echo $row[4]; ?></td>
                            <td ><?php echo $row[7]; ?></td>
                            
                            <td >
                            <form action="faculty_reg_coupon.php" method="POST">

<input type="hidden" name="id" value="<?php echo $row[0]; ?>">
<input type="hidden" name="name" value="<?php echo $row[1]; ?>">
<input type="hidden" name="department" value="<?php echo $row[2]; ?>">
<input type="hidden" name="mode_of_payment" value="<?php echo $row[3]; ?>">
<input type="hidden" name="contribution" value="<?php echo $row[5]; ?>">

<div class="row">
    <label for="add">Additional</label>
    <input type="text" placeholder="add_contribution" name="add_contribution" style="margin: 3px 0; padding: 5px;" value="<?php echo $row[6]; ?>">
    </div>
    <div class="row">
    <label for="add">coupon</label>
    <input type="text" placeholder="coupon" name="coupon" style="margin: 3px 0; padding: 5px;" value="<?php echo $row[8]; ?>">
    </div>
    <input type="submit" class="createAc" value="Submit" style="padding: 5px;" >
</form>    
                            </td>
                           
                            <?php
                    echo '</tr>';
                          }   
                      ?>   
                    
                </tbody>
            </table>
        </div>


    </main>


<script>
        function nav_button() {
            var nav_button = document.getElementById("nav_button");
            var nav = document.getElementById("nav");

            if (nav.style.display == "block") {
                nav.style.display = "none";
                nav_button.style.transform = "rotate(90deg)";
            } else {
                nav.style.display = "block";
                nav_button.style.transform = "rotate(0deg)";
            }
        }
    </script>



<script>
$(document).ready(function() {
    dTable=$('#datatable').DataTable( {
        "order": [[ 0, "desc" ]],
        responsive: true,
        "dom":"lrtip"
    } );
} );

$('#search').keyup(function(){  
        dTable.search($(this).val()).draw(); 
   })
</script>

<script src="modal-nav.js"></script>

</body>

</html>

