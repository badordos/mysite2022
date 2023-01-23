FROM nginx

ADD docker/config/vhost.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/yarlykov

#sudo chown $(whoami):$(whoami) /var/run/docker.sock


