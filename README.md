## turim-challenge
Challenge para vaga de estagio 

## Micro App - Cadastro de Pessoas e Filhos

Este projeto é uma microaplicação que permite cadastrar pessoas, seus filhos e gerar um JSON dinâmico. Os dados podem ser salvos e recuperados de um banco MySQL utilizando PHP orientado a objetos.

## Funcionalidades

- Inserção de pessoas e seus filhos
- Geração dinâmica de JSON
- Salvamento de dados no banco MySQL
- Leitura e reconstrução dos dados a partir do banco

## Banco de Dados

Tabelas:
- **pessoa (id, nome)**
- **filho (id, id_pessoa, nome)**

Script SQL disponível em `/script.sql`.

## Tecnologias Utilizadas

- Frontend: HTML, CSS, JavaScript
- Backend: PHP (Orientado a Objetos)
- Banco de Dados: MySQL

## Como Executar

1. Clone este repositório
2. Crie o banco de dados utilizando o script `script.sql`
3. Configure as credenciais de banco no arquivo `database.php`
4. Execute em um servidor local (ex.: XAMPP, WAMP ou MAMP)
5. Acesse o `index.html` no navegador

## Autor

Michael Botelho