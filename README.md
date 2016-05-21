# apache

##what is  Apache?
The Apache HTTP Server, colloquially called Apache, is a Web server application notable for playing a key role in the initial growth of the World Wide Web. Originally based on the NCSA HTTPd server, development of Apache began in early 1995 after work on the NCSA code stalled. Apache quickly overtook NCSA HTTPd as the dominant HTTP server, and has remained the most popular HTTP server in use since April 1996.

#How to use this image
This image only contains Apache httpd with the defaults from upstream.There is PHP installed
 If you want to run a simple HTML server, add a simple Dockerfile to your project where /var/www/html  is the directory containing all your HTML.I already Added some applications of database access , memcached and performance analysis application.
 
 ```
  http://server_ip/db/db.php
	http://server_ip/php/dbraw.php?queries=100
	http://server_ip/memcached/cache_test.php
  http://server_ip/memcached/database_test.php
```

###Without a Dockerfile
If you don't want to include a Dockerfile in your project, it is sufficient to do the following:

```
docker run --name n42_apache23  -e MYSQL_IP=172.21.207.144  -e MYSQL_DB=n42 -e MYSQL_USER=n42  -e MYSQL_PASSWORD=n42  -e MEMCACHED_IP=172.17.0.3 -d --label display_service="Apache Server" --label service="apache" -p 8888:80 basivireddy/apache:latest
```
