<?php

namespace Repositories;

use Interfaces\ICustomer;
use PDO;

class CustomerRepository implements ICustomer
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function GetAllCustomers()
    {
        $query = "SELECT 
                    cus.cus_code,
                    CONCAT(
                        cus.cus_fname, ' ',
                        IF(cus.cus_initial IS NOT NULL AND cus.cus_initial != '', CONCAT(cus.cus_initial, '. '), ''),
                        cus.cus_lname
                    ) AS full_name,
                    cus.cus_areacode,
                    cus.cus_phone,
                    cus.cus_balance
                FROM customer AS cus;";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

}
