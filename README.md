# Mediawiki development environment

A development environment for Mediawiki

## Setup development environment

Clone your project to folder `volumes/src`

Example:
```bash
git clone https://github.com/youroganization/repositoryname volumes/src
```
To each file that you want to override from your project into mediawiki, you will need to put inside folder volumes/src/mediawiki and run the follow command:

```yaml
docker compose exec mediawiki php /var/www/scripts/init.php
```
Clone the MediaWiki project source, or put your existing mediawiki folder, into `volumes/mediawiki`

Example:
```bash
git clone  --progress --single-branch --depth 1 --branch 1.41.0 --recurse-submodules -j 4 https://gerrit.wikimedia.org/r/mediawiki/core.git volumes/mediawiki
```

Check if you will need to change any default environment value at `docker.compose.yml` and if you need to change, create a `.env` file with the custom environments values.

Run the command:
```bash
docker compose up
```
## Install extension

```bash
COMPOSER=composer.local.json composer require --no-update mediawiki/page-forms
composer update --no-dev -o
```

## Updates if have database change

```bash
php maintenance/update.php --quick
```
