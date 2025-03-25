# Déploiement de l'API

Ce document explique comment déployer l'API sur un serveur conteneurisé en utilisant Docker et Docker Compose.

## Prérequis

- Docker et Docker Compose installés sur votre serveur
- Les fichiers du projet (incluant docker-compose.yml et api/Dockerfile)

## Structure du projet

```
project/
├── .env
├── db.env
├── docker-compose.yml
├── api/
│   ├── Dockerfile
│   ├── .env
│   └── ... (fichiers de l'API Laravel)
└── app/
    └── .env
```

## Étapes de déploiement

### 1. Récupérer le code source

```bash
git clone [URL_DU_REPOSITORY]
cd [NOM_DU_DOSSIER]
```

### 2. Configuration

Vérifiez et modifiez si nécessaire les variables d'environnement dans les fichiers suivants :
- `.env` à la racine du projet
- `db.env` pour la configuration de la base de données
- `api/.env` pour la configuration de l'API Laravel

### 3. Configuration des hosts Traefik

Cette étape est cruciale pour que votre API soit correctement exposée via Traefik.

Dans votre fichier `docker-compose.yml`, localisez les services qui utilisent Traefik comme reverse proxy et modifiez les labels pour définir vos noms d'hôtes. Exemple :

```yaml
services:
  api:
    # ... autres configurations ...
    labels:
      - "traefik.enable=true"
      - "traefik.http.routers.api.rule=Host(`api.votre-domaine.com`)"
      - "traefik.http.routers.api.entrypoints=web,websecure"
      - "traefik.http.routers.api.tls=true"
      # ... autres labels ...
```

Remplacez `api.votre-domaine.com` par le nom de domaine que vous souhaitez utiliser pour votre API.

Si vous avez plusieurs services exposés via Traefik, assurez-vous de configurer les hosts pour chacun d'entre eux.

N'oubliez pas de configurer votre DNS pour que les noms de domaine pointent vers l'adresse IP de votre serveur.

### 4. Construction et démarrage des conteneurs

```bash
docker-compose build
docker-compose up -d
```

L'option `-d` permet de lancer les conteneurs en arrière-plan (mode détaché).

### 5. Vérification du déploiement

Pour vérifier que l'API fonctionne correctement :

```bash
docker-compose ps
```

Vous pouvez également consulter les logs :

```bash
docker-compose logs -f api
```

### 6. Accès à l'API

L'API est maintenant accessible via les noms d'hôtes configurés dans Traefik :

```
https://api.votre-domaine.com
```

### 7. Arrêt des conteneurs

Pour arrêter les conteneurs sans les supprimer :

```bash
docker-compose stop
```

Pour arrêter et supprimer les conteneurs :

```bash
docker-compose down
```

Pour arrêter et supprimer les conteneurs ainsi que les volumes associés :

```bash
docker-compose down -v
```

## Dépannage

Si vous rencontrez des problèmes lors du déploiement :

1. Vérifiez les logs des conteneurs : `docker-compose logs`
2. Vérifiez les logs de Traefik pour détecter d'éventuels problèmes de routing
3. Assurez-vous que les ports nécessaires sont ouverts sur votre serveur
4. Vérifiez que les variables d'environnement sont correctement configurées
5. Assurez-vous que vos noms de domaine sont correctement configurés dans votre DNS

## Maintenance

### Mise à jour de l'API

Pour mettre à jour l'API avec une nouvelle version :

```bash
git pull
docker-compose build
docker-compose up -d
```