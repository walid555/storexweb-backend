  function redirect($link) {
      window.location.href = $link;
  }

  $('#generalSearchArea').bind("enterKey", function (e) {
      let searchInput = $('#generalSearchArea').val();
      // if($.trim(seachInput)){
      $.ajax({
          type: "get",
          data: {
              'input': searchInput
          },
          dataType: "json",
          success: function (r) {
              if (r.status == 1) {
                  $('#filter').html(r.view);
                  toolbar();
              } else if (r.status == -1) {
                  Swal.fire({
                      type: 'error',
                      title: 'Oops...',
                      html: '<span class="swal-message">' + r.message + '</span>'

                  });
              }
          },
          error: function (e) {
              console.log(e);
          }
      });
      // }
  });
  $('#generalSearchArea').keyup(function (e) {
      if (e.keyCode == 13) {
          $(this).trigger("enterKey");
      }
  });

  $(window).on('hashchange', function () {
      if (window.location.hash) {
          var page = window.location.hash.replace('#', '');
          if (page == Number.NaN || page <= 0) {
              return false;
          } else {
              getData(page);
          }
      }
  });

  $(document).ready(function () {
      $(document).on('click', '.pagination a', function (event) {
          event.preventDefault();
          $('li').removeClass('active');
          $(this).parent('li').addClass('active');
          var myurl = $(this).attr('href');
          var page = $(this).attr('href').split('page=')[1];
          getData(page);
      });

  });

  function getData(page) {
      let searchInput = $('#generalSearchArea').val();
      $.ajax({
          url: '?page=' + page,
          type: "get",
          data: {
              'input': searchInput
          },
      }).done(function (data) {
          $("#filter").html(data.view);
          location.hash = page;
          toolbar();
      }).fail(function (jqXHR, ajaxOptions, thrownError) {
          alert('No response from server');
      });
  }


  $(window).on('load', function () {
      toolbar();
  });

  function toolbar() {
      $.each($('.dark-toolbar'), function () {
          let id = $(this).attr('Cid');
          // [ dark-toolbar ]
          $('#dark-toolbar_' + id).toolbar({
              content: '#toolbar-options_' + id,
              style: 'dark',
              event: 'click'
              // animation: 'grow',
          });
      });
  }

  $(document).ready(function () {
      $(document).on('click', '[data-toggle="lightbox"]', function (event) {
          event.preventDefault();
          $(this).ekkoLightbox();
      });
  });
