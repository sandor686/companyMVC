<?php
namespace app\model;

    class Employee {
        private int $id;
        private string $firstName;
        private string $lastName;
        private int $categoryId;
        private int $salary;
        private string $jobStart;
        private bool $status;

        //id nem szerepel a konstruktorban
        function __construct(string $firstName, string $lastName, int $categoryId, int $salary, string $jobStart, bool $status){
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->categoryId = $categoryId;
            $this->salary = $salary;
            $this->jobStart = $jobStart;
            $this->status = $status;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getFirstName() 
        {
            return $this->firstName;
        }

        public function getLastName()
        {
            return $this->lastName;
        }

        public function getCategoryId()
        {
            return $this->categoryId;
        }

        public function getSalary()
        {
            return $this->salary;
        }

        public function getJobStart()
        {
            return $this->jobStart;
        }

        public function getStatus()
        {
            return $this->status;
        }
    }
?>
