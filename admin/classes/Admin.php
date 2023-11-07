<?php
error_reporting(E_ALL);
include_once("Db.php");

class Admin extends Db{
    
    public function Admin_login($fullname,$admin_email,$admin_password){
        // email validation to check if email already exists
        $sql="SELECT * FROM admin WHERE admin_email = ?";
        $stmt=$this->connect()->prepare($sql);
        $stmt->bindParam(1,$admin_email,PDO::PARAM_STR);
        $stmt->execute();
        $admin_count=$stmt->rowCount();
        if($admin_count > 0){
            header("location:../profile.php");
            $_SESSION["logerror"]="Error, email already exist";
            exit();
        }

        $sql="INSERT INTO admin(fullname,admin_email,admin_password) VALUES(?,?,?)";

        $stmt=$this->connect()->prepare($sql);
        $stmt->bindParam(1,$fullname,PDO::PARAM_STR);
        $stmt->bindParam(1,$admin_email,PDO::PARAM_STR);
        $stmt->bindParam(2,$admin_password,PDO::PARAM_STR);

        $result=$stmt->execute();
        return $result;
        header("location:..profile.php");
    }

    //SIGNUP METHOD
    public function singup_admin($fullname, $admin_email, $admin_password){
        ////////////$admin_password = password_hash($admin_password, PASSWORD_DEFAULT);
               //To check if the email already exist in the database.
               $sql = "SELECT * FROM admin WHERE admin_email = ?";
               $stmt = $this -> connect() -> prepare($sql);
               //using ordinal to bind.
               $stmt->bindparam(1, $admin_email, PDO::PARAM_STR);
               $stmt->execute();
               //The rowCount() is used to check the database if such email already exist in it.
               $admin_count = $stmt->rowCount();
               //IF admin_count is greater than 0, if means the admin already exist in the DB.
               if($admin_count > 0){
                   $_SESSION["logerror"]="Error, email already exist";
                   header("location:../signup.php");
                   exit();
               }
   
               //If it passed this stage above, it means the email doesn't exist. So we can now insert into DB Table.
               $sql = "INSERT INTO admin(fullname, admin_email, admin_password) VALUES (?, ?, ?)";
               $stmt = $this -> connect() -> prepare($sql);
               $stmt->bindparam(1, $fullname, PDO::PARAM_STR);
               $stmt->bindparam(2, $admin_email, PDO::PARAM_STR);
               $stmt->bindparam(3, $admin_password, PDO::PARAM_STR);
               
                   $insertedAdmin = $stmt -> execute();
                   return $insertedAdmin;       
   
           }
   

    public function login_admin($admin_email, $admin_password){
         // validation to check if email exists
         $sql="SELECT * FROM admin WHERE admin_email =?";
         $stmt=$this->connect()->prepare($sql);
         $stmt->bindparam(1, $admin_email, PDO::PARAM_STR);
         $stmt->execute();
         $admin_count=$stmt->rowCount();
         // if email is not in existence, rowCount will return 0
         if($admin_count < 1){
            $_SESSION["logerror"]="Either email or password is incorrect";
             exit();
         }
 
         $admin=$stmt->fetch(PDO::FETCH_ASSOC);
         $password_match=password_verify($admin_password, $admin["admin_password"]);
         
         if($password_match){
            $_SESSION["admin_id"] = $admin["admin_id"];
            header("location:../profile.php");

            die();
         }else{
            return false;
        }
        $_SESSION["logerror"]="Either email or password is incorrect";
        die();
    }
    //fecth admin profile picture;
    // public function fetch_details(){
    //     $sql = "SELECT * FROM admin WHERE admin_id = ?";
    //     $stmt=$this->connect()->prepare($sql);
    //     $stmt->bindParam(1,$admin_id,PDO::PARAM_STR);
    //     $stmt->execute();
    //     $admin_detail=$stmt->fetchAll(PDO::FETCH_ASSOC);
    //     return $admin_detail;
    // }

    // public function fetch_all_orders(){
    //     $sql="SELECT * FROM `order` ";
    //     $stmt=$this->connect()->prepare($sql);
    //     $stmt->execute();
    //     $orders=$stmt->fetchAll(PDO::FETCH_ASSOC);
    //     return $orders;
    // }
}

// $admin1= new Admin();
// $reply=$admin1->register_admin("laddidio@gmail.com", "123456789");
// echo $reply;
?>