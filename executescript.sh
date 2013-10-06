#!/bin/sh


echo "ID:"$1
echo "Link:"$2

FILE="log""$1""Mega.log"
echo $FILE
LINK="'"$2"'"
echo $LINK

megadl "$2" > $FILE --path /var/www/ &
