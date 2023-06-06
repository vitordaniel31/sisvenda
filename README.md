<h1 align="center">

</h1>

<h4 align="center"> 
	🛍️  Sistema de Compra e Venda de Loja de Roupas 🛍️
</h4>

<p align="center">
 <a href="#-sobre-o-projeto">Sobre</a> •
 <a href="#-funcionalidades">Funcionalidades</a> •
 <a href="#-layout">Layout</a> • 
 <a href="#-como-executar-o-projeto">Como executar</a> • 
 <a href="#-tecnologias">Tecnologias</a> • 
 <a href="#-contribuidores">Contribuidores</a> • 
 <a href="#-autor">Autor</a> • 
 <a href="#user-content--licença">Licença</a>
</p>


## 💻 Sobre o projeto

🛍️ Sistema de Compra e Venda de Loja de Roupas - O projeto consiste na criação de um sistema que seja capaz de auxiliar o administrador a gerenciar as vendas de sua loja de roupas. De modo que possa ser facilmente cadastrado todas as vendas realizadas e que o dono da loja possa observar o funcionamento da empresa com mais eficácia.

---

## ⚙️ Funcionalidades

- [x] O administrador tem acesso a sua loja virtual contendo:
  - [x] Cadastro, edição e visualização de administradores; 
  - [x] Cadastro, edição e visualização de produtos;
  - [x] Cadastro, edição e visualização de vendas;
  - [x] Relatórios periódicos;
  - [x] Com isso, ele poderá: 
    - Gerenciar sua loja;
    - Observar o lucro mensal, produto mais vendido e métodos de pagamento e mais utilizados.

---

## 🎨 Layout


<!--### Mobile

<p align="center">
  <img alt="login-mobile" title="#login-mobile" src="#" width="200px">

  <img alt="home-mobile" title="#home-mobile" src="#" width="200px">
</p>

### Web

<p align="center" style="display: flex; align-items: flex-start; justify-content: center;">
  <img alt="login-web" title="#login-web" src="#" width="400px">

  <img alt="home-web" title="#home-web" src="#" width="400px">
</p>-->

---

## 🚀 Como executar o projeto

**O tutorial abaixo assume que você já tenha instalado o **[Docker](https://www.docker.com/)**
 em sua máquina.\**

### Instalação
```bash
git clone https://github.com/vitordaniel31/sisvenda.git

cd sisvenda

docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs

docker compose up -d &&
docker exec -it sisvenda-laravel-1 bash

cp .env.example .env &&
cp .env.testing.example .env.testing &&
php artisan key:generate &&
php artisan key:generate --env=testing &&
php artisan migrate --seed &&
npm install

```
### Inicialização
```bash
docker compose up -d &&
docker exec -it sisvenda-laravel-1 bash

npm run dev

```

Aplicação Local (http://localhost:8000)

---

## 🛠 Tecnologias

As seguintes ferramentas foram usadas na construção do projeto:

-   **[GitHub](https://github.com/)**
-   **[Laravel](https://laravel.com/)**
-   **[MySQL](https://www.mysql.com/)**
-   **[Vue Js](https://vuejs.org/)**
-   **[Inertia Js](https://inertiajs.com/)**
-   **[Docker](https://www.docker.com/)**

> Veja o arquivo  [package.json](https://github.com/vitordaniel31/sisvenda/blob/main/package.json)
---
## ✒️ Autores

<table>
  <tr>
    <td align="center"><a><img style="border-radius: 50%;" src="https://avatars.githubusercontent.com/u/74608458?v=4" width="100px;" alt=""/><a href="https://github.com/joseP1432" title=""><br /><sub><b> José Marques</b></sub></a><br /></td>
    <td align="center"><a><img style="border-radius: 50%;" src="https://avatars.githubusercontent.com/u/53538678?v=4" width="100px;" alt=""/><a href="https://github.com/ketwy"><br /><sub><b>Ketlly Azevedo</b></sub></a><br /></td>
    <td align="center"><a><img style="border-radius: 50%;" src="https://avatars.githubusercontent.com/u/51799954?v=4" width="100px;" alt=""/><a href="https://github.com/vitordaniel31" title=""><br /><sub><b>Vitor Daniel</b></sub></a><br /></td>
    <td align="center"><a><img style="border-radius: 50%;" src="https://avatars.githubusercontent.com/u/87488505?v=4" width="100px;" alt=""/><a href="https://github.com/hugo2m" title=""><br /><sub><b>Hugo Maia</b></sub></a><br /></td>
    
  </tr>
</table>

---

## 📝 Licença

Este projeto esta sobe a licença [MIT](https://github.com/vitordaniel31/sisvenda/blob/main/LICENCE).