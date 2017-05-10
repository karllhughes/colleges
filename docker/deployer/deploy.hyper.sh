#!/usr/bin/env bash

hyper config --accesskey $HYPER_ACCESS --secretkey $HYPER_SECRET
hyper pull $IMAGE:latest
hyper compose up -f /docker/compose.hyper.yml -d --force-recreate -p $PROJECTNAME
