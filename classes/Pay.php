<?php

     error_reporting();
      require_once "Db.php";
   class Pay extends Db{

  public function insert_payment($payment_refcode,$payment_amount,$order_id,$payment_status,$payment_data,$payment_date){
        $sql= "INSERT INTO payment(payment_refcode,payment_amount,order_id, payment_status,payment_data,payment_date) VALUES(?,?,?,?,?,?)";
        $stmt=$this->connect()->prepare($sql);
        $stmt->bindParam(1,$payment_refcode,PDO::PARAM_STR);
        $stmt->bindParam(2,$payment_amount,PDO::PARAM_INT);
        $stmt->bindParam(3,$order_id,PDO::PARAM_INT);
        $stmt->bindParam(4,$payment_status,PDO::PARAM_STR);
        $stmt->bindParam(5,$payment_data ,PDO::PARAM_STR);
        $stmt->bindParam(6,$payment_date ,PDO::PARAM_STR);
       

        $record_inserted=$stmt->execute();
        return $record_inserted;

        if($record_inserted){
            echo true;
        }else{
                 echo false;
        }

}


}






?>