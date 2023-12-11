# PURE PHP REST_API

This project is an example implementation of an API for downloading messages using PHP and MySQL.

## Steps to start a project

1. **Database Setup**

   -Run the SQL script to create the necessary tables:

        mysql -u your_name -p your_database_name < sql/create_tables.sql

2. **Setting up the database configuration**

   -Edit the file `config/db_config.php`and specify your connection settings:

        <?php

        $host = "your_host";
        $db_name = "your_database_name";
        $username = "your_mysql_user_name";
        $password = "your_mysql_password";


3. **Launch of the project**

    - Start the web server. For example, using the built-in PHP server:

        ```bash
        cd public
        php -S localhost:8000
        ```

API for Posts

This is a simple RESTful API for managing posts. The available endpoints are as follows:

- **GET /api/posts:** Retrieve a list of all posts.
- **POST /api/posts:** Create a new post.
- **GET /api/post/{id}:** Retrieve details of a specific post.
- **PUT /api/post/{id}:** Update an existing post.
- **DELETE /api/post/{id}:** Delete a post.

## API Endpoints

### Get All Posts

- **URL:** `http://localhost:8000/api/posts`
- **Method:** GET
- **Description:** Retrieve a list of all posts.
- **Parameters:** None

### Create a New Post

- **URL:** `http://localhost:8000/api/posts`
- **Method:** POST
- **Description:** Create a new post.
- **Parameters:**
    - `title` (string): The title of the post.
    - `description` (string): The description of the post.
    - `uuid` (string): The UUID of the post.
    - `images` (array of strings): List of URLs of uploaded images.

### Get a Specific Post

- **URL:** `http://localhost:8000/api/post/{id}`
- **Method:** GET
- **Description:** Retrieve details of a specific post.
- **Parameters:**
    - `id` (integer): The ID of the post.

### Update a Post

- **URL:** `http://localhost:8000/api/post/{id}`
- **Method:** PUT
- **Description:** Update an existing post.
- **Parameters:**
    - `id` (integer): The ID of the post to update.
    - `title` (string): The updated title of the post.
    - `description` (string): The updated description of the post.
    - `uuid` (string): The updated UUID of the post.
    - `images` (array of strings): The updated list of URLs of uploaded images.

### Delete a Post

- **URL:** `http://localhost:8000/api/post/{id}`
- **Method:** DELETE
- **Description:** Delete a post.
- **Parameters:**
    - `id` (integer): The ID of the post to delete.


