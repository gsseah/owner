Install Lumen Guide:
https://lumen.laravel.com/docs/5.1
-------------------------
To get the source code:
git clone --branch master https://github.com/gsseah/owner.git
-------------------------
This project uses MySQL as the database.
Create a new database [moolahdb] on your MySQL
------------------------------
Go to yourdirectory/owner
Edit .env file:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=moolahdb
DB_USERNAME={yoursetting}
DB_PASSWORD={yoursetting}
------------------------
To populate dummy data run:
php artisan db:seed
This will populate 3 rows of data. Use these referral codes for testing:
1. ABC123
2. DEF123
3. GHI123
------------------------
To start your Lumen:
php -S localhost:8000 -t public
------------------------
To access the form:
http://localhost:8000/contact.php
-----------------------
