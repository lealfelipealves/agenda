# Agenda

## Sobre o projeto

Projeto desenvolvido em Laravel 5.8 com sqlite.

http://agenda.felipeleal.eng.br/api/v1/contatos
http://agenda.felipeleal.eng.br/api/v1/mensagens

## Objetivo

Desenvolver a API RESTful de uma agenda com as seguintes tecnologias PHP + LARAVEL

- Permitir cadastrar contato (nome, sobrenome, e-mail e telefone). 
- Permitir cadastrar mensagem (contato (fk), descrição). 
- Listar todas as mensagens por contato. 
- Permitir alterar e excluir uma mensagem. 
- Permitir alterar e excluir de um contato. 
- Validar os campos postados.

## Instalação
1. `git clone https://github.com/lealfelipealves/agenda.git`
1. `cd agenda`

### Dependências
Após seguir as instruções acima, vá até a raiz do projeto e renomeie o arquivo `.env.example` para `.env`
1. `composer update`
1. `composer install`

Após instalar as dependências do composer, entre:
1. `php artisan key:generate`

Copie a chave e cole no seu `.env` em APP_KEY e saia
1. `exit`

### Database
Crie uma arquivo database.sqlite no diretorio database.
1. `touch database\database.sqlite`

Alterar no arquivo .env a configuração do banco de dados.
```
...
DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
...
```

Execute:
1. `php artisan migrate`
1. `composer dump-autoload`

### Execução

1. `php artisan serve`

Você terá acesso em http://localhost:8000

___

## Rotas
```
+-----------+----------------------------------+-------------------+--------------------------------------------------+
| Method    | URI                              | Name              | Action                                           |
+-----------+----------------------------------+-------------------+--------------------------------------------------+
| GET|HEAD  | api/v1/contatos                  | contatos.index    | App\Http\Controllers\ContatosController@index    |
| POST      | api/v1/contatos                  | contatos.store    | App\Http\Controllers\ContatosController@store    |
| GET|HEAD  | api/v1/contatos/{id}             | contatos.show     | App\Http\Controllers\ContatosController@show     |
| PUT|PATCH | api/v1/contatos/{id}             | contatos.update   | App\Http\Controllers\ContatosController@update   |
| DELETE    | api/v1/contatos/{id}             | contatos.destroy  | App\Http\Controllers\ContatosController@destroy  |
| GET|HEAD  | api/v1/mensagens                 | mensagens.index   | App\Http\Controllers\MensagensController@index   |
| POST      | api/v1/mensagens                 | mensagens.store   | App\Http\Controllers\MensagensController@store   |
| GET|HEAD  | api/v1/mensagens/{id}            | mensagens.show    | App\Http\Controllers\MensagensController@show    |
| PUT|PATCH | api/v1/mensagens/{id}            | mensagens.update  | App\Http\Controllers\MensagensController@update  |
| DELETE    | api/v1/mensagens/{id}            | mensagens.destroy | App\Http\Controllers\MensagensController@destroy |
+-----------+----------------------------------+-------------------+--------------------------------------------------+
```

## Contato

### Lista todos os contato e suas mensagens.
```
GET     http://localhost:8000/api/v1/contatos
```

### Consulta um contato e suas mensagens.
```
GET     http://localhost:8000/api/v1/contatos/1
```

### Cria Contato
```
POST    http://localhost:8000/api/v1/contatos
----------------------------------------------
Exemplo:
{
    "nome": "Felipe",
    "sobrenome": "Leal",
    "email": "contato@felipeleal.eng.br",
    "telefone": "11123456789"
}
```

### Edita Contato
```
PUT    http://localhost:8000/api/v1/contatos/1
----------------------------------------------
Exemplo:
{
    "nome": "Felipe",
    "sobrenome": "Alves",
    "email": "contato@felipeleal.eng.br",
    "telefone": "9987654321"
}
```

### Deleta Contato
```
DELETE  http://localhost:8000/api/v1/contatos/1
```


## Mensagem

### Lista todas as mensagens e seus respectivos contatos.
```
GET     http://localhost:8000/api/v1/mensagens
```

### Consulta uma mensagem e seu contato.
```
GET     http://localhost:8000/api/v1/mensagens/1
```

### Cria mensagem
```
POST    http://localhost:8000/api/v1/mensagens
----------------------------------------------
Exemplo:
{
    "contato_id": 1,
    "descricao": "Olá"
}
```

### Edita mensagem
```
PUT    http://localhost:8000/api/v1/mensagens/1
----------------------------------------------
Exemplo:
{
    "contato_id": 1,
    "descricao": "Tudo bem?"
}
```

### Deleta mensagem
```
DELETE  http://localhost:8000/api/v1/mensagens/1
```
