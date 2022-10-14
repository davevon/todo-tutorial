<?php
/* database connection fuction*/
$conn = dbConnect();
function dbConnect()
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "todo_list";


    $conn = mysqli_connect($hostname, $username, $password, $database) or die("Couldn't connect to database: " . $database . ".");


    return $conn;
}

/*    check email is valid or not fucntion*/
function emailIsValid($email)
{
    $conn = dbConnect();
    $sql = "SELECT email FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($result);

    if ($count > 0) {
        return 1;
    } else {
        return 0;
    }
}

/*    check login details is valid or not fucntion*/
function checkLoginDetails($email, $password)
{
    $conn = dbConnect();
    $sql = "SELECT email FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($result);

    if ($count > 0) {
        return 1;
    } else {
        return 0;
    }
}


/*    create user  fucntion*/
function createData($email, $password)
{
    $conn = dbConnect();
    $sql = "INSERT INTO users (email,password) VALUES('$email', '$password')";
    $result = mysqli_query($conn, $sql);
    return $result;
}


/*    create get head  fucntion*/
function getHead()
{
    $output = '<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<title>ToDo list - Davevon Craddock!</title>';

echo $output;
   
}

/*    create get header  fucntion*/
function getHeader()
{
    $output =  '<header class=" py-3 mb-4 border-bottom bg-white">
            <div class="d-flex flex-wrap justify-content-center container">
                <a href="todos.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <span class="fs-4">ToDo Management</span>
                </a>

                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="todos.php" class="nav-link active" aria-current="page">Home</a></li>
                    <li class="nav-item"><a href="add-todo.php" class="nav-link text-dark">add-todo</a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link bg-danger text-white">Logout</a></li>

                </ul>
                </div>
        </header>';

    echo $output;
}



?>

