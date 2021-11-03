
### Built With

This section should list any major frameworks/libraries used in this project.
* [Vue.js 2.5.17](https://vuejs.org/)
* [Laravel 8.69.0](https://laravel.com )
* [Bootstrap](https://getbootstrap.com)

## Getting Started

Setting up your project locally.
To get a local copy up and running follow these simple example steps.

### Prerequisites
* npm
* composer
* node
* MySQL
* Apache
* php 7.3.0
  


### Installation

_Below is an example of how you can instruct your audience on installing and setting up your app. This template doesn't rely on any external dependencies or services._


1. Clone the repo
   ```sh
   git clone https://github.com/aswinshahi/mailservice
   ```
2. Install composer
   ```sh
   composer install
    ```
3. Install NPM packages
   ```sh
   npm install && npm run watch
   ```
4. copy a file in `.env.example` and rename it to `.env`
5. Setup database config and mail config inside here.
6. create a database with the  same name as in config if it is not created.
6. Run following command to migrate the table
 ```sh
  php artisan migrate 
   ```
