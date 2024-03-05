# PHP Labs

This repository contains a collection of PHP labs for learning purposes. Each lab focuses on a specific topic or concept in PHP development.

## Lab List

1. **Lab 1: Introduction to PHP**
   - Description: Basic PHP form validation.
   - Files: `index.php & config.php`

1. **Lab 1: Working with files**
   - Description: Store submits in file.
   - Files: `index.php & config.php & functions.php`

3. **Lab 3: Unique Visits Counter using OOP PHP**
   - Description: Implementing a unique visits counter using object-oriented programming in PHP, with session handling and file storage.
   - Files:
     - `index.php`: Main file to handle requests and display the visit count.
     - `Visitor.php`: Class definition for the Visitor class, which handles adding visitors and counting unique visits.
     - `vendor/`: Composer folder for autoloading classes.
     - `composer.json`: Composer configuration file.
     - `composer.lock`: Composer lock file.
     - `config.php`: Configuration file containing settings such as the path of the file to store visit counts.
     - `Counter.txt`: Text file to store the visit count.

# Glasses Shop Project

Welcome to the OS39 Glasses Shop project! This project involves working with MySQL databases to create a database for a glasses shop and implement various functionalities related to data retrieval and pagination. 

## Day 04 & Day 05 Tasks

1. Create the database of the shop from the SQL dump file in the `resources` folder.
2. Define constants in the config file for connection parameters, number of records to be displayed in a single page (set to 5), and a debug mode.
3. Implement the `DbHandler` interface to encapsulate all the DB communication and querying functions in a `MYSQLHandler` class.
4. Create pagination to get Next and Previous items.
5. Add a 3rd column for more details, which when clicked, displays the item details in a new page.
6. Add a function in the interface and class for searching a keyword in a certain column.
7. Implement a search box at the top of the page to list all products and a button to show all records.



