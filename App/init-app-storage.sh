#!/bin/bash

echo "[x] Create missing directory"
mkdir -p ./storage/{app,logs} >/dev/null 2>&1
mkdir -p ./storage/framework/{sessions,views,cache} >/dev/null 2>&1

echo "[+] Changing file permission"
chmod -R 777 ./storage
