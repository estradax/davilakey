load("@io_bazel_rules_go//go:def.bzl", "go_binary", "go_library")

go_library(
    name = "butterscotch_lib",
    srcs = ["butterscotch.go"],
    importpath = "mozel.com/mozel/packages/butterscotch/cmd/butterscotch",
    visibility = ["//visibility:private"],
)

go_binary(
    name = "butterscotch",
    embed = [":butterscotch_lib"],
    visibility = ["//visibility:public"],
)
