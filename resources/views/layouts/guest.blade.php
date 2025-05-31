<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Meuli AAA</title>
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="telephone=no" name="format-detection" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="" name="author" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />
    <link rel="shortcut icon" href="{{ url('assets/custom/images/logo.png') }}" type="image/png" />
    <link href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" rel="stylesheet" />
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" rel="stylesheet" />
    <link href="{{ url('assets/custom/css/vendor.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/custom/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&amp;family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&amp;display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</head>

<body>
    <svg style="display: none" xmlns="http://www.w3.org/2000/svg">
        <defs>
            <symbol id="link" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12 19a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0-4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm-5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm7-12h-1V2a1 1 0 0 0-2 0v1H8V2a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3Zm1 17a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-9h16Zm0-11H4V6a1 1 0 0 1 1-1h1v1a1 1 0 0 0 2 0V5h8v1a1 1 0 0 0 2 0V5h1a1 1 0 0 1 1 1ZM7 15a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0 4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Z"
                    fill="currentColor"></path>
            </symbol>
            <symbol id="arrow-right" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76Z"
                    fill="currentColor"></path>
            </symbol>
            <symbol id="category" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M19 5.5h-6.28l-.32-1a3 3 0 0 0-2.84-2H5a3 3 0 0 0-3 3v13a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-10a3 3 0 0 0-3-3Zm1 13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-13a1 1 0 0 1 1-1h4.56a1 1 0 0 1 .95.68l.54 1.64a1 1 0 0 0 .95.68h7a1 1 0 0 1 1 1Z"
                    fill="currentColor"></path>
            </symbol>
            <symbol id="calendar" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M19 4h-2V3a1 1 0 0 0-2 0v1H9V3a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3Zm1 15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7h16Zm0-9H4V7a1 1 0 0 1 1-1h2v1a1 1 0 0 0 2 0V6h6v1a1 1 0 0 0 2 0V6h2a1 1 0 0 1 1 1Z"
                    fill="currentColor"></path>
            </symbol>
            <symbol id="heart" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M20.16 4.61A6.27 6.27 0 0 0 12 4a6.27 6.27 0 0 0-8.16 9.48l7.45 7.45a1 1 0 0 0 1.42 0l7.45-7.45a6.27 6.27 0 0 0 0-8.87Zm-1.41 7.46L12 18.81l-6.75-6.74a4.28 4.28 0 0 1 3-7.3a4.25 4.25 0 0 1 3 1.25a1 1 0 0 0 1.42 0a4.27 4.27 0 0 1 6 6.05Z"
                    fill="currentColor"></path>
            </symbol>
            <symbol id="plus" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 11h-6V5a1 1 0 0 0-2 0v6H5a1 1 0 0 0 0 2h6v6a1 1 0 0 0 2 0v-6h6a1 1 0 0 0 0-2Z"
                    fill="currentColor">
                </path>
            </symbol>
            <symbol id="minus" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 11H5a1 1 0 0 0 0 2h14a1 1 0 0 0 0-2Z" fill="currentColor"></path>
            </symbol>
            <symbol id="cart" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M8.5 19a1.5 1.5 0 1 0 1.5 1.5A1.5 1.5 0 0 0 8.5 19ZM19 16H7a1 1 0 0 1 0-2h8.491a3.013 3.013 0 0 0 2.885-2.176l1.585-5.55A1 1 0 0 0 19 5H6.74a3.007 3.007 0 0 0-2.82-2H3a1 1 0 0 0 0 2h.921a1.005 1.005 0 0 1 .962.725l.155.545v.005l1.641 5.742A3 3 0 0 0 7 18h12a1 1 0 0 0 0-2Zm-1.326-9l-1.22 4.274a1.005 1.005 0 0 1-.963.726H8.754l-.255-.892L7.326 7ZM16.5 19a1.5 1.5 0 1 0 1.5 1.5a1.5 1.5 0 0 0-1.5-1.5Z"
                    fill="currentColor"></path>
            </symbol>
            <symbol id="check" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M18.71 7.21a1 1 0 0 0-1.42 0l-7.45 7.46l-3.13-3.14A1 1 0 1 0 5.29 13l3.84 3.84a1 1 0 0 0 1.42 0l8.16-8.16a1 1 0 0 0 0-1.47Z"
                    fill="currentColor"></path>
            </symbol>
            <symbol id="trash" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M10 18a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1ZM20 6h-4V5a3 3 0 0 0-3-3h-2a3 3 0 0 0-3 3v1H4a1 1 0 0 0 0 2h1v11a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8h1a1 1 0 0 0 0-2ZM10 5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v1h-4Zm7 14a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8h10Zm-3-1a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1Z"
                    fill="currentColor"></path>
            </symbol>
            <symbol id="star-outline" viewbox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M7.5 9.804L5.337 11l.413-2.533L4 6.674l2.418-.37L7.5 4l1.082 2.304l2.418.37l-1.75 1.793L9.663 11L7.5 9.804Z"
                    fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
            </symbol>
            <symbol id="star-solid" viewbox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z"
                    fill="currentColor"></path>
            </symbol>
            <symbol id="search" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z"
                    fill="currentColor"></path>
            </symbol>
            <symbol id="user" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M15.71 12.71a6 6 0 1 0-7.42 0a10 10 0 0 0-6.22 8.18a1 1 0 0 0 2 .22a8 8 0 0 1 15.9 0a1 1 0 0 0 1 .89h.11a1 1 0 0 0 .88-1.1a10 10 0 0 0-6.25-8.19ZM12 12a4 4 0 1 1 4-4a4 4 0 0 1-4 4Z"
                    fill="currentColor"></path>
            </symbol>
            <symbol id="close" viewbox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z"
                    fill="currentColor"></path>
            </symbol>
        </defs>
    </svg>
    <div class="preloader-wrapper">
        <div class="preloader"></div>
    </div>
    <div aria-labelledby="My Cart" class="offcanvas offcanvas-end" data-bs-scroll="true" id="offcanvasCart"
        tabindex="-1">
        <div class="offcanvas-header justify-content-center">
            <button class="btn" type="button" class="close" data-bs-dismiss="offcanvas" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="offcanvas-body">
            <div class="order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary"> Keranjang Anda </span>
                    <span class="badge bg-primary rounded-pill"> 0 </span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item text-center text-muted py-4">Keranjang Anda kosong.</li>
                </ul>

                <hr class="my-4">
                <h5 class="mb-3">Detail Pesanan</h5>
                <form id="checkoutForm" class="needs-validation" novalidate>
                    <div class="row g-3">
                        <div class="col-12" id="tableNumberPreFilledAlert" style="display: none;">
                            <div class="alert alert-info py-2" role="alert">
                                Anda memesan dari Meja <strong id="preFilledTableNumber"></strong>. Nama & No. Telepon
                                opsional.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="customerName" class="form-label">Nama Lengkap (Opsional)</label>
                            <input type="text" class="form-control" id="customerName" placeholder=""
                                value="">
                            <div class="invalid-feedback">
                                Nama lengkap diperlukan.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="customerPhone" class="form-label">Nomor Telepon (Opsional)</label>
                            <input type="tel" class="form-control" id="customerPhone" placeholder="08123456789">
                            <div class="invalid-feedback">
                                Nomor telepon diperlukan.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="orderType" class="form-label">Tipe Pesanan</label>
                            <select class="form-select" id="orderType" required>
                                <option value="">Pilih...</option>
                                <option value="DINE_IN">Makan di Tempat</option>
                                <option value="TAKE_AWAY">Bawa Pulang</option>
                                <option value="DELIVERY">Pesan Antar</option>
                            </select>
                            <div class="invalid-feedback">
                                Silakan pilih tipe pesanan.
                            </div>
                        </div>

                        <div class="col-12" id="tableNumberField" style="display: none;">
                            <label for="tableNumber" class="form-label">Nomor Meja</label>
                            <input type="text" class="form-control" id="tableNumber"
                                placeholder="Contoh: Meja 5">
                            <div class="invalid-feedback">
                                Nomor meja diperlukan untuk Makan di Tempat.
                            </div>
                        </div>

                        <div class="col-12" id="deliveryAddressField" style="display: none;">
                            <label for="deliveryAddress" class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control" id="deliveryAddress" rows="3"
                                placeholder="Contoh: Jl. Merdeka No. 10, RT 05 RW 03, Jakarta Pusat"></textarea>
                            <div class="invalid-feedback">
                                Alamat diperlukan untuk Pesan Antar.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="orderRemarks" class="form-label">Catatan Tambahan (Opsional)</label>
                            <textarea class="form-control" id="orderRemarks" rows="2"
                                placeholder="Contoh: Jangan terlalu pedas, tambah saus"></textarea>
                        </div>

                        <input type="hidden" id="orderBranch" value="Main Branch">
                    </div>
                </form>

                <hr class="my-4">
                <button class="w-100 btn btn-primary btn-lg" type="submit">
                    Lanjutkan ke Pembayaran
                </button>
            </div>
        </div>
    </div>
    <div aria-labelledby="Search" class="offcanvas offcanvas-end" data-bs-scroll="true" id="offcanvasSearch"
        tabindex="-1">
        <div class="offcanvas-header justify-content-center">
            <button aria-label="Close" class="btn-close" data-bs-dismiss="offcanvas" type="button"></button>
        </div>
        <div class="offcanvas-body">
            <div class="order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary"> Search </span>
                </h4>
                <form action="index.html" class="d-flex mt-3 gap-0" method="get" role="search">
                    <input aria-label="What are you looking for?"
                        class="form-control rounded-start rounded-0 bg-light" placeholder="What are you looking for?"
                        type="email" />
                    <button class="btn btn-dark rounded-end rounded-0" type="submit">
                        Search
                    </button>
                </form>
            </div>
        </div>
    </div>
    <header
        style="
        background-image: url('data:image/svg+xml;utf8,<svg width=\'100\' height=\'100\' xmlns=\'http://www.w3.org/2000/svg\'><text x=\'0\' y=\'20\' font-size=\'20\' fill=\'%23ccc\' opacity=\'0.05\'>🍎</text><text x=\'30\' y=\'60\' font-size=\'20\' fill=\'%23ccc\' opacity=\'0.05\'>🥤</text><text x=\'60\' y=\'90\' font-size=\'20\' fill=\'%23ccc\' opacity=\'0.05\'>🍔</text></svg>');
        background-repeat: repeat;
        background-size: 100px 100px;
      ">
        <div class="container-fluid">
            <div class="row py-3 border-bottom">
                <div class="col-sm-4 col-lg-3 text-center text-sm-start">
                    <div class="main-logo">
                        <a href="index.html">
                            <img alt="logo" class="img-fluid" style="width: 50%"
                                src="{{ url('assets/custom/images/logo.png') }}" />
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-5 d-none d-lg-block">
                    <div class="search-bar row bg-light p-2 my-2 rounded-4">
                        <div class="col-md-4 d-none d-md-block">
                            <select class="form-select border-0 bg-transparent">
                                <option>All Categories</option>
                                <option>Groceries</option>
                                <option>Drinks</option>
                                <option>Chocolates</option>
                            </select>
                        </div>
                        <div class="col-11 col-md-7">
                            <form action="index.html" class="text-center" id="search-form" method="post">
                                <input class="form-control border-0 bg-transparent"
                                    placeholder="Search for more than 20,000 products" type="text" />
                            </form>
                        </div>
                        <div class="col-1">
                            <svg height="24" viewbox="0 0 24 24" width="24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div
                    class="col-sm-8 col-lg-4 d-flex justify-content-end gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">
                    <ul class="d-flex justify-content-end list-unstyled m-0">
                        <li>
                            <a class="rounded-circle bg-light p-2 mx-1" href="{{ url('login') }}">
                                <svg height="24" viewbox="0 0 24 24" width="24">
                                    <use xlink:href="#user"></use>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a class="rounded-circle bg-light p-2 mx-1" href="#">
                                <svg height="24" viewbox="0 0 24 24" width="24">
                                    <use xlink:href="#heart"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="d-lg-none">
                            <a aria-controls="offcanvasCart" class="rounded-circle bg-light p-2 mx-1"
                                data-bs-target="#offcanvasCart" data-bs-toggle="offcanvas" href="#">
                                <svg height="24" viewbox="0 0 24 24" width="24">
                                    <use xlink:href="#cart"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="d-lg-none">
                            <a aria-controls="offcanvasSearch" class="rounded-circle bg-light p-2 mx-1"
                                data-bs-target="#offcanvasSearch" data-bs-toggle="offcanvas" href="#">
                                <svg height="24" viewbox="0 0 24 24" width="24">
                                    <use xlink:href="#search"></use>
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <!-- 🖥️ Desktop Floating Cart -->
                    <div class="position-fixed bottom-0 end-0 m-4 z-3 d-none d-lg-block">
                        <button class="btn btn-primary px-4 py-3 rounded-pill shadow d-flex align-items-center gap-3"
                            type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart"
                            aria-controls="offcanvasCart">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                                viewBox="0 0 24 24">
                                <path
                                    d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2s2-.9 2-2s-.9-2-2-2m10 0c-1.1 0-2 .9-2 2s.9 2 2 2s2-.9 2-2s-.9-2-2-2M7.15 14h9.72c.75 0 1.41-.47 1.66-1.17l3.11-8.46A.999.999 0 0 0 21.72 3H5.21L4.27.62A1 1 0 0 0 3.34 0H1a1 1 0 0 0 0 2h1.61l3.6 9.59l-1.35 2.45A2.003 2.003 0 0 0 7.15 14Z" />
                            </svg>
                            <div class="text-start">
                                <div class="fs-6 text-white-50">Your Cart</div>
                                <div class="cart-total fs-5 fw-bold text-white">$0.00</div>
                            </div>
                        </button>
                    </div>

                    <!-- 📱 Mobile Full-Width Cart Button -->
                    <div class="position-fixed bottom-0 start-0 end-0 w-100 p-2 bg-white z-3 shadow d-block d-lg-none">
                        <button
                            class="btn btn-primary w-100 py-3 rounded-3 d-flex justify-content-between align-items-center"
                            type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart"
                            aria-controls="offcanvasCart">
                            <div class="d-flex align-items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2s2-.9 2-2s-.9-2-2-2m10 0c-1.1 0-2 .9-2 2s.9 2 2 2s2-.9 2-2s-.9-2-2-2M7.15 14h9.72c.75 0 1.41-.47 1.66-1.17l3.11-8.46A.999.999 0 0 0 21.72 3H5.21L4.27.62A1 1 0 0 0 3.34 0H1a1 1 0 0 0 0 2h1.61l3.6 9.59l-1.35 2.45A2.003 2.003 0 0 0 7.15 14Z" />
                                </svg>
                                <span class="fs-6 text-white">Your Cart</span>
                            </div>
                            <span class="fs-5 fw-bold text-white">$0.00</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row py-3">
                <div class="d-flex justify-content-center justify-content-sm-between align-items-center">
                    <nav class="main-menu d-flex navbar navbar-expand-lg">
                        <button aria-controls="offcanvasNavbar" class="navbar-toggler"
                            data-bs-target="#offcanvasNavbar" data-bs-toggle="offcanvas" type="button">
                            <span class="navbar-toggler-icon"> </span>
                        </button>
                        <div aria-labelledby="offcanvasNavbarLabel" class="offcanvas offcanvas-end"
                            id="offcanvasNavbar" tabindex="-1">
                            <div class="offcanvas-header justify-content-center">
                                <button aria-label="Close" class="btn-close" data-bs-dismiss="offcanvas"
                                    type="button"></button>
                            </div>
                            <div class="offcanvas-body">
                                <select class="filter-categories border-0 mb-0 me-5">
                                    <option>Shop by Departments</option>
                                    <option>Groceries</option>
                                    <option>Drinks</option>
                                    <option>Chocolates</option>
                                </select>
                                <ul
                                    class="navbar-nav justify-content-end menu-list list-unstyled d-flex gap-md-3 mb-0">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#women"> Women </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link" href="#men"> Men </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#kids"> Kids </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#accessories"> Accessories </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a aria-expanded="false" class="nav-link dropdown-toggle"
                                            data-bs-toggle="dropdown" id="pages" role="button">
                                            Pages
                                        </a>
                                        <ul aria-labelledby="pages" class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="index.html">
                                                    About Us
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="index.html"> Shop </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="index.html">
                                                    Single Product
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="index.html"> Cart </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="index.html">
                                                    Checkout
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="index.html"> Blog </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="index.html">
                                                    Single Post
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="index.html">
                                                    Styles
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="index.html">
                                                    Contact
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="index.html">
                                                    Thank You
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="index.html">
                                                    My Account
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="index.html">
                                                    404 Error
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#brand"> Brand </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#sale"> Sale </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#blog"> Blog </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>


    {{ $slot }}

    <section class="py-5 my-5">
        <div class="container-fluid">
            <div class="bg-warning py-5 rounded-5"
                style="background-image: url('assets/custom/images/bg-pattern-2.png') no-repeat">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <img alt="phone" class="image-float img-fluid"
                                src="{{ url('assets/custom/images/phone.png') }}" />
                        </div>
                        <div class="col-md-8">
                            <h2 class="my-5">Shop faster with meuli App</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Sagittis sed ptibus liberolectus nonet psryroin. Amet sed
                                lorem posuere sit iaculis amet, ac urna. Adipiscing fames
                                semper erat ac in suspendisse iaculis. Amet blandit tortor
                                praesent ante vitae. A, enim pretiummi senectus magna.
                                Sagittis sed ptibus liberolectus non et psryroin.
                            </p>
                            <div class="d-flex gap-2 flex-wrap">
                                <img alt="app-store" src="{{ url('assets/custom/images/app-store.jpg') }}" />
                                <img alt="google-play" src="{{ url('assets/custom/images/google-play.jpg') }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="toast-container position-fixed top-0 end-0 p-3">
    </div>

    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Notifikasi Keranjang</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
        </div>
    </div>

    <div id="footer-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 copyright">
                    <p>© 2025 Meuli. All rights reserved.</p>
                </div>
                <!-- <div class="col-md-6 credit-link text-start text-md-end">
            <p>
              Free HTML Template by
              <a href="https://templatesjungle.com/"> TemplatesJungle </a>
              Distributed by
              <a href="https://themewagon"> ThemeWagon </a>
            </p>
          </div> -->
            </div>
        </div>
    </div>
    <script src="{{ url('assets/custom/js/jquery-1.11.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('assets/custom/js/plugins.js') }}"></script>
    <script src="{{ url('assets/custom/js/script.js') }}"></script>
    @stack('scripts')
</body>

</html>
