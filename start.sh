#!/bin/sh
echo "lunching !"
if [ ! -d "$DIRECTORY" ]; then
  # Control will enter here if $DIRECTORY doesn't exist.
 mkdir /home/share/$3
fi
megadl "$1"  --path /home/share/$3/ | awk 'BEGIN {RS="\r"; d="date +%s"; d | getline t} {close(d); d | getline x; if(x-t >= 10){print ; close(d); d | getline t}}' > /var/www/$2 &
echo $! > /var/www/Pid$2
