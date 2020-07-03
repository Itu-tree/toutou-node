docker-compose -f nginx-proxy/docker-compose.yaml up -d
docker-compose -f portfolio/docker-compose.yaml up -d 
docker-compose -f blog/docker-compose.yaml up -d
docker-compose -f blog/docker-compose.yaml exec -T php php artisan migrate:refresh --seed