function steel_validate() {
  'use strict';
  var $success = true;
  var $alert = '<div class="alert alert-danger"><ul>';

  function steel_validate_field($required) {
    if (undefined === $required) {
      $required = jQuery(this).data('required');
    }

    var $target = jQuery(this).data('target');
    var $data = jQuery($target).val();
    var $title = $target.substr(1);

    if (jQuery(this).data('title')) {
      $title = jQuery(this).data('title');
    }

    if (!$data) {
      if (true === $required) {
        $success = false;
        jQuery(this).addClass('has-error');
        $alert += '<li>' + $title + ' is required.</li>';
      }
    }
    else {
      if ('currency' === jQuery(this).data('type')) {
        var $amount = Number($data).toFixed(2);
        if (true === $required && 0 >= $amount) {
          $success = false;
          jQuery(this).addClass('has-error');
          $alert += '<li>' + $title + ' must be greater than $0.00.</li>';
        }
        else {
          jQuery($target).val($amount);
        }

      }
    }
  }

  jQuery('*').removeClass('has-error');
  jQuery('.form-validate').each(steel_validate_field);

  if (false === $success) {
    $alert += '</ul></div>';
    jQuery('#form_alert').html($alert);
    return false;
  }
  else {
    return;
  }
}
