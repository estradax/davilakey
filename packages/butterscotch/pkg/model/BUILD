load("@io_bazel_rules_go//go:def.bzl", "go_library")

go_library(
    name = "model",
    srcs = ["product.go"],
    importpath = "davilakey.com/davilakey/packages/butterscotch/pkg/model",
    visibility = ["//visibility:public"],
    deps = [
        "//proto/product",
        "@org_golang_google_protobuf//types/known/timestamppb",
    ],
)
