Installation procedure

- git clone https://github.com/franklinsultan/ip-management.git ip-management
- cd ip-management
- cp .env.example .env
- populate .env with necessary contents (DB_DATABASE=ip_management, DB_USERNAME=databaseUsername, DB_PASSWORD=databasePassword)
- composer install
- npm install
- npm run dev
- php artisan key:generate
- php artisan migrate 
- php artisan serve