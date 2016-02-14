FROM tutum/apache-php

# Install strace
RUN apt-get update && apt-get -y dist-upgrade && apt-get -y install php5-memcache php5-memcached php5-readline php5-recode php5-xsl php5-mhash php5-mcrypt php5-curl

# Bundle keys directory
COPY /www/* /app/
RUN chown -R www-data:www-data /app/

EXPOSE 80
WORKDIR /app

CMD ["/run.sh"]

