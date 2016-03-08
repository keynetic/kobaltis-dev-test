# Kobaltis test technique

### Sujet

Réaliser une application web utilisant PHP/HTML/CSS(/JS/...).
Cette application doit permettre de pouvoir déposer des commentaires sur un profil GitHub.

### Fonctionnalités
* Je ne dois pas être capable d'acceder à l'application sans passer par l'inscription/connexion
* Lors de la connexion, je trouve une page qui me liste les commentaires que j'ai déjà pu déposer par le passé
* Je dois avoir la possibilité de rechercher un profil GitHub, puis de saisir un commentaire sur celui-ci (le choix du système de stockage est libre).

### Règles

* Faire un maximum de commits, afin de détailler les étapes du raisonnement au cours du développement.
* N'hésitez pas à nous faire des retours et nous expliquer les éventuelles problématiques bloquantes que vous auriez rencontrées durant le développement vous empéchant de finir.

### Setup

* La charte graphique n'est pas imposée et sera jugée en bonus. L'emploi d'un framework CSS type Twitter Bootstrap est fortement conseillé. 
* Vous aurez besoin d'un environnement >= php5.5 et d'un serveur pour l'application

### Les pré-requis

* Vous ne devriez pas passer plus de 4h sur le projet, temps d'installation compris
* Vous êtes libres d'utiliser un Framework, un système de template, un système de stockage ou d'authentification particulier, ...
* Vous devez vous servir de l'API de GitHub pour récupérer les utilisateurs:
 https://developer.github.com/v3/search/#search-users . 
* Vous devez appeller l'API suivante avec q=searchFieldContent :
```
https://api.github.com/search/users
```
* On attend aussi de vous que le code soit testable et testé.

### Bonus

* On changera le choix du dépôt par un multiselect afin de lister directement dans le formulaire les dépôts de l'utilisateur. 
* Utilisation d'un frameworkJS pour afficher les résultats
* Utilisation d'outil d'automatisation (webpack, gulp, grunt, ...)
* Toutes les fonctionnalités que vous aurez le temps d'ajouter seront aussi bonnes à prendre. Un bonus autour de votre créativité pourra être considéré.

### Délivrabilité

* Forkez le projet sur GitHub et codez directement dans le projet forké. 
* Commitez aussi souvent que possible et commentez vos commits pour détailler votre chemin de pensée. 
* Mettez à jour le README pour ajouter le temps passé et tout ce que vous jugerez nécessaire de nous faire savoir (installation, commandes, récupération de dépot, ...)
* Envoyez le lien avec le projet à dev@kobaltis.com. 

**Bonne chance !**