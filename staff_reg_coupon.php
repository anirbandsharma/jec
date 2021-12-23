<?php
include('connect.php');

$id = $_POST["id"];
$name = $_POST["name"];
$contribution = $_POST["contribution"];
$phone = empty($_POST['phone']) ? NULL : $_POST['phone'];
$add_contribution = empty($_POST['add_contribution']) ? '0' : $_POST['add_contribution'];
$coupon = empty($_POST['coupon']) ? '0' : $_POST['coupon'];
$role= "staff";



				$query = "UPDATE `staff` SET `coupon` = '$coupon', `add_contribution` = '$add_contribution' WHERE `staff`.`id` = $id";

				if (mysqli_query($con, $query)) {
					if (mysqli_query( $con,  "INSERT INTO `first_day` (`id`, `email`, `phone`, `name`, `address`, `yop`, `branch`, `chapter`, `contribution`, `add_contribution`, `reg_date`, `coupon`, `remarks`, `role`) VALUES (NULL, NULL, '$phone', '$name', NULL, NULL, NULL, NULL, '$contribution', '$add_contribution', CURRENT_TIMESTAMP(), '$coupon', NULL, '$role')  ON DUPLICATE KEY UPDATE   `add_contribution` = '$add_contribution' , `reg_date`=CURRENT_TIMESTAMP(), `coupon` = '$coupon' ")){


					header("location:viewstaff.php");
                    }
else{
    echo mysqli_error($con);
}
				} else {
					echo mysqli_error($con);
				}
            
?>
