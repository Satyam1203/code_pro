<?php
    session_start();
    if(!(isset($_SESSION['user']))){
        echo "<script>window.location='../index.html'</script>";
    }
    $user = $_SESSION['user'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/15e3edaa10.js" crossorigin="anonymous"></script>
    <script src="../jquery.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1><i class="fas fa-code"></i> Code Pro</h1>
        <nav>
            <ul>
                <li><a class="btn" href="../home.php">Home</a></li>
                <li><a class="btn" href="#">Workshops</a></li>
                <li><a class="btn" href="change_pwd/changepwd.php">Change Password</a></li>
                <li><a class="btn" href="../logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="App">
        <h3>Change Password</h3>
        <form method="POST" action="">
            <label>Email id:</label>
            <input type='text' name='email' value='<?php echo $user ?>' readonly />
            
            <label>Existing Password:</label>
            <input type='password' name='pwd' placeholder='Password' />

            <label>New Password:</label>
            <input type='password' name='pwd_new' placeholder='Password' />

            <input type='submit' value='Submit' />
            
        </form>
    <?php 
        if(isset($_REQUEST['pwd']) && isset($_REQUEST['pwd_new'])){
            $email = $user;
            $pwd = md5($_REQUEST['pwd']);
            $pwd_new = md5($_REQUEST['pwd_new']);

            $dsn = "mysql:host=localhost;dbname=code_pro";
            $pdo = new PDO($dsn,'root','');
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

            $q = "UPDATE credentials SET pwd=? where email=? and pwd=?";
            $stmt = $pdo->prepare($q);
            $stmt->execute([$pwd_new,$email,$pwd]);

            $n=$stmt->rowCount();

            if($n){
                echo "<p style='color:green'>Password updated Successfully !!</p>";
            }else{
                echo "<p style='color:red'>Invalid password or Failed connecting to database :(</p>";
            }
        }
    ?>
    </div>
</body>
</html>