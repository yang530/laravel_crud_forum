# Laravel CRUD Forum

This is a simple forum application built with Laravel to demonstrate CRUD (Create, Read, Update, Delete) operations. This project provides a basic framework for managing forum posts, including user authentication, post creation, editing, and deletion. User can create post, edit and delete posts it created and leave comments for any posts created.  

## Features

- User authentication (registration, login, logout)
- Create, read, update, and delete forum posts
- Leaving comments for posts
- Basic user interface for interacting with the forum
- Validation and error handling

## Requirements

- PHP >= 7.4
- Composer
- Laravel >= 8.x
- MySQL database

## Installation

1. **Clone the repository**

    ```bash
    git clone https://github.com/yang530/laravel_crud_forum.git
    cd laravel_crud_forum
    ```

2. **Install dependencies**

    ```bash
    composer install
    ```

3. **Copy the example environment file and modify the necessary settings**

    ```bash
    cp .env.example .env
    ```

    Update your `.env` file with your database credentials and other necessary configuration.

4. **Generate an application key**

    ```bash
    php artisan key:generate
    ```

5. **Run database migrations**

    ```bash
    php artisan migrate
    ```

6. **Serve the application**

    ```bash
    php artisan serve
    ```

    Visit `http://localhost:8000` in your browser to see the application in action.

## Usage

- **Register** a new user account or **login** with an existing account.
- **Create** a new forum post.
- **View** a list of all forum posts.
- **Edit** a forum post you have created.
- **Delete** a forum post you have created.
- **NOTE: email verification featured is not implemented. Therefore, there is not way to recover password of any user account.**

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more information.

## Acknowledgements

- [Laravel](https://laravel.com/) - The PHP framework used in this project.

## Contact

For any inquiries or issues, please contact the repository owner.

Happy coding!
