# MVC Template for PHP projects

This repository serves as a base model for PHP projects, implementing the **MVC** pattern, **Routes** system, **Middlewares** and **Componentization** in the Controller and View layers. It also includes several utility tools to speed up development.

---

## Project Structure

```plaintext
mvc_template/
├── app
│   ├── Classes
│   │   └── Utils
│   │       ├── ApiResponse.php
│   │       ├── ArrayUtils.php
│   │       ├── CrudUtils.php
│   │       ├── FileUploader.php
│   │       ├── Formatting.php
│   │       ├── Math.php
│   │       ├── Url.php
│   │       ├── UUID.php
│   │       └── View.php
│   ├── config.php
│   └── Core
│       ├── Controller
│       │   ├── Components
│       │   │   ├── BaseStructure.php
│       │   │   ├── Link.php
│       │   │   ├── Links.php
│       │   │   ├── Script.php
│       │   │   └── Scripts.php
│       │   ├── Middlewares
│       │   └── Pages
│       │       └── Home.php
│       ├── Model
│       │   ├── Databases
│       │   │   └── SQL.php
│       └── View
│           ├── Components
│           │   ├── BaseStructure
│           │   ├── Link
│           │   ├── Option
│           │   └── Script
│           └── Pages
│               └── Home
│                   └── index.html
├── assets
│   ├── css
│   │   ├── global.css
│   │   └── home.css
│   └── img
│       └── logo.jpg
├── index.php
├── composer.json
├── .env.example
└── README.md
```

## Features


| Conceito            | Descrição                                                                 |
|---------------------|---------------------------------------------------------------------------|
| **MVC**             | Modular organization between logic (Model), control (Controller) and visualization (View). |
| **Routes**          | Configured in `app/Core/Routers.php`, they allow you to associate URLs with controller methods. |
| **Middlewares**     | Manage checks before executing routes. |
| **Componentization** | Reuse of visual and logical elements, such as Links and Scripts. |
| **Utilities** | Classes for manipulating arrays, uploading files, generating UUIDs, and more. |


## Installation

- Clone this repository:

```bash
git clone https://github.com/3nderXP/mvc_template.git
```

- Install the dependencies:

```bash
composer install
```

- Configure the environment:

Change necessary variables, such as database credentials, roots and the like.

## Usage

**Routes:** Configure routes in the file `app/Core/Routers.php`:
```php
$router->get('/home', [HomeController::class, 'index']);
```

**Controllers:** Create Controllers in `app/Core/Controller/Pages/`` and implement methods associated with routes.

**Views:** Create HTML files in `app/Core/View/Pages/` and render in the controllers:

```php
return View::render('Pages/Home', ['data' => $value]);
```

## Requirements:
- PHP >= 8.0
- Composer

## License
This project is licensed under the MIT License. See the LICENSE file for more information.

## Contributions
Contributions are welcome! Open issues or send pull requests with improvements and suggestions.
