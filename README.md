
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

No terminal abrir a pasta do projeto
  
Execute os seguintes comandos 

php artisan make:migrate

A seguir execute o 

php artisan serve

Após esses passos o projeto está pronto para ser usado

