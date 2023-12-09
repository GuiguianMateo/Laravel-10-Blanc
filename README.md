<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# README
## Mise en Place
### Acces au site

Dans le fichier Homestead.yaml situer dans votre dossier User/"Nom d'utilisateur"/Homestead
Insere dans Sites ceci : 

    - map: cms.test
      to: /home/vagrant/code/cms_gestion/public

Ensuite dans databases : 

    - cms

### Base de Donnée

Vous allez créer un fichier qui se nomeras ".env" situer dans Homestead/code/cms_gestion
Vous copierez l'interrieur du fichier .env.exemple (à coter du fichier .env)
Et vous le collerez dans le fichier .env

Ensuite vous allez y modifier :

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=cms
    DB_USERNAME=homestead
    DB_PASSWORD=secret

Ainsi que :

    MAIL_FROM_ADDRESS="example@gmail.com"
    MAIL_FROM_NAME="Test mail"

### CMD
Dans un cmd windows vous allez pouvoir vous rendre dans homestead et y lancer la VM :

    cd Homestead
    vagrant up
    vagrant ssh

Et une fois dedans vous lancerez ces comandes

    cd code/cms_gestion
    artisan migrate
    artisan db:seed --class=MenuSeeder
    artisan db:seed --class=SousmenuSeeder
    artisan db:seed --class=PageSeeder

### Tinker

Créeation des utilisateurs

    User::create(["name"=> "Admin","email"=>"admin@gmail.com","password"=>bcrypt("adminadmin")]);
    User::create(["name"=> "Editor","email"=>"edit@gmail.com","password"=>bcrypt("editedit")]);

Ensuite la création des roles et leurs abilities

    Bouncer::allow('admin')->to('menu-create');
    Bouncer::allow('admin')->to('menu-show');
    Bouncer::allow('admin')->to('menu-edit');
    Bouncer::allow('admin')->to('menu-delete');
    Bouncer::allow('admin')->to('sousmenu-create');
    Bouncer::allow('admin')->to('sousmenu-show');
    Bouncer::allow('admin')->to('sousmenu-edit');
    Bouncer::allow('admin')->to('sousmenu-delete');

    Bouncer::allow('editor')->to('page-create');
    Bouncer::allow('editor')->to('page-show');
    Bouncer::allow('editor')->to('page-edit');
    Bouncer::allow('editor')->to('page-delete');

Puis assigner les roles aux utilisateurs

    $user = User::find(1);
    Bouncer::assign('admin')->to($user);

    $user = User::find(2);
    Bouncer::assign('editor')->to($user);

Pour finaliser rendez-vous dans l'url "cms.test"
Connectez-vous avec le compte que vous souaiter

    admin@gmail.com
    adminadmin

ou

    editor@gmail.com
    editedit

### Test

Pour ensuite tester les tests unitaires je vous laisse utiliser cette commande

    art test


