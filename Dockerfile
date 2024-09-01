FROM php:8.3-fpm-alpine3.19

ENV APP_DIR /app
ENV APP_ENV prod

WORKDIR $APP_DIR

COPY . /app

EXPOSE 80

CMD ["php", "-S", "0.0.0.0:80", "-t", "/app/public", "/app/public/index.php"]