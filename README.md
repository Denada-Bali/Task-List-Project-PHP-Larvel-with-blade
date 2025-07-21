
# Laravel Task List Application

A clean, minimalist task management system built with Laravel 10, Alpine.js, Tailwind CSS, Docker, and MySQL..

## Features

- **Task Management**: Create, read, update, and delete tasks
- **Status Tracking**: Mark tasks as complete/incomplete
- **Detailed Descriptions**: Support for both short and long descriptions
- **Responsive Design**: Works on all device sizes
- **Clean UI**: Neutral color scheme with intuitive interface

## Technologies Used

- **Backend**: Laravel 10
- **Frontend**: Tailwind CSS, Alpine.js
- **Database**: MySQL (Dockerized)
- **Containerization**: Docker Compose

## Development Setup

### Prerequisites
- Docker Desktop ([Install Guide](https://www.docker.com/products/docker-desktop))
- PHP 8.2+ (for composer)
- Node.js 18+ (for frontend assets)
  
1. Clone the repository:
   ```bash
   git clone  https://github.com/Denada-Bali/Task-List-Project-PHP-Larvel-with-blade.git
   cd laravel-task-list
   
2. Configure environment:
   ```bash
   cp .env.example .env
   
3. Start Docker containers
   ```bash
    docker-compose up -d --build

4. Install PHP dependencies
   ```bash 
   docker-compose exec app composer install

5. Install frontend dependencies
   ```bash
    npm install
    npm run dev

6. Run database migrations
   ```bash
   docker-compose exec app php artisan migrate

7. Access the application
   ```bash
    App: http://localhost:8000
    MySQL: Port 3307 (root/***)
    Database: task_list
