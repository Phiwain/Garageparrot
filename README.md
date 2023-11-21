# Garageparrot
ecf nov 2023

Pour lancer le projet en local 
------------------------------
      - telecharger l'ensemble du projet depuis le dépot gitHub
      - ouvrir le .env et changer l'utilisateur,le mot de passe, l'adresse, le port et le nom de la database
      - (creation de l'ADMIN) dans le fichier de migration: changer l'email, le nom, le prenom et le password (avant l'encodage) afin qu'ils correspondent à vos souhait pour l'utilisateur ADMIN
      - lancer votre serveur local (MAMP,XAMP, WAMP)
      - ouvrir le terminal de votre éditeur
      - taper la commande: symfony console doctrine:database:create
      - taper la commande: symfony console doctrine:migration:migrate
      - taper la commande: php composer.phar 
      - taper la commande: symfony server:start
      - ouvrir l'ip que le terminal vous donne (127.0.0.1:3306 en general)



