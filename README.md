

# innervate-cares-dev-1

## This project was generated by [Flatlogic Platform](https://flatlogic.com).

  - Frontend: [Angular](https://flatlogic.com/templates?framework%5B%5D=angular&sort=default)

  - Design: [Material UI](https://flatlogic.com/templates?design%5B%5D=material&sort=default)

    <details><summary>Frontend Folder Structure</summary> 

    The generated application has the following frontend folder structure: 

    `src` folder which contains your working files that will be used later to create the build. the src folder contains folders as:

      - `app` - contains the component files in which your application logic and data are defined:

        - `consts` - contains the code of consts module;

        - `modules` - this module contains the general components for CRUD;

        - `shared` -   this module consists of general components of your project;

        - `styles` -   contains all .scss files of your application.      

      - `assets` - contains image and other asset files to be copied as-is when you build your application:

        - `img`;

        - `icon`.      

      - `environments` - contains build configuration options for particular target environments. By default, there is an unnamed standard development environment and a production ("prod") environment.    
    </details> 

  - Backend: [Laravel](https://flatlogic.com/templates/laravel)

    <details><summary>Backend Folder Structure</summary>   

    The generated application has the following backend folder structure: 

      - `app` -  contains the core code of your application. Contains such folders as:

        - `Console` - contains all of your Artisan commands.

        - `Exceptions` - contains your application's exception handler and is also a good place to place any exceptions thrown by your application. 

        - `Http` - contains your controllers, middleware, and requests.

        - `Models` - contains all of your Eloquent model classes. The Eloquent ORM included with Laravel provides a beautiful, simple ActiveRecord implementation for working with your database. Each database table has a corresponding "Model" which is used to interact with that table. Models allow you to query for data in your tables, as well as insert new records into the table.

        - `Notifications` -  contains all of the "transactional" notifications that are sent by your application, such as simple notifications about events that happen within your application.

        - `Observers` -  houses event classes. Events may be used to alert other parts of your application that a given action has occurred, providing a great deal of flexibility and decoupling.

        - `Providers` - contains all of the service providers for your application. Service providers bootstrap your application by binding services in the service container, registering events, or performing any other tasks to prepare your application for incoming requests.

      - `bootstrap` - contains the `app.php` file which bootstraps the framework. This directory also houses a cache directory that contains framework generated files for performance optimization such as the route and services cache files.

      - `config` - contains all of your application's configuration files. 

      - `database` - contains your database migrations, model factories, and seeds.

      - `public` - contains the `index.php` file, which is the entry point for all requests entering your application and configures autoloading. This folder also houses your assets such as images, JavaScript, and CSS.

      - `resources` - contains your views as well as your raw, un-compiled assets such as CSS or JavaScript. This folder also houses all of your language files.

      - `routes` - contains all of the route definitions for your application. By default, several route files are included with Laravel: `web.php`, `api.php`, `console.php`, and `channels.php`.

      - `storage` - contains your logs, compiled Blade templates, file-based sessions, file caches, and other files generated by the framework.

      - `tests` - contains your automated tests. 
    </details> 

  - Database: mySQL

  -----------------------
### We offer 2 ways how to start the project locally: by running Frontend and Backend or with Docker.
-----------------------

## To start the project:

### Backend:

> Please change current folder: `cd backend`

First, run the development server:

MacOS:

`brew install composer`

    > if you don’t have ‘brew‘ please install it (https://brew.sh) and repeat step `brew install composer`.

`composer install`

Ubuntu:

`composer install`

Input database|mail config to ".env"

  ```bash
  php artisan key:generate
  php artisan jwt:secret
  php artisan migrate
  php artisan db:seed
  php artisan serve --host=localhost --port=8080
  ```
To start the project with Docker use ".env.docker" and "\config\database.docker.php" files

### Frontend:

> Please change current folder: `cd frontend`

  ### To start the project:

  Install dependencies via yarn

  `yarn install`

  Run development server

  `yarn start`

## To start the project with Docker:
### Description:

The project contains the **docker folder** and the `Dockerfile`.

The `Dockerfile` is used to Deploy the project to Google Cloud.

The **docker folder** contains a couple of helper scripts:

- `docker-compose.yml` (all our services: web, backend, db are described here)
- `start-backend.sh` (starts backend, but only after the database)
- `wait-for-it.sh` (imported from https://github.com/vishnubob/wait-for-it)

    > To avoid breaking the application, we recommend you don't edit the following files: everything that includes the **docker folder** and `Dokerfile`.

## Run services:

1. Install docker compose (https://docs.docker.com/compose/install/)

2. Move to `docker` folder. All next steps should be done from this folder.

   ``` cd docker ```

3. Make executables from `wait-for-it.sh` and `start-backend.sh`:

   ``` chmod +x start-backend.sh && chmod +x wait-for-it.sh ```

4. Download dependend projects for services.

5. Review the docker-compose.yml file. Make sure that all services have Dockerfiles. Only db service doesn't require a Dockerfile.

6. Make sure you have needed ports (see them in `ports`) available on your local machine.

7. Start services:

   7.1. With an empty database `rm -rf data && docker-compose up`

   7.2. With a stored (from previus runs) database data `docker-compose up`

8. Check http://localhost:3000

9. Stop services:

   9.1. Just press `Ctr+C`

## Most common errors:

1. `connection refused`

   There could be many reasons, but the most common are:

  - The port is not open on the destination machine.

  - The port is open on the destination machine, but its backlog of pending connections is full.

  - A firewall between the client and server is blocking access (also check local firewalls).

   After checking for firewalls and that the port is open, use telnet to connect to the IP/port to test connectivity. This removes any potential issues from your application.

   ***MacOS:***

   If you suspect that your SSH service might be down, you can run this command to find out:

   `sudo service ssh status`

   If the command line returns a status of down, then you’ve likely found the reason behind your connectivity error.

   ***Ubuntu:***

   Sometimes a connection refused error can also indicate that there is an IP address conflict on your network. You can search for possible IP conflicts by running:

   `arp-scan -I eth0 -l | grep <ipaddress>`

   `arp-scan -I eth0 -l | grep <ipaddress>`

   and

   `arping <ipaddress>`

2. `yarn db:create` creates database with the assembled tables (on MacOS with Postgres database)

   The workaround - put the next commands to your Postgres database terminal:

   `DROP SCHEMA public CASCADE;`

   `CREATE SCHEMA public;`

   `GRANT ALL ON SCHEMA public TO postgres;`

   `GRANT ALL ON SCHEMA public TO public;`

   Afterwards, continue to start your project in the backend directory by running:

   `yarn start`
