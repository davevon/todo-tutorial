<?php
include "includes/config.php";
session_start();
if (!isset($_SESSION["user_email"])) {

    header("Location: index.php");
    die();
}


if (!isset($_POST["addTodo"])) {
    $titles = mysqli_real_escape_string($cconn,$_POST["title"]);
    $desc = mysqli_real_escape_string($cconn,$_POST["desc"]);

    //get user_id
    $sql = "SELECT id FROM users WHERE email = {$_SESSION["user_email"]}";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    if ($count > 0 ) {  
    $row   = mysqli_fetch_array($result);
        $user_id =$row(["id"]);
    }
    else {
        $user_id = 0;
}





?>
<!doctype html>
<html lang="en">

<head>
    <?php echo getHead(); ?>
</head>

<body class="bg-light">
    <?php getHeader(); ?>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card bg-white rounded border shadow"></div>
                <div class="card-header px-4">
                    <h4 class="card-title"> Add Todo</h4>

                </div>
                <div class="card-body px-4 py-3">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="title" class="form-label">
                                <Title></Title>
                            </label>
                            <input required type="text" class="form-control" id="text" name="title" placeholder="eg. Create a program">

                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Description</label>
                            <textarea required class="form-control" name="desc" id="desc" cols="3" rows="3"></textarea>
                        </div>
                        <div>

                            <button type="submit" name="addTodo" class="btn btn-primary me-2">Add Todo</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>