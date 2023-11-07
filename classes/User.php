<?php

//session_start();
error_reporting(E_ALL);

include_once "Db.php";


class User extends Db{
 
      public function insertUsers($user_name,$user_email,$user_password){


       //check if email is in the data base
                   $sql="SELECT * FROM user WHERE user_email= ?";
               $stmt = $this->connect()->prepare($sql);
                   $stmt->bindParam(1,$user_email,PDO::PARAM_STR);
                   $stmt->execute();
                   $user_count = $stmt->rowCount();

                   //greater than zero
                   if($user_count>0){
                    $_SESSION["logerror"]="error, email already exist in the databse";
                    header("location:../signup.php");
                         die();
                   }else{
                        $sql = "INSERT INTO user (user_name,user_email,user_password)VALUES(?,?,?)";
                        $stmt = $this->connect()->prepare($sql);
                        $stmt->bindParam(1,$user_name,PDO::PARAM_STR);
                        $stmt->bindParam(2,$user_email,PDO::PARAM_STR);
                        $stmt->bindParam(3,$user_password,PDO::PARAM_STR);
                       
                       
                       
                        $customersInserted = $stmt->execute();
                        return $customersInserted;
                           
                        
                   }
                   //email does 

      }


      //login

      public function login($user_email,$user_password){
            //check if email is in db

            $sql = "SELECT * FROM user WHERE user_email = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(1,$user_email,PDO::PARAM_STR);
            $stmt->execute();
            $user_count = $stmt->rowCount();

            //if it is in db 
            if($user_count <1){
                  
                        return false;
                        die();
            }
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

      $password_matches = password_verify($user_password,$user["user_password"]);

        if($password_matches){
                  $_SESSION["user_id"] = $user["user_id"];
                  header("location:../profile.php");

                  die();
        }else{
            return false;
        }
        return"Either email or password is not correct";
        die();
  }


         //fecth user profile picture;
         public function fetch_user_details($user_id){
            $sql = "SELECT * FROM user WHERE user_id = ?";
            $stmt =$this->connect()->prepare($sql);
            $stmt->bindParam(1,$user_id,PDO::PARAM_STR);
            $stmt->execute();
            $user_details =$stmt->fetch(PDO::FETCH_ASSOC);

            return $user_details;


      }

             //upload profile;
             public function upload_profile_image($user_dp,$user_id){
                 
                  $sql = "UPDATE user SET user_dp = ? WHERE user_id = ?";

                  $stmt = $this->connect()->prepare($sql);

                  $stmt->bindParam(1,$user_dp,PDO::PARAM_STR);
                  $stmt->bindParam(2,$user_id, PDO::PARAM_INT);

                    $response = $stmt->execute();

                    if($response){
                        return true;

                    }else{
                        return false;
                    }

            }
            //fetching all adverts
// public function fetch_all_user_advert($user_id){
//       $sql ="SELECT * FROM adverts WHERE ads_user_id=?";
//       $stmt = $this->connect()->prepare($sql);
//       $stmt->bindParam(1,$user_id,PDO::PARAM_INT);
//       $stmt->execute();
//       $adverts = $stmt->fetchAll(PDO::FETCH_ASSOC);
//       return $adverts;
//   }
            
  public function update_profile($user_name,$user_id){
                 
    $sql = "UPDATE user SET user_name = ? WHERE user_id = ?";

    $stmt = $this->connect()->prepare($sql);

    $stmt->bindParam(1,$user_name,PDO::PARAM_STR);
    $stmt->bindParam(2,$user_id,PDO::PARAM_INT);
   

      $response = $stmt->execute();

      return $response;

}


public function update_password($user_password,$user_id){
                 
  $sql = "UPDATE user SET user_password = ? WHERE user_id = ?";

  $stmt = $this->connect()->prepare($sql);

  $stmt->bindParam(1,$user_password,PDO::PARAM_STR);
  $stmt->bindParam(2,$user_id,PDO::PARAM_INT);
 

    $response = $stmt->execute();

    return $response;

}

}

// $upload = new User();
// $upload1 = $upload->update_profile("Kayode Johnson",3);

// echo $upload1;
 

//     $user1 = new User();
//   $response = $user1->insertUsers("michael","success","michaelsuccess553@gmail.com","9011111","password");
//   echo $response;

//    $user1 = new User();
//    $login1 = $user1->login("michaelsuccess553@gmail.com","password");
//   echo $login1;

//     $userr = new User();
//     echo "<pre>";
//        print_r($userr->fetch_user_details(5));
//        echo "</pre>";
?>