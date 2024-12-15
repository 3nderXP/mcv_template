# Crenglish API

Este projeto é uma API para a plataforma **[Crenglish](https://crenglish.xyz/)**, que oferece uma solução de aprendizado de idiomas online. A API foi desenvolvida em PHP seguindo princípios RESTful, permitindo a integração e manipulação de dados para suportar diversas funcionalidades da plataforma.

## Autenticação

Todos os endpoints (exceto os de autenticação e refresh) exigem o uso de um token de autenticação Bearer (JWT) no cabeçalho das requisições. O formato esperado é: `Authorization: Bearer <token>`

O token é obtido através do endpoint de autenticação e tem validade limitada. Somente administradores têm acesso a certos endpoints.

## Estrutura dos Endpoints

### 1. Autenticação

| Método | Endpoint   | Descrição                                    | Parâmetros do Body                                                               |
|--------|------------|----------------------------------------------|----------------------------------------------------------------------------------|
| POST   | `/auth`    | Autentica um usuário e retorna um token JWT.  | `email` (string, obrigatório): E-mail do usuário.<br> `password` (string, obrigatório): Senha do usuário. |
| POST   | `/refresh` | Atualiza o token JWT expirado.                | `token` (string, obrigatório): Token JWT expirado. |

### Body de Retorno para Autenticação

| Método | Endpoint   | Body de Retorno                                                                                                                                                     |
|--------|------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| POST   | `/auth`    | {<br>&emsp;"code": 200,<br>&emsp;"status": "success",<br>&emsp;"data": {<br>&emsp;&emsp;"token": {<br>&emsp;&emsp;&emsp;"val": "fictitious_token_here",<br>&emsp;&emsp;&emsp;"exp": 1729336868<br>&emsp;&emsp;},<br>&emsp;&emsp;"refreshToken": {<br>&emsp;&emsp;&emsp;"val": "fictitious_refresh_token_here",<br>&emsp;&emsp;&emsp;"exp": 1731928838<br>&emsp;&emsp;}<br>&emsp;},<br>&emsp;"message": null<br>} |
| POST   | `/refresh` | {<br>&emsp;"code": 200,<br>&emsp;"status": "success",<br>&emsp;"newToken": "fictitious_new_token_here",<br>&emsp;"message": "Token atualizado com sucesso!"<br>} |

### 2. Usuários

| Método | Endpoint        | Descrição                                  | Parâmetros                                                                                                                    |
|--------|-----------------|--------------------------------------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| GET    | `/users`        | Recupera todos os usuários (admin-only).    | `page` (int, opcional) [queryString]: Número da página a ser retornada.<br> `limit` (int, opcional) [queryString]: Limite de usuários por página.<br> **Requer privilégios administrativos** |
| GET    | `/users/{id}`   | Recupera um usuário específico pelo ID.     | `id` (string, obrigatório) [url]: ID do usuário a ser consultado.<br> **Autenticação necessária**                                                  |
| POST   | `/users`        | Cria um novo usuário.                      | `email` (string, obrigatório) [body]: E-mail do usuário.<br> `senha` (string, obrigatório) [body]: Senha do usuário.<br> `password` (string, opcional) [body]: Senha (necessária se `quickLogin` não for fornecido).<br> `confirmPassword` (string, opcional) [body]: Confirmação da senha (necessária se `quickLogin` não for fornecido).<br> `quickLogin` (string, opcional) [body]: Plataforma de login rápido.<br> **Autenticação necessária** |

### Body de Retorno para Usuários

| Método | Endpoint        | Body de Retorno                                                                                                                                                    |
|--------|-----------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| GET    | `/users`        | {<br>&emsp;"code": 200,<br>&emsp;"status": "success",<br>&emsp;"data": [{...}, {...}],<br>&emsp;"message": "Usuários consultados com sucesso!"<br>} |
| GET    | `/users/{id}`   | {<br>&emsp;"code": 200,<br>&emsp;"status": "success",<br>&emsp;"data": {<br>&emsp;&emsp;"id": "fictitious_id",<br>&emsp;&emsp;"name": "Fictício Nome",<br>&emsp;&emsp;"email": "ficticio@example.com",<br>&emsp;&emsp;"avatar": "default.png",<br>&emsp;&emsp;"role": "ADMIN",<br>&emsp;&emsp;"level": 1,<br>&emsp;&emsp;"xp": 0,<br>&emsp;&emsp;"lives": 3,<br>&emsp;&emsp;"coins": 0,<br>&emsp;&emsp;"verified": 1,<br>&emsp;&emsp;"quickLogin": null,<br>&emsp;&emsp;"status": "ATIVO",<br>&emsp;&emsp;"signDate": "2023-10-11 18:45:10"<br>&emsp;},<br>&emsp;"message": "Usuário consultado com sucesso!"<br>} |
| POST   | `/users`        | {<br>&emsp;"code": 201,<br>&emsp;"status": "success",<br>&emsp;"data": {<br>&emsp;&emsp;"id": "new_fictitious_id",<br>&emsp;&emsp;"name": "Fictício Nome",<br>&emsp;&emsp;"email": "ficticio@example.com",<br>&emsp;&emsp;"avatar": "default.png",<br>&emsp;&emsp;"role": "USUARIO",<br>&emsp;&emsp;"level": 1,<br>&emsp;&emsp;"xp": 0,<br>&emsp;&emsp;"lives": 3,<br>&emsp;&emsp;"coins": 0,<br>&emsp;&emsp;"verified": 0,<br>&emsp;&emsp;"quickLogin": null,<br>&emsp;&emsp;"status": "ATIVO",<br>&emsp;&emsp;"signDate": "2024-10-19 08:19:01"<br>&emsp;},<br>&emsp;"message": "Conta criada com sucesso!"<br>} |

### 3. Outros

Mais endpoints serão adicionados futuramente, incluindo funcionalidades para cursos e materiais de estudo.

## Futuras Implementações

A API será expandida para incluir outros recursos e funcionalidades, como gerenciamento de cursos, materiais de estudo, e interações entre usuários, proporcionando uma experiência completa de aprendizado.
