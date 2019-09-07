FROM php:7-fpm

# add Driver
RUN cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime && \
	apt-get update && \
	apt-get install -y libpq-dev && \
	docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && \
	docker-php-ext-install pdo pdo_pgsql
