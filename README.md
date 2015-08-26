# Redeye Tech Challenge
==============

## Installation

```bash
git clone https://github.com/Lanzafame/billing.git

cd billing

composer install

php app/console doctrine:database:create

php app/console doctrine:schema:update --force

bower install

php app/console server:run # if you are running this on a remote machine append
"-- 0.0.0.0:8000"

```

## Notes

 - This hasn't been written with security in mind.
 - Best practises were attempted and there are known failures like the use of
 a Bundle for the code I wrote.
 - I am unsure about my configuration, if it doesn't setup properly on your
 machine try accessing the working site at 54.66.200.184


A Symfony project created on August 18, 2015, 9:15 am.

