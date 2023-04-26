# Tutorial de CRUD em Laravel + VueJs + InertiaJs

** Tomar como base o CRUD de Users **

1) Criar um model:<br>
    ```php artisan make:model Model```
    
    *O nome do model é sempre iniciado com letra maiúscula. Ex: Products;*<br>
    *Procure usar inglês para nomeclatura de variáveis, atributos etc.*<br>
    *Esse comando deve ser rodado fora do docker container.*

2) Criar policy:<br>
    ```php artisan make:policy ModelPolicy --model=Model```<br>
    Ex: php artisan make:policy UserPolicy --model=User

3) Criar migration:<br>
    ```php artisan make:migration create_models_table```
    Ex: php artisan make:migration create_users_table

4) Adicionar permissões aos seeders PermissionSeeder e RoleSeeder. As permissões sempre são:<br>
    'model.read'<br>
    'model.create'<br>
    'model.update'<br>
    'model.delete'<br>

5) Rodar comando para atualizar banco e seeders (deve ser rodado dentro do docker container):<br>
    ```php artisan migrate```<br>
    ```php artisan db:seed```<br>    

6) Criar Requests:<br>
    ```php artisan make:request CreateModelRequest```<br>
    ```php artisan make:request UpdateModelRequest```<br>

7) Criar Controller:<br>
    ```php artisan make:controller ModelController --resource```<br>

8) Criar Routes:<br>
    Adicione as rotas do model no routes.php<br>

9) Criar pasta para o model no resources/js/Pages/Model. Dentro da pasta devem ter os arquivos:<br> 
    * Index.vue
    * Create.vue
    * Show.vue
    * Form.vue
    * Edit.vue
