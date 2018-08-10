## Anotações sobre o Laravel 5.6 e como funciona o framework

### Introdução
 
[Itens em colchetes significam comandos de prompt]

(Comandos em parênteses são comandos e funções do Laravel)

## Conhecimentos básicos

Laravel pode ser instalado com o Composer

PHP Artisan são linhas de comandos que facilitam para a criação de diversas estruturas no projeto.

Middleware é o que faz as validações das requisões. Formulários, envios de posts, gets e etc. O middleware faz
a segurança destes dados

Migrations manipula o database. Facilita para criar tabelas e apagar-las.

Sedders sementes onde se cria registros nas tabelas sem ser de forma visual.

## Artisan

[php artisan] => Menu artisan

[php artisan serve] => Cria um servidor local do próprio php para que possamos usar

[Control + C] => Parar o servidor Artisan

[php artisan migrate] => Run and update modifications on migrations

[php artisan make:controller AlgumaCoisa --resource] => Resource cria um controllador padrão. Com métodos
de deletar, listar, fazer update, criar e outros.

## Funções e Métodos Laravel

(@csrf) => Input token

(dd) => var_dump com exit

(@section)=> Diz os valores de um blade template

(@extends)=> Pega o blade template que será utilizado na view

(@yield)=> Cria a variável do blade template

(@component)=> Lembra um include, porém com mais funcionalidades. Ele inclui uma view onde podemos informar variáveis.
