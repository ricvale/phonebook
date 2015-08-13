#Phone Book

#Web application made with MVC Codeigniter (php, ajax, search, Datatable, Edit inline)#

![phonebook](https://raw.githubusercontent.com/ricvale/phonebook/master/snap.png)

####All codeigniter application with webpages 'Sign up / Sign in' (secure mode active: Cross Site Request Forgery | XSS filter)###

## Installation ##
* 'Import' the database structure phonebook.sql file for MySQL
* 'Modify' the file 'application/config/database.php' to connect.
    Change to yours, there it is:
    'hostname' => 'localhost',
	'username' => 'phonebook',
	'password' => 'phonebook01',
	'database' => 'phonebook',
	'dbdriver' => 'mysqli',
* 'Then run local in browser' http://localhost/phonebook/

* 'or' 
(run modifying the files: 
    'application/config.php' to edit your base url ( $config['base_url'] = 'http://localhost/phonebook/'; )
    and file '.htaccess' at root of archive to modify subdirectory 'phonebook':
    RewriteBase /phonebook/
     For root path you can change into: 
    RewriteBase / 
    )
 
 
