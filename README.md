# Project Management Application

<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<p align="center">
    <a href="https://github.com/laravel/framework/actions">
        <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
    </a>
</p>

## About the Project

This is a web application built with Laravel (version 12.x) and React (version 18.x) for managing projects and tasks. The application provides a user-friendly interface for creating, viewing, and managing projects and their associated tasks. It utilizes Inertia.js (version 2.x) for seamless navigation between pages.

### Features

- User authentication and authorization
- Create, read, update, and delete (CRUD) operations for projects and tasks
- Image upload functionality for project representation
- Sorting and filtering capabilities for project lists
- Responsive design for mobile and desktop views

## Installation

### Using Docker

1. **Clone the repository:**
   ```bash
   git clone https://github.com/yourusername/project-management-app.git
   cd project-management-app
   ```

2. **Build and run the Docker containers:**
   ```bash
   docker-compose up -d
   ```

3. **Access the application:**
   Open your browser and navigate to `http://localhost`.

4. **Access Adminer for database management:**
   Open your browser and navigate to `http://localhost:8080`. Use the following credentials:
   - **System:** MySQL
   - **Server:** db
   - **Username:** root
   - **Password:** yourpassword (as defined in your `.env` file)

### Local Development (Without Docker)

1. **Install dependencies:**
   ```bash
   composer install
   npm install
   ```

2. **Set up your environment file:**
   ```bash
   cp .env.example .env
   ```

3. **Generate an application key:**
   ```bash
   php artisan key:generate
   ```

4. **Run migrations:**
   ```bash
   php artisan migrate
   ```

5. **Start the development server:**
   ```bash
   php artisan serve
   ```

6. **In a separate terminal, run:**
   ```bash
   npm run dev
   ```

## Configuration

### .env File

In your `.env` file, you can configure the database connection for Docker as follows:

```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=yourpassword
```

Make sure to replace `your_database_name` and `yourpassword` with your actual database name and password.

## Contributing

Thank you for considering contributing to this project! Please read the [contribution guidelines](https://laravel.com/docs/contributions) for more information.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).