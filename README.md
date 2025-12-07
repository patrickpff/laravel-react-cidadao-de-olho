# 🕵️‍♂️ Cidadão de Olho — Laravel + React

Projeto desenvolvido como parte do processo seletivo da Codificar Sistemas Tecnológicos, desta vez utilizando Laravel no backend e React no frontend.
A proposta do sistema é consumir dados de uma API pública, armazená-los localmente e exibi-los em uma interface web moderna.

> 🔗 Projeto original no GitLab:
> https://gitlab.com/patrickpff/laravel-react-cidadao-de-olho

# 📁 Estrutura do Repositório
```.
├── laravel-react-cidadao-de-olho-backend # API desenvolvida em Laravel
│ ├── app
│ ├── bootstrap
│ ├── config
│ ├── database
│ ├── public
│ ├── resources
│ ├── routes
│ ├── storage
│ ├── tests
│ ├── .editorconfig
│ ├── .env.example
│ ├── .gitattributes
│ ├── .gitignore
│ ├── .styleci.yml
│ ├── artisan
│ ├── composer.json
│ ├── composer.lock
│ ├── package.json
│ ├── phpunit.xml
│ ├── README.md
│ ├── server.php
│ └── webpack.mix.js
├── react-cidadao-de-olho-frontend # Interface web desenvolvida em React
│ ├── public
│ ├── src
│ ├── .gitignore
│ ├── package-lock.json
│ ├── package.json
│ └── README.md
└── README.md
```
# ⚙️ Tecnologias Utilizadas
## Backend (Laravel)
- **Laravel 8.x (mínimo 8.65)**
- PHP 7.3+ ou 8.0+
- MySQL  
- Composer

## Frontend (React)
- **React 17.x (mínimo 17.0.2)**
- React DOM 17.x  
- React Router DOM 6.x  
- TypeScript  
- Axios  
- Bootstrap 5  
- Yarn ou NPM

# 🚀 Como executar o projeto
## 1️⃣ Backend (Laravel)

Acesse a pasta:
```
cd laravel-react-cidadao-de-olho-backend
```

Instale as dependências:
```
composer install
```

Crie o arquivo .env:
```
cp .env.example .env
```

Configure o banco de dados e rode os comandos:
```
php artisan key:generate
php artisan migrate
php artisan serve
```

A API iniciará em:

http://localhost:8000

## 2️⃣ Frontend (React)

Acesse a pasta:
```
cd react-cidadao-de-olho-frontend
```

Instale as dependências:
```
npm install
```

ou
```
yarn
```

Substitua a URL da API caso necessário no arquivo de configuração (localizada em src/services/api.service.ts).

Inicie o projeto:
```
npm start
```

ou
```
yarn start
```

A aplicação estará disponível em:

http://localhost:3000

# 📥 Sincronização dos Dados

Dentro da interface web há um botão para sincronizar as informações da API externa.

Como o volume de dados pode ser grande, o processo leva alguns minutos.
Aguarde até a mensagem de conclusão.

# ✨ Funcionalidades

- Sincronização de dados provenientes de API externa
- API REST em Laravel
- Frontend moderno em React
- Listagem e busca de informações
- Interface limpa e intuitiva

# 📌 Observações

O arquivo .gitlab-ci.yml foi removido na migração do GitLab para GitHub.

Este repositório reúne backend e frontend para facilitar o acesso no portfólio.