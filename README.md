# Pen-Ur-Blog

- Your directory to the project file should be "C:\xampp\htdocs\blog". <BR>
- You have to create a pen-ur-blog account first before accessing the registered user privileges. (You can't just type the URL) <BR>
- If you want an access as an admin, change your "is_admin" role from users table in blog.sql to "1". <BR> <BR>

## How to connect database
1. Make a user account in phpmyadmin. Make sure you grant all privileges. (Mark everything under "Database for user account" and "Global privileges") 
2. Open "C:\xampp\phpMyAdmin\config.inc.php" and change user (default - 'root') and password (default - '') as your phpmyadmin user account. You should only change the user and password under /* Authentication type and info */.
3. Open "C:\xampp\htdocs\blog\admin\config\constants.php" and "C:\xampp\htdocs\blog\config\constants.php". Change DB_USER and DB_PASS as your phpmyadmin user account.
4. Create database in mphpmyadmin with the name "blog".
5. Import blog.mysql.

## Install PHPMailer using Composer
1. Install Composer (If You Don't Have It) <BR>
   Download Composer: https://getcomposer.org/download/
2. Install PHPMailer via Composer <BR>
   In Command Prompt type:
   - cd C:/xampp/htdocs/blog
   - composer require phpmailer/phpmailer
