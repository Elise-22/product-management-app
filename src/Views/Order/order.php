<?php
require_once '../../Data/Database.php';
require_once '../../Interfaces/IOrder.php';
require_once '../../Repositories/OrderRepository.php';

use Data\Database;
use Repositories\OrderRepository;

// Create DB connection using Singleton
$database = Database::getInstance();
$db = $database->getConnection();

// Create repository
$orderRepo = new OrderRepository($db);

// Fetch data
$stmt = $orderRepo->GetInvoice();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="icon" href="../assets/img/products.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/order.css">

</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h2>Menu</h2>
        </div>
        <nav class="sidebar-nav">
            <a href="#" class="nav-item active">
                <span class="nav-icon"><img src="../assets/img/orders.png" height="30px" width="30px"></span>
                <span class="nav-text">Orders</span>
            </a>
        </nav>
    </div>

    <div class="container">
        <header class="header">
            <div class="header-top">
                <h1>Orders</h1>
                <div class="current-date">
                    <?php echo date('d M Y'); ?>
                </div>
            </div>
            <p class="subtitle">Manage and view all your invoices</p>
        </header>

        <main class="main-content">
            <?php if (!empty($orders)): ?>
                <div class="table-wrapper">
                    <table class="orders-table">
                        <thead>
                            <tr>
                                <th>Invoice #</th>
                                <th>Customer Name</th>
                                <th>Date</th>
                                <th>Sub Total</th>
                                <th>Tax</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order): ?>
                                <?php
                                    $date = new DateTime($order['inv_date']);
                                ?>
                                <tr class="order-row">
                                    <td class="invoice-id"><?php echo htmlspecialchars($order['inv_number']); ?></td>
                                    <td><?php echo htmlspecialchars($order['full_name']); ?></td>
                                    <td><?php echo htmlspecialchars($date->format('d M Y')); ?></td>
                                    <td class="amount">&#8369;<?php echo number_format($order['inv_subtotal'], 2); ?></td>
                                    <td class="amount">&#8369;<?php echo number_format($order['inv_tax'], 2); ?></td>
                                    <td class="amount total-amount">&#8369;<?php echo number_format($order['inv_total'], 2); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="table-footer">
                    <p class="record-count">Total Records: <?php echo count($orders); ?></p>
                </div>
            <?php else: ?>
                <div class="empty-state">
                    <div class="empty-icon">📦</div>
                    <h2>No Orders Found</h2>
                    <p>There are currently no invoices to display.</p>
                </div>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>
