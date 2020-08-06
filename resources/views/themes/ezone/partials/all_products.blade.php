<style>
    .more {
        margin: 0px auto;
        /* width: 30%; */
        margin-top: 60px;
    }

    .more a {
        display: flex;
        justify-content: center;
        text-align: center;
    }
</style>

@if ($products)

<div id="shopify-section-1523596198330" class="shopify-section">
    <div class="all-products-area " data-section-id="1523596198330" style="padding-top: 115px; padding-bottom: 75px;">
        <div class="plr" style="padding: 0 100px;">
            <div class="container-fluid">
                <div class="text-center section-title mb-60">
                    <h2 style="color: ">All Products</h2>
                </div>

                <div class="product-style">

                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="featured" role="tabpanel">
                            <div class="custom-row match_height">

                             <!--    <div class="custom-col-5 custom-col-style" style="height: 425px;">
                                    <div class="product-wrapper mb-45">
                                        <div class="product-img">
                                            <a href="https://ezone-fashion.myshopify.com/products/combinadas-con">
                                                <img src="{{ asset('themes/ezone/assets/img/images/18_92ce1bca-22fc-493d-a051-b431474798bd_large.png') }}" alt="">
                                            </a>
                                            <span class="sticker_sale">Sale</span>
                                            <div class="product-action grid_fashion">
                                                <a class="animate-left" href="https://ezone-fashion.myshopify.com/account/login" title="Wishlist">
                                                    <i class="pe-7s-like"></i>
                                                </a>
                                                <a class="animate-top add_cart cart-item" title="Add to cart" href="javascript:void(0);" onclick="Shopify.addItem(12306988073046, 1); return false;">
                                                    <i class="pe-7s-cart"></i>
                                                    <i class="pe-7s-settings animated rotateIn infinite"></i>
                                                    <i class="pe-7s-check"></i>
                                                </a>
                                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal" class="animate-right" href="javascript:void(0);" onclick="quiqview('combinadas-con')"><i class="pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="product-content">
                                            <h4><a href="https://ezone-fashion.myshopify.com/products/combinadas-con">Combinadas Con</a></h4>
                                            <span><span class="money" data-currency-usd="$208.00">$208.00</span></span>
                                            <del><span class="money" data-currency-usd="$340.00">$340.00</span></del>
                                        </div>
                                    </div>
                                </div>

                                
                                </div> -->
                                @foreach ($products as $product)
                                @php
                                $product = $product->parent ?: $product;
                                @endphp
                                <div class="custom-col-5 custom-col-style" style="height: 425px;">
                                    <div class="product-wrapper mb-45">
                                        <div class="product-img">
                                            <a href="{{ url('product/'. $product->slug) }}">
                                                @if ($product->productImages->first())
                                                <img src="{{ asset('storage/'.$product->productImages->first()->medium) }}" alt="{{ $product->name }}">
                                                @else
                                                <img src="{{ asset('themes/ezone/assets/img/product/fashion-colorful/1.jpg') }}" alt="{{ $product->name }}">
                                                @endif
                                            </a>
                                            <span class="sticker_sale">Sale</span>
                                            <div class="product-action">
                                                <a class="animate-left add-to-fav" title="Wishlist" product-slug="{{ $product->slug }}" href="">
                                                    <i class="pe-7s-like"></i>
                                                </a>
                                                <a class="animate-top add-to-card" title="Add To Cart" href="" product-id="{{ $product->id }}" product-type="{{ $product->type }}" product-slug="{{ $product->slug }}">
                                                    <i class="pe-7s-cart"></i>
                                                </a>
                                                <a class="animate-right quick-view" title="Quick View" product-slug="{{ $product->slug }}" href="">
                                                    <i class="pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h4><a href="{{ url('product/'. $product->slug) }}">{{ $product->name }}</a></h4>
                                            <span><span class="money" data-currency-usd="$440.00">{{ number_format($product->priceLabel()) }}</span></span>
                                            <del><span class="money" data-currency-usd="$566.00">$566.00</span></del>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="more">
                            <a class="furniture-slider-btn btn-hover animated" href="{{ url('products') }}">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endif