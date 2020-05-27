# Employee-Scheduling-System

**Advanced Web Project**

## Installation
1. Run XAMPP and start apache and mysql service.
2. Import the SQL file above in phpmyadmin.
3. Place EmployeeSch and EmployeeUser at htdocs folder.

## How to run
1. Run XAMPP and start apache and mysql service.
2. turn on php server using "php artisan serve" command in EmployeeSch folder directory.
3. to access administrator visit URL: http://127.0.0.1:8000/EmployeeSch, email: argadiaz@gmail.com; password: 12345678.
4. to access Employee visit URL: http://localhost/EmployeeUser, username: (available in database, table **emp_user**); password: (in emp_user, use value inside **emp_id** column).


## Information
**EmployeeSch** : 
1. Administrator's Website
2. Apply Laravel Framework
3. Provide API service.

**EmployeeUser** :
1. Employee's Website
2. Apply CodeIgniter Framework 
3. using API service from EmployeeSch.
