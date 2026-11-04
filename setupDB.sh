usql "mysql://$MYSQL_USER:$MYSQL_PASSWORD@${MYSQL_IP}:$MYSQL_PORT/mysql" -c "CREATE DATABASE \`$MYSQL_DB\`;" > /dev/null 2>&1

usql "mysql://$MYSQL_USER:$MYSQL_PASSWORD@${MYSQL_IP}:$MYSQL_PORT/$MYSQL_DB" -f db.sql > /dev/null 2>&1