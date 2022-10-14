<?php
include "includes/config.php";
session_start();
if (!isset($_SESSION["user_email"])) {

    header("Location: index.php");
    die();
}
?>


<!doctype html>
<html lang="en">

<head>
    <?php echo getHead(); ?>
</head>

<body>
   <?php getHeader(); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>