/**
 * Pustaka untuk manajemen data keranjang
 * Keranjang :: Tambah, Kurang Produk di lakukan secara lokal
 * disimpan di sessionStorage, ketika tombol bayar diklik maka
 * akan disimpan di VirtualCart di Database
 * 
 * Q : Bisakah kita memanipulasi keranjang, Apa dampaknya ?
 * Q : Guest and Logged User ?
 * 
 * Flow 
 * User Menambah Barang -> Keranjang Kosong ? Buat Keranjang -> Tambah Barang : Tambah Barang;
 * User Klik Transaksi -> Cek Session ? Sinkron Cart : Buat Cart Server -> Simpan Data -> Tambahkan Cart Hash ke Keranjang
 */
let LSDC_Cart = (function () {

  function Constructor() {
    Object.defineProperties(this, {
      _key: {
        value: '_lsdcommerce_cart'
      }
    })
  }

  Constructor.prototype.set_cookie = function (name, value, days) {
    var expires = "";
    var date = new Date();

    if (days) {
      date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
      expires = "; expires=" + date.toUTCString();
    } else {
      date.setTime(date.getTime() + (0.0001 * 24 * 60 * 60 * 1000));
      expires = "; expires=" + date.toUTCString();
    }

    document.cookie = name + "=" + (value || "") + expires + "; path=/; SameSite=Lax";
  }

  Constructor.prototype.get_cookie = function (name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') c = c.substring(1, c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
  }

  Constructor.prototype.add = function (value) {
    this.set_cookie(this._key, JSON.stringify(value), 7)
  }

  // Constructor.prototype.addItem = function (value) {
  //   this.set_cookie(value)
  // }

  Constructor.prototype.updateItem = function (value) {
    this.set_cookie(value)
  }

  Constructor.prototype.get = function () {
    return JSON.parse(this.get_cookie(this._key))
  }

  Constructor.prototype.getItem = function () {
    return JSON.parse(sessionStorage.getItem(this._key))
  }

  Constructor.prototype.remove = function () {
    this.set_cookie(name, null, null);
  }

  Constructor.prototype.removeItem = function () {
    sessionStorage.removeItem(this._key);
  }

  Constructor.prototype.countItems = function () {
    return JSON.parse(sessionStorage.getItem(this._key))
  }

  return Constructor;

})();


(function ($) {
  'use strict';

  const troli = new LSDC_Cart();

  let cart = {
    // hash: '7a8sb88383c33d3d3e3e3e3d3', //generate from server
    payload: {
      // csrf: '8329c2d2e2e3e7d7c', // @link https://dasarpemrogramangolang.novalagung.com/C-13-csrf.html // generate on transcation
      'items': [{
          id: 12,
          qty: 1
        },
        {
          id: 45,
          qty: 1
        }
      ]
    }
  }

  troli.add(JSON.stringify(cart));
  troli.addItem({
    id: 12,
    qty: 1
  });
  console.log(JSON.parse(troli.get()));

})(jQuery);