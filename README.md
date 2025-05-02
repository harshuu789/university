<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# 🎓 University Student Management System (Laravel 9+)

A simple CRUD application built using Laravel 9+ and MySQL to manage students and their class teachers. The application supports student listing, creation, editing, soft-deletion, and search functionality with  user authentication.

## 🛠 Tech Stack

- Laravel 9+
- MySQL
- Blade Templates
- Bootstrap 5
- jQuery & DataTables
- Laravel Authentication
  
## 📦 Features

- Full CRUD operations for Students
- Students belong to Class Teachers
- Soft delete (no permanent delete)
- Search Students by name or class
- Dropdown to select class teacher while adding/editing students
- Server-side pagination (with Bootstrap 5 UI)
- Laravel's built-in authentication
- UI enhancements using Bootstrap and DataTables

## 📁 Installation Instructions
1. Clone the repo
2. Run composer install
3. Run npm install
4. Create .env and set DB details
5. Run php artisan db:seed
6. Run php artisan migrate 
7. Run composer run dev
