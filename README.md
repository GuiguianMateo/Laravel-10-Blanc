<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## README

Une fois que vous avez installé tout les fichers ci-dessus, je vous invite à prendre le fichier '.env.exemple', copier son contenu
et le coller dans le ficher '.env'.

Avec ceci vous allez pouvoir vous connecter à la base de donnée, vous allez remarquer que celle-ci est vide en donnée.

Vous aller donc pouvoir ouvrir un cmd, vous rendre dans le fichier 'Homestead', et lancer la commande 'vagrant ssh'.
Ensuite diriger vous vers votre projet, et lancer les commandes 'artisan db:seed --class=MenuSeeder', puis 'artisan db:seed --class=SousMenuSeeder',
et enfin 'artisan db:seed --class=PageSeeder' pour obtenir de multiple donnée dans votre base.

Pour ensuite voir tout ceci, rendez vous dans votre naviguateur et taper dans l'url : 'cms.test'.
Alors il ne vous reste plus qu'a vous connecter
