(function ($) {
  'use strict';

  /**
   * Input Currency Formatting
   */
  $(document).on('keyup', 'input.currency', function (event) {
    // skip for arrow keys
    if (event.which >= 37 && event.which <= 40) return;

    let separator = ".";
    if (lsdc_admin.currency == 'USD') separator = ",";

    // currency_validate
    $(this).val(function (index, value) {
      return value
        .replace(/\D/g, "")
        .replace(/^0+/, '') // Removing Leading by Zero
        .replace(/\B(?=(\d{3})+(?!\d))/g, separator);
    });
  });

})(jQuery);