# Skripsi Scheduling
A project tasks to making schedule to undergraduate thesis (in indonesian called "Skripsi").

## What we use?
We use some frameworks and libraries to make this project, such as:
- Laravel (PHP, for backend)
- Vue.js (JavaScript, for frontend)
- API Endpoint (for data exchange between backend and frontend)
- Bootstrap (for UI/UX)
- Font Awesome (for icons)
- Tailwind (for CSS Design)

## How to run?
To run this project, you need to follow these steps:
1. Clone this repository
2. Install all dependencies by running `composer install` and `npm install`
    ```bash
    composer install
    ```
    ```bash
    npm install
    ```
3. Initialize Project by running this following steps
    > Please copy the `.env.example` and paste it to `.env` file first
    ```bash
    npm run build
    ```
    ```bash
    php artisan key:generate
    php artisan storage:link
    php artisan config:clear
    ```
4. After doing all of that, you can run the project by following these command
    ```bash
    php artisan serve
    ```