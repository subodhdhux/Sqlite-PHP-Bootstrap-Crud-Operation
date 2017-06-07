# Sqlite-PHP-Bootstrap-Crud-Operation
Building Task module with Sqlite PHP Bootstrap Crud Operation

First of all please run <'url to project'>/schemas.php to run the project.This will create task table in project database.

In the landing page all the list of previous task will be displayed.
We can add / edit and delete the task.

Regarding coding
===================
I have followed psr-4 coding standard for autoloading class in this project.

database
---------------
Database is connected with Connect.php inside app\Myclasses\Connect folder
All Crud operation is done with Crud.php inside app\Myclasses\Crud folder
Table schema is built with Table.php inside app\Myclasses\Schema folder

validation
---------------
Both client side and server side validation for from is used .
Client side validation handel with jquery validation plugin
Server side validation is handeled with Validation.php inside app\Myclasses\Validation

helper functions
-------------------
All helper functions are inside functions folder like form.php and general.php