# Skripsi Scheduling
**Skripsi Scheduling** is a project designed to generate schedules for undergraduate theses (known locally as "Skripsi"). This application leverages Laravel 12 for the backend, Vue.js for the frontend, and several modern tools to ensure a smooth development experience.

## Technology Used

We use some frameworks and libraries to make this project, such as:
- Laravel (PHP, for backend)
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
> **For Developers**, Please copy the `.env.example` and paste and rename it to `.env` file first.
> For Users, you can rename it directly from `.env.example` to `.env`

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

### 5. **(OPTIONAL)** Seeding the database

To seed the available seeders, you can try this command : 
```bash
php artisan db:seed
```

Or, if you want to seed specific database, you can try this command (for example) : 
```bash
php artisan db:seed --class=UserSeeder
```

## Troubleshooting

> [!IMPORTANT]
> **For developers**, please, after doing some changes on database (using migration), do this command : 
```bash
php artisan migrate
```

Having problem with migrating database?
Try this command : 

> [!CAUTION]
> All this command is removing your data entry on database (including each tables).
> If you want to use this, make sure to backup your data first.

You can try this command first : 
```bash
php artisan migrate:refresh
```

or, if it didn't work for you, try this command instead : 
```bash
php artisan migrate:reset
php artisan migrate:fresh
php artisan migrate:refresh
```

> [!NOTE]
> This issue is known to occur on PHP version 8.4.

If you encounter issues during installation—such as Composer failing to install packages due to platform requirements—you can try running:

```bash
composer install --ignore-platform-req=ext-fileinfo
```

Having problem with compiler and design bugs?

> [!TIP]
> This is useful to clear cache.

Try this command : 
```bash
php artisan clear-compiled
php artisan optimize:clear
php artisan route:clear
php artisan view:clear
```