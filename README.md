
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
* XAMPP
* LAMPP
* php 7.3.0
  


### Installation

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
4. copy file  `.env.example` and rename it to `.env`
5. Setup database config and mail config inside here.
6. create a database with the  same name as in config if it is not created.
7. Run following command to migrate the table
 ```sh
  php artisan migrate 
   ```
   
### Introduction
This is an email service web app. This app contains different email providers which is used to send email.

The switches to another email provider if one service provider fails.The email service providers used in this app are sendgrid,
mailgun,mailtrap. All the service provider configuration here used are in test version.

first you need to define mail providers if not there
```sh
            'mailtrap' => [
               'transport' => 'smtp',
               'host' => env('MAIL_HOST', 'smtp.mailtrap.io'),
               'port' => env('MAIL_PORT', 2525),
               'username' => env('MAIL_USERNAME'),
               'password' => env('MAIL_PASSWORD'),
           ],
   
           'mailgun' => [
               'transport' => 'smtp',
               'host' => env('MAILGUN_HOST', 'smtp.mailgun.org'),
               'port' => env('MAILGUN_PORT', 587),
               'username' => env('MAILGUN_USERNAME'),
               'password' => env('MAILGUN_PASSWORD'),
           ],
   
           'sendgrid' => [
               'transport' => 'smtp',
               'host' => env('MAILSENDGRID_HOST', 'smtp.sendgrid.net'),
               'port' => env('MAILSENDGRID_PORT', 587),
               'username' => env('MAILSENDGRID_USERNAME'),
               'password' => env('MAILSENDGRID_PASSWORD'),
           ],
 ```
 
After the provider has been defined.you can find the env credential after registering to those providers.The failover 
configuration is managed in mail.php.The mailers order can be changed if needed.This feature is available only in laravel
8 which solves the problem for switching multiple email providers in case another provider fails. 

```sh
   'mailers' => [
       'failover' => [
           'transport' => 'failover',
           'mailers' => [
               'mailgun',
               'mailtrap',
               'sendgrid',
           ],
       ],
   
       // ...
   ],
 ```
 we can change default mailer to failover.
 
  ```sh
    'default' => env('MAIL_MAILER', 'failover'),
 ```
 
### Problems and solutions

 This App contains minimal frontend and backend.The frontend is used for form submission.And the backend has logic to 
 send mail in queue.As laravel provides the inbuilt configuration to manage failover so it was the best choice to solve
 the issue of mail failure from provider.I have included mailtrap and mailgun for now as my sendgrid account was blocked.
 I haven't hosted this in any server so will be showing in local setup. If i was given more time I would have added cc,
 bcc and attachment also would add dynamic configuration for the mailproviders from user admin end so that the user dont
 need to change .env file each time configuration is changed.
 
### Mail Providers

As the providers are configured using test account.
 * In mailgun the address which receives mail(TO EMAIL) should be the account of the email that is registered.
 * In sendgrid the address which is sending email(FROM EMAIL) should be added in the sendgrid > settings 
 ![Alt text](./public/readme_images/sendgridimg.jpg "Optional title")
 you will need to confirm in your email after adding Single Sender Verification.
 
 ### Things to notice
 As I was using queue and which runs using

  ```sh
    'default' => env('MAIL_MAILER', 'failover'),
 ```
 
 I was running mailgun as the first choice and mailtrap as the second choice for mailers.If the first fails and the second 
 one runs until the queue is stopped and run again the next emails uses the second service provider.
 
