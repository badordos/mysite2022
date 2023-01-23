FROM nginx

ADD docker/config/vhost.prod.conf /etc/nginx/conf.d/default.conf
ADD docker/config/domain.pem /etc/nginx/certs/domain.pem
ADD docker/config/domain-key.pem /etc/nginx/certs/domain-key.pem

WORKDIR /var/www/yarlykov

#sudo chown $(whoami):$(whoami) /var/run/docker.sock


