up: ## Up containers
	docker compose up --build -d

install: ## Composer install
	docker exec -it challenge-app composer install

migrate: ## Run migrate
	docker exec -it challenge-app php artisan migrate --seed

test: ## Run tests
	docker exec -it challenge-app php artisan test
