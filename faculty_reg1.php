<?php
include('connect.php');

$name = $_POST["name"];
$dept =  empty($_POST['department']) ? null : $_POST["department"];
$mode_of_payment =  empty($_POST['mode_of_payment']) ? null : $_POST["mode_of_payment"];
$reciept_no =  empty($_POST['reciept_no']) ? null : $_POST["reciept_no"];
$contribution = $_POST["contribution"];
$add_contribution = empty($_POST['add_contribution']) ? '0' : $_POST['add_contribution'];
$coupon = empty($_POST['coupon']) ? '0' : $_POST['coupon'];
$role= "faculty";



				$query = "INSERT INTO `faculty` (`id`, `name`, `department`, `mode_of_payment`, `reciept_no`, `amount`, `add_contribution`,  `coupon`) VALUES (NULL, '$name', '$dept', '$mode_of_payment', '$reciept_no', '$contribution', '$add_contribution',  '$coupon')  ON DUPLICATE KEY UPDATE   
				`add_contribution`= '$add_contribution', `coupon` = '$coupon'  ";

				if (mysqli_query($con, $query)) {
					header("location:faculty_reg.php");
				} else {
					echo mysqli_error($con);
				}
            
?>
