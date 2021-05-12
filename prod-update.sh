docker-compose -f nginx-proxy/docker-compose.yaml up -d
docker-compose -f portfolio/deploy.yaml up -d 
docker-compose -f blog/deploy.yaml up -d

docker-compose -f blog/deploy.yaml exec -T nginx ash -c "cd resources/ckeditor5-build-classic && npm install && npm run build && cd ../../"
docker-compose -f blog/deploy.yaml exec -T nginx ash -c "rm -rf node_modules"
docker-compose -f blog/deploy.yaml exec -T nginx ash -c "npm cache clear --force"
docker-compose -f blog/deploy.yaml exec -T nginx ash -c "npm install --production"
docker-compose -f blog/deploy.yaml exec -T nginx ash -c "npm run prod"
docker-compose -f blog/deploy.yaml exec -T php bash -c "composer install --no-dev"