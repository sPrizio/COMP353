# COMP353 Database Project
The main project is located within the /main folder. The application is built using [Laravel.](https://laravel.com/)

### Installation
Download the project to a folder somewhere on your computer.

Download PHP [here](http://php.net/downloads.php) and extract the contents of the archive to somewhere on your disk (on Windows it can be C:\Program Files)

IMPORTRANT: To get MySQL to work, find the ```php.ini``` file and find this line:

```; extension=pdo_mysql```

and change it to:

```extension=pdo_mysql```

Before installing Laravel, install Composer which can be found [here](https://getcomposer.org/). Once installed run the following command in a terminal window:

```composer global require "laravel/installer"```

Afterwards, ```cd``` into the laravel directory in the project that you downloaded from this repository (under main/src/). At this point, running the command

```php -S localhost:8000 -t public/```

will start the project. The project can be viewed at: 

```localhost:8000```

Look at the Laravel documentation to see how it all works!
