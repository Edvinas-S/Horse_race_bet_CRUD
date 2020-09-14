# Horse race betting crud with Laravel v7.x

### Features
AS simple visitor you can:
1. just see all horses and betters, nothing else :)

AS manager/admin you can:
1. create [C];
2. read [R];
3. update [U];
4. delete [D].

[C.R.U.D.] all info about horses and betters.
To login as `admin/manager` use:  
E-Mail Address - `admin@admin.com` (placeholder is a helper :));  
Password - `adminadmin` (believe in placeholder :)).  

### Instalation
First you need to have local server e.g. (AMPPS, XAMPP, or something else) running;  
PHP installed in yor machine and his path is `glogal`;  
`Composer` - "A Dependency Manager for PHP" installed globaly too;  
Now:  
- Download project anywhere to your computer;
- Extract/unzip file;
- From `dump` folder install test database `horse_race_db` with (MySQL Workbench, phpMyAdmin or something else);
- Start command line editor inside the project folder (like CMD, PowerShell, `Git Bash` etc.);
- Run `composer.phar install`;
- Rename `.env.example` file to `.env`;
- Inside renamed file `.env` change `DB_USERNAME` (default: root) and `DB_PASSWORD` (default: mysql) with your own;
- Run `php artisan key:generate`;
- Run `php artisan serve`;
- Open browser and go to `http://localhost:8000/`;
  
#### Author [Edvinas](https://github.com/Edvinas-S)
