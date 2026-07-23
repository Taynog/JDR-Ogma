#!/bin/bash
# Start Apache and PostgreSQL services for Ogma (WSL)

echo "=== Starting Ogma services ==="

# Apache
if service apache2 status > /dev/null 2>&1; then
    echo "Apache is already running."
else
    echo "Starting Apache..."
    sudo service apache2 start
    if service apache2 status > /dev/null 2>&1; then
        echo "Apache started successfully."
    else
        echo "ERROR: Failed to start Apache."
        exit 1
    fi
fi

# PostgreSQL
if service postgresql status > /dev/null 2>&1; then
    echo "PostgreSQL is already running."
else
    echo "Starting PostgreSQL..."
    sudo service postgresql start
    if service postgresql status > /dev/null 2>&1; then
        echo "PostgreSQL started successfully."
    else
        echo "ERROR: Failed to start PostgreSQL."
        exit 1
    fi
fi

echo "=== All services are running ==="
