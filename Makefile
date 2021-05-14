create-network:
	docker network create --driver bridge toutou_shared
local-deploy:
	docker network create --driver bridge toutou_shared
	docker-compose -f nginx-proxy/docker-compose.yaml up -d
	docker-compose -f portfolio/docker-compose.yaml up -d 
	docker-compose -f blog/docker-compose.yaml up -d
	docker-compose -f blog/docker-compose.yaml exec -T nginx ash -c "cd resources/ckeditor5-build-classic && npm install && npm run build && cd ../../"
	docker-compose -f blog/docker-compose.yaml exec -T nginx ash -c "npm install"
	docker-compose -f blog/docker-compose.yaml exec -T nginx ash -c "npm run dev"
	docker-compose -f blog/deploy.yaml exec -T php cp .env.example .env
	docker-compose -f blog/docker-compose.yaml exec -T php bash -c "composer install"
	docker-compose -f blog/docker-compose.yaml exec -T php php artisan key:generate
	docker-compose -f blog/docker-compose.yaml exec -T php php artisan storage:link
	docker-compose -f blog/docker-compose.yaml exec -T php php artisan migrate:refresh --seed
local-update:
	docker-compose -f nginx-proxy/docker-compose.yaml up -d
	docker-compose -f portfolio/docker-compose.yaml up -d 
	docker-compose -f blog/docker-compose.yaml up -d
	docker-compose -f blog/docker-compose.yaml exec -T nginx ash -c "cd resources/ckeditor5-build-classic && npm install && npm run build && cd ../../"
	docker-compose -f blog/docker-compose.yaml exec -T nginx ash -c "rm -rf node_modules"
	docker-compose -f blog/docker-compose.yaml exec -T nginx ash -c "npm cache clear --force"
	docker-compose -f blog/docker-compose.yaml exec -T nginx ash -c "npm install"
	docker-compose -f blog/docker-compose.yaml exec -T nginx ash -c "npm run dev"
	docker-compose -f blog/docker-compose.yaml exec -T php bash -c "composer install"
prod-deploy:
	docker network create --driver bridge toutou_shared
	docker-compose -f nginx-proxy/docker-compose.yaml up -d
	docker-compose -f portfolio/deploy.yaml up -d 
	docker-compose -f blog/deploy.yaml up -d
	docker-compose -f portfolio/deploy.yaml exec -T nginx cp index.prod.html index.html
	docker-compose -f blog/deploy.yaml exec -T nginx ash -c "cd resources/ckeditor5-build-classic && npm install && npm run build && cd ../../"
	docker-compose -f blog/deploy.yaml exec -T nginx ash -c "npm install --production"
	docker-compose -f blog/deploy.yaml exec -T nginx ash -c "npm run prod"
	docker-compose -f blog/deploy.yaml exec -T php cp .env.example .env
	docker-compose -f blog/deploy.yaml exec -T php bash -c "composer install --no-dev"
	docker-compose -f blog/deploy.yaml exec -T php php artisan key:generate
	docker-compose -f blog/deploy.yaml exec -T php php artisan storage:link
	docker-compose -f blog/deploy.yaml exec -T php php artisan migrate:refresh --seed
prod-update:
	docker-compose -f nginx-proxy/docker-compose.yaml up -d
	docker-compose -f portfolio/docker-compose.yaml up -d 
	docker-compose -f blog/docker-compose.yaml up -d
	docker-compose -f blog/docker-compose.yaml exec -T nginx ash -c "cd resources/ckeditor5-build-classic && npm install && npm run build && cd ../../"
	docker-compose -f blog/docker-compose.yaml exec -T nginx ash -c "rm -rf node_modules"
	docker-compose -f blog/docker-compose.yaml exec -T nginx ash -c "npm cache clear --force"
	docker-compose -f blog/docker-compose.yaml exec -T nginx ash -c "npm install"
	docker-compose -f blog/docker-compose.yaml exec -T nginx ash -c "npm run dev"
	docker-compose -f blog/docker-compose.yaml exec -T php bash -c "composer install"
stop:
	docker-compose -f nginx-proxy/docker-compose.yaml stop 
	docker-compose -f portfolio/docker-compose.yaml stop
	docker-compose -f blog/docker-compose.yaml stop