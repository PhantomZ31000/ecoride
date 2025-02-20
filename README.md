# EcoRide - Déploiement en local



## Prérequis

* **XAMPP (ou WAMP):**  
* **Composer:**  
* **Node.js et npm:**  
* **Git:**  

## Étapes

1. **Cloner le dépôt Git:**
    * Ouvrez votre terminal et clonez le dépôt Git de l'application EcoRide:

    ```bash
    git clone [https://github.com/PhantomZ31000/ecoride.git]
    ```

    * Remplacez `votre-nom-utilisateur` par votre nom d'utilisateur GitHub.

2. **Installer les dépendances du back-end:**
    * Accédez au répertoire du projet back-end (`ecoride-back`):

    ```
    cd ecoride-back
    ```

    * Installez les dépendances PHP avec Composer:

    ```
    composer install
    ```

3. **Configurer la base de données:**
    * Créez une base de données MySQL nommée `ecoride`.
    * Modifiez le fichier `.env` pour configurer les paramètres de connexion à la base de données.
    * Exécutez les migrations Doctrine pour créer les tables de la base de données:

    ```
    php bin/console doctrine:migrations:migrate
    ```

4. **Charger les fixtures (données de test):**
    * Exécutez la commande suivante pour charger les fixtures:

    ```
    php bin/console doctrine:fixtures:load
    ```

5. **Installer les dépendances du front-end:**
    * Accédez au répertoire du projet front-end (`ecoride-front`):

    ```
    cd../ecoride-front
    ```

    * Installez les dépendances JavaScript avec npm:

    ```
    npm install
    ```

6. **Démarrer les serveurs:**
    * Démarrez le serveur Symfony:

    ```
    cd../ecoride-back
    symfony server:start
    ```

    * Démarrez le serveur React:

    ```
    cd../ecoride-front
    npm start
    ```

7. **Accéder à l'application:**
    * Ouvrez votre navigateur web et accédez à l'URL `http://localhost:3000` pour accéder à l'application EcoRide.

