<?php
    if($_REQUEST['name']){
        $name = $_REQUEST['name'];
        $link = $_REQUEST['link'];
        $issue = $_REQUEST['issue'];
        $user = $_REQUEST['user'];

        $dsn = 'mysql:host=localhost;dbname=code_pro';
        $pdo = new PDO($dsn,'root','');
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

        $query = "INSERT INTO  programming values (?,?,?,?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([NULL,$name,$link,$issue,$user]);

        $n=$stmt->rowCount();
        if($n){
            echo "200";
        }else{
            echo "404";
        }
    }
?>