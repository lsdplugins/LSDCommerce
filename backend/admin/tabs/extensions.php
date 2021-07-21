<?php
/*********************************************/
/* Displaying Extensions Menu
/* wp-admin -> LSDCommerce -> Extension
/********************************************/
?>

<div class="columns">
  <div class="filter columns column col-12">
    <div class="column col-8">
      <input class="filter-tag d-hide" id="tag-0" type="radio" name="filter-radio" hidden="" checked="">
      <input class="filter-tag d-hide" id="tag-1" type="radio" name="filter-radio" hidden="">
      <input class="filter-tag d-hide" id="tag-2" type="radio" name="filter-radio" hidden="">
      <input class="filter-tag d-hide" id="tag-3" type="radio" name="filter-radio" hidden="">
      <input class="filter-tag d-hide" id="tag-4" type="radio" name="filter-radio" hidden="">
      <div class="filter-nav">
        <label class="chip" for="tag-0"><?php _e('All', 'lsdcommerce');?></label>
        <label class="chip" for="tag-1"><?php _e('Payment Gateway', 'lsdcommerce');?></label>
        <label class="chip" for="tag-2"><?php _e('Fitur Lebih Canggih', 'lsdcommerce');?></label>
        <label class="chip" for="tag-3"><?php _e('Konfirmasi Otomatis', 'lsdcommerce');?></label>
      </div>
    </div>
    <div class="column col-4 text-right">
      <figure class="avatar avatar-lg mr-2"><img src="https://picturepan2.github.io/spectre/img/avatar-2.png"
          alt="Avatar LG"></figure>
      <span>Yayasan Coba Coba</span>
      <small style="display:block;">lasidaziz@gmail.com</small>
    </div>
    <div class="filter-body columns">
      <div class="column col-xs-12 filter-item" data-tag="tag-2">
        <div class="card">
          <span class="label label-primary">
            <small>Expired : 300 Hari Lagi</small>
            <small class="float-right">1/3 Slot</small>
          </span>
          <div class="card-header">
            <div class="card-title h5">Pro</div>
            <label for="">Fitur yang lebih lengkap</label>
            <button class="btn btn-block btn-sm float-right mt-2">Aktifkan</button>
          </div>

        </div>
      </div>

      <div class="column col-xs-12 filter-item" data-tag="tag-2">
        <div class="card">
          <span class="label label-primary">
            <small>Expired : 30 Hari Lagi</small>
            <small class="float-right">1/1 Slot</small>
          </span>
          <div class="card-header">
            <div class="card-title h5">Afiliasi</div>
            <label for="">Sistem Afiliasi</label>
            <button class="btn btn-block btn-sm float-right mt-2">Tambah Lisensi</button>
          </div>
        </div>
      </div>

      <div class="column col-xs-12 filter-item" data-tag="tag-2">
        <div class="card">
          <span class="label label-success">
            <small>Belum Punya</small>
          </span>
          <div class="card-header">
            <div class="card-title h5">Qurban</div>
            <label for="">Jual Hewan Qurban</label>
            <button class="btn btn-block btn-sm float-right mt-2">Beli Ekstensi</button>
          </div>
        </div>
      </div>

      <div class="column col-xs-12 filter-item" data-tag="tag-1">
        <div class="card">
          <span class="label label-warning">
            <small>Expired</small>
            <small class="float-right">1/1 Slot</small>
          </span>
          <div class="card-header">
            <div class="card-title h5">Midtrans</div>
            <label for="">Indonesia Payment Gateway</label>
            <button class="btn btn-block btn-sm float-right mt-2">Perpanjang Lisensi</button>
          </div>
        </div>
      </div>

      <div class="column col-xs-12 filter-item" data-tag="tag-1">
        <div class="card">
          <span class="label"><a href="https://lsdplugins.com/lsdconasi-ipaymu/" target="_blank"
              class="text-light"><?php _e( 'Akan Segera Hadir', 'lsdcommerce') ?>
            </a></span>
          <div class="card-header">
            <div class="card-title h5">iPaymu</div>
            <label for="">Indonesia Payment Gateway</label>
          </div>
        </div>
      </div>

      <div class="column col-xs-12 filter-item" data-tag="tag-1">
        <div class="card">
          <span class="label"><a href="https://lsdplugins.com/lsdconasi-faspay/" target="_blank"
              class="text-light"><?php _e( 'Akan Segera Hadir', 'lsdcommerce') ?>
            </a></span>
          <div class="card-header">
            <div class="card-title h5">Faspay</div>
            <label for="">Indonesia Payment Gateway</label>
          </div>
        </div>
      </div>

      <div class="column col-xs-12 filter-item" data-tag="tag-3">
        <div class="card">
          <span class="label"><a href="https://lsdplugins.com/lsdconasi-moota/" target="_blank"
              class="text-light"><?php _e( 'Akan Segera Hadir', 'lsdcommerce') ?>
            </a></span>
          <div class="card-header">
            <div class="card-title h5">Moota</div>
            <label for="">Payment Confirmation</label>
          </div>
        </div>
      </div>

      <div class="column col-xs-12 filter-item" data-tag="tag-1">
        <div class="card">
          <span class="label"><a href="https://lsdplugins.com/lsdconasi-paypal/" target="_blank"
              class="text-light"><?php _e( 'Akan Segera Hadir', 'lsdcommerce') ?>
            </a></span>
          <div class="card-header">
            <div class="card-title h5">Paypal</div>
            <label for="">Payment Gateway</label>
          </div>
        </div>
      </div>



    </div>
  </div>
</div>
</div>

<style>
.card {
  padding: 0;
}
</style>