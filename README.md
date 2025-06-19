# Task Management System

A Laravel-based task and project management application that allows users to manage teams, assign tasks to projects, and track task progress. Includes daily email summaries and task assignment notifications.

---

## System Requirements

- **PHP** ^8.2  
- **Laravel Framework** ^12.0  
- **Composer** v2.x  
- **Node.js** >=18.x  
- **NPM** >=9.x  
- **Database:** MySQL  
- **Mail Configuration:** SMTP for notifications  

---

## Installation & Setup

1. **Clone the repository**
    ```bash
    git clone https://github.com/PRX2112/TaskManagementSystem.git
    cd TaskManagementSystem
    ```

2. **Install PHP dependencies**
    ```bash
    composer install
    ```

3. **Install Node dependencies**
    ```bash
    npm install
    ```

4. **Copy and edit the environment file**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5. **Create and configure your database (MySQL or SQLite)**
    - For MySQL:
        1. Create a new database in your MySQL server (e.g., `tms_db`).
        2. Update your `.env` file with your MySQL credentials:
            ```
            DB_CONNECTION=mysql
            DB_HOST=127.0.0.1
            DB_PORT=3306
            DB_DATABASE=tms_db
            DB_USERNAME=your_mysql_username
            DB_PASSWORD=your_mysql_password
            ```
    ```bash
    php artisan migrate
    ```

6. **Start the development server**
    ```bash
    php artisan serve
    ```

---

## Database Seeding & Faker

To populate your database with sample data for testing and development:

1. **Run all seeders**
    ```bash
    php artisan db:seed
    ```

2. **Use specific seeder**
    ```bash
    php artisan db:seed --class=YourSeederClass
    ```

3. **Refresh database and seed**
    ```bash
    php artisan migrate:fresh --seed
    ```

---

## Background Services

To enable real-time email notifications and daily task summary emails:

- **Queue worker**
  ```bash
  php artisan queue:listen --tries=1
  ```

- **Schedule daily summary (add to cron)**
  ```
  * * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1
  ```
## Telescope
  ```bash
  http://localhost:8000/telescope
  ```
