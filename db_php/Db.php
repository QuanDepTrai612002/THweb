<?php 
class Db{
    public  $conn;
    function __construct(){
       $this->conn = new PDO("mysql:host=localhost;dbname=fastfood","root","");
        $this->conn->query('set names utf8');
    }
    //select
    protected function select($sql, $params = array()){
        //var_dump($params);exit;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //insert
    protected function insert($sql, $params = array()){
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $this->conn->lastInsertId();
    }
   
    protected function updateTable($sql, $params = array()){
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount();
    }
}
?>