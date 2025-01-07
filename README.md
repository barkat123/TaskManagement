# Task Management System - Laravel

## Overview
A complete task management system built with Laravel. This simple yet effective app helps manage tasks efficiently.

---

## Getting Started

**Clone the repository**:
   ```bash
   git clone https://github.com/barkat123/TaskManagement.git
   cd TaskManagement
   
After cloning, run:

composer install
npm install
Duplicate .env.example and rename it .env

Then run:

php artisan key:generate

Prerequisites
Be sure to fill in your database details in your .env file before running the migrations:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password

php artisan migrate

php artisan db:seed

npm run build

And finally, start the application:

php artisan serve
and visit http://localhost:8000 to see the application in action.


## Demo login details:

    User:
        
        Url: /login
        Email: user@example.com
        Password: password

    Admin:

        Url: /admin/login
        Email: admin@example.com
        Password: password    

## Built With

- **[Laravel Framework](https://laravel.com/)**: Version ^11.31, a PHP framework for web artisans.
- **[PHP](https://www.php.net/)**: Version ^8.2, the server-side language powering the application.
- **[Laravel Breeze](https://github.com/laravel/breeze)**: Version ^2.3, for minimal and simple authentication scaffolding.

### Development Tools

- **[Node.js](https://nodejs.org/)** and **[Vite](https://vitejs.dev/)**: For modern front-end asset building.
- **[Concurrently](https://www.npmjs.com/package/concurrently)**: For running multiple development tasks in parallel.

## Prerequisites

Ensure you have the following installed:
- PHP ^8.2
- Composer
- Node.js and npm