<?php


abstract class DbConnect implements Crud{

protected $pdo;
protected $id;
protected $datas;

function __construct($id){
    $this->pdo = new PDO(DATABASE, LOGIN, PASSWD);
    $this->id= $id;
}
function setDatas($request){
    $this->datas = $request;
   
}
abstract function selectAll();
abstract function select(int $id);
abstract function insert();
}




