#!/bin/sh

sed -i 's,http://bookstore.php.local,http://bookstore.local,g' db_bookstore.sql

sudo sed -i '1i 127.0.0.1 bookstore.local' /etc/hosts
sudo cp nginx.conf.sample /etc/nginx/conf.d/bookstore.conf

sudo service nginx restart

echo 'Go to' http://bookstore.local