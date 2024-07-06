# Makefile

# 環境変数
DOCKER_COMPOSE = docker-compose
MYSQL_CONTAINER = mysql
MYSQL_USER = user
MYSQL_PASSWORD = secret

init:
	$(DOCKER_COMPOSE) down --volumes --remove-orphans
	$(DOCKER_COMPOSE) up -d --build
	sleep 10
	$(DOCKER_COMPOSE) exec app php artisan migrate

start:
	$(DOCKER_COMPOSE) up -d

stop:
	$(DOCKER_COMPOSE) down

clean:
	$(DOCKER_COMPOSE) down --rmi all --volumes --remove-orphans

mysql:
	$(DOCKER_COMPOSE) exec $(MYSQL_CONTAINER) mysql -u $(MYSQL_USER) -p$(MYSQL_PASSWORD)
