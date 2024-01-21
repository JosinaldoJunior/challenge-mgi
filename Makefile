migrate: ## Run migrate
	docker exec -it challenge-app php artisan migrate --seed

test: ## Run tests
	docker exec -it challenge-app php artisan test
