#!/usr/bin/env bash

git pull origin master
ret=$?
if [ $ret -ne 0 ]; then
    exit ret
fi

docker-compose -f docker-compose.prod.yml up -d --build
ret=$?
if [ $ret -ne 0 ]; then
    exit ret
fi

exit 0