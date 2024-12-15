# MVC Template para Projetos em PHP

Este repositório serve como um template base para projetos em PHP, implementando o padrão **MVC**, sistema de **Rotas**, **Middlewares**, e **Componentização** nas camadas de Controller e View. Ele também inclui diversas ferramentas utilitárias para agilizar o desenvolvimento.

---

## Estrutura do Projeto

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

## Funcionalidades


| Conceito        | Descrição                                                                 |
|-----------------|---------------------------------------------------------------------------|
| **MVC**         | Organização modular entre lógica (Model), controle (Controller) e visualização (View). |
| **Rotas**       | Configuradas em `app/Core/Routers.php`, permitem associar URLs a métodos de controladores. |
| **Middlewares** | Gerenciam verificações antes da execução das rotas.                       |
| **Componentização** | Reutilização de elementos visuais e lógicos, como Links e Scripts.       |
| **Utilitários** | Classes para manipulação de arrays, upload de arquivos, geração de UUIDs, e mais. |


## Instalação

- Clone este repositório:

```bash
git clone https://github.com/3nderXP/mvc_template.git
```

- Instale as dependências:

```bash
composer install
```

- Configure o ambiente:

Altere as variáveis necessárias, como credenciais de banco de dados, raizes e afins.

## Uso

**Rotas:** Configure as rotas no arquivo `app/Core/Routers.php`:
```php
$router->get('/home', [HomeController::class, 'index']);
```

**Controllers:** Crie controladores em `app/Core/Controller/Pages/`` e implemente métodos associados às rotas.

**Views:** Crie arquivos HTML em `app/Core/View/Pages/` e renderize-os no controlador:

```php
return View::render('Pages/Home', ['data' => $value]);
```

## Requisitos:
- PHP >= 8.0
- Composer

## Licença
Este projeto está licenciado sob a licença MIT. Consulte o arquivo LICENSE para mais informações.

## Contribuições
Contribuições são bem-vindas! Abra issues ou envie pull requests com melhorias e sugestões.