<x-guest-layout>

    <section class="py-5 overflow-hidden">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header d-flex flex-wrap justify-content-between mb-5">
                        <h2 class="section-title">Category</h2>
                        <div class="d-flex align-items-center">
                            <a class="btn-link text-decoration-none" href="#">
                                View All Categories →
                            </a>
                            <div class="swiper-buttons">
                                <button class="swiper-prev category-carousel-prev btn btn-yellow">
                                    ❮
                                </button>
                                <button class="swiper-next category-carousel-next btn btn-yellow">
                                    ❯
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="category-carousel swiper">
                        <div class="swiper-wrapper">
                            <a class="nav-link category-item swiper-slide" href="index.html">
                                <img alt="Category Thumbnail"
                                    src="{{ url('assets/custom/images/icon-vegetables-broccoli.png') }}" />
                                <h3 class="category-title">Fruits &amp; Veges</h3>
                            </a>
                            <a class="nav-link category-item swiper-slide" href="index.html">
                                <img alt="Category Thumbnail"
                                    src="{{ url('assets/custom/images/icon-bread-baguette.png') }}" />
                                <h3 class="category-title">Breads &amp; Sweets</h3>
                            </a>
                            <a class="nav-link category-item swiper-slide" href="index.html">
                                <img alt="Category Thumbnail"
                                    src="{{ url('assets/custom/images/icon-soft-drinks-bottle.png') }}" />
                                <h3 class="category-title">Fruits &amp; Veges</h3>
                            </a>
                            <a class="nav-link category-item swiper-slide" href="index.html">
                                <img alt="Category Thumbnail"
                                    src="{{ url('assets/custom/images/icon-wine-glass-bottle.png') }}" />
                                <h3 class="category-title">Fruits &amp; Veges</h3>
                            </a>
                            <a class="nav-link category-item swiper-slide" href="index.html">
                                <img alt="Category Thumbnail"
                                    src="{{ url('assets/custom/images/icon-animal-products-drumsticks.png') }}" />
                                <h3 class="category-title">Fruits &amp; Veges</h3>
                            </a>
                            <a class="nav-link category-item swiper-slide" href="index.html">
                                <img alt="Category Thumbnail"
                                    src="{{ url('assets/custom/images/icon-bread-herb-flour.png') }}" />
                                <h3 class="category-title">Fruits &amp; Veges</h3>
                            </a>
                            <a class="nav-link category-item swiper-slide" href="index.html">
                                <img alt="Category Thumbnail"
                                    src="{{ url('assets/custom/images/icon-vegetables-broccoli.png') }}" />
                                <h3 class="category-title">Fruits &amp; Veges</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="bootstrap-tabs product-tabs">
                        <div class="tabs-header d-flex justify-content-between border-bottom my-5">
                            <h3>Trending Products</h3>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-link text-uppercase fs-6 active" data-bs-target="#nav-all"
                                        data-bs-toggle="tab" href="#" id="nav-all-tab">
                                        All
                                    </a>
                                    <a class="nav-link text-uppercase fs-6" data-bs-target="#nav-fruits"
                                        data-bs-toggle="tab" href="#" id="nav-fruits-tab">
                                        Fruits &amp; Veges
                                    </a>
                                    <a class="nav-link text-uppercase fs-6" data-bs-target="#nav-juices"
                                        data-bs-toggle="tab" href="#" id="nav-juices-tab">
                                        Juices
                                    </a>
                                </div>
                            </nav>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div aria-labelledby="nav-all-tab" class="tab-pane fade show active" id="nav-all"
                                role="tabpanel">
                                <div
                                    class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">

                                    @foreach ($itemMstr as $item)
                                        <div class="col">
                                            <div class="product-item" data-product-uuid="{{ $item->item_mstr_uuid }}">
                                                @if ($item->discount > 0)
                                                    <span class="badge bg-success position-absolute m-3">
                                                        -{{ $item->discount }}%
                                                    </span>
                                                @endif
                                                <a class="btn-wishlist" href="#">
                                                    <svg height="24" width="24">
                                                        <use xlink:href="#heart"></use>
                                                    </svg>
                                                </a>
                                                <figure>
                                                    <a href="" title="{{ $item->item_mstr_desc }}">
                                                        <img class="tab-image" src="{{ $item->item_mstr_img }}" />
                                                    </a>
                                                </figure>
                                                <h3>{{ $item->item_mstr_desc }}</h3>
                                                <span class="qty"> 1 {{ $item->item_mstr_um }} </span>
                                                <span class="rating">
                                                    <svg class="text-primary" height="24" width="24">
                                                        <use xlink:href="#star-solid"></use>
                                                    </svg>
                                                    {{ $item->rating }}
                                                </span>
                                                <span class="price"> ${{ 1 }} </span>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="input-group product-qty">
                                                        <span class="input-group-btn">
                                                            <button
                                                                class="quantity-left-minus btn btn-danger btn-number"
                                                                data-type="minus" type="button">
                                                                <svg height="16" width="16">
                                                                    <use xlink:href="#minus"></use>
                                                                </svg>
                                                            </button>
                                                        </span>
                                                        <input class="form-control input-number" id="quantity"
                                                            name="quantity" type="text" value="1" />
                                                        <span class="input-group-btn">
                                                            <button
                                                                class="quantity-right-plus btn btn-success btn-number"
                                                                data-type="plus" type="button">
                                                                <svg height="16" width="16">
                                                                    <use xlink:href="#plus"></use>
                                                                </svg>
                                                            </button>
                                                        </span>
                                                    </div>
                                                    <a class="nav-link" href="#">
                                                        Add to Cart
                                                        <iconify-icon icon="uil:shopping-cart">
                                                        </iconify-icon>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="col">
                                        <div class="product-item">
                                            <span class="badge bg-success position-absolute m-3">
                                                -30%
                                            </span>
                                            <a class="btn-wishlist" href="#">
                                                <svg height="24" width="24">
                                                    <use xlink:href="#heart"></use>
                                                </svg>
                                            </a>
                                            <figure>
                                                <a href="index.html" title="Product Title">
                                                    <img class="tab-image"
                                                        src="{{ url('assets/custom/images/thumb-milk.png') }}" />
                                                </a>
                                            </figure>
                                            <h3>Sunstar Fresh Melon Juice</h3>
                                            <span class="qty"> 1 Unit </span>
                                            <span class="rating">
                                                <svg class="text-primary" height="24" width="24">
                                                    <use xlink:href="#star-solid"></use>
                                                </svg>
                                                4.5
                                            </span>
                                            <span class="price"> $18.00 </span>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="input-group product-qty">
                                                    <span class="input-group-btn">
                                                        <button class="quantity-left-minus btn btn-danger btn-number"
                                                            data-type="minus" type="button">
                                                            <svg height="16" width="16">
                                                                <use xlink:href="#minus"></use>
                                                            </svg>
                                                        </button>
                                                    </span>
                                                    <input class="form-control input-number" id="quantity"
                                                        name="quantity" type="text" value="1" />
                                                    <span class="input-group-btn">
                                                        <button class="quantity-right-plus btn btn-success btn-number"
                                                            data-type="plus" type="button">
                                                            <svg height="16" width="16">
                                                                <use xlink:href="#plus"></use>
                                                            </svg>
                                                        </button>
                                                    </span>
                                                </div>
                                                <a class="nav-link" href="#">
                                                    Add to Cart
                                                    <iconify-icon icon="uil:shopping-cart">
                                                    </iconify-icon>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- / product-grid -->
                            </div>
                            <div aria-labelledby="nav-fruits-tab" class="tab-pane fade" id="nav-fruits"
                                role="tabpanel">
                                <div
                                    class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                                    <div class="col">
                                        <div class="product-item">
                                            <span class="badge bg-success position-absolute m-3">
                                                -30%
                                            </span>
                                            <a class="btn-wishlist" href="#">
                                                <svg height="24" width="24">
                                                    <use xlink:href="#heart"></use>
                                                </svg>
                                            </a>
                                            <figure>
                                                <a href="index.html" title="Product Title">
                                                    <img class="tab-image"
                                                        src="{{ url('assets/custom/images/thumb-milk.png') }}" />
                                                </a>
                                            </figure>
                                            <h3>Sunstar Fresh Melon Juice</h3>
                                            <span class="qty"> 1 Unit </span>
                                            <span class="rating">
                                                <svg class="text-primary" height="24" width="24">
                                                    <use xlink:href="#star-solid"></use>
                                                </svg>
                                                4.5
                                            </span>
                                            <span class="price"> $18.00 </span>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="input-group product-qty">
                                                    <span class="input-group-btn">
                                                        <button class="quantity-left-minus btn btn-danger btn-number"
                                                            data-type="minus" type="button">
                                                            <svg height="16" width="16">
                                                                <use xlink:href="#minus"></use>
                                                            </svg>
                                                        </button>
                                                    </span>
                                                    <input class="form-control input-number" id="quantity"
                                                        name="quantity" type="text" value="1" />
                                                    <span class="input-group-btn">
                                                        <button class="quantity-right-plus btn btn-success btn-number"
                                                            data-type="plus" type="button">
                                                            <svg height="16" width="16">
                                                                <use xlink:href="#plus"></use>
                                                            </svg>
                                                        </button>
                                                    </span>
                                                </div>
                                                <a class="nav-link" href="#">
                                                    Add to Cart
                                                    <iconify-icon icon="uil:shopping-cart">
                                                    </iconify-icon>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- / product-grid -->
                            </div>
                            <div aria-labelledby="nav-juices-tab" class="tab-pane fade" id="nav-juices"
                                role="tabpanel">
                                <div
                                    class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                                    <div class="col">
                                        <div class="product-item">
                                            <a class="btn-wishlist" href="#">
                                                <svg height="24" width="24">
                                                    <use xlink:href="#heart"></use>
                                                </svg>
                                            </a>
                                            <figure>
                                                <a href="index.html" title="Product Title">
                                                    <img class="tab-image"
                                                        src="{{ url('assets/custom/images/thumb-milk.png') }}" />
                                                </a>
                                            </figure>
                                            <h3>Sunstar Fresh Melon Juice</h3>
                                            <span class="qty"> 1 Unit </span>
                                            <span class="rating">
                                                <svg class="text-primary" height="24" width="24">
                                                    <use xlink:href="#star-solid"></use>
                                                </svg>
                                                4.5
                                            </span>
                                            <span class="price"> $18.00 </span>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="input-group product-qty">
                                                    <span class="input-group-btn">
                                                        <button class="quantity-left-minus btn btn-danger btn-number"
                                                            data-type="minus" type="button">
                                                            <svg height="16" width="16">
                                                                <use xlink:href="#minus"></use>
                                                            </svg>
                                                        </button>
                                                    </span>
                                                    <input class="form-control input-number" id="quantity"
                                                        name="quantity" type="text" value="1" />
                                                    <span class="input-group-btn">
                                                        <button class="quantity-right-plus btn btn-success btn-number"
                                                            data-type="plus" type="button">
                                                            <svg height="16" width="16">
                                                                <use xlink:href="#plus"></use>
                                                            </svg>
                                                        </button>
                                                    </span>
                                                </div>
                                                <a class="nav-link" href="#">
                                                    Add to Cart
                                                    <iconify-icon icon="uil:shopping-cart">
                                                    </iconify-icon>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- / product-grid -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            $(document).on("click", ".editButton", function() {
                console.log("Edit button clicked");
                const id = $(this).data("id");
                const url = $(this).data("url");
                const fldname = $(this).data("fldname");
                const value = $(this).data("value");
                const cmmt = $(this).data("cmmt");
                const cmmt2 = $(this).data("cmmt2");

                // $("#editForm #id").val(id ? id : "");
                $("#editForm #ef_fldname").val(fldname ? fldname : "");
                $("#editForm #ef_value").val(value ? value : "");
                $("#editForm #ef_cmmt").val(cmmt ? cmmt : "");
                $("#editForm #ef_cmmt2").val(cmmt2 ? cmmt2 : "");

                $("#editForm").attr("action", url);
            });

            $(document).on("click", ".deleteButton", function() {
                const id = $(this).data("id");
                const url = $(this).data("url");

                $("#deleteForm").attr("action", url);
            });
        </script>
    @endpush

</x-guest-layout>
