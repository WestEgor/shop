# shop
## About the project
This project represents a simple interaction with PostgreSQL via PHP.
### Built with
* PHP 8.0;
* PDO;
* postgresql 12.0;
* bootstrap.
### Project structure
+ Diagram of classes (click)[https://github.com/WestEgor/shop/blob/master/images/diagrams.PNG]
+ Tables struture (click)[https://github.com/WestEgor/shop/blob/master/images/tables_structures.PNG]
## Getting started
1. You need to install PHP 8.* [click](https://www.php.net/downloads.php)
2. Uncomment extensions in php.ini file (look below)
>>;extension=php_pgsql.dll  ;extension=php_pdo_pgsql.dll
3. Install a composer [click](https://getcomposer.org/download/)
4. Install a server, in my case OpenServer [click](https://ospanel.io/download/).  Then do next change: 
+ HTTP-> Apache_2.4-PHP_8.0, PHP -> PHP_8.0, PostgreSQL -> PostgreSQL-12.2
+ By default, postresql port will be 5432, you may change it at installing or in OpenServer-> Server-> Postgres
## Roadmap
Roadmap you can see [hear](https://github.com/WestEgor/shop/commits/master)
## Usage
How to use, you can watch to [images](https://github.com/WestEgor/shop/tree/master/images)
1. In home page you can choose table [click](https://github.com/WestEgor/shop/blob/master/images/home_page.PNG)
2. Then you will see all records, which table contains [click](https://github.com/WestEgor/shop/blob/master/images/prodcuts_table.PNG)
3. Yo can do any actions with data:
+ Create new [click](https://github.com/WestEgor/shop/blob/master/images/products_table_create.PNG)
+ Update [click](https://github.com/WestEgor/shop/blob/master/images/products_table_update.PNG)
+ Find [click](https://github.com/WestEgor/shop/blob/master/images/products_table_show.PNG)
+ Delete
