#!/bin/bash

# Navigate to the Laravel application directory
cd /app



# Clear and optimize Laravel cache
echo "Clearing and optimizing Laravel cache..."
php artisan optimize:clear
php artisan optimize

# Start supervisor (nginx + php-fpm)
echo "Starting services..."
exec /usr/bin/supervisord -c /etc/supervisor/supervisord.conf 
