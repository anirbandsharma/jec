<?php
include('connect.php');

$id = $_POST["id"];
$name = $_POST["name"];
$dept =  $_POST["department"];
$contribution = $_POST["contribution"];
$add_contribution = empty($_POST['add_contribution']) ? '0' : $_POST['add_contribution'];
$coupon = empty($_POST['coupon']) ? '0' : $_POST['coupon'];
$mode_of_payment = $_POST["mode_of_payment"];
$role= "faculty";



				$query = "UPDATE `faculty` SET `coupon` = '$coupon', `add_contribution` = '$add_contribution' WHERE `faculty`.`id` = $id";

				if (mysqli_query($con, $query)) {
					header("location:viewfac.php");
				} else {
					echo mysqli_error($con);
				}
            
?>
