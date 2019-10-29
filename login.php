<?php 

if( isset($_REQUEST['email']) && isset($_REQUEST['pwd']))
{
	$email = $_REQUEST['email'];
    $pwd = md5($_REQUEST['pwd']);
    $admin = isset($_REQUEST['admin'])?$_REQUEST['admin']:0;

    $con = new PDO("mysql:host=localhost;dbname=code_pro",'root','');
    $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    
    if($admin == 1){
        $q="SELECT * from admin where name=?";
    }else{
        $q= "SELECT * from credentials where email=?";
    }
	$stmt = $con->prepare($q);
	$stmt->execute([$email]);
    
    if($res = $stmt->fetchAll()){
    
        foreach($res as $r){
            if( $r->pwd == $pwd ){
                session_start();
                $_SESSION['user']=$email;
                if($admin==1){
                    $_SESSION['admin']=1;
                    echo "<script>window.location.href='admin/index.php'</script>";
                }
                echo "<script>window.location.href='home.php'</script>";
            }else{
                echo "<script>window.location.href='index.html'</script>";
            }
        }
    }else{
        echo "<script>window.location.href='index.html'</script>";
    }
}
else{
	echo "Fill email id and password field";
} 

?>