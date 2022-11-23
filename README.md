## HTTP notification system

A server (or set of servers) that keep track of topics->subscribers where a topic is a
string and a subscriber is an HTTP endpoint. When a message is published on a
topic, it forwards to all subscriber endpoints:

## Installation
You can install by cloning the repo:

```bash
git clone https://github.com/wombopaul/httpNotificationSystem.git
```

After cloning the project, run composer install in the project directory to install all dependencies:

```bash
composer install
```

### Configure local Environment

The project is using SQLite as database, follow the steps below to configure the .env file

```bash
cp .env.example .env
```

Change the database connection details from these

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

to these

```bash
DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
```

Next add the below code to your .env  file

```bash
WEBHOOK_CLIENT_SECRET=secretKey
```


Next run the command below to create the database

```bash
touch database/database.sqlite
```
Next run migration 

```bash
php artisan migrate
```

### Starting the Servers

Publisher server

```bash
php artisan serve --port=8000
```

Subscriber server

```bash
php artisan serve --port=9000
```

To subscribe to a topic run the subcribe endpoint and to publish run the publish endpoint using the postman documentation link below:

```bash
https://elements.getpostman.com/redirect?entityId=10675211-37795d3c-d15f-477a-9766-69d2a2db5d9e&entityType=collection
```

### Note: Each forwared data is logged by the subscriber server in the laravel.log file and stored in the  webhook_calls table.

You can run queue listen on the publisher server to monitor every outgoing request to the subscriber server:

```bash
 php artisan queue:listen
```
### Testing
To test, Run this command to run test cases
```bash
 php artisan test
```
