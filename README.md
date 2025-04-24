# Laravel Coding Round Project

This repository contains a Laravel application implementing:

1. Blog Post CRUD API
2. User Registration API
3. Task Management API

## 📦 Features

- RESTful API for Blog Posts (Create, Read, View Single)
- API for registering new users with validation and hashed password
- API for managing tasks (add, mark as completed, view pending tasks)
- Error handling using try-catch blocks
- Sample seeders using Faker for Posts and Tasks
- Uses SQLite for quick and easy setup

---

## 🛠 Setup Instructions

### 1. Clone the repository

```bash
git clone https://github.com/durjaygp/second-source-test.git
cd second-source-test
```

### 2. Install dependencies

```bash
composer install
```

### 3. Copy `.env` and generate application key

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Set SQLite configuration

In your `.env` file, modify the following:

```
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/your/project/database/database.sqlite
```

> Example for macOS/Linux:
> `DB_DATABASE=/Users/yourname/projects/laravel-test/database/database.sqlite`

### 5. Create SQLite database file

```bash
touch database/database.sqlite
```

### 6. Run migrations and seeders

```bash
php artisan migrate --seed
```

### 7. Start the development server

```bash
composer run dev
```

---

## 📬 API Endpoints

### Blog Post API

- `GET /api/posts` — List all posts
- `POST /api/post/create` — Create a new post (title, content)
- `GET /api/post/{id}` — View a single post

### User Registration API

- `POST /api/register`  
  Body:
  ```json
  {
    "name": "Jane Doe",
    "email": "jane@example.com",
    "password": "password123"
  }
  ```

### Task Management API

- `POST /api/tasks` — Add new task (title)
- `PATCH /api/task/{id}` — Mark task as completed
- `GET /api/task/pending` — Get all pending tasks

---

## 🧪 Testing API (Optional)

Use [Postman](https://www.postman.com/) or `curl` to test the endpoints.

Example:

```bash
curl -X POST http://127.0.0.1:8000/api/register -H "Content-Type: application/json" -d '{"name":"Test User", "email":"test@example.com", "password":"password123"}'
```

---

## 📝 Notes

- Ensure your PHP version is 8.1+ and Composer is installed.
- This project uses Laravel's built-in request validation, Eloquent ORM, and routing features.

---

## 📂 Folder Structure

- `app/Models` — Eloquent models
- `app/Http/Controllers` — API controllers
- `database/migrations` — Table structure definitions
- `database/seeders` — Fake data generator
- `routes/api.php` — API routes

---

## ✅ Completion Checklist

- [x] Blog Post CRUD API
- [x] User Registration with validation and hashed password
- [x] Task Management: Add, Complete, View Pending
- [x] SQLite configuration
- [x] Seeders with Faker
- [x] Try-catch error handling
