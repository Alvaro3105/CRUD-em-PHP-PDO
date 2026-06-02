# 🚗 CRUD de Veículos com PHP & PDO

Este repositório contém uma aplicação web completa para o gerenciamento de veículos, desenvolvida em **PHP estruturado** integrado ao banco de dados **MySQL**. O projeto foi construído como parte de uma avaliação prática de desenvolvimento backend.

O foco principal foi implementar todas as operações fundamentais de um banco de dados (**CRUD**) seguindo padrões rígidos de arquitetura nativa e segurança.

## 🛠️ Tecnologias e Recursos Utilizados

* **PHP 8.x:** Linguagem base para a lógica do servidor e renderização dinâmica de dados.
* **MySQL:** Banco de dados relacional para persistência das informações de placas, modelos e anos dos veículos.
* **PDO (PHP Data Objects):** Abstração de banco de dados robusta para consultas seguras.
* **Prepared Statements:** Implementado em todas as querys de mutação (`INSERT`, `UPDATE`, `DELETE`) para garantir proteção total contra ataques de **SQL Injection**.
* **Sanitização de Dados:** Uso estratégico de `htmlspecialchars()` na listagem para prevenir vulnerabilidades de **XSS (Cross-Site Scripting)**.

## ⚙️ Funcionalidades do Sistema

1. **Listagem Principal (`index.php`)**: Exibe uma tabela com todos os veículos cadastrados no banco de dados e oferece ações rápidas para edição e exclusão.
2. **Cadastro (`veiculos.create.*`)**: Interface amigável com validação de campos obrigatórios via backend antes de persistir os dados no banco.
3. **Edição (`veiculos.edit.*`)**: Recupera dinamicamente os dados do veículo selecionado via parâmetro `GET`, preenche o formulário e executa a atualização via `POST`.
4. **Exclusão (`veiculos.delete.process.php`)**: Remove o registro do banco de dados através do ID enviado, contando com uma camada extra de confirmação via JavaScript direto na interface do usuário.

## 📁 Organização do Projeto

A estrutura de arquivos foi dividida de forma limpa entre visualizações (views) e scripts de processamento interno:

```text
├── db.connection.php           # Configuração e inicialização da conexão PDO com tratamento de erros
├── index.php                   # Tela principal de listagem (Read)
├── veiculos.create.view.php    # Formulário HTML de cadastro (Create)
├── veiculos.create.process.php # Processamento e inserção no banco de dados
├── veiculos.edit.view.php      # Formulário HTML de edição populado dinamicamente
├── veiculos.edit.process.php   # Processamento e atualização no banco de dados (Update)
└── veiculos.delete.process.php # Processamento de remoção de registros (Delete)
