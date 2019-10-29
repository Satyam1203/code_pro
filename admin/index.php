<?php
    session_start();
    if(isset($_SESSION['user']) && !(isset($_SESSION['admin']))){
        echo "<script>window.location='../home.php'</script>";
    }else if(!(isset($_SESSION['user'])) || !(isset($_SESSION['admin']))){
        echo "<script>window.location='../index.html'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/15e3edaa10.js" crossorigin="anonymous"></script>
    <script src="jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <h1><i class="fas fa-code"></i> Code Pro</h1>
        <nav>
            <ul>
                <li><a class="btn" href="index.php">Home</a></li>
                <li><a class="btn" href="">Add users</a></li>
                <li><a class="btn" href="#">Workshops</a></li>
                <li><a class="btn" href="../logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="App">
        <div class="form"></div>
        <h3>Add new User</h3>
        <form method="POST" action="" style="text-align:center">
            <input type='text' name='add_user' placeholder='Email' />
            
            <input type='submit' value='Add' />
            
        </form>
        <div class="form"></div>
    </div>

    <?php
        if(isset($_REQUEST['add_user'])){

            $email = $_REQUEST['add_user'];
            $rand_pwd = rand(100000,999999);

            $dsn= "mysql:host=localhost;dbname=code_pro";
            $pdo = new PDO($dsn,'root','');

            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

            $q = "INSERT into credentials values (?,?)";
            $stmt = $pdo->prepare($q);
            $stmt->execute([$email,md5($rand_pwd)]);

            if($stmt->rowCount()){
                echo "New user $email added";
                require("../sendgrid-php/sendgrid-php.php");
                // https://github.com/sendgrid/sendgrid-php/releases
                $email = new \SendGrid\Mail\Mail(); 
                $email->setFrom("codepro@gecraipur.ac.in", "Code Club GECR");
                $email->setSubject("New account created.");
                $email->addTo("thesarcastics123@gmail.com", "user@codepro");
                $email->addContent(
                    "text/html", "<p>Your username is your email and password is $rand_pwd<br><strong>Log in to http://www.gecrcoders.ml</strong></p>"
                );
                $sendgrid = new \SendGrid('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');
                try {
                    $response = $sendgrid->send($email);
                    if($response->statusCode() == 202){
                        echo "<p style='color:green'><br>Mail sent</p>";
                    }else{
                        echo "<p style='color:red'><br>Failed sending mail</p>";
                    }
                    // print_r($response->headers());
                    // print $response->body() . "\n";
                } catch (Exception $e) {
                    echo 'Caught exception: '. $e->getMessage() ."\n";
                }
            }
            else{
                echo "<p style='color:red'>Failed adding user</p>";
            }


        }

    ?>
</body>
</html>