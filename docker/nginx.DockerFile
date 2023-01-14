FROM nginx

ADD docker/config/vhost.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/yarykov

#sudo chown $(whoami):$(whoami) /var/run/docker.sock


