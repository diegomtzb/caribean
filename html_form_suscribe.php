<?php
include('db.php');
$srEmail = $_POST['srEmail'];
mysqli_query($conn,"INSERT INTO suscriptores (email)
                    VALUES ('" . $srEmail . "')");
mysqli_close($conn);
?>