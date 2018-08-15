## Anotações sobre o Laravel 5.6 e como funciona o framework

### Introdução

Laravel pode ser instalado com o Composer

PHP Artisan são linhas de comandos que facilitam para a criação de diversas estruturas no projeto.

Middleware é o que faz as validações das requisões. Formulários, envios de posts, gets e etc. O middleware faz
a segurança destes dados

Migrations manipula o database. Facilita para criar tabelas e apagar-las.

Sedders sementes onde se cria registros nas tabelas sem ser de forma visual.

### Artisan

[php artisan] => Menu artisan

[php artisan serve] => Cria um servidor local do próprio php para que possamos usar

[Control + C] => Parar o servidor Artisan

[php artisan migrate] => Run and update modifications on migrations

[php artisan make:controller AlgumaCoisa --resource] => Resource cria um controllador padrão. Com métodos
de deletar, listar, fazer update, criar e outros.

[php artisan make:migration nome_da_criação --table=nome_da_tabela] => Adiciona um campo novo em uma tabela já criada

[php artisan migrate:fresh] => Apaga todas as tabelas criadas e roda o script de migrations um por um novamente

[php artisan migrate:reset] => Rollback completo e todos os scripts das migrações


### Funções e comandos do Blade

(@csrf) => Input token.

(@section)=> Diz os valores de um blade template.

(@extends)=> Pega o blade template que será utilizado na view.

(@yield)=> Cria a variável do blade template.

(@component)=> Lembra um include, porém com mais funcionalidades. Ele inclui variáveis em uma view, podendo assim
otimizar de maneira mais eficiente alguns trechos HTML ou CSS.

(@empty) => Compara se uma variável/array existe elementos ou não.

(@hasSection) => Verifica se há uma sessão do laravel sendo utilizada no layout da view. O bloco hasSection termina com um (@endif) no final 


### Funções e comandos do Laravel

(dd) => var_dump com exit.

(csrf_field()) => Input token




