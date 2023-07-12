#!/bin/sh

protoc --go_out=paths=source_relative:. proto/product/product.proto
