# LabSheet17 and LabSheet18

A PHP project demonstrating a layered architecture with data access, repositories, interfaces, and views for managing **Orders** and **Customers**.

## Prerequisites

- PHP (7.4+ recommended)
- XAMPP (Apache + PHP) for Windows
- MySQL (included with XAMPP)
- A modern web browser

## Installation & Run

1. Place the project folder at `C:\xampp\htdocs\Commissions\LabSheet17` (already present).
2. Start Apache and MySQL using XAMPP Control Panel.
3. Open in your browser: `http://localhost/Commissions/LabSheet17/index.php`.

If the app uses a database, update connection settings in `src/Data/Database.php`.

## Project Structure

### Core Layers

- **`index.php`**: Application entry point.
- **`src/Data/Database.php`**: Database connection helper.

### Interfaces

- **`src/Interfaces/IOrder.php`**: Order interface definition.
- **`src/Interfaces/ICustomer.php`**: Customer interface definition.

### Repositories

- **`src/Repositories/OrderRepository.php`**: Repository for order data access.
- **`src/Repositories/CustomerRepository.php`**: Repository for customer data access.

### Views

- **`src/Views/Order/order.php`**: Order management view.
- **`src/Views/Customer/customers.php`**: Customer management view.
- **`src/Views/includes/sidebar.php`**: Shared sidebar component.
- **`src/Views/assets/`**: CSS and image assets (see `css/order.css`).

## Architecture

This project follows the **Repository Pattern** with:
- **Interfaces** defining contracts for data access.
- **Repositories** implementing data retrieval and manipulation.
- **Views** handling UI presentation.
- **Database layer** providing connection management.

## License

MIT-style — feel free to modify for your needs.
