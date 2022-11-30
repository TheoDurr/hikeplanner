<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Prérequis
- Docker (pour lancer un conteneur pouvant recevoir les mails)
- PHP 8.0 & composer
- Laravel 9.34
- NodeJS & npm

## Installer le projet
### Dépendances
Il faut dans un premier temps installer les dépendances composer et npm
```shell
composer install && npm install
```
### Base de données
#### Connexion
Maintenant que l'application est créée, il faut lui connecter la base de données. Cela se passe dans le fichier `.env`

> Si ce fichier n'existe pas, vous pouvez copier le fichier `.env.example`

```dotenv
DB_CONNECTION=mysql 
DB_HOST=127.0.0.1 
DB_PORT=3306 
DB_DATABASE=laravel 
DB_USERNAME=root 
DB_PASSWORD= 
```
#### Migration et population
> Un fichier `db.sql` est fourni avec le projet, il contient tout le schéma et ses données permettant d'évaluer le projet.
> 
> Les commandes qui suivent sont **optionnelles**.

Pour appliquer le schéma à la base de données, il faut exécuter `php artisan migrate`.

Nous avons également mis a disposition des données factices pour simuler une base de données remplie. Celle-ci contient des utilisateurs et les catégories de bases pour les activités, les niveaux d'utilisateurs et les difficultés d'activités. La commande est `php artisan db:seed`.


### Lancement du serveur SMTP local
Notre projet implémente la vérification des utilisateurs par mail, il faut donc lancer un serveur smtp en local. La solution la plus simple est [maildev](https://hub.docker.com/r/maildev/maildev).

Il suffit d'exécuter la commande suivante et d'accéder à http://localhost:1080
```shell
docker run -p 1080:1080 -p 1025:1025 maildev/maildev
```

La configuration de base située dans le fichier `.env.example` est suffisante pour que l'ensemble fonctionne.

### Lancer le projet
Pour exécuter le projet, il faut lancer le serveur Vite et Laravel.

Dans deux terminaux distincts :
```shell
npm run dev

php artisan serve
```


### Se connecter avec un utilsateur de test

Vous pouvez vous connecter avec cet utilisateur préconçu :

login : eveillesimon@gmail.com<BR>
mot de passe : testtest

Vous pouvez aussi créer votre propre utilisateur (à condition d'avoir mis en place le serveur SMTP local).
