#  Inventory Management System (Laravel 12)

A complete Inventory Management System built with Laravel 12 for small and medium businesses.

---

##  Features

###  User Management
- Authentication system
- Role-based access (Admin / Cashier / Manager)
- Active / Inactive users

###  Product Management
- Add/Edit/Delete products
- Stock tracking
- Product images
- Category system

###  Supplier Management
- Supplier CRUD system
- Contact management

###  Purchase System
- Record purchases from suppliers
- Auto stock update
- Purchase history

###  Sales System
- Cart-based sales
- Invoice generation
- Sales history

###  Reports
- Profit calculation
- Sales reports
- Stock reports

---

##  Architecture

- MVC Pattern (Laravel)
- Service Layer for business logic
- Database transactions for safety
- Eloquent relationships

---

##  Database Tables

- users
- products
- categories
- suppliers
- purchases
- sales
- sale_items
- activity_logs

---

##  Installation

```bash
git clone <repo-url>
cd inventory-management-system
composer install
npm install
cp .env.example .env
php artisan key:generate
```
---

## License

This project is licensed under the MIT License.
Copyright (c) 2026 Bikram Kumar Das
