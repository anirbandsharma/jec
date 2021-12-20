<?php
include('connect.php');

$phone = $_POST["phone"];
$name = $_POST["name"];
$dept =  empty($_POST['department']) ? null : $_POST["department"];
$contribution = $_POST["contribution"];
$add_contribution = empty($_POST['add_contribution']) ? '0' : $_POST['add_contribution'];
$total = $contribution + $add_contribution;
$coupon = empty($_POST['coupon']) ? '0' : $_POST['coupon'];
$role= "faculty";



				$query = "INSERT INTO `faculty` (`id`, `phone`, `name`, `department`, `contribution`, `add_contribution`, `total`, `coupon`) VALUES (NULL, '$phone', '$name', '$dept', '$contribution', '$add_contribution', '$total', '$coupon')  ON DUPLICATE KEY UPDATE   
				`add_contribution`= '$add_contribution', `total` = '$total', `coupon` = '$coupon'  ";

				if (mysqli_query($con, $query)) {
					mysqli_query( $con,  "INSERT INTO `first_day` (`id`, `email`, `phone`, `name`, `address`, `yop`, `branch`, `chapter`, `contribution`, `add_contribution`, `total`, `reg_date`, `coupon`, `remarks`, `role`) VALUES (null, null, '$phone', '$name', null, null, '$dept', null, '$contribution', '$add_contribution', '$total', CURRENT_TIMESTAMP(), '$coupon', null, '$role')  ON DUPLICATE KEY UPDATE   
                    `add_contribution`= '$add_contribution', `reg_date`='$date', `total` = '$total', `coupon` = '$coupon' ");

					header("location:faculty_reg.php");
				} else {
					echo mysqli_error($con);
				}
            
?>
