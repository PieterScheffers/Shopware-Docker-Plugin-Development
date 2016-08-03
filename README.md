Shopware Plugin
===============

This uses docker images from [dnhsoft](https://github.com/dnhsoft)

# Docker with docker-machine
	# start docker virtual machine
	docker-machine start
	docker-machine start default

	# Load docker environment variables into current git-bash/cmder shell
	docker-machine env
	docker-machine env default

	# Share Windows folder or disk with virtualbox to use in volume mount

# Start
	# Start containers in docker-compose.yml (-d = daemon mode)
	docker-compose up -d

	# Install database
	docker exec shopwaredocker_shop_1 /swtools/init.sh

	# Init directories
	docker exec shopwaredocker_shop_1 /swtools/prepare-dirs.sh

# Stop
	docker-compose down

# Open bash
	docker exec shopwaredocker_shop_1 bash

# Install plugin
	docker exec shopwaredocker_shop_1 php bin/console sw:plugin:refresh
	docker exec shopwaredocker_shop_1 php bin/console sw:plugin:install SwagSloganOfTheDay
	docker exec shopwaredocker_shop_1 php bin/console sw:plugin:activate SwagSloganOfTheDay

# reinstall plugin
	docker exec shopwaredocker_shop_1 php bin/console sw:plugin:refresh
	docker exec shopwaredocker_shop_1 php bin/console sw:plugin:reinstall SwagSloganOfTheDay

# Generate plugin boilerplate
[SW - create plugin](https://github.com/shopwareLabs/sw-cli-tools#sw-plugincreate)

	docker exec -ti shopwaredocker_shop_1 /bin/sh -c "cd /shopware/engine/Shopware/Plugins/Local/Backend ; php ../../../../../bin/sw plugin:create --namespace Backend SwagSloganOfTheDay"

# Package plugin in zipfile
[SW - package plugin](https://github.com/shopwareLabs/sw-cli-tools#sw-pluginzipdir)

	docker exec shopwaredocker_shop_1 php bin/sw plugin:zip:dir /shopware/engine/Shopware/Plugins/Local/Backend/SwagSloganOfTheDay
	docker exec -ti shopwaredocker_shop_1 /bin/sh -c "cd /shopware/engine/Shopware/Plugins/Local/Backend ; php ../../../../../bin/sw plugin:zip:dir /shopware/engine/Shopware/Plugins/Local/Backend/SwagSloganOfTheDay"

# Login
- User: demo
- Password: demo

# Change language
- login
- goto Einstellungen - Benutzerverwaltung
- edit demo admin user
- Set standardsprache to englisch
- Logout and login