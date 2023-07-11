#!/bin/sh

gazelle update-repos -prune -from_file=go.mod -to_macro=deps.bzl%go_dependencies
