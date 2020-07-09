docker network create itu_shared

docker-compose -f nginx-proxy/docker-compose.yaml up -d
docker-compose -f portfolio/deploy.yaml up -d 
docker-compose -f blog/deploy.yaml up -d

docker-compose -f blog/deploy.yaml exec -T nginx ash -c "npm install --production"
docker-compose -f blog/deploy.yaml exec -T nginx ash -c "npm run prod"
docker-compose -f blog/deploy.yaml exec -T php cp .env.example .env
docker-compose -f blog/deploy.yaml exec -T php bash -c "composer install"
docker-compose -f blog/deploy.yaml exec -T php php artisan key:generate
docker-compose -f blog/deploy.yaml exec -T php php artisan migrate:refresh --seed