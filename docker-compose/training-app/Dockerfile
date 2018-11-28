# イメージファイルをCentOS7に設定
FROM centos:7.3.1611

# install
## nginx
RUN rpm -ivh http://nginx.org/packages/centos/7/noarch/RPMS/nginx-release-centos-7-0.el7.ngx.noarch.rpm
RUN yum -y update nginx-release-centos
RUN yum -y --enablerepo=nginx install nginx

## php
RUN yum -y install epel-release
RUN rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm
RUN yum -y install --enablerepo=remi,remi-php71 php php-devel php-mbstring php-pdo php-gd php-mysql php-mcrypt php-xdebug php-xml php-zip

## php-fpm
RUN yum -y install php-fpm --enablerepo=epel --enablerepo=remi --enablerepo=remi-php71

## git
RUN yum install -y curl-devel expat-devel gettext-devel openssl-devel zlib-devel gcc perl-ExtUtils-MakeMaker wget && \
    cd /usr/local/src/ && \
    wget https://www.kernel.org/pub/software/scm/git/git-2.9.3.tar.gz && \
    tar xzvf git-2.9.3.tar.gz && \
    cd git-2.9.3 && \
    make prefix=/usr/local all && \
    make prefix=/usr/local install

## composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

## node,npm
RUN yum -y install nodejs npm

# 設定ファイル
## nginx
RUN mv /etc/nginx/nginx.conf /etc/nginx/nginx.conf.bk
ADD nginx/server.crt /etc/pki/tls/certs/
ADD nginx/server.key /etc/pki/tls/certs/
ADD nginx/nginx.conf /etc/nginx/
ADD nginx/training-app.conf /etc/nginx/conf.d/
RUN systemctl enable nginx

## php
RUN mv /etc/php.ini /etc/php.ini.bk
ADD php/php.ini /etc/php.ini

## php-fpm
RUN mv /etc/php-fpm.d/www.conf /etc/php-fpm.d/www.conf.bk
RUN systemctl enable php-fpm
ADD php-fpm.d/www.conf /etc/php-fpm.d/www.conf

RUN npm install -g n
RUN n latest

# 起動時実行コマンド
CMD ["/sbin/init"]
