#!/bin/sh
echo "lunching !"

megadl "$1"  --path /var/www/ | awk 'BEGIN {RS="\r"; d="date +%s"; d | getline t} {close(d); d | getline x; if(x-t >= 10){print ; close(d); d | getline t}}' > /var/www/$2 &
echo $! > /var/www/Pid$2
