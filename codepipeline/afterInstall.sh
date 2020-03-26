
sudo rm -rf /var/www/html/.htaccess
sudo printf '%s\n%s\n%s\n%s\n' 'Options -MultiViews' 'RewriteEngine On' 'RewriteCond %{REQUEST_FILENAME} !-f' 'RewriteRule ^ index.html [QSA,L]' >> /var/www/html/.htaccess
sudo chown -R apache /var/www/html