# apache

docker run --name n42_apache23  -e MYSQL_IP=172.21.207.144  -e MYSQL_DB=n42 -e MYSQL_USER=n42  -e MYSQL_PASSWORD=n42  -e MEMCACHED_IP=172.17.0.3 -d --label display_service="Apache Server" --label service="apache" -p 8888:80 n42_apache:latest
