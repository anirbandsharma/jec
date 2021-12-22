<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JEC Diamond Jubilee</title>
    <link rel="stylesheet" href="css/st.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
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
                <thead style="background-color: lightgray;">
                    <th>ID</th>
                    <th >Name</th>
                    <th >Department</th>
                    <th >Mode of payment</th>
                    <th >Reciept no.</th>
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
                            
                            <td >
                                
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

