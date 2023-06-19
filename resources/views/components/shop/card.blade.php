<div class="col-md-4">
    <div class="card mb-4 product-wap rounded-0">
        <a href="{{ route('shop.show', $product->id) }}">
        <div class="card rounded-0">
            <img style="width: 600px !important; margin-left: 0 !important; max-width: 100% !important; height: 400px !important; object-fit: cover !important;" class="card-img rounded-0 img-fluid" src="{{ Storage::url($product->photo_url) }}">
        </div>
        </a>
        <div class="card-body">
            <a href="{{ route('shop.show', $product->id) }}" class="h3 text-decoration-none">{{ $product->name }}</a>
            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                <li>M/L/X/XL</li>
                <li class="pt-2">
                    <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                    <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                    <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                    <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                    <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                </li>
            </ul>
            <ul class="list-unstyled d-flex justify-content-center mb-1">
                <li>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-warning fa fa-star"></i>
                    <i class="text-muted fa fa-star"></i>
                    <i class="text-muted fa fa-star"></i>
                </li>
            </ul>
            <p class="text-center mb-0">${{ number_format($product->price, 2) }}</p>
        </div>
    </div>
</div>
