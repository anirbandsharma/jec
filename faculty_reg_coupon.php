<?php
include('connect.php');

$id = $_POST["id"];
$name = $_POST["name"];
$dept =  $_POST["department"];
$contribution = $_POST["contribution"];
$coupon = empty($_POST['coupon']) ? '0' : $_POST['coupon'];
$mode_of_payment = $_POST["mode_of_payment"];
$role= "faculty";



				$query = "UPDATE `faculty` SET `coupon` = '$coupon' WHERE `faculty`.`id` = $id";

				if (mysqli_query($con, $query)) {
					if (mysqli_query( $con,  "INSERT INTO `first_day` (`id`, `email`, `phone`, `name`, `address`, `yop`, `branch`, `chapter`, `contribution`, `add_contribution`, `total`, `reg_date`, `coupon`, `remarks`, `role`) VALUES (NULL, NULL, NULL, '$name', NULL, NULL, '$dept', NULL, '$contribution', NULL, '$contribution', CURRENT_TIMESTAMP(), '$coupon', '$mode_of_payment', '$role')  ON DUPLICATE KEY UPDATE  `reg_date`=CURRENT_TIMESTAMP(), `coupon` = '$coupon' ")){


					header("location:viewfac.php");
                    }
else{
    echo mysqli_error($con);
}
				} else {
					echo mysqli_error($con);
				}
            
?>
