#!/bin/bash

# Navigate to the Laravel application directory
cd /app

echo "Running database migrations..."
if ! php artisan migrate --force; then
    echo "Failed to run migrations. Exiting..."
    exit 1
fi
