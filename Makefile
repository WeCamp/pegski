all: build

build:
	docker-compose build

setup: build
	docker-compose run application composer install
	docker-compose run application bin/console doctrine:mongodb:schema:update

run:
	docker-compose up -d

stop:
	docker-compose down

clean:
	docker-compose rm -f
