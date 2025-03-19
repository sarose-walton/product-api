# product-api
This is a laravel api project. 

## Laravel Full Setup
# Laravel Project Create
composer create-project laravel/laravel product-api

# Laravel api install
php artisan install:api

# Run Project
php artisan serve

# Controller Create
php artisan make:controller ProductController
php artisan make:controller MemberController

# Controller create with all required resource
php artisan make:controller IndustryController --resource

# model create 
php artisan make:model Product
php artisan make:model Member
php artisan make:model Industry

# migrate tables
php artisan migrate


