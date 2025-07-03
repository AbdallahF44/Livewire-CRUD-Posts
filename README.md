# Livewire CRUD Posts

A simple Laravel project to manage posts using Livewire for a dynamic and seamless CRUD experience without page reloads.

---

## Technologies Used

- **Laravel Framework**
- **Livewire (for reactive components without traditional JavaScript)**
- **MySQL**
- **Blade Templating Engine**
- **Bootstrap (or any CSS framework you use)**

---

## Features

- **Create new posts**
- **List all posts**
- **Edit posts inline**
- **Delete posts**
- **Fully interactive CRUD operations powered by Livewire**
- **No page reloads needed for any operation**

---

## Installation and Setup

1. Clone the repository:
```
git clone https://github.com/AbdallahF44/Livewire-CRUD-Posts.git
```
2. Navigate to the project directory:
```
cd Livewire-CRUD-Posts
```
3. Install dependencies:
```
composer install
```
4. Copy the environment file and configure database settings:
```
cp .env.example .env
```
5. Edit the .env file to set your database credentials:
```
DB_DATABASE=your_database_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password
```
6. Generate the application key:
```
php artisan key:generate
```
7. Run the database migrations:
```
php artisan migrate
```
8. Start the development server:
```
php artisan serve
```
9. Open your browser and visit:
```
http://localhost:8000
```

---

## Notes

- **This project uses Livewire to provide reactive components without writing JavaScript.**
- **You can extend the project by adding validation, file uploads, search functionality, and more.**
