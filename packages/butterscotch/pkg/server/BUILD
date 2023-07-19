load("@io_bazel_rules_go//go:def.bzl", "go_library", "go_test")

go_library(
    name = "server",
    srcs = ["server.go"],
    importpath = "davilakey.com/davilakey/packages/butterscotch/pkg/server",
    visibility = ["//visibility:public"],
    deps = [
        "//packages/butterscotch/pkg/model",
        "//proto/product",
        "@io_gorm_gorm//:gorm",
        "@org_golang_google_protobuf//types/known/emptypb",
    ],
)

go_test(
    name = "server_test",
    srcs = ["server_test.go"],
    embed = [":server"],
    deps = [
        "//proto/product",
        "@com_github_data_dog_go_sqlmock//:go-sqlmock",
        "@com_github_stretchr_testify//assert",
        "@io_gorm_driver_postgres//:postgres",
        "@io_gorm_gorm//:gorm",
        "@io_gorm_gorm//logger",
        "@org_golang_google_protobuf//types/known/emptypb",
    ],
)
