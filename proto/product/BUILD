load("@io_bazel_rules_go//proto:def.bzl", "go_proto_library")
load("@io_bazel_rules_go//go:def.bzl", "go_library")
load("@rules_proto//proto:defs.bzl", "proto_library")

proto_library(
    name = "product_proto",
    srcs = ["product.proto"],
    visibility = ["//visibility:public"],
    deps = [
        "@com_google_protobuf//:empty_proto",
        "@com_google_protobuf//:timestamp_proto",
    ],
)

go_library(
    name = "product",
    embed = [":product_go_proto"],
    importpath = "davilakey.com/davilakey/proto/product",
    visibility = ["//visibility:public"],
)

go_proto_library(
    name = "product_go_proto",
    compilers = ["@io_bazel_rules_go//proto:go_grpc"],
    importpath = "davilakey.com/davilakey/proto/product",
    proto = ":product_proto",
    visibility = ["//visibility:public"],
)
