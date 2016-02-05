#!/bin/bash
. ./config.sh

if ps $1 > /dev/null
then
    echo "OK" > ${LOGPATH}$1.log
else
    echo "NotOK"  > ${LOGPATH}$1.log
fi
