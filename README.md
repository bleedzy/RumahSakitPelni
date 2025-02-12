# SIM Layanan ISO 27001 Rumah Sakit Pelni

## Command Before Use
copy the `.env.example` then rename it to `.env`
then run:
```sh
composer install
npm install
php artisan key:generate
php artisan migrate
php artisan db:seed --class=UserSeeder
```

then run:
```sh
npm run dev
```

## Command for Creating Model
```sh
php artisan make:model <folder_name>/<model_name> -msf
```
