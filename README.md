# Run the project

To run the project on your local machine, follow these steps:
Install dependencies
Make sure you have PHP, Composer, and Node.js installed.

# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install

Set up the environment

Specify settings for the database, Redis, and other parameters.

.env
php artisan key:generate

Run migrations and seed the data

Run migrations to create tables in the database and seed the database with initial data.

php artisan migrate --seed

Start the web server to run Laravel.

Run Vite to build the frontend.

npm run dev
Test in browser
Open your favorite browser and navigate to the URL where the project is running (usually http://localhost:8000).

Task Description
Project Tasks

Develop user authorization functionality using built-in Laravel tools.
Creating pages for managing events and venues using Laravel resource controllers.
Integration with the Stormglass API to get the current weather by user coordinates.
Displaying the current weather on application pages for authorized users.
Handling errors and managing exceptions when working with the Stormglass API, including handling the request quota.

Technologies and tools

Laravel 9.19
PHP 8.0
Redis for managing sessions and queues

Additional information

Unfortunately, the service used to select weather via the API in the free version is severely limited in the number of selections and returns an error of the following nature. This does not allow the full completion of the output of weather data.
https://stormglass.io/

Client error: `GET https://api.stormglass.io/v2/weather/point?lat=40.7128&lng=-74.006&params=airTemperature%2CwindSpeed%2Cprecipitation` resulted in a `402 Payment Required` response: {"errors":{"key":"API quota exceeded"},"meta":{"dailyQuota":10,"requestCount":11}}
