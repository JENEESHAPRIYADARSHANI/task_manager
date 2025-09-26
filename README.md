# Laravel Task Manager

A simple Task Manager application built with **Laravel 12.30.1** (Backend + Frontend) that allows users to register, log in, and manage their tasks.

---

## Features

* **User Authentication**

  * Registration & login using Laravel Breeze.
* **Task Management (CRUD)**

  * Users can create, view, update, and delete their own tasks.
  * Task attributes: `title`, `description`, `status` (pending/done), `created_at`.
* **Frontend (Blade UI)**

  * Blade-based UI for user-friendly interaction.
* **Data Security**

  * Users can only access and manage their own tasks.

---

## Requirements

* PHP 8.2+
* Composer
* MySQL 
* Node.js & npm 
* Laravel 12

---

## Installation & Setup

1. **Clone the repository**

```bash
git clone https://github.com/JENEESHAPRIYADARSHANI/task-manager.git
cd task-manager
```

2. **Install PHP dependencies**

```bash
composer install
```

3. **Install Node dependencies & compile assets**

```bash
npm install
npm run dev
```

4. **Environment Setup**

* Copy the example `.env` file and configure your database:

```bash
cp .env.example .env
```

* Update `.env` with your database credentials:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_manager
DB_USERNAME=root
DB_PASSWORD=yourpassword
```

5. **Run database migrations**

```bash
php artisan migrate
```

6. **Start the development server**

```bash
php artisan serve
```

* Visit `http://127.0.0.1:8000` in your browser.

---

## Usage

1. Register a new user or log in with existing credentials.
2. Add new tasks using the “Create Task” button.
3. View, update, or delete tasks from your dashboard.
4. Change task status between pending and done.

---

## Folder Structure (Key Points)

* `app/Models/Task.php` – Task model with user relationship.
* `app/Http/Controllers/TaskController.php` – Handles all CRUD operations.
* `resources/views/` – Blade templates for frontend UI.
* `routes/web.php` – Routes for authentication and task management.

---

## Security Notes

* Only authenticated users can access task management routes.
* Users can only access and modify their own tasks.
* Protected using Laravel’s default authentication middleware.

---

## Screenshots / UI Preview

<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/40bd9101-22e0-42f4-a6f9-2bfeea7985ea" />

