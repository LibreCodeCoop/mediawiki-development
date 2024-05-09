#!/usr/bin/env php
<?php
echo "⌛ Waiting for database " . getenv('WG_DB_TYPE') ."\n";

function dbIsUp(string $dbName): bool {
    try {
        if (getenv('WG_DB_TYPE') === 'mysql') {
            new mysqli(getenv('WG_DB_SERVER'),getenv('WG_DB_USER'),getenv('WG_DB_PASSWORD'),getenv('WG_DB_NAME'));
        } else {
            // Will use SQLite
            return true;
        }
    } catch(Exception $e) {
        echo "⛔ Unable to conect to $dbName server: " . $e->getMessage()."\n";
        return false;
    }
    return true;
}

while(!dbIsUp(getenv('WG_DB_TYPE'))) {
    sleep(1);
}

echo "✅ Database " . getenv('WG_DB_TYPE') . " ready\n";
