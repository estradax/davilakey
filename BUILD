load("@bazel_gazelle//:def.bzl", "gazelle")

# gazelle:prefix davilakey.com/davilakey
gazelle(name = "gazelle")

gazelle(
    name = "gazelle-update-repos",
    args = [
        "-from_file=go.mod",
        "-to_macro=deps.bzl%go_dependencies",
        "-prune",
    ],
    command = "update-repos",
)
