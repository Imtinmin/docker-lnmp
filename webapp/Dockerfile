FROM phusion/baseimage
ENV DEBIAN_FRONTEND noninteractive	
#error:unable to re-open stdin

ADD test /var/www/html/
ADD init.sh /home/init.sh
COPY default /etc/nginx/sites-enabled/default

RUN add-apt-repository  ppa:ondrej/php && \
  apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 4F4EA0AAE5267A6C && \
  apt-get update --fix-missing && \
  apt-get -y upgrade && \
  apt-get -y install supervisor wget git nginx php7.0 php7.0-xdebug php7.0-mysqli php7.0-fpm libapache2-mod-php mysql-server php7.0-mysql pwgen php-apcu php7.0-mcrypt php7.0-gd php7.0-xml php7.0-mbstring php7.0-gettext zip unzip php7.0-zip curl php7.0-curl && \
  apt-get -y autoremove  	
#防止AH00558错误
RUN rm -rf /var/lib/apt/*
#RUN sed -i "s/;date.timezone =/date.timezone = PRC/g" /etc/php/7.0/apache2/php.ini
#RUN sed -i "s/;date.timezone =/date.timezone = RRC/g" /etc/php/7.0/cli/php.ini

RUN chmod -R 755 /home/init.sh && \
	/home/init.sh
