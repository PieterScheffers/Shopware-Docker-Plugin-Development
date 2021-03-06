#!/bin/bash

# init shop db/folders/etc
/swtools/init.sh

# downloads folder doesn't exist
mkdir -p /shopware/files/downloads

# Activate debug plugin
php bin/console sw:plugin:refresh 
php bin/console sw:plugin:install debug
php bin/console sw:plugin:activate debug

# Activate cron plugin
php bin/console sw:plugin:refresh 
php bin/console sw:plugin:install cron
php bin/console sw:plugin:activate cron

# printenv

# change locale with php pdo mysql
php /swtools/change-db.php "$SWDB_HOST" "$SWDB_PORT" "$SWDB_DATABASE" "$SWDB_USER" "$SWDB_PASS"

# add demo data
# /swtools/install-demo-data-en.sh

exec "$@"
