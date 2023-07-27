<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Pb\Product;

/**
 */
class ProductServiceStub {

    /**
     * @param \Google\Protobuf\GPBEmpty $request client request
     * @param \Grpc\ServerContext $context server request context
     * @return \Pb\Product\ProductList for response data, null if if error occured
     *     initial metadata (if any) and status (if not ok) should be set to $context
     */
    public function FindAll(
        \Google\Protobuf\GPBEmpty $request,
        \Grpc\ServerContext $context
    ): ?\Pb\Product\ProductList {
        $context->setStatus(\Grpc\Status::unimplemented());
        return null;
    }

    /**
     * @param \Pb\Product\ProductFindOneRequest $request client request
     * @param \Grpc\ServerContext $context server request context
     * @return \Pb\Product\Product for response data, null if if error occured
     *     initial metadata (if any) and status (if not ok) should be set to $context
     */
    public function FindOne(
        \Pb\Product\ProductFindOneRequest $request,
        \Grpc\ServerContext $context
    ): ?\Pb\Product\Product {
        $context->setStatus(\Grpc\Status::unimplemented());
        return null;
    }

    /**
     * @param \Pb\Product\ProductCreateRequest $request client request
     * @param \Grpc\ServerContext $context server request context
     * @return \Pb\Product\Product for response data, null if if error occured
     *     initial metadata (if any) and status (if not ok) should be set to $context
     */
    public function Create(
        \Pb\Product\ProductCreateRequest $request,
        \Grpc\ServerContext $context
    ): ?\Pb\Product\Product {
        $context->setStatus(\Grpc\Status::unimplemented());
        return null;
    }

    /**
     * @param \Pb\Product\ProductUpdateRequest $request client request
     * @param \Grpc\ServerContext $context server request context
     * @return \Google\Protobuf\GPBEmpty for response data, null if if error occured
     *     initial metadata (if any) and status (if not ok) should be set to $context
     */
    public function Update(
        \Pb\Product\ProductUpdateRequest $request,
        \Grpc\ServerContext $context
    ): ?\Google\Protobuf\GPBEmpty {
        $context->setStatus(\Grpc\Status::unimplemented());
        return null;
    }

    /**
     * @param \Pb\Product\ProductDeleteRequest $request client request
     * @param \Grpc\ServerContext $context server request context
     * @return \Google\Protobuf\GPBEmpty for response data, null if if error occured
     *     initial metadata (if any) and status (if not ok) should be set to $context
     */
    public function Delete(
        \Pb\Product\ProductDeleteRequest $request,
        \Grpc\ServerContext $context
    ): ?\Google\Protobuf\GPBEmpty {
        $context->setStatus(\Grpc\Status::unimplemented());
        return null;
    }

    /**
     * Get the method descriptors of the service for server registration
     *
     * @return array of \Grpc\MethodDescriptor for the service methods
     */
    public final function getMethodDescriptors(): array
    {
        return [
            '/product.ProductService/FindAll' => new \Grpc\MethodDescriptor(
                $this,
                'FindAll',
                '\Google\Protobuf\GPBEmpty',
                \Grpc\MethodDescriptor::UNARY_CALL
            ),
            '/product.ProductService/FindOne' => new \Grpc\MethodDescriptor(
                $this,
                'FindOne',
                '\Pb\Product\ProductFindOneRequest',
                \Grpc\MethodDescriptor::UNARY_CALL
            ),
            '/product.ProductService/Create' => new \Grpc\MethodDescriptor(
                $this,
                'Create',
                '\Pb\Product\ProductCreateRequest',
                \Grpc\MethodDescriptor::UNARY_CALL
            ),
            '/product.ProductService/Update' => new \Grpc\MethodDescriptor(
                $this,
                'Update',
                '\Pb\Product\ProductUpdateRequest',
                \Grpc\MethodDescriptor::UNARY_CALL
            ),
            '/product.ProductService/Delete' => new \Grpc\MethodDescriptor(
                $this,
                'Delete',
                '\Pb\Product\ProductDeleteRequest',
                \Grpc\MethodDescriptor::UNARY_CALL
            ),
        ];
    }

}
