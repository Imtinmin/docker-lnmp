#!/bin/bash
service mysql start;

service nginx start;

mysql -uroot -e"use mysql;update user set authentication_string = password('1tinmin') where user='root';create user 'tinmin'@'localhost'identified by '123456';flush privileges;"
