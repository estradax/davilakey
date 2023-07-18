load("@io_bazel_rules_go//go:def.bzl", "go_library")

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
        "@org_golang_google_protobuf//types/known/timestamppb",
    ],
)
