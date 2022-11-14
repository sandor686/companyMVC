<?php
namespace app\model;
require_once('app\_utils\Database.php');
require_once('app\model\Employee.php');
use app\_utils\Database as Db;

    class EmployeeDao {

        // FONTOS!!! Ha táblaösszekapcsolásnál azonosak az oszlopnevek (pld. id-id), akkor
        // nem biztos, hogy a jó helyről fogja szedni
        // Megoldás: behívatkozzuk a mezőket, majdnem teljes elérési úttal (táblanév.oszlopnév)
        public function getAllEmployee(){
            $dbObj = new Db();
            $conn = $dbObj->getConnection();
            $statement = $conn->prepare("SELECT e.id, e.first_name, e.last_name, e.salary, e.job_start, e.status, ec.name FROM employee as e INNER JOIN employee_category as ec ON e.category_id = ec.id;");
            $statement->setFetchMode(\PDO::FETCH_OBJ);
            $statement->execute();
            return $statement->fetchAll();
        }

        public function save(){
            $lastName = $_POST['employee']['lastName'];
            $firstName = $_POST['employee']['firstName'];
            $categoryId = $_POST['employee']['employeeCategory'];
            $salary = $_POST['employee']['salary'];
            $jobStart = $_POST['employee']['jobStart'];
            //Ha ki volt pipálva küldéskor, akkor van olyan változó, hogy $_POST['employee']['status'], ebben az esetben vegye fel az 1-es értéket, máskülönben a 0-t
            $status = isset($_POST['employee']['status']) ? 1 : 0;
            $employee = new Employee($firstName, $lastName, $categoryId, $salary, $jobStart, $status);
            $dbObj = new Db();
            $conn = $dbObj->getConnection();
            //:lastName :firstName stb. - paraméter indexek
            $sql = "INSERT INTO employee(`last_name`, `first_name`, `category_id`, `salary`, `job_start`, `status`) VALUES (:lastName, :firstName, :categoryId, :salary, :jobStart, :status);";
            $statement = $conn->prepare($sql);
            //bindolás (összekötés): összeköti a PHP-s változóinkat az SQL -es paraméterindexekkel 
            $statement->execute([
                ':lastName'=>$employee->getLastName(),
                ':firstName'=>$employee->getFirstName(),
                ':categoryId'=>$employee->getCategoryId(),
                ':salary'=>$employee->getSalary(),
                ':jobStart'=>$employee->getJobStart(),
                ':status'=>$employee->getStatus(),
            ]);
        }

        public function getEmployeeById(int $id){
            $dbObj = new Db();
            $conn = $dbObj->getConnection();
            $statement = $conn->prepare("SELECT e.id, e.first_name, e.last_name, e.salary, e.job_start, e.status,e.category_id, ec.name FROM employee as e INNER JOIN employee_category as ec ON e.category_id = ec.id WHERE e.id = :id;");
            $statement->setFetchMode(\PDO::FETCH_OBJ);
            $statement->execute([
                ':id'=>$id,
            ]);
            return $statement->fetch();
        }

        public function delete(int $id){
            $dbObj = new Db();
            $conn = $dbObj->getConnection();
            $sql = "DELETE FROM employee WHERE id =:id;";
            $statement = $conn->prepare($sql);
            $statement->execute([
                ':id'=>$id,
            ]);
        }

        public function update(int $id){
            $lastName = $_POST['employee']['lastName'];
            $firstName = $_POST['employee']['firstName'];
            $categoryId = $_POST['employee']['employeeCategory'];
            $salary = $_POST['employee']['salary'];
            $jobStart = $_POST['employee']['jobStart'];
            $status = isset($_POST['employee']['status']) ? 1 : 0;
            $employee = new Employee($firstName, $lastName, $categoryId, $salary, $jobStart, $status);
            $dbObj = new Db();
            $conn = $dbObj->getConnection();
            $sql = "UPDATE employee SET `last_name` =:lastName,`first_name` =:firstName,`category_id` =:categoryId,`salary` =:salary,`job_start` =:jobStart,`status` =:status WHERE `id` =:id;";
            $statement = $conn->prepare($sql);
            $statement->execute([
                ':lastName'=>$employee->getLastName(),
                ':firstName'=>$employee->getFirstName(),
                ':categoryId'=>$employee->getCategoryId(),
                ':salary'=>$employee->getSalary(),
                ':jobStart'=>$employee->getJobStart(),
                ':status'=>$employee->getStatus(),
                ':id'=>$id,
            ]);
        }

        public function getAllProgrammer(){
            $dbObj = new Db();
            $conn = $dbObj->getConnection();
            $statement = $conn->prepare("SELECT e.id, e.first_name, e.last_name, e.salary, e.job_start, e.status, ec.name FROM employee as e INNER JOIN employee_category as ec ON e.category_id = ec.id WHERE ec.name LIKE 'programozó';");
            $statement->setFetchMode(\PDO::FETCH_OBJ);
            $statement->execute();
            return $statement->fetchAll();
        }

    }
?>