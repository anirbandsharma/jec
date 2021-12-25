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
      <h3>  Arrived Alumni (26 dec)</h3>

    <center>
    <div class="search">
                <input type="text" id="search" placeholder="Type here to Search...">
            </div>
    </center>

        <div id="myModal" class="modal">
        <table id="datatable" class="mdl-data-table">
                <thead style="background-color: lightgray;">
                    <th style="text-align:center; width:2%;">ID</th>
                    <th style="text-align:center; width:14%;">Name</th>
                    <th style="text-align:center; width:12%;">E-mail</th>
                    <th style="text-align:center; width:10%;">Phone</th>
                    <th style="text-align:center; width:10%;">Chapter</th>
                    <th style="text-align:center; width:10%;">Total Contribution</th>
                    <th style="text-align:center; width:10%;">Date</th>
                    <th style="text-align:center; width:10%;">Coupon</th>
                </thead>
                <tbody>

                    <?php
                      include "connect.php";
                      $sql="select * from first_day where role ='alumni'";
                      $result=mysqli_query($con,$sql);
                      while($row=mysqli_fetch_array($result))
                          {
                            ?>
                            <tr>
                            <td style="text-align:center; width:2%;"><?php echo $row[0]; ?></td>
                            
                            <td style="text-align:center; width:14%;" ><?php echo $row[3]; ?></td>
                            
                            <td style="text-align:center; width:12%;" ><?php echo $row[1]; ?></td>
                            
                            <td style="text-align:center; width:10%;<?php if($row[2] == "") {echo 'background-color:rgba(160, 4, 4, 0.314);';} ?>" ><?php echo $row[2]; ?></td>
                            

                            <td style="text-align:center; width:10%;" ><?php echo $row[7]; ?></td>
                            
                            
                            
                            
                            <td style="text-align:center; width:10%;" ><?php echo $row[10]; ?></td>
                            
                            <td style="text-align:center; width:10%;" ><?php echo $row[11]; ?></td>
                            <td style="text-align:center; width:10%;" ><?php echo $row[12]; ?></td>

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

