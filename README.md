# EndereçosPro 🏠

Bem-vindo ao projeto EndereçosPro. 
Este é um aplicativo simples de gerenciamento de endereços, desenvolvido como parte do teste prático para a posição de Desenvolvedor Backend na 704 Apps.

## Sobre o Teste

O EndereçosPro é uma aplicação que permite operações básicas de criação, leitura, atualização e exclusão (CRUD) de endereços. Utilizando tecnologias modernas e integrando-se ao Google API, o aplicativo oferece uma solução robusta para o gerenciamento de dados de endereços.

## Tecnologias

- Docker
- Laravel 11
- Redis
- Arquitetura aplicada: Clean Arch
- Base de dados relacional: Mysql
- Repository Pattern (PSR-11)
- Estilo de código (PSR-12)
- TDD (Test Driven Development)

## Como Iniciar

Para iniciar o projeto localmente, siga as instruções abaixo:

1. Certifique-se de ter o Docker e o Docker Compose instalados na sua máquina.
2. Crie um arquivo `.env` com base no `.env.example` fornecido.
3. Execute `docker-compose up -d` para iniciar o servidor.

## Funcionalidades Principais

- **Integração com Google API:** Conecte-se ao Google API para obter informações precisas sobre endereços.
- **Operações de CRUD:** Adicione, visualize, atualize e delete endereços com facilidade.

## Requisitos para o Teste

O sistema deve conter:
- Integração com a API do Google Maps
- Listagem de endereços durante a pesquisa, sendo atualizado à medida que o usuário
  vai digitando
- Cadastro do endereço escolhido no banco
- Edição do endereço
  - Campos devem ser separados em:
    - Estado
    - Cidade
    - Bairro
    - Logradouro
    - Número
- A stack deve ser da seguinte forma:
- Linguagem PHP
- Desenvolver backend com o framework Laravel:
- Utilizar algum banco de dados relacional, mysql, postgres, etc.
