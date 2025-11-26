### Mentions légales & utilisation du contenu

Ce projet est destiné à un usage strictement éducatif et non lucratif.
Il a été réalisé dans le cadre d’un projet scolaire en école d’ingénieur.
Toute utilisation à des fins commerciales ou non éducatives est interdite.

Ce projet reprend des éléments de l’univers du jeu Wuthering Waves, dont je ne détiens aucun droit.
Pour toute demande concernant l'utilisation de ressources officielles, merci de vous tourner vers l’éditeur du jeu.

### Requis

- [PHP 8.4.13](https://www.php.net/downloads.php) installé et configuré pour MySQL
- [Serveur MySQL](https://dev.mysql.com/downloads/mysql/8.0.html) installé et configuré, accessible une invite de commande

### Installation

Copier le fichier `app/Config/dev_sample.ini` en `app/Config/dev.ini` et modifier les valeurs (`dsn`, `user` et `pwd`) par celles de votre base de données.

Exemple pour une base de données MySQL locale (port 3306) dont le nom de la base est `wuthering_waves` et dont l'utilisateur est `root` et le mot de passe est `motdepasse`.:

```bash
;config dev
[DB]
dsn = 'mysql:host=127.0.0.1:3306;dbname=wuthering_waves;charset=utf8';
user = 'user';
pwd = 'motdepasse';
```

Le script permattentant de construitre la base de données est dans app/SQL/wuthering_waves.sql
Il vous suffira de lancer tous les scipts pour initaliser la BDD

Rendez vous dans à l'aide de votre CMD dans le dossier app/ et lancer la commande (remplacez `php` par le chemin vers votre version de PHP si besoin) :
```bash
php -S 127.0.0.1:8000
```

Le site web sera accessible sur [http://127.0.0.1:8000/](http://127.0.0.1:8000/)

Même si la fonction n'est pas terminé, des utilisateurs en base ont été créé avec les identifiants suivant :

- `test`, `test`
- `admin`, `admin`

### Point d'arrêt dans les TPs

Partie 6 - J'ai seulement créé les classes et fonction de base pour se connecter mais rien de concret