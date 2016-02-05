#!/bin/sh
echo "lunching !"
. ./config.sh
if [ ! -d "$DIRECTORY" ]; then
  # Control will enter here if $DIRECTORY doesn't exist.
 mkdir /home/share/$3
fi
megadl "$1"  --path "${DATAPATH}$3" | awk 'BEGIN {RS="\r"; d="date +%s"; d | getline t} {close(d); d | getline x; if(x-t >= 10){print ; close(d); d | getline t}}' > ${LOGPATH}$2 &
echo $! > "${LOGPATH}Pid$2"
