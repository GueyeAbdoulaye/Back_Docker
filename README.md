# Projet API avec Docker

## Description

Ce projet est une application web construite avec **Nuxt 3** pour le frontend et **Laravel 11** pour le backend.

Ce site web permet d'afficher des images, de liker ou disliker ces images, et de permettre aux utilisateurs de s'inscrire pour interagir avec le site.

&#x20;L’application est conteneurisée en utilisant Docker et Docker Compose pour simplifier le déploiement et l’exécution.

## Technologies

- **Frontend** : Nuxt 3
- **Backend** : Laravel 11
- **Containerisation** : Docker, Docker Compose

## Prérequis

Avant de commencer, assurez-vous d'avoir installé les outils suivants sur votre machine :

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)

## Installation

1. **Clonez le dépôt** :

   ```bash
   git clone https://github.com/GueyeAbdoulaye/Back_Docker.git
   ```

2. \*\*A mettre dans le .env du back \*\*

   ```bash
   APP_NAME=Laravel
   APP_ENV=local
   APP_KEY=base64:BD2Qb1S78QtGx+EYE25Y+yOZhzpc0X9QDhGkd0uwg9Y=
   APP_DEBUG=true
   APP_TIMEZONE=UTC
   APP_URL=http://localhost

   APP_LOCALE=en
   APP_FALLBACK_LOCALE=en
   APP_FAKER_LOCALE=en_US

   APP_MAINTENANCE_DRIVER=file
   APP_MAINTENANCE_STORE=database

   SESSION_DOMAIN=localhost
   SANCTUM_STATEFUL_DOMAINS=localhost:3000,

   BCRYPT_ROUNDS=12

   LOG_CHANNEL=stack
   LOG_STACK=daily,stderr
   LOG_DEPRECATIONS_CHANNEL=null
   LOG_LEVEL=debug

   DB_CONNECTION=mysql
   DB_HOST=db
   DB_PORT=3306
   DB_DATABASE=laravel
   DB_USERNAME=admin
   DB_PASSWORD=admin

   SESSION_DRIVER=database
   SESSION_LIFETIME=120
   SESSION_ENCRYPT=false
   SESSION_PATH=/

   BROADCAST_CONNECTION=log
   FILESYSTEM_DISK=local
   QUEUE_CONNECTION=database

   CACHE_STORE=database
   CACHE_PREFIX=

   MEMCACHED_HOST=127.0.0.1

   OCTANE_SERVER=frankenphp
   ```

   Adaptez les fichiers `.env` selon vos besoins (base de données, ports, etc.).

3. \*\*AVANT tout faire \*\*:

   ```bash
   composer i 
   ```

**Commandes utiles**

- **Démarrer les conteneurs\*\*\*\*eurs** :
  ```bash
  docker-compose up -d
  ```
- **Arrêter les conteneurs** :
  ```bash
  docker-compose down
  ```
- Telecharger Docker Desktop 

  aller dans Exec et mettre
  ```
  php artisan migrate
  ```

