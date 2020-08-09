
@if ($products)

<div class="tab-content">
    <div class="tab-pane fade active show" id="featured" role="tabpanel">
        <div class="custom-row match_height">

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

</div>


@endif