<?php 
class Login extends Db{
    function all(){
        return $this->select("select * from users");
    }
    function checkLogin(){
        return $this->select("select username,password,role from users");
    }
    function data($username,$pw){
        return $this->select("select * from users where username='$username' and password='$pw'");
    }
    function role($username,$pw){
        return $this->select("select role from users where username='$username' and password='$pw'");
    }
    function role2($username,$pw){
        $stmt = $this->conn->prepare("select * from users where username='$username' and password='$pw'");
        $stmt->execute();
        $result= $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq[0]['role'];

    }
    function insertData($username, $pw){
        return $this->insert("INSERT INTO users ( 'username','password') VALUES ('$username','$pw')");
    }
    function search($keySearch){
        return $this->select("SELECT * from product where product_name like ?", ["%$keySearch%"]);
      }
    function getById($id){
        return $this->select("select * from product where id=? ", [$id]);
    }
    function delete($id){
        return $this->updateTable("select * from product where id=?", [$id]);
    }

}