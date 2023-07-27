<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Pb\Product;

/**
 */
class ProductServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Google\Protobuf\GPBEmpty $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function FindAll(\Google\Protobuf\GPBEmpty $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/product.ProductService/FindAll',
        $argument,
        ['\Pb\Product\ProductList', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Pb\Product\ProductFindOneRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function FindOne(\Pb\Product\ProductFindOneRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/product.ProductService/FindOne',
        $argument,
        ['\Pb\Product\Product', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Pb\Product\ProductCreateRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function Create(\Pb\Product\ProductCreateRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/product.ProductService/Create',
        $argument,
        ['\Pb\Product\Product', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Pb\Product\ProductUpdateRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function Update(\Pb\Product\ProductUpdateRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/product.ProductService/Update',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Pb\Product\ProductDeleteRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function Delete(\Pb\Product\ProductDeleteRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/product.ProductService/Delete',
        $argument,
        ['\Google\Protobuf\GPBEmpty', 'decode'],
        $metadata, $options);
    }

}
