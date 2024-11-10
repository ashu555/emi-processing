<img width="1366" alt="Screenshot 2024-11-10 at 1 28 12 PM" src="https://github.com/user-attachments/assets/7f8c8155-1e53-471b-aaa4-35f2fe5f9d10">
<img width="1366" alt="Screenshot 2024-11-10 at 1 27 46 PM" src="https://github.com/user-attachments/assets/f6c7e5b9-cdd9-47aa-9fe5-52b5f1084e3b">
<img width="1366" alt="Screenshot 2024-11-10 at 1 27 06 PM" src="https://github.com/user-attachments/assets/31fa176a-d09a-4c81-9fe8-1dfd817f06e1">


# Installation Instructions

Follow these steps to set up the project locally.

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/your-repo.git

2. **Move to cloned repo directory**
   ```bash
   cd your-repo

3. **Copy .env.example to .env**
   ```bash
   cp .env.example .env

4. **Install Composer dependencies**
   ```bash
   composer update

5. **Generate application key**
   ```bash
   php artisan key:generate

6. **Set up database credentials in .env**
   ```bash
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password

7. **Run migrations**
   ```bash
    php artisan migrate

8. **Install npm dependencies**
   ```bash
   npm install
   
9. **Build frontend assets**
   ```bash
   npm run build

10. **Seed the database**
    ```bash
    php artisan db:seed
    
### Login Credentials

- **Username**: developer
- **Password**: Test@Password123#
