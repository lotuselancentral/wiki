FROM debian:latest
MAINTAINER Chris Smith <chris@cs278.org>
VOLUME /srv
RUN apt-get update
RUN DEBIAN_FRONTEND=noninteractive apt-get install --no-install-recommends -y \
  supervisor \
  php5-cli \
  php5-mysql \
  mysql-server \
  imagemagick

COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

EXPOSE 80
CMD ["/usr/bin/supervisord"]
