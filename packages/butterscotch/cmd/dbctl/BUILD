load("@io_bazel_rules_go//go:def.bzl", "go_binary", "go_library")

go_library(
    name = "dbctl_lib",
    srcs = ["dbctl.go"],
    importpath = "davilakey.com/davilakey/packages/butterscotch/cmd/dbctl",
    visibility = ["//visibility:private"],
    deps = [
        "//packages/butterscotch/pkg/model",
        "@io_gorm_driver_postgres//:postgres",
        "@io_gorm_gorm//:gorm",
        "@io_gorm_gorm//logger",
    ],
)

go_binary(
    name = "dbctl",
    embed = [":dbctl_lib"],
    visibility = ["//visibility:public"],
)
