(function ($) {

  "use strict";

  var cart = []; 
  var preFilledTableNumber = null;

  var showToast = function(message, type = 'success') {
    var $toastElement = $('#liveToast');
    var $toastBody = $toastElement.find('.toast-body');
    var $toastHeader = $toastElement.find('.toast-header strong');

    $toastElement.removeClass('text-bg-success text-bg-danger text-bg-warning');
    if (type === 'success') {
      $toastElement.addClass('text-bg-success');
      $toastHeader.text('Sukses!');
    } else if (type === 'error') {
      $toastElement.addClass('text-bg-danger');
      $toastHeader.text('Gagal!');
    } else if (type === 'info') {
      $toastElement.addClass('text-bg-info');
      $toastHeader.text('Info');
    }

    $toastBody.text(message);

    $('.toast-container').append($toastElement);

    var toast = new bootstrap.Toast($toastElement);
    toast.show();
  };

  var updateCartUI = function () {
    var $cartList = $('#offcanvasCart .list-group.mb-3');
    var $cartBadge = $('#offcanvasCart .badge.bg-primary');
    var $cartTotalStrong = $('#offcanvasCart .list-group strong');

    var $desktopFloatingCartTotal = $('.position-fixed.d-lg-block .cart-total');
    var $mobileFloatingCartTotal = $('.position-fixed.d-lg-none .fw-bold.text-white');

    $cartList.empty();

    var total = 0;
    var itemCount = 0;

    if (cart.length === 0) {
      $cartList.append('<li class="list-group-item text-center text-muted py-4">Keranjang Anda kosong.</li>');
      $('#offcanvasCart .btn-lg[type="submit"]').prop('disabled', true);
      $cartBadge.text('0');
      $cartTotalStrong.text('$0.00');
      $desktopFloatingCartTotal.text('$0.00');
      $mobileFloatingCartTotal.text('$0.00');
      $('#checkoutForm').hide();
    } else {
      $('#offcanvasCart .btn-lg[type="submit"]').prop('disabled', false);
      $('#checkoutForm').show();

      cart.forEach(function (item) {
        var itemIdForHtml = item.id;
        var itemHtml = `
          <li class="list-group-item cart-item-detail d-flex justify-content-between align-items-center py-3" data-product-id="${itemIdForHtml}">
              <div class="d-flex align-items-center">
                  ${item.image ? `<img src="${item.image}" alt="${item.name}" class="cart-item-thumbnail me-3">` : ''}

                  <div>
                      <h6 class="my-0 cart-item-name">${item.name}</h6>
                      <div class="d-flex align-items-center mt-1">
                          <div class="input-group input-group-sm me-3" style="width: 100px;">
                              <button class="btn btn-outline-secondary btn-sm cart-quantity-minus" type="button" data-product-id="${itemIdForHtml}">-</button>
                              <input type="text" class="form-control form-control-sm text-center cart-item-quantity" value="${item.quantity}" readonly>
                              <button class="btn btn-outline-secondary btn-sm cart-quantity-plus" type="button" data-product-id="${itemIdForHtml}">+</button>
                          </div>
                          <span class="text-muted small">@ $${item.price.toFixed(2)}</span>
                      </div>
                  </div>
              </div>
              <div class="d-flex flex-column align-items-end">
                  <span class="fw-bold fs-5 cart-item-subtotal">$${(item.price * item.quantity).toFixed(2)}</span>
                  <button class="btn btn-sm btn-outline-danger mt-2 remove-cart-item" type="button" data-product-id="${itemIdForHtml}" title="Hapus item">
                      <svg width="16" height="16"><use xlink:href="#trash"></use></svg> Hapus
                  </button>
              </div>
          </li>
        `;
        $cartList.append(itemHtml);
        total += item.price * item.quantity;
        itemCount++;
      });

      $cartList.append(`
        <li class="list-group-item d-flex justify-content-between align-items-center mt-3 bg-light fs-5 py-3">
          <span>Total (USD)</span>
          <strong>$${total.toFixed(2)}</strong>
        </li>
      `);

      $desktopFloatingCartTotal.text('$' + total.toFixed(2));
      $mobileFloatingCartTotal.text('$' + total.toFixed(2));
    }

    $cartBadge.text(itemCount);
  };

  var initPreloader = function () {
    $(document).ready(function ($) {
      var Body = $('body');
      Body.addClass('preloader-site');
    });
    $(window).on('load', function () {
      $('.preloader-wrapper').fadeOut();
      $('body').removeClass('preloader-site');
    });
  }

  // init Chocolat light box
  var initChocolat = function () {
    Chocolat(document.querySelectorAll('.image-link'), {
      imageSize: 'contain',
      loop: true,
    })
  }

  var initSwiper = function () {
    var swiper = new Swiper(".main-swiper", {
      speed: 500,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });

    var category_swiper = new Swiper(".category-carousel", {
      slidesPerView: 6,
      spaceBetween: 30,
      speed: 500,
      navigation: {
        nextEl: ".category-carousel-next",
        prevEl: ".category-carousel-prev",
      },
      breakpoints: {
        0: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 3,
        },
        991: {
          slidesPerView: 4,
        },
        1500: {
          slidesPerView: 6,
        },
      }
    });

    var brand_swiper = new Swiper(".brand-carousel", {
      slidesPerView: 4,
      spaceBetween: 30,
      speed: 500,
      navigation: {
        nextEl: ".brand-carousel-next",
        prevEl: ".brand-carousel-prev",
      },
      breakpoints: {
        0: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 2,
        },
        991: {
          slidesPerView: 3,
        },
        1500: {
          slidesPerView: 4,
        },
      }
    });

    var products_swiper = new Swiper(".products-carousel", {
      slidesPerView: 5,
      spaceBetween: 30,
      speed: 500,
      navigation: {
        nextEl: ".products-carousel-next",
        prevEl: ".products-carousel-prev",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 3,
        },
        991: {
          slidesPerView: 4,
        },
        1500: {
          slidesPerView: 6,
        },
      }
    });
  }

  var initProductQty = function () {
    $(document).on('click', '.product-item .quantity-right-plus', function (e) {
      e.preventDefault();
      var $input = $(this).closest('.product-qty').find('.input-number');
      var currentVal = parseInt($input.val());
      $input.val(currentVal + 1);
    });

    $(document).on('click', '.product-item .quantity-left-minus', function (e) {
      e.preventDefault();
      var $input = $(this).closest('.product-qty').find('.input-number');
      var currentVal = parseInt($input.val());
      if (currentVal > 1) {
        $input.val(currentVal - 1);
      }
    });
  }

  var initJarallax = function () {
    jarallax(document.querySelectorAll(".jarallax"));

    jarallax(document.querySelectorAll(".jarallax-keep-img"), {
      keepImg: true,
    });
  }

  var initAddToCart = function () {
    $(document).on('click', '.product-item .nav-link', function (e) {
      e.preventDefault();

      var $productItem = $(this).closest('.product-item');
      var productName = $productItem.find('h3').text().trim();
      var productPrice = parseFloat($productItem.find('.price').text().replace('$', '').trim());
      var productQuantity = parseInt($productItem.find('.input-number').val());
      var productImage = $productItem.find('.tab-image').attr('src');
      // var productId = productName.toLowerCase().replace(/[^a-z0-9]+/g, '-') + '-' + Date.now();
      var productId = $productItem.data('product-uuid');
      var productUm = $productItem.data('.qty');

      var existingItem = cart.find(item => item.name === productName);
      if (existingItem) {
        existingItem.quantity += productQuantity;
        console.log(`Updated quantity for ${productName}. New quantity: ${existingItem.quantity}`);
      } else {
        cart.push({
          id: productId,
          name: productName,
          price: productPrice,
          quantity: productQuantity,
          image: productImage,
          um: productUm
        });
        console.log(`Added ${productName} to cart.`);
      }

      console.log('Current Cart:', cart);
      updateCartUI();

      // Swal.fire({
      //   toast: true,
      //   position: 'bottom-end', // Muncul di kanan bawah
      //   icon: 'success',
      //   title: `${productName} ditambahkan ke keranjang!`,
      //   showConfirmButton: false,
      //   timer: 2000, // Hilang setelah 2 detik
      //   timerProgressBar: true,
      //   didOpen: (toast) => {
      //     toast.addEventListener('mouseenter', Swal.stopTimer);
      //     toast.addEventListener('mouseleave', Swal.resumeTimer);
      //   }
      // });

      showToast(`${productName} ditambahkan ke keranjang!`, 'success');

      $productItem.find('.input-number').val(1);
    });
  };

  var initCartManagement = function () {
    $(document).on('click', '#offcanvasCart .cart-quantity-plus', function (e) {
      e.preventDefault();
      var productId = $(this).data('product-id');
      var item = cart.find(item => item.id === productId);

      if (item) {
        item.quantity++;
        console.log(`Quantity of ${item.name} increased to ${item.quantity}`);
        updateCartUI();
      }
    });

    $(document).on('click', '#offcanvasCart .cart-quantity-minus', function (e) {
      e.preventDefault();
      var productId = $(this).data('product-id');
      var itemIndex = cart.findIndex(item => item.id === productId);

      if (itemIndex !== -1) {
        if (cart[itemIndex].quantity > 1) {
          cart[itemIndex].quantity--;
          console.log(`Quantity of ${cart[itemIndex].name} decreased to ${cart[itemIndex].quantity}`);
        } else {
          var removedItemName = cart[itemIndex].name;
          cart.splice(itemIndex, 1);
          console.log(`Removed ${removedItemName} from cart.`);
        }
        updateCartUI();
      }
    });

    $(document).on('click', '#offcanvasCart .remove-cart-item', function (e) {
      e.preventDefault();
      var productId = $(this).data('product-id');
      var itemIndex = cart.findIndex(item => item.id === productId);

      if (itemIndex !== -1) {
        var removedItemName = cart[itemIndex].name;
        cart.splice(itemIndex, 1);
        console.log(`Removed ${removedItemName} from cart.`);
        updateCartUI();
      }
    });
  };

  var initConditionalCheckoutFields = function () {
    var $orderType = $('#orderType');
    var $tableNumberField = $('#tableNumberField');
    var $tableNumberInput = $('#tableNumber');
    var $deliveryAddressField = $('#deliveryAddressField');
    var $deliveryAddressInput = $('#deliveryAddress');
    var $customerNameInput = $('#customerName');
    var $customerPhoneInput = $('#customerPhone');
    var $tableNumberPreFilledAlert = $('#tableNumberPreFilledAlert');
    var $preFilledTableNumberText = $('#preFilledTableNumber');

    var updateFieldRequirements = function () {
      var selectedType = $orderType.val();

      $tableNumberField.hide();
      $tableNumberInput.prop('required', false);
      $deliveryAddressField.hide();
      $deliveryAddressInput.prop('required', false);

      if (preFilledTableNumber && selectedType === 'DINE_IN') {
        $customerNameInput.prop('required', false);
        $customerPhoneInput.prop('required', false);
      } else {
        $customerNameInput.prop('required', true);
        $customerPhoneInput.prop('required', true);
      }


      if (selectedType === 'DINE_IN') {
        $tableNumberField.show();
        if (!preFilledTableNumber) { 
          $tableNumberInput.prop('required', true);
        }
      } else if (selectedType === 'DELIVERY') {
        $deliveryAddressField.show();
        $deliveryAddressInput.prop('required', true);
      }

      if (preFilledTableNumber && selectedType === 'DINE_IN') {
        $preFilledTableNumberText.text(preFilledTableNumber);
        $tableNumberPreFilledAlert.show();
        $tableNumberInput.val(preFilledTableNumber).prop('readonly', true);
      } else {
        $tableNumberPreFilledAlert.hide();
        $tableNumberInput.prop('readonly', false);
      }
    };

    const urlParams = new URLSearchParams(window.location.search);
    const tableParam = urlParams.get('table');

    if (tableParam) {
      preFilledTableNumber = decodeURIComponent(tableParam);
      $orderType.val('DINE_IN');
    }

    $orderType.on('change', updateFieldRequirements);

    updateFieldRequirements();
  };

  var initCheckout = function() {
    $('#offcanvasCart .btn-lg[type="submit"]').on('click', function(e) {
      e.preventDefault();

      var $checkoutButton = $(this);
      var $checkoutForm = $('#checkoutForm');

      if (!$checkoutForm[0].checkValidity()) {
        $checkoutForm.addClass('was-validated');
        var firstInvalid = $checkoutForm.find(':invalid').first();
        if (firstInvalid.length) {
            $('#offcanvasCart .offcanvas-body').animate({
                scrollTop: firstInvalid.offset().top - $('#offcanvasCart .offcanvas-body').offset().top - 20
            }, 500);
        }
        return;
      }

      $checkoutButton.prop('disabled', true).text('Memproses Pesanan...');

      var customerName = $('#customerName').val();
      var customerPhone = $('#customerPhone').val();
      var orderType = $('#orderType').val();
      var tableNumber = $('#tableNumber').val();
      var deliveryAddress = $('#deliveryAddress').val();
      var orderRemarks = $('#orderRemarks').val();
      var orderBranch = $('#orderBranch').val();

      var customerDetails = {
          name: customerName,
          phone: customerPhone
      };
      if (orderType === 'DINE_IN') {
          customerDetails.table_number = tableNumber;
      } else if (orderType === 'DELIVERY') {
          customerDetails.address = deliveryAddress;
      }

      var itemsToSend = cart.map(item => ({
          product_id: item.id,
          name: item.name,
          quantity: item.quantity,
          price: item.price,
          // remarks: ''
      }));

      var totalAmount = parseFloat($('#offcanvasCart strong').text().replace('$', '').trim());

      var checkoutData = {
          customer_details: customerDetails,
          order_type: orderType,
          remarks: orderRemarks,
          branch: orderBranch,
          total_amount: totalAmount,
          items: itemsToSend
      };

      console.log('--- Checkout Initiated (Frontend) ---');
      console.log('Data to send:', checkoutData);

      $.ajax({
          url: '/CoMstr', 
          method: 'POST',
          contentType: 'application/json', 
          data: JSON.stringify(checkoutData), 
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
          },
          success: function(response) {
              console.log('Checkout success:', response);
              Swal.fire({
                  icon: 'success',
                  title: 'Pesanan Berhasil!',
                  html: `Pesanan Anda telah berhasil dibuat.<br>Nomor Pesanan: <strong>${response.order_number}</strong><br>Silakan lanjutkan pembayaran.`,
                  showConfirmButton: false,
                  timer: 5000
              });

              var offcanvasElement = document.getElementById('offcanvasCart');
              var bsOffcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
              if (bsOffcanvas) {
                  bsOffcanvas.hide();
              } else {
                  new bootstrap.Offcanvas(offcanvasElement).hide();
              }

              cart = []; 
              updateCartUI();

              $checkoutForm[0].reset();
              $checkoutForm.removeClass('was-validated');
              preFilledTableNumber = null;
              initConditionalCheckoutFields();

          },
          error: function(jqXHR, textStatus, errorThrown) {
              console.error('Checkout error:', textStatus, errorThrown, jqXHR);
              var errorMessage = 'Terjadi kesalahan tidak dikenal.';
              if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                  errorMessage = jqXHR.responseJSON.message;
                  if (jqXHR.responseJSON.errors) {
                    let validationErrors = '';
                    for (let key in jqXHR.responseJSON.errors) {
                      validationErrors += `<li>${jqXHR.responseJSON.errors[key][0]}</li>`;
                    }
                    errorMessage += `<ul class="text-start mt-2">${validationErrors}</ul>`;
                  }
              } else if (jqXHR.responseText) {
                  errorMessage = jqXHR.responseText;
              }

              Swal.fire({
                  icon: 'error',
                  title: 'Pesanan Gagal!',
                  html: errorMessage,
                  confirmButtonText: 'Oke'
              });
          },
          complete: function() {
              $checkoutButton.prop('disabled', false).text('Lanjutkan ke Pembayaran');
              console.log('--- Checkout AJAX call finished ---');
          }
      });
    });
  };


  // document ready
  $(document).ready(function () {

    initPreloader();
    initSwiper();
    initProductQty();
    initJarallax();
    initChocolat();
    initCheckout();
    initAddToCart();
    initCartManagement(); // Initialize cart management events
    initConditionalCheckoutFields(); // Initialize conditional fields logic and check for URL param

    updateCartUI(); // Initial call to display empty cart or any pre-loaded items

  }); // End of a document ready

})(jQuery);