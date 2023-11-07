<?php 
error_reporting(E_ALL);
include_once("Db.php");

class Category extends Db{

    public function add_category($category_name){
        $sql="SELECT * FROM brand_category WHERE cat_name =?";
        $stmt=$this->connect()->prepare($sql);
        $stmt->bindparam(1, $cat_name, PDO::PARAM_STR);
        $stmt->execute();
        $category_count=$stmt->rowCount();
        if($category_count > 0){
            header("location:../category_page.php");
            return "This category already exists";
            exit();
        }

        $sql="INSERT INTO brand_category(cat_name) VALUES(?)";
        $stmt=$this->connect()->prepare($sql);
        $stmt->bindParam(1,$cat_name, PDO::PARAM_STR);
        $feedback=$stmt->execute();
        return $feedback;

    }

    public function fetch_category(){
            // sql statement *SELECT * FROM category
        $sql= "SELECT * FROM brand_category";
        // prepare statement
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute();

        $category= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $category;
     
    }

    public function fetch_category_detail($cat_id){
        $sql="SELECT * FROM brand_category WHERE cat_id=?";
        $stmt=$this->connect()->prepare($sql);
        $stmt->bindParam(1,$cat_id,PDO::PARAM_INT);
        $stmt->execute();
        $category_count=$stmt->rowCount();
        if($category_count < 1){
            return false;
            exit();
        }else{
            $category=$stmt->fetch(PDO::FETCH_ASSOC);
            return $category;
        }
        
    }
    
    public function delete_category($cat_id){
        $sql="DELETE FROM brand_category WHERE cat_id=?";
        $stmt=$this->connect()->prepare($sql);
        $stmt->bindParam(1,$cat_id,PDO::PARAM_INT);
        $deleted=$stmt->execute();
        return $deleted;

    }

    public function update_category($cat_name,$cat_id){
        $sql="UPDATE brand_category SET cat_name=? WHERE cat_id=?";
        $stmt=$this->connect()->prepare($sql);
        $stmt->bindParam(1, $cat_name,PDO::PARAM_STR);
        $stmt->bindParam(2, $cat_id,PDO::PARAM_INT);
        $update=$stmt->execute();
        return $update;
    }
   
}

// $cat1= new Category();
// $category=$cat1->add_category("Bread");
// echo $category;
?>