/**
 * Pustaka untuk manajemen data keranjang
 * Keranjang :: Tambah, Kurang Produk di lakukan secara lokal
 * disimpan di sessionStorage, ketika tombol bayar diklik maka
 * akan disimpan di VirtualCart di Database
 */
let LSDCCart = (function () {

  function Constructor(key) {
    Object.defineProperties(this, {
      _key: {
        value: key
      }
    })
  }

  Constructor.prototype.set = function (value) {
    sessionStorage.setItem(this._key, JSON.stringify(value));
  }

  Constructor.prototype.get = function () {
    return JSON.parse(sessionStorage.getItem(this._key))
  }

  Constructor.prototype.remove = function () {
    sessionStorage.removeItem(this._key);
  }

  return Constructor;

})();



(function ($) {
  'use strict';


  let wizard = new LSDCCart("cookie");

  wizard.set("lasida");
  console.log(wizard.get());
  console.log(wizard._key);

})(jQuery);