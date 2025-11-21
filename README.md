# LabSheet17

A small PHP project demonstrating a basic structure with a data layer, repository, interfaces and a view for an `Order` feature.

## Prerequisites

- PHP (7.4+ recommended)
- XAMPP (Apache + PHP) for Windows
- A browser

## Installation & Run

1. Place the project folder at `C:\xampp\htdocs\NameOfFolder`.
2. Start Apache (and MySQL if you need the database) using XAMPP Control Panel.
3. Open in your browser: `http://localhost/Commissions/LabSheet17/index.php`.

If the app uses a database, update connection settings in `src/Data/Database.php`.

## Project Structure

- `index.php`: Application entry point.
- `src/Data/Database.php`: Database connection helper.
- `src/Interfaces/IOrder.php`: Order interface definition.
- `src/Repositories/OrderRepository.php`: Repository for order data.
- `src/Views/Order/order.php`: Order view.
- `src/Views/assets/`: CSS and image assets (see `css/order.css`).
