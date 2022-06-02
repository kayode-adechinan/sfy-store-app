# Symfony usefull command

## Create app

symfony new sfy-store-app

## Preparing database tools

composer require symfony/orm-pack
composer require --dev symfony/maker-bundle

## Start server

symfony server:start

## Create entity

symfony console make:entity User
symfony console make:entity Role
symfony console make:entity Product
symfony console make:entity Input
symfony console make:entity Output
symfony console make:entity Category

## Linking entity

symfony console make:entity Conference

## Generate migration

symfony console make:migration

## Migrate

symfony console doctrine:migrations:migrate

## Setup admin backend

symfony composer req "admin:^4"
symfony console make:admin:dashboard

## Generate crud

symfony console make:admin:crud
