if ps $1 > /dev/null
then
    echo "OK" > /var/www/result$1.log
else
    echo "NotOK"  > /var/www/result$1.log
fi
