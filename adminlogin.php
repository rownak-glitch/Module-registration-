<?php
if (isset($_POST['login'])){
    require 'dbh.inc.php';

    $adminid =$_POST['aid'];
    $password =$_POST['pwd'];

    if(empty($adminid)||empty($password)){
        header("Location:index.php?error=emptyfields");
        exit();
    }
    else{
        $sql =" SELECT * from admin ";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$Sql)){
            header("Location:showdata.php?login=success");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$adminid);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);
            if($row=mysqli_fetch_assoc($result)){
                $pwdcheck=password_verify($password,$row['pwd']);
                if($pwdcheck== false){
                    header("Location:index.php?error=wrongpwd");
                    exit();
                }
                else if($pwdcheck==true){
                    session_start();
                    $_SESSION['adminID']=$row['aid'];
                    $_SESSION['adname']=$Row['adminid'];
                    header("Location:showdata.php?login=success");
                    exit();
                }
                else{
                    header("Location:index.php?error=wrongpwd");
                    exit();

                }

                }

            
            else {
                header("Location:index.php?error=nouser");
                exit();
            }
        }
    }






}
else{
    header("Location:index.php");
    exit();
}