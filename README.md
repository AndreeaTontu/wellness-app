## Wellness Web App - Formidable Well

**Formidable Well** is a Laravel application that generates wellness recommendations based on health problem user's input, including diet, holistic activities and natural remedies. 

## Features

- It allows users to log in, input their health problem and get recommendations.
- New users can create a new account.
- It allows user to track and delete their recommendations history.
- The system includes admin functionality. Admins can add new health problem records with initial recommendations.
- It allows guest users to read health problems description.
- Form validation, alerts, error mesages.

## Technologies Used

- **Laravel** – PHP MVC Framework
- **Blade** – Laravel templating engine
- **MySQL** – Relational database
- **phpMyAdmin** – Database GUI
- **Laravel Herd** and **XAMPP** - Local development enviroment

## Security

- CSRF protection
- Input validation and error handling
- Password hashing usimg Laravel's built-in authentication
- Role-based access control and route protection with middleware

## Key Files to Review

- 'app/Http/Controllers (Admin, Auth, Helth, History)' - Handling logic
- 'app/Models (HeealthCondition, History, Recommendation, User)' - Eloquent Models, defining relationships
- 'routes/web.php' - Define all web routes
- 'resources/views/' - Blade templates for UI
- 'datbase/migrations' - Contains the database structure
- 'database/seeders' - Contains data used to populate the database
- '.env.example' - Show enviroment setup
- 'app/Providers/AppServiceProvider.php' - Role logic enforced 

## UI 

<img width="452" alt="image" src="https://github.com/user-attachments/assets/68029c61-c411-4295-ac1c-d64869069774" />


## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
