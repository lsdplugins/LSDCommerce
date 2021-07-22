/**
 * Pustaka Klien LSDCommerce Headless
 */
let LSDCommerceAPI = (function () {

  function Constructor(options) {
    Object.defineProperties(this, {
      _settings: {
        value: options
      }
    })
  }

  Constructor.prototype.post = function (endpoint, options) {
    console.log("[POST] " + this._settings.rest_url + '/wp-json/' + this._settings.version + '/' + endpoint);
    console.log(options);
  }

  Constructor.prototype.get = function (endpoint) {
    console.log("[GET] " + this._settings.rest_url + '/wp-json/' + this._settings.version + '/' + endpoint);
  }

  return Constructor;

})();


(function ($) {
  'use strict';

  const LSDC = new LSDCommerceAPI({
    rest_url: "https://lsdplugins.com/",
    version: "v1"
  });

  LSDC.post("cart/", {
    product_id: "21",
    quantity: "1"
  });

  LSDC.get("cart");

  LSDC.post("checkout/", {
    virtual_cart: "ab23b4cada345e6fe",
  });

})(jQuery);