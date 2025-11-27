<?php
require_once '../../Data/Database.php';
require_once '../../Interfaces/ICustomer.php';
require_once '../../Repositories/CustomerRepository.php';

use Data\Database;
use Repositories\CustomerRepository;

// Create DB connection using Singleton
$database = Database::getInstance();
$db = $database->getConnection();

// Create repository
$orderRepo = new CustomerRepository($db);

// Fetch data
$stmt = $orderRepo->GetAllCustomers();
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers - Product Management</title>
    <link rel="icon" href="../assets/img/products.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/order.css">

</head>
<body>

    <?php include '../includes/sidebar.php'; ?>

    <div class="container">
        <header class="header">
            <div class="header-top">
                <h1>Customers</h1>
                <div class="current-date">
                    <?php echo date('d M Y'); ?>
                </div>
            </div>
            <p class="subtitle">Browse and manage your customer list</p>
        </header>

        <main class="main-content">
            <?php if (!empty($customers)): ?>
                <div class="table-wrapper">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Customer Code</th>
                                <th>Full Name</th>
                                <th>Area Code</th>
                                <th>Phone</th>
                                <th>Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($customers as $customer): ?>
                                <tr class="customer-row">
                                    <td><?php echo htmlspecialchars($customer['cus_code']); ?></td>
                                    <td><?php echo htmlspecialchars($customer['full_name']); ?></td>
                                    <td><?php echo htmlspecialchars($customer['cus_areacode']); ?></td>
                                    <td><?php echo htmlspecialchars($customer['cus_phone']); ?></td>
                                    <td class="amount">&#8369;<?php echo number_format($customer['cus_balance'], 2); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="table-footer">
                    <p class="record-count">Total Records: <?php echo count($customers); ?></p>
                </div>
            <?php else: ?>
                <div class="empty-state">
                    <div class="empty-icon">📦</div>
                    <h2>No Customers Found</h2>
                    <p>There are currently no customer records to display.</p>
                </div>
            <?php endif; ?>
        </main>
    </div>
</body>
<script src="../assets/js/sidebar.js"></script>
</html>
