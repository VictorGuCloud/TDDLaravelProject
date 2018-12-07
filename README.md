## Introduction
This project is a simple product management solution using Laravel 5.7 framework and Test-driven development process to develop. 

## Steps to setup the solution and dependencies

#### Clone GitHub repository for this project to local and cd into the project.
#### Install Composer Dependencies with with the following command.
> Laravel 5.7 framework requires PHP version >= 7.1.3

		composer install
	
#### Create a copy of the .env file and generate an app encryption key
	
		copy .env.example .env
		php artisan key:generate
	
Then create an empty database for this application. Edit the **.env** file, fill in the **DB_HOST**, **DB_PORT**, **DB_DATABASE**, **DB_USERNAME**, and **DB_PASSWORD** options to match the credentials of the database. 

#### Migrate and seed the database with the following commands.
	
		php artisan migrate
		php artisan db:seed --class=ProductsTableSeeder
	
#### Create a symbolic link from public/storage to storage/app/public
	
		php artisan storage:link
	
- Create a new folder name products under **\public\storage** folder, and copy the example image file **\public\images\products\example.png** to this folder. This action will make seed data have proper image to display.

#### Run following command can run the project and check functions developed.

		php artisan serve
		
## Steps to run the test suite.
#### Run following command can run the test suite.

		vendor\bin\phpunit