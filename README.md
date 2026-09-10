# CRUD de Veículos com PHP e PDO

Aplicação web acadêmica para gerenciamento de veículos, desenvolvida em **PHP estruturado** com persistência em **MySQL** através de **PDO**.

O projeto foi criado para praticar operações CRUD, validação no backend, consultas parametrizadas e separação simples entre formulários e scripts de processamento.

## Funcionalidades

- listar veículos cadastrados;
- cadastrar veículo;
- editar veículo existente;
- excluir veículo através de requisição `POST` com confirmação na interface;
- validar ID, placa, modelo e ano no backend;
- interface responsiva para desktop e celular.

## Tecnologias

- PHP 8.x
- MySQL
- PDO
- HTML5
- CSS3

## Boas práticas aplicadas

- prepared statements nas operações com dados fornecidos pelo usuário;
- `htmlspecialchars()` ao renderizar dados do banco no HTML;
- exclusão realizada via `POST`, evitando alteração de estado através de links `GET`;
- validação de IDs com `FILTER_VALIDATE_INT`;
- configuração de banco por variáveis de ambiente, com valores locais de fallback;
- `PDO::ATTR_EMULATE_PREPARES = false`;
- mensagem de erro de conexão sem expor detalhes internos do banco ao navegador.

Essas medidas reduzem riscos comuns, mas não são apresentadas como "proteção total". Uma aplicação de produção ainda exigiria controles adicionais, como autenticação, autorização e proteção CSRF.

## Estrutura

```text
CRUD-em-PHP-PDO/
├── database.sql
├── README.md
└── TPA_E1_3E2_02_Alvaro_Pires_De_Souza/
    ├── db.connection.php
    ├── index.php
    ├── style.css
    ├── veiculos.create.view.php
    ├── veiculos.create.process.php
    ├── veiculos.edit.view.php
    ├── veiculos.edit.process.php
    └── veiculos.delete.process.php
```

## Banco de dados

O arquivo `database.sql` cria o banco `prova_crud` e a tabela `veiculos`.

```bash
mysql -u root -p < database.sql
```

A conexão aceita as seguintes variáveis de ambiente:

```text
DB_HOST
DB_NAME
DB_USER
DB_PASSWORD
```

Sem essas variáveis, o projeto utiliza os valores locais originais da atividade: `localhost`, banco `prova_crud` e usuário `root`.

## Como executar

1. Clone o repositório.
2. Importe `database.sql` no MySQL.
3. Configure as variáveis de ambiente, caso necessário.
4. Entre na pasta da aplicação.
5. Inicie o servidor embutido do PHP:

```bash
cd TPA_E1_3E2_02_Alvaro_Pires_De_Souza
php -S localhost:8000
```

6. Acesse `http://localhost:8000` no navegador.

## Contexto

Projeto acadêmico desenvolvido durante minha formação técnica em TI para praticar PHP, PDO, MySQL, CRUD e segurança básica em aplicações web.

## Autor

**Álvaro Pires de Souza**

- GitHub: https://github.com/Alvaro3105
- LinkedIn: https://www.linkedin.com/in/alvaro-pires-de-souza/
- Portfólio: https://alvaro3105.github.io/Portfolio/
