<?php
if(isset($_POST['Register']))
{
    require 'dbh.inc.php';

    $username =$_POST['uid'];
    
    $email =$_POST['mail'];
    $slot =$_POST['slotlist'];
    

    if(empty($username)||empty($email))
    {
        header("Location: signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();

    }
    else if (!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        header("Location: signup.php?error=invalidemail&uid=".$username);
        exit();

    }
    else{
        $sql ="SELECT uidUsers FROM students WHERE uidUsers =?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location:signup.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck =mysqli_stmt_num_rows($stmt);
            if($resultcheck>0){
                header("Location:signup.php?error=usertaken&mail=".$email);
                exit();
            }
            else{
                $sql ="INSERT INTO students (uidUsers,emailUsers,slot) values (?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location:signup.php?error=sqlerror");
                    exit();
            }
            else{
                mysqli_stmt_bind_param($stmt,"sss",$username,$email,$slot);
                 mysqli_stmt_execute($stmt);
                 header("Location:success.php?signup=success");
                 exit();
            }
        }
    }
    
}
mysqli_stmt_close($stmt);
mysqli_close($conn);

}
else{
    header("Location:signup.php");
    exit();
}