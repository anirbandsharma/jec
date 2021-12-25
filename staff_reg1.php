<?php
include('connect.php');

$phone = $_POST["phone"];
$name = $_POST["name"];
$contribution = $_POST["contribution"];
$coupon = empty($_POST['coupon']) ? '0' : $_POST['coupon'];
$role= "staff";



				$query = "INSERT INTO `staff` (`id`, `name`, `amount`, `phone`, `coupon`) VALUES (NULL, '$name', '$contribution', '$phone', '$coupon')  ON DUPLICATE KEY UPDATE   
				`amount`= '$contribution', `coupon` = '$coupon'  ";

				if (mysqli_query($con, $query)) {
					

					header("location:staff_reg.php");
				} else {
					echo mysqli_error($con);
				}
            
?>
