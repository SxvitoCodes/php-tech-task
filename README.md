# Laravel Posts Application

A simple Laravel 11.x application for managing posts. This application allows users to create, display, and delete posts. Each post includes a name, email, message, and a timestamp.

## Features

- Create new posts.
- View all posts.
- Delete individual posts.

---

## Installation

Follow these steps to set up the project on your local machine:

### Prerequisites

- PHP 8.2 or higher
- Composer 2.x
- Laravel 11.x
- A web server (Apache, Nginx, etc.)
- MySQL or any supported database

### Steps

1. **Clone the repository:**
```bash
   git clone SxvitoCodes/php-tech-task
   cd simple-form
```

2. **Install dependencies:**

Run the following command to install all necessary packages:

```bash
composer install
npm install
```
3. **Create the .env file:**

Copy the .env.example file to .env:

```bash
cp .env.example .env
```

4. **Set environment variables:**

Update the .env file with your database credentials and other configuration details:

```bash
php artisan key:generate
```
5. **Run database migrations:**

Create the necessary tables in your database:

```bash
php artisan migrate
```

6. **Start the development server:**

```bash
composer run dev
```
The application will be accessible at http://127.0.0.1:8000.

## Usage
Navigate to the home page to view the list of posts.
Use the form to create a new post.
Click the delete icon on a post to remove it.