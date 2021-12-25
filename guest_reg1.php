<?php
include('connect.php');

$phone = $_POST["phone"];
$name = $_POST["name"];
$contribution = empty($_POST['contribution']) ? '0' : $_POST["contribution"];
$coupon = empty($_POST["coupon"]) ? '0' : $_POST["coupon"];
$remarks = $_POST["remarks"];
$role= "guest";



				$query = "INSERT INTO `guest` (`id`, `phone`, `name`, `contribution`, `coupon`, `remarks`) VALUES (NULL, '$phone', '$name', '$contribution', '$coupon', '$remarks')  ON DUPLICATE KEY UPDATE `coupon` = '$coupon'  ";

				if (mysqli_query($con, $query)) {
					mysqli_query( $con,  "INSERT INTO `first_day` (`id`, `email`, `phone`, `name`, `address`, `yop`, `branch`, `chapter`, `contribution`, `add_contribution`,  `reg_date`, `coupon`,`remarks`, `role`) VALUES (null, null, '$phone', '$name', null, null, null, null, '$contribution', null, '$contribution', CURRENT_TIMESTAMP(), $coupon, '$remarks', '$role')  ON DUPLICATE KEY UPDATE   
                       `coupon` = '$coupon' ");

					header("location:guest_reg.php");
				} else {
					echo mysqli_error($con);
				}
            
?>
