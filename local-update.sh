
docker-compose -f nginx-proxy/docker-compose.yaml up -d
docker-compose -f portfolio/docker-compose.yaml up -d 
docker-compose -f blog/docker-compose.yaml up -d


docker-compose -f blog/docker-compose.yaml exec -T nginx ash -c "rm -rf node_modules"
docker-compose -f blog/docker-compose.yaml exec -T nginx ash -c "npm cache clear --force"
docker-compose -f blog/docker-compose.yaml exec -T nginx ash -c "npm install"
docker-compose -f blog/docker-compose.yaml exec -T nginx ash -c "npm run dev"
docker-compose -f blog/docker-compose.yaml exec -T php bash -c "composer install"