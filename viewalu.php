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
                    <th style="text-align:center; width:2%;">ID</th>
                    <th style="text-align:center; width:14%;">Name</th>
                    <th style="text-align:center; width:10%;">Phone</th>
                    <th style="text-align:center; width:10%;">Branch</th>
                    <th style="text-align:center; width:10%;">Batch</th>
                    <th style="text-align:center; width:10%;">Chapter</th>
                    <th style="text-align:center; width:12%;">Address</th>
                    <th style="text-align:center; width:7%;">Total Contribution</th>
                    <th style="text-align:center; width:12%;">First Day<br>Coupon</th>
                    <th style="text-align:center; width:13%;">Actions</th>
                </thead>
                <tbody>

                    <?php
                      include "connect.php";
                      $sql="select * from alumni";
                      $result=mysqli_query($con,$sql);
                      while($row=mysqli_fetch_array($result))
                          {
                            ?>
                            <tr>
                            <td style="text-align:center; width:2%;"><?php echo $row[0]; ?></td>
                            
                            
                            <td style="text-align:center; width:12%;" ><?php echo $row[3]; ?></td>
                            
                            <td style="text-align:center; width:10%;<?php if($row[2] == "") {echo 'background-color:rgba(160, 4, 4, 0.314);';} ?>" ><?php echo $row[2]; ?></td>
                            
                            <td style="text-align:center; width:10%;<?php if($row[6] == "") {echo 'background-color:rgba(160, 4, 4, 0.314);';} ?>" ><?php echo $row[6]; ?></td>
                            
                            <td style="text-align:center; width:10%;<?php if($row[5] == "") {echo 'background-color:rgba(160, 4, 4, 0.314);';} ?>" ><?php echo $row[5]; ?></td>

                            <td style="text-align:center; width:10%;" ><?php echo $row[7]; ?></td>
                            
                            <td style="text-align:center; width:12%;<?php if($row[4] == "") {echo 'background-color:rgba(160, 4, 4, 0.314);';} ?>" ><?php echo $row[4]; ?></td>
                            
                            
                            <td style="text-align:center; width:7%;" ><?php echo $row[10]; ?></td>
                            
                            <td style="text-align:center; width:7%;" ><?php echo $row[13]; ?></td>

                            <td style="text-align:center; width:13%;" >
                        <form action="alumni_reg_coupon.php" method="POST">

                        <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
                        <input type="hidden" name="email" value="<?php echo $row[1]; ?>">
                        <input type="hidden" name="phone" value="<?php echo $row[2]; ?>">
                        <input type="hidden" name="name" value="<?php echo $row[3]; ?>">
                        <input type="hidden" name="address" value="<?php echo $row[4]; ?>">
                        <input type="hidden" name="yop" value="<?php echo $row[5]; ?>">
                        <input type="hidden" name="branch" value="<?php echo $row[6]; ?>">
                        <input type="hidden" name="chapter" value="<?php echo $row[7]; ?>">
                        <input type="hidden" name="contribution" value="<?php echo $row[8]; ?>">
                        <input type="hidden" name="reg_date" value="<?php echo $row[11]; ?>">


                            <div class="row"></div>
                            <label for="add">additional</label>
                            <input type="text" name="add_contribution" placeholder="additional"  style="margin: 3px 0; padding: 5px;" value="<?php echo $row[9]; ?>">
                            </div>
                            <br> <br>
                            <div class="row">
                            <label for="add">coupon</label>
                            <input type="text" placeholder="coupon" name="coupon" style="margin: 3px 0; padding: 5px;" value="<?php echo $row[12]; ?>">
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

