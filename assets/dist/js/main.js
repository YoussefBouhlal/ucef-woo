/******/ (function(modules) { // webpackBootstrap
/******/ 	// install a JSONP callback for chunk loading
/******/ 	function webpackJsonpCallback(data) {
/******/ 		var chunkIds = data[0];
/******/ 		var moreModules = data[1];
/******/ 		var executeModules = data[2];
/******/
/******/ 		// add "moreModules" to the modules object,
/******/ 		// then flag all "chunkIds" as loaded and fire callback
/******/ 		var moduleId, chunkId, i = 0, resolves = [];
/******/ 		for(;i < chunkIds.length; i++) {
/******/ 			chunkId = chunkIds[i];
/******/ 			if(Object.prototype.hasOwnProperty.call(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 				resolves.push(installedChunks[chunkId][0]);
/******/ 			}
/******/ 			installedChunks[chunkId] = 0;
/******/ 		}
/******/ 		for(moduleId in moreModules) {
/******/ 			if(Object.prototype.hasOwnProperty.call(moreModules, moduleId)) {
/******/ 				modules[moduleId] = moreModules[moduleId];
/******/ 			}
/******/ 		}
/******/ 		if(parentJsonpFunction) parentJsonpFunction(data);
/******/
/******/ 		while(resolves.length) {
/******/ 			resolves.shift()();
/******/ 		}
/******/
/******/ 		// add entry modules from loaded chunk to deferred list
/******/ 		deferredModules.push.apply(deferredModules, executeModules || []);
/******/
/******/ 		// run deferred modules when all chunks ready
/******/ 		return checkDeferredModules();
/******/ 	};
/******/ 	function checkDeferredModules() {
/******/ 		var result;
/******/ 		for(var i = 0; i < deferredModules.length; i++) {
/******/ 			var deferredModule = deferredModules[i];
/******/ 			var fulfilled = true;
/******/ 			for(var j = 1; j < deferredModule.length; j++) {
/******/ 				var depId = deferredModule[j];
/******/ 				if(installedChunks[depId] !== 0) fulfilled = false;
/******/ 			}
/******/ 			if(fulfilled) {
/******/ 				deferredModules.splice(i--, 1);
/******/ 				result = __webpack_require__(__webpack_require__.s = deferredModule[0]);
/******/ 			}
/******/ 		}
/******/
/******/ 		return result;
/******/ 	}
/******/
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// object to store loaded and loading chunks
/******/ 	// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 	// Promise = chunk loading, 0 = chunk loaded
/******/ 	var installedChunks = {
/******/ 		0: 0
/******/ 	};
/******/
/******/ 	var deferredModules = [];
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/wp-content/themes/ucef-woo/assets/dist/";
/******/
/******/ 	var jsonpArray = window["webpackJsonp"] = window["webpackJsonp"] || [];
/******/ 	var oldJsonpFunction = jsonpArray.push.bind(jsonpArray);
/******/ 	jsonpArray.push = webpackJsonpCallback;
/******/ 	jsonpArray = jsonpArray.slice();
/******/ 	for(var i = 0; i < jsonpArray.length; i++) webpackJsonpCallback(jsonpArray[i]);
/******/ 	var parentJsonpFunction = oldJsonpFunction;
/******/
/******/
/******/ 	// add entry module to deferred list
/******/ 	deferredModules.push([9,1]);
/******/ 	// run deferred modules when ready
/******/ 	return checkDeferredModules();
/******/ })
/************************************************************************/
/******/ ([
/* 0 */,
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),
/* 2 */,
/* 3 */
/***/ (function(module, exports) {

module.exports = jQuery;

/***/ }),
/* 4 */,
/* 5 */
/***/ (function(module, exports) {

(function ($) {
  class QuickView {
    constructor() {
      if (typeof ucefwooLocalize === 'undefined') {
        return;
      }

      this.modal = $('#uw-qv-wrap');
      this.content = $('#uw-qv-content');
      this.events();
    }

    events() {
      // let qv_modal   = $('#uw-qv-wrap');
      // let qv_content = $('#uw-qv-content');

      /**
       * Open quick view
       */
      $(document).on('click', '.ucef-woo-quick-view', e => this.openQuickView(e));
      /**
       * Close quick view
       */

      $('.uw-qv-overlay, .uw-qv-close').on('click', e => this.closeQuickView(e));
      /**
       * Add To Cart
       */

      $(document.body).on('click', '#uw-qv-content .product:not(.product-type-external) .single_add_to_cart_button:not(.disabled)', e => this.addToCart(e));
      /**
      * Update Button
      */

      $(document.body).on('added_to_cart', (e, fragments, cart_hash, $button) => this.updateButton(e, fragments, cart_hash, $button));

      $.fn.serializeArrayAll = function () {
        var rCRLF = /\r?\n/g;
        return this.map(function () {
          return this.elements ? jQuery.makeArray(this.elements) : this;
        }).map(function (i, elem) {
          var val = jQuery(this).val();

          if (val == null) {
            return val == null; //If checkbox is unchecked
          } else if (this.type == "checkbox" && this.checked == false) {
            return {
              name: this.name,
              value: this.checked ? this.value : ''
            };
          } else if (this.type == "radio" && this.checked == false) {
            return {
              name: this.name,
              value: this.checked ? this.value : ''
            }; //default: all checkboxes = on
          } else {
            return jQuery.isArray(val) ? jQuery.map(val, function (val, i) {
              return {
                name: elem.name,
                value: val.replace(rCRLF, "\r\n")
              };
            }) : {
              name: elem.name,
              value: val.replace(rCRLF, "\r\n")
            };
          }
        }).get();
      };
    }
    /**
     * Open quick view
     */


    openQuickView(e) {
      e.preventDefault();
      const modal = $(this.modal);
      const content = $(this.content);
      const $this = $(e.target.closest('a'));
      const product_id = $this.data('product_id');
      $this.parent().addClass('loading');
      $.ajax({
        url: ucefwooLocalize.ajax_url,
        data: {
          action: 'ucef_woo_product_quick_view',
          product_id: product_id
        },
        success: function (results) {
          let innerWidth = $('html').innerWidth();
          $('html').css('overflow', 'hidden');
          let hiddenInnerWidth = $('html').innerWidth();
          $('html').css('margin-right', hiddenInnerWidth - innerWidth);
          $('html').addClass('uw-qv-open');
          content.html(results); // Display modal

          modal.fadeIn();
          modal.addClass('is-visible'); // Variation Form

          let form_variation = content.find('.variations_form');
          form_variation.trigger('check_variations');
          form_variation.trigger('reset_image');
          let var_form = content.find('.variations_form');

          if (var_form.length > 0) {
            var_form.wc_variation_form(); // var_form.find( 'select' ).change();
          }

          let image_slider_wrap = content.find('.uw-qv-image');

          if (image_slider_wrap.find('li').length > 1) {
            image_slider_wrap.flexslider();
          } // If grouped product


          let grouped = content.find('form.grouped_form');

          if (grouped) {
            let grouped_product_url = content.find('form.grouped_form').attr('action');
            grouped.find('.group_table, button.single_add_to_cart_button').hide();
            grouped.append(' <a href="' + grouped_product_url + '" class="button">' + ucefwooLocalize.grouped_text + '</a>');
          }
        }
      }).done(function () {
        $this.parent().removeClass('loading');
      });
    }
    /**
     * Close quick view
     */


    closeQuickView(e) {
      e.preventDefault();
      const modal = $(this.modal);
      const content = $(this.content);
      $('html').css({
        'overflow': '',
        'margin-right': ''
      });
      $('html').removeClass('uw-qv-open');
      modal.fadeOut();
      modal.removeClass('is-visible');
      setTimeout(function () {
        content.html('');
      }, 600);
    }
    /**
     * Add to cart
     */


    addToCart(e) {
      e.preventDefault();
      const button = $(e.target.closest('button'));
      const $form = button.closest('form.cart');
      const data = $form.serializeArrayAll();
      let is_valid = false;
      $.each(data, function (i, item) {
        if (item.name === 'add-to-cart') {
          is_valid = true;
          return false;
        }
      });

      if (is_valid) {
        e.preventDefault();
      } else {
        return;
      }

      $(document.body).trigger('adding_to_cart', [button, data]);
      button.removeClass('added');
      button.addClass('loading'); // Ajax action

      $.ajax({
        url: ucefwooLocalize.wc_ajax_url,
        type: 'POST',
        data: data,
        success: function (results) {
          $(document.body).trigger('wc_fragment_refresh');
          $(document.body).trigger('added_to_cart', [results.fragments, results.cart_hash, button]);
        }
      });
    }
    /**
     * Update button
     */


    updateButton(e, fragments, cart_hash, $button) {
      $button = typeof $button === 'undefined' ? false : $button;

      if ($button) {
        $button.removeClass('loading');
        $button.addClass('added');
        $button.after('<span>added</span>');
      }
    }

  }

  new QuickView();
})(jQuery);

/***/ }),
/* 6 */
/***/ (function(module, exports) {

(function ($) {
  class QuantityButton {
    constructor() {
      this.events();
    }

    events() {
      let $cart = $('.woocommerce div.product form.cart');
      let $quantitySelector = '.qty';
      let $quantityBoxes = $('div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)').find($quantitySelector);

      if ($quantityBoxes && 'date' !== $quantityBoxes.prop('type') && 'hodden' !== $quantityBoxes.prop('type')) {
        // Add plus and minus icons
        $quantityBoxes.parent().addClass('buttons_added').prepend('<a href="javascript:void(0)" class="minus">-</a>');
        $quantityBoxes.after('<a href="javascript:void(0)" class="plus">+</a>'); // Target quantity inputs on product pages

        $('input' + $quantitySelector + ':not(.product-quantity input' + $quantitySelector + ')').each(function () {
          let $min = parseFloat($(this).attr('min'));

          if ($min && $min > 0 && parseFloat($(this).val()) < $min) {
            $(this).val($min);
          }
        });
        $('.plus, .minus').unbind('click');
        $('.plus, .minus').on('click', function () {
          // Quantity
          let $quantityBox = $(this).closest('.quantity').find($quantitySelector); // Get values

          let $currentQuantity = parseFloat($quantityBox.val()),
              $maxQuantity = parseFloat($quantityBox.attr('max')),
              $minQuantity = parseFloat($quantityBox.attr('min')),
              $step = $quantityBox.attr('step'); // Fallback default values

          if (!$currentQuantity || '' === $currentQuantity || 'NaN' === $currentQuantity) {
            $currentQuantity = 0;
          }

          if ('' === $maxQuantity || 'NaN' === $maxQuantity) {
            $maxQuantity = '';
          }

          if ('' === $minQuantity || 'NaN' === $minQuantity) {
            $minQuantity = 0;
          }

          if ('any' === $step || '' === $step || undefined === $step || 'NaN' === parseFloat($step)) {
            $step = 1;
          } // Change the value


          if ($(this).is('.plus')) {
            if ($maxQuantity && ($maxQuantity == $currentQuantity || $currentQuantity > $maxQuantity)) {
              $quantityBox.val($maxQuantity);
            } else {
              $quantityBox.val($currentQuantity + parseFloat($step));
            }
          } else {
            if ($minQuantity && ($minQuantity == $currentQuantity || $currentQuantity < $minQuantity)) {
              $quantityBox.val($minQuantity);
            } else if ($currentQuantity > 0) {
              $quantityBox.val($currentQuantity - parseFloat($step));
            }
          } // Trigger change event


          $quantityBox.trigger('change');
        });
      }
    }

  }

  new QuantityButton();
})(jQuery);

/***/ }),
/* 7 */
/***/ (function(module, exports) {

(function ($) {
  class MiniCart {
    constructor() {
      this.modal = $('#uw-mc-wrap');
      this.events();
    }

    events() {
      /**
       * Open modal
       */
      $(document).on('click', '#ucef-woo-mini-cart', e => this.openModal(e));
      /**
       * Close modal
       */

      this.modal.on('click', '.uw-mc-overlay, .uw-mc-close', e => this.closeModal(e));
    }
    /**
     * Open modal 
     */


    openModal(e) {
      e.preventDefault();
      const innerWidth = $('html').innerWidth();
      $('html').css('overflow', 'hidden');
      const hiddenInnerWidth = $('html').innerWidth();
      $('html').css('margin-right', hiddenInnerWidth - innerWidth); // Display modal

      this.modal.fadeIn();
      this.modal.addClass('is-visible');
    }
    /**
     * Close modal
     */


    closeModal(e) {
      e.preventDefault();
      $('html').css({
        'overflow': '',
        'margin-right': ''
      });
      this.modal.fadeOut();
      this.modal.removeClass('is-visible');
    }

  }

  new MiniCart();
})(jQuery);

/***/ }),
/* 8 */
/***/ (function(module, exports) {

(function ($) {
  class WishList {
    constructor() {
      if (typeof ucefwooLocalize === 'undefined') {
        return;
      }

      this.modal = $('#uw-wl-wrap');
      this.events();
    }

    events() {
      /**
       * Open modal
       */
      $(document).on('click', '#ucef-woo-wishlist', e => this.openModal(e));
      /**
       * Close modal
       */

      this.modal.on('click', '.uw-wl-overlay, .uw-wl-close', e => this.closeModal(e));
      /**
       * SlidUp product whene it removed from wishlist slider
       */

      this.modal.on('click', '.product-remove a', e => this.slidUpProduct(e));
      /**
       * Update the wishlist with ajax
       */

      $(document).on('added_to_wishlist removed_from_wishlist', () => this.UpdateWishlist());
    }
    /**
     * Open Modal
     */


    openModal(e) {
      e.preventDefault();
      const innerWidth = $('html').innerWidth();
      $('html').css('overflow', 'hidden');
      const hiddenInnerWidth = $('html').innerWidth();
      $('html').css('margin-right', hiddenInnerWidth - innerWidth); // Display modal

      this.modal.fadeIn();
      this.modal.addClass('is-visible');
    }
    /**
     * Close Modal
     */


    closeModal(e) {
      e.preventDefault();
      $('html').css({
        'overflow': '',
        'margin-right': ''
      });
      this.modal.fadeOut();
      this.modal.removeClass('is-visible');
    }
    /**
     * SlidUp product whene it removed from wishlist slider
     */


    slidUpProduct(e) {
      const target = e.target.closest('tr');
      $(target).slideUp();
    }
    /**
     * Update the wishlist with ajax
     */


    UpdateWishlist() {
      $.ajax({
        url: ucefwooLocalize.ajax_url,
        data: {
          action: 'ucef_woo_update_wishlist_count'
        },
        success: function (results) {
          $('.wishlist-count').html(results.count);
          $('#uw-wl-body').html(results.wishlist);
        }
      });
    }

  }

  new WishList();
})(jQuery);

/***/ }),
/* 9 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
// ESM COMPAT FLAG
__webpack_require__.r(__webpack_exports__);

// EXTERNAL MODULE: ./assets/src/css/main.css
var main = __webpack_require__(1);

// EXTERNAL MODULE: ./node_modules/bootstrap/dist/js/bootstrap.js
var bootstrap = __webpack_require__(2);

// CONCATENATED MODULE: ./assets/src/js/components/Comments.js
class Comments {
  constructor() {
    this.form = document.querySelector('#commentform');
    this.text = document.querySelector('#comment');
    this.author = document.querySelector('#author');
    this.email = document.querySelector('#email');

    if (this.form) {
      this.events();
    }
  }

  events() {
    // Form Submit Event
    this.form.addEventListener('submit', e => this.validation(e)); // Fields Focus Event to Remove Error CSS Classes

    const fields = [this.text, this.author, this.email];
    fields.forEach(field => {
      if (field) {
        field.addEventListener('focus', e => this.removeErrClass(e));
      }
    });
  }

  validation(e) {
    let textVal = '';
    let authorVal = '';
    let emailVal = '';

    if (!this.text) {
      textVal = 'nothing';
    }

    if (!this.author) {
      authorVal = 'nothing';
    }

    if (!this.email) {
      emailVal = 'default@email.com';
    }

    if (this.text) textVal = this.text.value;
    if (this.author) authorVal = this.author.value;
    if (this.email) emailVal = this.email.value;

    if (textVal == '') {
      e.preventDefault();
      this.addErrClass(this.text);
    }

    if (authorVal == '') {
      e.preventDefault();
      this.addErrClass(this.author);
    }

    if (!this.isEmail(emailVal)) {
      e.preventDefault();
      this.addErrClass(this.email);
    }
  }

  addErrClass(field) {
    field.classList.add('border', 'border-danger');
    field.nextElementSibling.classList.remove('d-none');
  }

  removeErrClass(e) {
    e.target.classList.remove('border', 'border-danger');
    e.target.nextElementSibling.classList.add('d-none');
  }

  isEmail(emailVal) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(emailVal);
  }

}

/* harmony default export */ var components_Comments = (Comments);
// EXTERNAL MODULE: ./assets/src/js/components/QuickView.js
var QuickView = __webpack_require__(5);

// EXTERNAL MODULE: ./assets/src/js/components/QuantityButton.js
var QuantityButton = __webpack_require__(6);

// EXTERNAL MODULE: ./assets/src/js/components/MiniCart.js
var MiniCart = __webpack_require__(7);

// EXTERNAL MODULE: ./assets/src/js/components/WishList.js
var WishList = __webpack_require__(8);

// CONCATENATED MODULE: ./assets/src/js/main.js
/*
 *Import CSS Files
 */


if (false) {}
/*
 *Import 3rd Party Files
 */




/**
 * Import JS Files
 */






new components_Comments();

/***/ })
/******/ ]);