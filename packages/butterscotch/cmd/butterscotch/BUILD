load("@io_bazel_rules_go//go:def.bzl", "go_binary", "go_library")

go_library(
    name = "butterscotch_lib",
    srcs = ["butterscotch.go"],
    importpath = "davilakey.com/davilakey/packages/butterscotch/cmd/butterscotch",
    visibility = ["//visibility:private"],
    deps = [
        "//packages/butterscotch/pkg/server",
        "//proto/product",
        "@io_gorm_driver_postgres//:postgres",
        "@io_gorm_gorm//:gorm",
        "@io_gorm_gorm//logger",
        "@org_golang_google_grpc//:go_default_library",
        "@org_golang_google_grpc//reflection",
    ],
)

go_binary(
    name = "butterscotch",
    embed = [":butterscotch_lib"],
    visibility = ["//visibility:public"],
)
