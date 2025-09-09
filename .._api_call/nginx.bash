server {
    if ($host = www.joclghana.com) {
        return 301 https://$host$request_uri;
    } # managed by Certbot


    if ($host = joclghana.com) {
        return 301 https://$host$request_uri;
    } # managed by Certbot


    listen 80;
    server_name joclghana.com www.joclghana.com;
    return 404; # managed by Certbot

}


server {
    if ($host = mysql.codeprice.me) {
        return 301 https://$host$request_uri;
    } # managed by Certbot


    listen 80;
    server_name mysql.codeprice.me;
    return 404; # managed by Certbot

}



server {
    listen 80;
    listen [::]:80;

    server_name codeprince.me www.codeprince.me;

    root /home/FinalYearProject/Client;
    index index.php index.html index.htm;

    access_log /var/log/nginx/www.codeprince.me.access.log;
    error_log /var/log/nginx/www.codeprince.me.error.log;
    access_log /var/log/nginx/codeprince.me.access.log;
    error_log /var/log/nginx/codeprince.me.error.log;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php8.3-fpm.sock;  # Adjust PHP version if needed
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }

    location ~ /\.env {
            deny all;
        }

    # Let Certbot use HTTP challenge
    location ~ ^/.well-known/acme-challenge/ {
        allow all;
        root /var/www/FinalYearProject.com/Client;
    }
}











#new

server {
    if ($host = www.codeprince.me) {
        return 301 https://$host$request_uri;
    } # managed by Certbot


    if ($host = codeprince.me) {
        return 301 https://$host$request_uri;
    } # managed by Certbot
    server_name codeprince.me  www.codeprince.me;
    return 404; # managed by Certbot


    listen 443 ssl; # managed by Certbot
    ssl_certificate /etc/letsencrypt/live/www.codeprince.me/fullchain.pem; # managed by Certbot
    ssl_certificate_key /etc/letsencrypt/live/www.codeprince.me/privkey.pem; # managed by Certbot
    include /etc/letsencrypt/options-ssl-nginx.conf; # managed by Certbot
    ssl_dhparam /etc/letsencrypt/ssl-dhparams.pem; # managed by Certbot


}
server {
    if ($host = www.codeprince.me) {
        return 301 https://$host$request_uri;
    } # managed by Certbot


    if ($host = codeprince.me) {
        return 301 https://$host$request_uri;
    } # managed by Certbot




    listen 80;
    server_name codeprince.me  www.codeprince.me;
    return 404; # managed by Certbot




}