<?php
include('connect.php');

$email =  empty($_POST['email']) ? null : $_POST["email"];
$phone =  empty($_POST['phone']) ? null :  $_POST["phone"];
$name = $_POST["name"];
$chapter =  empty($_POST['chapter']) ? null : $_POST["chapter"];
$address =  empty($_POST['address']) ? null :  $_POST["address"];
$occupation =  empty($_POST['occupation']) ? null : $_POST["occupation"];
$yop =  empty($_POST['yop']) ? null : $_POST["yop"];
$branch =  empty($_POST['branch']) ? null : $_POST["branch"];
$contribution = $_POST["contribution"];
$add_contribution = empty($_POST['add_contribution']) ? '0' : $_POST['add_contribution'];
$total = $contribution + $add_contribution;
$date = $_POST['date'];
$coupon = empty($_POST['coupon']) ? '0' : $_POST['coupon'];
$role = "alumni";




				$query = "INSERT INTO `alumni` (`id`, `email`, `phone`, `name`, `address`, `yop`, `branch`, `chapter`, `contribution`, `add_contribution`, `total`, `reg_date`, `coupon`) VALUES (null, '$email', '$phone', '$name', '$address', '$yop', '$branch', '$chapter', '$contribution', '$add_contribution', '$total', CURRENT_TIMESTAMP(), $coupon)  ON DUPLICATE KEY UPDATE   
				`contribution`= '$contribution', `add_contribution`= '$add_contribution', `reg_date`='$date', `total` = '$total', `coupon` = '$coupon'  ";

				if (mysqli_query($con, $query)) {
					mysqli_query( $con,  "INSERT INTO `first_day` (`id`, `email`, `phone`, `name`, `address`, `yop`, `branch`, `chapter`, `contribution`, `add_contribution`, `total`, `reg_date`, `coupon`, `remarks`, `role`) VALUES (null, '$email', '$phone', '$name', '$address', '$yop', '$branch', '$chapter', '$contribution', '$add_contribution', '$total', CURRENT_TIMESTAMP(), '$coupon', null, '$role')  ON DUPLICATE KEY UPDATE   
				`contribution`= '$contribution',`add_contribution`= '$add_contribution', `reg_date`='$date', `total` = '$total', `coupon` = '$coupon' ");

					header("location:alumni_reg.php");
				} else {
					echo mysqli_error($con);
				}
            
?>
