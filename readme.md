# Project WP Theme

## Descrição
O tema **Project WP** é composto por:
- **Home**: Página inicial com todos os projetos listados.
- **Projetos**: Página com uma side-bar onde há uma lista de filtros por tipo e a listagem de todos os projetos, podendo ser filtrados a partir do menu lateral.
- **Single**: Página do projeto individual contendo o nome do projeto, data, descrição detalhada e um botão com link externo para visualizar o projeto; há também abaixo uma lista de projetos relacionados (pelo tipo).
- **Contato**: Página de contato onde há um formulário simples.

## Passos Necessários para Utilização do Tema
1. Instalar/Baixar o WordPress.
2. Ir até a pasta do WordPress > `wp-content` > `themes` > `test-projects`
3. Na pasta `themes`, baixar o tema utilizando `git clone https://github.com/profhdeivisson/project-wp-theme.git`.

## Dependências/Plugins
- Instalar o **node** e o **npm**.
- Para instalar as dependências, basta rodar o comando `npm install` na pasta `/test-projects`.
- Plugin **Contact Form 7** (WordPress).
- Plugin **Advanced Custom Fields - ACF** (WordPress).
- **WP Mail SMTP** (WordPress). *Obs*: Este plugin é necessário para configurar o SMTP para funcionamento correto do formulário de contato.

## Observações
- Caso precise atualizar o CSS, será necessário mexer na pasta `/test-projects/scss` no arquivo `style.scss`. Para compilar esse arquivo para a pasta `/css/style.css`, basta rodar o comando `npm run compile-scss` dentro da pasta `/test-projects`.
