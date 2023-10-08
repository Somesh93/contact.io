<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Contact.io Backend Codebase</h1><p>This repository contains the backend codebase for Contact.io, which is a standard Laravel project designed to run on an App Server with a MySQL Database.</p>
    <h2>Prerequisites</h2>
    <p>Before you get started, make sure you have the following prerequisites installed on your system:</p>
    <ul>
        <li>PHP 8.2 and above</li>
         <li>MYSQL 8.0 and above</li>
        <li>Composer 2.2 and above</li>
    </ul>



<h2>Getting Started</h2>
<ol>
<li>Clone this project from GitHub to your local machine.</li>
<li>Copy and paste the provided <code>.env</code> file into the project directory.</li>
<li> Make sure that mysql service is running and a DB is created corresponding to that provided in .env file</li>
<li>Install project dependencies using Composer:</li>
</ol>
<pre><code>composer install</code></pre>

<ol start="4">
        <li>To populate the database with job titles, run the following command:</li>
    </ol>
    <pre><code>php artisan db:seed --class=JobTitleSeeder</code></pre>
<ol start="5">
        <li>Finally, start the Laravel development server:</li>
    </ol>
    <pre><code>php artisan serve</code></pre>

<p>That's it! You should now have Contact.io up and running on your local server.</p>

<p>Feel free to reach out if you have any questions or encounter any issues.</p>

</body>
</html>
