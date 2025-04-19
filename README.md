# Skripsi Scheduling
**Skripsi Scheduling** is a project designed to generate schedules for undergraduate theses (known locally as "Skripsi"). This application leverages Laravel 12 for the backend, Vue.js for the frontend, and several modern tools to ensure a smooth development experience.

## Technology Used

We use some frameworks and libraries to make this project, such as:
- Laravel (PHP, for backend)
- Vue.js (JavaScript, for frontend)
- API Endpoint (for data exchange between backend and frontend)
- Bootstrap (for UI/UX)
- Font Awesome (for icons)
- Tailwind (for CSS Design)


## How to run?

To run this project, you need to follow these steps:

### 1. Clone this repository

```bash
git clone https://github.com/PenDZ-Alter/skripsi-scheduling.git
cd skripsi-scheduling
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Configure the Environment

> [!IMPORTANT] 
> Please copy the `.env.example` and paste it to `.env` file first.

- Build the frontend assets.

    ```bash
    npm run build
    ```

- Setup the Laravel 12

    ```bash
    php artisan key:generate
    php artisan storage:link
    php artisan config:clear
    php artisan migrate
    ```

### 4. Run the Application

Start the Laravel Development Server :

```bash
php artisan serve
```

Now, you should be able to access the application at http://127.0.0.1:8000.

## Troubleshooting

> [!NOTE]
> This issue is known to occur on PHP version 8.4.

If you encounter issues during installation—such as Composer failing to install packages due to platform requirements—you can try running:

```bash
composer install --ignore-platform-req=ext-fileinfo
```

Having problem with compiler and design?

> [!TIP]
> This is useful to clear cache from bootstrap.

Try this command : 
```bash
php artisan clear-compiled
```