# Laravel Blog
Create a Laravel Blog

## Turn on the project
* Clone the repository
* ``composer install``
* ``npm install``
* Copy .env.example to .env and set database ids
* ``php artisan migrate:fresh --seed`` to set content inside database
* To create an admin account : email : ``toto@toto.fr``, username : ``toto``, password: ``toto1234``

To use newsletter functionality, set inside .env Mailchimp API key and Mailchimp subscriber list
