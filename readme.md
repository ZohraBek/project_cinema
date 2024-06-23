Ce projet Symfony s'inscrit dans la validation du module Symfony. 
J'ai fais le choix de réaliser une app de festival de cinéma dans l'agglomération lyonnaise. 

Installation du projet 

Installer le projet avec Composer :

- symfony new project --version=6.4 --webapp

Lancement du serveur : 

- symfony serve --no-tls

Generer des controllers : 

- php bin/concole make: controller

Créer un fichier .env.local à la racine du projet & configurer la base de donnée :

DATABASE_URL="mysql://username:password@127.0.0.1:port/db_name?serverVersion=8.0.32&charset=utf8mb4"

Lancez les commandes :

php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate

Crud Automatique : 

php bin/console make:crud

Installer les fixtures :

- composer require --dev orm-fixtures

php bin/console doctrine:fixtures:load

Faker : utilisation de donées aleatoires

EasyAdmin : 

- composer require easycorp/easyadmin-bundle

Pour la création du DashBoard : 

- php bin/console make:admin:dashboard
- php bin/console make:admin:crud