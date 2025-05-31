(function($) {

  "use strict";

  var initPreloader = function() {
    $(document).ready(function($) {
    var Body = $('body');
        Body.addClass('preloader-site');
    });
    $(window).load(function() {
        $('.preloader-wrapper').fadeOut();
        $('body').removeClass('preloader-site');
    });
  }

  // init Chocolat light box
	var initChocolat = function() {
		Chocolat(document.querySelectorAll('.image-link'), {
		  imageSize: 'contain',
		  loop: true,
		})
	}

  var initSwiper = function() {

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

  var initProductQty = function(){

    $('.product-qty').each(function(){

      var $el_product = $(this);
      var quantity = 0;

      $el_product.find('.quantity-right-plus').click(function(e){
          e.preventDefault();
          var quantity = parseInt($el_product.find('#quantity').val());
          $el_product.find('#quantity').val(quantity + 1);
      });

      $el_product.find('.quantity-left-minus').click(function(e){
          e.preventDefault();
          var quantity = parseInt($el_product.find('#quantity').val());
          if(quantity>0){
            $el_product.find('#quantity').val(quantity - 1);
          }
      });

    });

  }

  // init jarallax parallax
  var initJarallax = function() {
    jarallax(document.querySelectorAll(".jarallax"));

    jarallax(document.querySelectorAll(".jarallax-keep-img"), {
      keepImg: true,
    });
  }

  var initCheckout = function() {
    // Target the checkout button inside the offcanvasCart
    $('#offcanvasCart .btn-lg[type="submit"]').on('click', function(e) {
      e.preventDefault(); // Prevent default form submission behavior

      // Disable the button to prevent multiple clicks
      var $checkoutButton = $(this);
      $checkoutButton.prop('disabled', true).text('Processing...');

      // In a real application, you would collect cart data from the DOM
      // or from a JavaScript cart object/store.
      // For this dummy cart, we'll extract directly from the HTML or use hardcoded data.

      var cartItems = [];
      // Example of extracting items from the dummy cart HTML
      $('#offcanvasCart .list-group-item.d-flex').each(function() {
        var productName = $(this).find('h6').text().trim();
        var productPrice = $(this).find('span.text-body-secondary').text().trim();
        // You might need to parse the price (e.g., remove '$' and convert to number)
        cartItems.push({
          name: productName,
          price: productPrice
        });
      });

      var totalAmount = $('#offcanvasCart strong').text().trim(); // e.g., "$20"

      console.log('--- Checkout Initiated ---');
      console.log('Cart Items:', cartItems);
      console.log('Total Amount:', totalAmount);

      // Simulate an AJAX request to a backend for checkout
      // In a real app, this would be a fetch() or $.ajax() call to your server
      setTimeout(function() {
        // Simulate a successful response after 2 seconds
        var success = Math.random() > 0.2; // 80% chance of success for demo

        if (success) {
          alert('Checkout successful! Your order has been placed.');
          // Optionally, close the offcanvas cart
          var offcanvasElement = document.getElementById('offcanvasCart');
          var bsOffcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
          if (bsOffcanvas) {
            bsOffcanvas.hide();
          } else {
            // If instance not found, create one and then hide (for cases where it's not initialized by JS yet)
            new bootstrap.Offcanvas(offcanvasElement).hide();
          }

          // Clear the cart display (conceptual, in a real app you'd update actual cart state)
          $('#offcanvasCart .list-group').html('<li class="list-group-item">Your cart is empty.</li>');
          $('#offcanvasCart .badge').text('0');
          $('#offcanvasCart strong').text('$0');


        } else {
          alert('Checkout failed. Please try again.');
        }

        // Re-enable the button regardless of success or failure
        $checkoutButton.prop('disabled', false).text('Continue to checkout');
        console.log('--- Checkout Finished ---');

      }, 2000); // Simulate network delay
    });
  };

  // document ready
  $(document).ready(function() {
    
    initPreloader();
    initSwiper();
    initProductQty();
    initJarallax();
    initChocolat();
    initCheckout();

  }); // End of a document

})(jQuery);