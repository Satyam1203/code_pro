<?php
    if($_REQUEST['ename']){
        $ename = $_REQUEST['ename'];
        $topic = $_REQUEST['topic'];
        $req = $_REQUEST['req'];

        $dsn = 'mysql:host=localhost;dbname=code_pro';
        $pdo = new PDO($dsn,'root','');
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

        $query = "INSERT INTO workshop values (?,?,?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([NULL,$ename,$topic,$req]);

        $n=$stmt->rowCount();
        if($n){
            echo "200";
        }else{
            echo "404";
        }
    }
?>