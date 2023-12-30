<?php 
class Payment extends Db{
    function all($user_id){
        return $this->select("select * from payment where user_id=$user_id");
    }
    function tenKH(){
        return $this->select("SELECT ten FROM `payment` JOIN users ON payment.user_id=users.id");
    }
    function giaSP($product_code){
        return $this->select("SELECT DISTINCT buy_price FROM payment 
                                JOIN product on payment.product_code=product.product_code 
                                where product.product_code = '$product_code'");
    }
    function delete($id){
        return $this->updateTable("delete from payment where id=?", [$id]);
    }
    function deleteAll($id){
        return $this->updateTable("delete from payment where user_id=?", [$id]);
    }


}
?>