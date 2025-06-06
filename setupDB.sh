MYSQL_SOCKET="$HOME/programs/mysql/$MYSQL_VERSION/data/mysql_"$(echo "$MYSQL_VERSION" | sed 's/\./_/g')".sock"
mysqladmin -P $MYSQL_PORT -u $MYSQL_USER -p$MYSQL_PASSWORD -S $MYSQL_SOCKET create $MYSQL_DB > /dev/null 2>&1
mysql -P $MYSQL_PORT -u $MYSQL_USER -p$MYSQL_PASSWORD $MYSQL_DB -S $MYSQL_SOCKET < db.sql > /dev/null 2>&1