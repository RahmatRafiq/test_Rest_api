# SIMPLE CONTACT REST API
> This simple project will assist users in managing their contacts more efficiently, while also providing developers with the opportunity to create applications that utilize this API for their needs.


## INSTALATION PROCEDURE
### SOFTWARE REQUIREMENT
- PHP VERSION 8.0 OR HIGHER
- MYSQL 
- COMPOSER VERSION 2.7.1 [Click here](https://getcomposer.org/download/)
### INSTALATION
Here are the general steps to install and run an existing Laravel project from GitHub:

1. **Clone Repository**: Open a terminal or command prompt, then run the following command to download the project from GitHub to your local computer:
   ```bash
   git clone https://github.com/RahmatRafiq/test_Rest_api.git
   ```
  

2. **Navigate to Project Directory**: Go into the directory of the newly downloaded project:
   ```bash
   cd test_Rest_api
   ```
   

3. **Install Dependencies**: Run the following command to install all the required PHP dependencies:
   ```bash
   composer install
   ```

4. **Create .env File**: Copy the `.env.example` file and name it `.env`:
   ```bash
   cp .env.example .env
   ```

5. **Generate App Key**: Run the following command to generate the Laravel application key:
   ```bash
   php artisan key:generate
   ```

6. **Configure Database**: Open the `.env` file and configure your database settings, such as the database name, user, and password.

7. **Run Migrations**: Run the following command to run migrations and create the necessary tables in the database:
   ```bash
   php artisan migrate
   ```

8. **Run Server**: Finally, run the Laravel server with the command:
   ```bash
   php artisan serve
   ```

9. **Access Application**: Open a browser and access your Laravel application at `http://localhost:8000` or as per the port displayed in the terminal after running the `php artisan serve` command.

Make sure you have PHP, Composer, and MySQL installed on your computer before running the above steps. If there are any errors or issues during the installation process, be sure to read the error messages displayed in the terminal to understand the cause.
## HOW TO TEST API
4. for Postman API documentation
import exported file from API Documentation ```Simple_Rest_Api.postman_collection.json```


# ISSUES AND SUGGESTIONS
<br>
<h1 align="center"><strong>Thank you</strong> and <em>good luck</em></h>
