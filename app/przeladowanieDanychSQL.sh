#!/bin/bash

# Definiowanie zmiennych
SQL_FILE="/mnt/c/Docker/Aplikacje-internetowe/posts.sql"
CONTAINER_NAME="aplikacje-internetowe-db-1"
DB_NAME="mydatabase"
DB_USER="root"

# Sprawdzenie, czy Docker działa
if ! docker info > /dev/null 2>&1; then
    echo "Docker nie działa. Uruchom Docker i spróbuj ponownie."
    exit 1
fi

# Sprawdzenie, czy plik SQL istnieje
if [ ! -f "$SQL_FILE" ]; then
    echo "Plik SQL nie został znaleziony: $SQL_FILE"
    exit 1
fi

# Pytanie o hasło root MySQL
echo -n "Podaj hasło root MySQL: "
read -s DB_PASS
echo

# Skopiowanie pliku SQL do kontenera Docker
docker cp "$SQL_FILE" "$CONTAINER_NAME:/posts.sql"
if [ $? -ne 0 ]; then
    echo "Nie udało się skopiować pliku SQL do kontenera Docker."
    exit 1
fi

# Ładowanie danych do bazy danych MySQL
docker exec -i "$CONTAINER_NAME" bash -c "mysql -u $DB_USER -p$DB_PASS $DB_NAME < /posts.sql"
if [ $? -ne 0 ]; then
    echo "Nie udało się załadować danych do bazy danych MySQL."
    exit 1
fi

echo "Dane załadowane pomyślnie"
