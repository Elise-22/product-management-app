<?php
namespace Repositories;

use Interfaces\IOrder;
use PDO;

class OrderRepository implements IOrder
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function GetInvoice()
    {
        $query = "SELECT 
                    inv.inv_number,
                    CONCAT(
                        cus.cus_fname, ' ',
                        IF(cus.cus_initial IS NOT NULL AND cus.cus_initial != '', CONCAT(cus.cus_initial, '. '), ''),
                        cus.cus_lname
                    ) AS full_name,
                    inv.inv_date,
                    inv.inv_subtotal,
                    inv.inv_tax,
                    inv.inv_total
                FROM customer AS cus
                INNER JOIN invoice AS inv
                    ON cus.cus_code = inv.cus_code;";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

}
