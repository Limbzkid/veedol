(function ($, Drupal) {

  var mobile;

  $(document).ready(function(){
    if($('body').hasClass('product_category')) {
      $('html, body').animate({
        scrollTop: $(".product-listing-wrapper").offset().top
      }, 50);
    }
  });

  $(window).on('load', function() {
    $.ajax({
      url: drupalSettings.path.baseUrl + "get-page-id",  //Server script to process data
      type: 'POST',
      data: {},
      success: function (resp) {
        if(resp != '') {
          if(resp == 'product') {
            // var bid = '.'+ 'product-listing-wrapper';
            // setTimeout(function(){
            //   $('html, body').animate({
            //       scrollTop: $(bid).offset().top - 80
            //   }, 1000);
            // }, 500);
          } else {
            var bid = '#'+ resp;
            setTimeout(function(){
              $('html, body').animate({
                  scrollTop: $(bid).offset().top - 80
              }, 100);
            }, 100);
          }
        }
      }
    });
  });

  if($('body').hasClass('contact-us')) {
    $('#query_type option:first').prop('selected','selected');
    $('#query_type option:first').prop('disabled','disabled');
  }

  if($('body').hasClass('find-a-distributor') || $('body').hasClass('find-nearest-workshop') || $('body').hasClass('depot-locator') || $('body').hasClass('plant-locator')) {

    $(document).on('change', '#region', function() {
      $('.error').remove();
      $('.info-box-list-wrapper').html('');
      if($(this).val() != '') {
        $.ajax({
          url: drupalSettings.path.baseUrl + "get-states",
          type: 'POST',
          data: {
            'region': $(this).val(),
            'vid' : $('.fileters-wrapper').attr('id')
          },
          success: function (resp) {
            $('#state').html(resp.options);
            $('#city option:not(:first)').remove();
            if(resp.content != '') {
              $('.info-box-list-wrapper').html(resp.content);
            }
          }
        });
      } else {
        $('#state option:not(:first)').remove();
        $('#city option:not(:first)').remove();
        $('.info-box-list-wrapper').html('');
      }
    });

    $(document).on('change', '#state', function() {
      $('.error').remove();
      $('.info-box-list-wrapper').html('');
      if($('#region option:selected').val() == '') {
        $('#region').after('<div class="error">Please select a region .</div>');
        return false;
      }

      if($(this).val() != '') {
        $.ajax({
          url: drupalSettings.path.baseUrl + "get-cities",
          type: 'POST',
          data: {
            'region': $('#region option:selected').val(),
            'state' : $(this).val(),
            'vid' : $('.fileters-wrapper').attr('id')
          },
          success: function (resp) {
            $('#city').html(resp.options);
            if(resp.content != '') {
              $('.info-box-list-wrapper').html(resp.content);
            }
          }
        });
      } else {
        $('#city option:not(:first)').remove();
        $('.info-box-list-wrapper').html('');
      }
    });



    $(document).on('click', '.resendOtp', function(e) {
      e.preventDefault(e);
      $('.error').remove();
      $.ajax({
        url: drupalSettings.path.baseUrl + "resend-otp",
        type: 'POST',
        data: {
          'mobile': mobile,
          'region': $('#region option:selected').val(),
          'state': $('#state option:selected').val(),
          'city' : $('#city option:selected').val(),
          'vid'  : $('.fileters-wrapper').attr('id')
        },
        success: function (resp) {
          if(resp.err != '') {
            for (var x in resp.err) {
              var temp = resp.err[x].split("-");
              var errID = temp[0];
              var errMsg = temp[1];
              $('#' + errID).after('<div class="error">' + errMsg + '</div');
            }
          } else {
            $('.otp-gen').remove();
            $('#region, #city, #state').prop('disabled', 'disabled');
            $('#otp').val(resp.otp);
          }
        }
      });
    })

    $(document).on('click', '.sbmtOtp', function(e) {
      e.preventDefault(e);
      mobile = $('#mobile').val();
      $('.error').remove();
      $.ajax({
        url: drupalSettings.path.baseUrl + "get-otp",
        type: 'POST',
        data: {
          'mobile': mobile,
          'region': $('#region option:selected').val(),
          'state': $('#state option:selected').val(),
          'city' : $('#city option:selected').val(),
          'vid'  : $('.fileters-wrapper').attr('id')
        },
        success: function (resp) {
          if(resp.err != '') {
            for (var x in resp.err) {
              var temp = resp.err[x].split("-");
              var errID = temp[0];
              var errMsg = temp[1];
              $('#' + errID).after('<div class="error">' + errMsg + '</div');
            }
          } else {
            $('.otp-gen').remove();
            $('#region, #city, #state').prop('disabled', 'disabled');
            $('.otp-verify').html(resp.markup).removeClass('d-none');
          }
        }
      });
    })

    $(document).on('change', '#city', function() {
      if($('.otp-gen').is(':visible')) {
        return false;
      }
      var vid = $('.fileters-wrapper').attr('id');
      $.ajax({
        url: drupalSettings.path.baseUrl + "get-data",
        type: 'POST',
        data: {
          'otp': '',
          'region': $('#region option:selected').val(),
          'state': $('#state option:selected').val(),
          'city' : $('#city option:selected').val(),
          'vid'  : vid
        },
        success: function (resp) {
          $('.info-box-list-wrapper').html(resp.content);
        }
      });
    })

    $(document).on('click', '.verifyOtp', function(e) {
      e.preventDefault(e);

      $.ajax({
        url: drupalSettings.path.baseUrl + "verify-otp",
        type: 'POST',
        data: {
          'otp': $('#otp').val(),
          'region': $('#region option:selected').val(),
          'state': $('#state option:selected').val(),
          'city' : $('#city option:selected').val()
        },
        success: function (resp) {
          if(resp.err != '') {
            $('#mobile').after('<div class="error">'+ resp.err +'</div>');
          } else {
            $('.otp-verify').remove();
            $('#region, #city, #state').removeAttr('disabled');
            $('.info-box-list-wrapper').html(resp.markup).removeClass('d-none');
          }
        }
      });
    })
  }

  if($('body').hasClass('company-contact')) {
    $(document).on('change', '#state', function() {
      $.ajax({
        url: drupalSettings.path.baseUrl + "get-all-cities",
        type: 'POST',
        data: {
          'state': $('#state option:selected').val(),
        },
        success: function (resp) {
          $('#city').html(resp.markup);
        }
      });
    });
  }

  $(document).on('change', '#category', function() {
    if($('body').hasClass('find-lubricant')) {
      $('.noResult').remove();
      $('.lubricant-list-wrapper').html('');
      $('#model option:not(:first)').remove();
      $.ajax({
        url: drupalSettings.path.baseUrl + "get-all-makes",
        type: 'POST',
        data: {
          'cat': $(this).val(),
        },
        success: function (resp) {
          if(resp.markup == '') {

          } else {
            //
          }
          $('#make').html(resp.options);
        }
      });
    }
  });

  $(document).on('change', '#make', function() {
    if($('body').hasClass('find-lubricant')) {
      $('.noResult').remove();
      $('.lubricant-list-wrapper').html('');
      $.ajax({
        url: drupalSettings.path.baseUrl + "get-all-models",
        type: 'POST',
        data: {
          'cat': $('#category option:selected').val(),
          'make': $(this).val(),
        },
        success: function (resp) {
          if(resp.markup == '') {

          } else {
            //$('.lubricant').html(resp.markup);
          }
          $('#model').html(resp.options);
        }
      });
    }
  });

  $(document).on('change', '#model', function() {
    if($('body').hasClass('find-lubricant')) {
      $('.noResult').remove();
      $.ajax({
        url: drupalSettings.path.baseUrl + "get-lube",
        type: 'POST',
        data: {
          'cat': $('#category option:selected').val(),
          'make': $('#make option:selected').val(),
          'model': $(this).val(),
        },
        success: function (resp) {
          if(resp.markup == '') {
            $('.lubricant-list-wrapper').html('<p class="noResult">No Products found for your selection<p>');
          } else {
            $('.lubricant-list-wrapper').html(resp.markup);
          }
        }
      });
    }
  });

  $(document).on('change', '#year', function() {

  //  if($('body').hasClass('financial-results')) {
      $.ajax({
        url: drupalSettings.path.baseUrl + "get-financial-result",
        type: 'POST',
        data: {
          'year': $(this).val(),
          'company': $('#company option:selected').val(),
          'page': $('.investors').attr('id')
        },
        success: function (resp) {
          if(resp.markup == '') {

          } else {
            $('.financial-results-list').html(resp.markup);
          }
        }
      });
  //  }
  });

  $(document).on('change', '#company', function() {

  //  if($('body').hasClass('financial-results')) {
      $.ajax({
        url: drupalSettings.path.baseUrl + "get-financial-result-company",
        type: 'POST',
        data: {
          'company': $(this).val(),
          'year' : $('#year option:selected').val(),
          'page': $('.investors').attr('id')
        },
        success: function (resp) {
          if(resp.markup == '') {

          } else {
            $('.financial-results-list').html(resp.markup);
            $('#year').html(resp.options);
          }
        }
      });
  //  }
  });

  $(document).on('click', '.scroll-page', function() {
    var secId = $(this).attr('id');
    $.ajax({
      url: drupalSettings.path.baseUrl + "set-page-id",
      type: 'POST',
      data: {
        'section' : secId,
      },
      success: function (resp) {

      }
    });
  });

  $(document).on('submit', '#views-exposed-form-search-api-search-page-1', function(e) {
    if($('#views-exposed-form-search-api-search-page-1 .edit-search-api-fulltext--2').val() == '') {
      e.preventDefault();
    }
  });




})(jQuery, Drupal);
