Ce projet Symfony s'inscrit dans la validation du module Symfony. 
J'ai fais le choix de réaliser une app de festival de cinéma dans l'agglomération lyonnaise. 

I. Installation du projet 

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

Installer un server local SMTP pour pouvoir recevoir les mails envoyés par Symfony.

Pour Windows 📠
Assurez-vous d'avoir installé Docker sur votre machine.

Lancez cette commande sur votre terminal :

docker run -d --name=mailtrap -p 8025:80 -p 1025:25 eaudeweb/mailtrap
Lancez le docker avec :

docker start mailtrap
Rendez-vous sur l'interface utilisateur 127.0.0.1:8025 pour pouvoir se connecter avec les informations suivantes :

Identifiant : mailtrap
Mot de passe : mailtrap
Ajoutez dans le fichier .env.local la configuration du Mailer :

MAILER_DSN=smtp://127.0.0.1:1025

Installer les fixtures :

- composer require --dev orm-fixtures

php bin/console doctrine:fixtures:load

Faker : utilisation de donées aleatoires