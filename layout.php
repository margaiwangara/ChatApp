<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="home.php">ChatApp</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <?php 
                        if(isset($_SESSION['USERNAME']))
                            //display logout option
                            echo "<a href='logout.php'>Log Out</a>";
                        else
                            echo "<a href='registration.php'>Login | Sign Up</a>";
                    ?>
                </li>
            </ul>
        </div>
    </nav>

</body>
</html>