<p align="center"><img src="https://www.pngall.com/wp-content/uploads/5/Vector-Game-Controller-Transparent.png" width="400"></p>



## About the Game System

The "Game System" project is created using Laravel 8.0. It serves as a system that stores Videogame related information such as, the name of the video game, the date it was released on, the developers behind the game, the date the development studio was founded on and the genre of the game. The system can also store images, it can be screenshots, fan art or something related to the games. You can also search for specific information you need, by searching for a specific game name, release date, development studio or genre. <strong>Routing</strong> In the web.php file, located at \routes\, we configure the routes. For every route we add a "post" or "get" (Example: Route::get('/addgenre',[GenreController::class, 'add']);\Route::post('/addgenre',[GenreController::class, 'create']);), every function we use requires a "get" or "post".

## How was it made ?

First we create the project using Laravel, by typing "laravel new (project name)" in the CMD. Once that is done we end up with a fresh project, then we configure the DataBase. We configure the DataBase in the .env file. After we are done with the DataBase configuration we create authentication, by typing "laravel new (given project name) --jet" in the CMD (or by using the Terminal in PHP Storm). After we are done we run "nmp install && nmp run dev" to build our assets.

## 1) Migrations
After we are done configurating the project we can start with the migrations. You can quickly create a table by typing "php artisan make:migration create_(table name)_table --create=(name). We create the tables we need, which are "images" , "developer", "genre" and "games". After we create the tables we can edit the content of the tables themselves. For the images table we create a column with an id (by using BigInteger), description, path and url (oll of which use string). For developer table we create a column with an id (by using BigInteger), name (by using string), foundation year (by using date). For the genre table we create a column with an id (by using BigInteger) and one for the genre name (by using string). For the games table we create an id (by using BigInteger), game name (by using string) and release date (by using date), we additionally need 2 foreign keys that refer to the genre and developer's ids. Once we create the tables we run "php artisan migrate" in the CMD.

## 2) Models
After we are done with the migrations, we create the models we use "php artisan make:model (Model name)". We create a model for every existing table. In the Game mode, we add 2 functions, one that refers to the developer id and one that refers to the genre id from. In the Genre model we add 1 function that refers to the game id. And finally in the Developer model we add a function that refers to the game id.

## 3) Controllers
After the models are done, we start with the controllers. Controllers are made by running "php artisan make:controller (Controller name)". We create a controller for the Home page, Games page, Developers page, Genre page and the Screenshot page. 
## a) Games controller
The games controller has an index function, which calls all of the information from the Games table and returns the "dashboard view" which displays all of the games. It also has a search function, which requests the data from the games table, developer table and genre table, which joins them afterwards and gives you the ability to search keywords with the "where/orWhere" functions. The add function, which contains two variables that call the genre and developer tables so we can add game information and give them specific genres and development studios. The create function, which contains validation for the name, release date, genre and dev ids, it also has a variable which inserts into the games table by requesting a name, date and 2 ids. An edit function that edits the information added in the "create" function. A update function which gives us the ability to delete columns and the ability to edit columns which contains the validation in the "create" function.
## b) Developer controller
The developer controller contains the index function, create function, add function, edit function and update function that are created exactly like the Games controller controller functions.
## b) Genre controller
The genre controller contains the index function, create function, add function, edit function and update function that are created exactly like the Games controller controller functions.
## c) Image Upload Controller
The image upload controller contains 4 functions. An imageUpload function, which returns the view where we upload images. An image post function that validates that the image is a specific type of image and is within size bounds, it also creates a new column in the images table. An index function that returns the image list page where all of the added images are displayed. And finally an update function which lets you delete data from the DataBase.
## d) Home controller
The home controller contains 2 functions, an index and search function. The index function returns the home page and the search function is created the same way we created it in the Games controller.

##  4) Views
Once every controller is created, we are ready to add some views. Views are created by creating a new file in \resources\views\... and naming it (view name).blade.php, you have to create 11 views. 3 views where we edit information, 4 views where we add information,  4 views where we display information and a welcomning view (the welcome view should already exist).


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
