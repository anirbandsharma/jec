<?php
include('connect.php');

$phone = $_POST["phone"];
$name = $_POST["name"];
$contribution = $_POST["contribution"];
$add_contribution = empty($_POST['add_contribution']) ? '0' : $_POST['add_contribution'];
$coupon = empty($_POST['coupon']) ? '0' : $_POST['coupon'];
$role= "staff";



				$query = "INSERT INTO `staff` (`id`, `name`, `amount`,`add_contribution`, `phone`, `coupon`) VALUES (NULL, '$name', '$contribution','$add_contribution', '$phone', '$coupon')  ON DUPLICATE KEY UPDATE   
				`amount`= '$contribution', `coupon` = '$coupon'  ";

				if (mysqli_query($con, $query)) {
					header("location:staff_reg.php");
				} else {
					echo mysqli_error($con);
				}
            
?>
