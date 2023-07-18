#!/bin/sh

PHP_OUT=packages/davilakey

protoc --go_out=. --go_opt=paths=source_relative --go-grpc_out=. --go-grpc_opt=paths=source_relative proto/product/product.proto
protoc --php_out=${PHP_OUT} --grpc_out=generate_server:${PHP_OUT} --plugin=protoc-gen-grpc=$(printenv GRPC_PHP_PLUGIN) proto/product/product.proto
