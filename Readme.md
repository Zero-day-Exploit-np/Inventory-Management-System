# Inventory Management System

A web-based Inventory Management System built with Laravel that helps businesses manage products, categories, suppliers, purchases, sales, and stock levels efficiently.

## Features

### Authentication

- Secure Login & Logout
- User Registration
- Role-Based Access Control (Admin & Staff)

### Product Management

- Add, Edit, Delete Products
- Product Categories
- Product Images
- SKU Management
- Product Search

### Supplier Management

- Add, Edit, Delete Suppliers
- Supplier Information Management

### Inventory Management

- Stock Tracking
- Low Stock Alerts
- Purchase Records
- Sales Records

### Dashboard

- Total Products
- Total Categories
- Total Suppliers
- Current Stock Overview
- Sales Summary

### Reports

- Purchase Reports
- Sales Reports
- Profit Reports
- Inventory Reports

## Technology Stack

- Laravel 12
- PHP 8+
- MySQL
- Blade Templates
- Bootstrap 5
- Chart.js

## Database Structure

### Tables

- users
- categories
- products
- suppliers
- purchases
- sales

## Installation

### Clone Repository

```bash
git clone https://github.com/yourusername/inventory-management-system.git
cd inventory-management-system
```

### Install Dependencies

```bash
composer install
```

### Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

### Configure Database

Update the `.env` file:

```env
DB_DATABASE=inventory_db
DB_USERNAME=root
DB_PASSWORD=
```

### Run Migrations

```bash
php artisan migrate
```

### Start Development Server

```bash
php artisan serve
```

Visit:

```text
http://127.0.0.1:8000
```

## Project Roadmap

### Phase 1

- Authentication
- Categories CRUD
- Products CRUD

### Phase 2

- Supplier Management
- Purchase Management
- Sales Management

### Phase 3

- Dashboard Analytics
- Reports
- Role & Permission System

### Phase 4

- PDF Invoices
- Barcode Support
- Excel Export
- Activity Logs

## Future Enhancements

- REST API
- Mobile Application
- Multi-Warehouse Support
- QR Code Integration
- Real-Time Notifications

## Author

Bikram Kumar Das

## License

This project is developed for learning and portfolio purposes.
