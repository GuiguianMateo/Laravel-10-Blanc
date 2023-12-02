<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Gestion de boutique
Installation
Mise en place du projet
Mettre le dossier boutique dans le dossier Homestead/code

Modifier le fichier Homestead.yaml

Ajouter dans sites :

  - map: boutique.test
    to: /home/vagrant/code/boutique/public
Ajouter dans databases :

  - boutique
Paramétrage de la base de données
Modifier le fichier .env en changeant les lignes suivantes :

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=boutique
    DB_USERNAME=root
    DB_PASSWORD=secret
Exécuter le cmd Windows, puis aller dans le dossier Homestead/

Exécuter ces lignes de commande :

  vagrant ssh
  cd /code/boutique
  composer install
Alimentation de la base de données
Exécuter ces commandes pour alimenter la base de données :

  php artisan db:seed --class=VenteSeeder
  php artisan db:seed --class=ProduitSeeder
  php artisan db:seed --class=MarqueSeeder
Création des utilisateurs
Tinker :
Créer le premier utilisateur :

    artisan tinker
    $user = new App\Model\User;
    $user->name = 'Charles';   <-- _Exemple de nom_
    $user->email = "charles@gmail.com";
    $user->password=bcrypt('123456789');
    $user->save();
Faire pareil pour le deuxième utilisateur mais changer le nom et l'adresse mail

Gestion des rôles et habilitations
Bouncer
Se rendre à l'utilisateur Charles avec les commandes suivantes (ici l'id numéro 1) :

    $user = User::find(1);
    Bouncer::allow('vendeur')->to('vente-create');
    Bouncer::allow('vendeur')->to('vente-update');
    Bouncer::allow('vendeur')->to('vente-retrieve');
    Bouncer::assign('vendeur')->to($user);
Faire de même avec l'utilisateur 2 :

    $user = User::find(2);
    Bouncer::allow('gerant')->to('vente-create');
    Bouncer::allow('gerant')->to('vente-update');
    Bouncer::allow('gerant')->to('vente-retrieve');
    Bouncer::allow('gerant')->to('produit-create');
    Bouncer::allow('gerant')->to('produit-update');
    Bouncer::allow('gerant')->to('produit-retrieve');
    Bouncer::allow('gerant')->to('marque-create');
    Bouncer::allow('gerant')->to('marque-update');
    Bouncer::allow('gerant')->to('marque-retrieve');
    Bouncer::assign('gerant')->to($user);
Sauvegarder le tout :

    Bouncer::refresh()
Aller sur le site boutique.test sur votre navigateur et se connecter avec les identifiants créés précédemment

### README
## Mise en Place
# Acces au site

Dans le fichier Homestead.yaml situer dans votre dossier User/"Nom d'utilisateur"/Homestead
Insere dans Sites ceci : 

    - map: cms.test
      to: /home/vagrant/code/cms_gestion/public

Ensuite dans databases : 

    - cms

# Base de Donnée

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

# CMD
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

# Tinker

