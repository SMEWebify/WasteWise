![image](https://github.com/user-attachments/assets/e39adad9-d1e6-4659-bce8-6f0d416f75ab)


# WasteWise

WasteWise est une application de gestion des déchets conçue pour aider les entreprises à optimiser leur gestion des déchets tout en réduisant les coûts. Elle permet également de suivre l'évolution des opérations en temps réel et de générer des rapports et des analyses détaillées pour améliorer l'efficacité.

## Fonctionnalités

### 1. Gestion des Déchets
- Suivi des déchets collectés, triés, et recyclés.
- Gestion des différentes catégories de déchets.
- Visualisation des tendances et des performances de gestion des déchets.

### 2. Optimisation des Coûts
- Analyse des coûts associés à la gestion des déchets.
- Identification des opportunités d'optimisation des coûts.
- Intégration de données pour ajuster les processus et réduire les coûts.

### 3. Suivi en Temps Réel
- Suivi en temps réel des opérations de gestion des déchets, des collectes aux traitements.
- Notifications en temps réel des anomalies ou des événements importants.

### 4. Rapports et Analyses
- Génération de rapports détaillés sur les volumes de déchets, les coûts, et les performances.
- Analyse des données pour optimiser les processus et aider à la prise de décision stratégique.

## Technologies Utilisées

- **Backend**: [Laravel](https://laravel.com/) (PHP framework)
- **Frontend**: [Vue.js](https://vuejs.org/) avec [Inertia.js](https://inertiajs.com/)
- **Base de Données**: [MySQL](https://www.mysql.com/)
- **Authentification**: Laravel Breeze

## Installation

### Prérequis

Avant de commencer, assurez-vous d'avoir installé les logiciels suivants sur votre machine :

- PHP >= 8.x
- Composer
- Node.js et npm
- MySQL (ou une autre base de données compatible)
- Laravel Installer

### Étapes d'installation

1. Clonez le dépôt GitHub :
    ```bash
    git clone https://github.com/SMEWebify/WasteWise.git
    ```

2. Accédez au répertoire du projet :
    ```bash
    cd WasteWise
    ```

3. Installez les dépendances backend avec Composer :
    ```bash
    composer install
    ```

4. Installez les dépendances frontend avec npm :
    ```bash
    npm install
    ```

5. Copiez le fichier `.env.example` et renommez-le en `.env` :
    ```bash
    cp .env.example .env
    ```

6. Configurez votre base de données dans le fichier `.env` :
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=wastewise
    DB_USERNAME=root
    DB_PASSWORD=
    ```

7. Générez la clé d'application Laravel :
    ```bash
    php artisan key:generate
    ```

8. Exécutez les migrations de base de données :
    ```bash
    php artisan migrate
    ```

9. Compilez les assets frontend :
    ```bash
    npm run dev
    ```

10. Démarrez le serveur local :
    ```bash
    php artisan serve
    ```

11. Ouvrez votre navigateur à l'adresse [http://localhost:8000](http://localhost:8000) pour accéder à l'application.

## Fonctionnalités supplémentaires

### 1. Gestion des Utilisateurs
- Authentification via Laravel Jetstream ou Breeze pour la gestion des utilisateurs.
- Rôles et permissions pour gérer les accès à différentes parties de l'application.

### 2. Tableaux de Bord
- Visualisation des performances de gestion des déchets via des graphiques et des tableaux.
- Statistiques en temps réel sur les déchets collectés, recyclés, et traités.

### 3. Notifications
- Notifications par email ou sur l'interface utilisateur pour des événements importants tels que les seuils de déchets atteints.

## Contribuer

Nous accueillons les contributions ! Si vous souhaitez participer au projet, voici les étapes à suivre :

1. Forkez le projet.
2. Créez une branche pour votre fonctionnalité (`git checkout -b feature/nouvelle-fonctionnalite`).
3. Commitez vos changements (`git commit -am 'Ajout d'une nouvelle fonctionnalité'`).
4. Poussez sur votre branche (`git push origin feature/nouvelle-fonctionnalite`).
5. Ouvrez une pull request.

## Licence

Ce projet est sous licence [MIT](LICENSE).

---

Si vous avez des questions ou des suggestions, n'hésitez pas à ouvrir une issue ou à nous contacter.
