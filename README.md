
Para a execução deste sistema é necessário :
A instalação do xampp : https://www.apachefriends.org/pt_br/download.html

Do node.js: https://nodejs.org/en/download

Manual para instalção PHP : https://www.php.net/manual/pt_BR/install.php

Instalar o composer : https://getcomposer.org/

Rodar comando no powershell ou pront de comando para instalar o laravel

composer global require laravel/installer

Após esses passos abrir o xampp clicar em start no apache e tambem no Mysql

No navegador Pesquisa por phpmyadmin

Criar um banco de dados com o nome db_contatos 

Após esses passos baixar o projeto aqui disponibilizado 

Abra a pasta do projeto no terminal

Execute 'composer install' para instalar dependencias, espere barxar os arquivos e execute o comando 'php artisan key:generate'


Após isso edite o arquivo .env.example para .env

Depois entre no aquivo e confira ele esta fazendo a conexão com o banco de acordo com seus atributos exemplo se o banco de dados está na porta correta e mude o nome descrito la para o nomedo banco de dados criado
  
Execute os seguintes comandos :

php artisan migrate

A seguir execute o: 

php artisan serve

Após esses passos o projeto está pronto para ser usado

