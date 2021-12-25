<?php
include('connect.php');

$id = $_POST["id"];

$email = $_POST["email"];
$phone =  empty($_POST['phone']) ? null :  $_POST["phone"];
$name = $_POST["name"];
$chapter = $_POST["chapter"];
$address =  empty($_POST['address']) ? null :  $_POST["address"];
$occupation =  empty($_POST['occupation']) ? null : $_POST["occupation"];
$yop =  empty($_POST['yop']) ? null : $_POST["yop"];
$branch =  empty($_POST['branch']) ? null : $_POST["branch"];
$contribution = $_POST["contribution"];
$add_contribution = empty($_POST['add_contribution']) ? '0' : $_POST['add_contribution'];
$date = $_POST['date'];
$coupon = empty($_POST['coupon']) ? '0' : $_POST['coupon'];
$role = "alumni";



$query = "UPDATE `alumni` SET `add_contribution` = '$add_contribution', `coupon` = '$coupon' WHERE `alumni`.`id` = $id";

				if (mysqli_query($con, $query)) {
					

					header("location:viewalu.php");
				} else {
					echo mysqli_error($con);
				}

?>