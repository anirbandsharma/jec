<?php
include('connect.php');

$phone = $_POST["phone"];
$name = $_POST["name"];
$contribution = $_POST["contribution"];
$coupon = empty($_POST['coupon']) ? '0' : $_POST['coupon'];
$role= "staff";



				$query = "INSERT INTO `staff` (`id`, `name`, `amount`, `phone`, `coupon`) VALUES (NULL, '$name', '$contribution', '$phone', '$coupon')  ON DUPLICATE KEY UPDATE   
				`contribution`= '$contribution', `coupon` = '$coupon'  ";

				if (mysqli_query($con, $query)) {
					mysqli_query( $con,  "INSERT INTO `first_day` (`id`, `email`, `phone`, `name`, `address`, `yop`, `branch`, `chapter`, `contribution`, `add_contribution`, `total`, `reg_date`, `coupon`, `remarks`, `role`) VALUES (null, null, '$phone', '$name', null, null, null, null, '$contribution', null, '$contribution', CURRENT_TIMESTAMP(), '$coupon', null, '$role')  ON DUPLICATE KEY UPDATE   
                    `contribution`= '$contribution', `reg_date`=CURRENT_TIMESTAMP(), `total` = '$contribution', `coupon` = '$coupon' ");

					header("location:staff_reg.php");
				} else {
					echo mysqli_error($con);
				}
            
?>
