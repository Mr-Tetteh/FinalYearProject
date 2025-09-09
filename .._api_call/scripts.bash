server {
       listen 80 default_server;
       listen [::]:80 default_server;

       root /var/www/html;
       index index.html index.htm index.nginx-debian.html;
       server_name _;

       location / {
               try_files $uri $uri/ =404;
       }
}


ln -s /etc/nginx/sites-available/testme /etc/nginx/sites-enabled/

Lightsail
create instance (ubuntu 24)
Go to networking and create static ip


install nginx
PHP 8.4
php-fpm and its extensions
composer
certbot (auto renew)