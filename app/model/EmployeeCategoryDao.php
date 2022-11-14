<?php
namespace app\model;
require_once('app\model\EmployeeCategory.php');
use app\_utils\Database as Db;

class EmployeeCategoryDao {

    public function getAllEmployeeCategory(){
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        $statement = $conn->prepare("SELECT * FROM employee_category WHERE deleted = 0 ORDER BY id");
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function save(){
        $name = $_POST['employeeCategory']['name'];
        $employeeCategoryObj = new EmployeeCategory($name);
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        
        try {
            $sql = "INSERT INTO employee_category(`name`) VALUES (:name);";
            $statement = $conn->prepare($sql);
            $statement->execute([
                ':name'=>$employeeCategoryObj->getName(),
            ]);
        } catch (\Throwable $th) {
            echo "Hiba történt!!!";
            //logolható, naplózhat
        }
    }

    public function getEmployeeCategoryById(int $id){
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        $statement = $conn->prepare("SELECT * FROM employee_category WHERE id =:id;");
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $statement->execute([
            ':id'=>$id,
        ]);
        return $statement->fetch();
    }

    public function update(int $id){
        $name = $_POST['employeeCategory']['name'];
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        $sql = "UPDATE employee_category SET `name` =:name WHERE `id` =:id;";
        $statement = $conn->prepare($sql);
        $statement->execute([
            ':name'=>$name,
            ':id'=>$id,
        ]);
    }

    public function delete(int $id){
        $dbObj = new Db();
        $conn = $dbObj->getConnection();
        $sql = "UPDATE employee_category SET `deleted` =1 WHERE id =:id";
        $statement = $conn->prepare($sql);
        $statement->execute([
            ':id'=>$id,
        ]);
    }
}
?>