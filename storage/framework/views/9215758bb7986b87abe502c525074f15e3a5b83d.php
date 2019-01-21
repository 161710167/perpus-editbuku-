<script src="<?php echo e(asset('bower/moment/moment.js')); ?>"></script>
<script src="<?php echo e(asset('bower/jquery/dist/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('bower/jquery-ui/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('bower/simplycountdown/dist/simplyCountdown.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/bower_components/popper.js/dist/umd/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/bower_components/fullcalendar/dist/fullcalendar.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/bower_components/jquery-mask-plugin/dist/jquery.mask.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/bower_components/select2/dist/js/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/bower_components/dropzone/dist/min/dropzone.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/bower_components/moment/min/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/bower_components/nouislider/distribute/nouislider.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/bower_components/trumbowyg/dist/trumbowyg.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/flatpickr/flatpickr.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/summernote/summernote-bs4.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js')); ?>"></script>
<script src="<?php echo e(asset('bower/sweetalert2/dist/sweetalert2.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/simple_bar/dist/simplebar.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.blockUI.js')); ?>"></script>
<!-- App functions and actions -->
<script src="<?php echo e(asset('js/app.min.js')); ?>"></script>
<script type="text/javascript">
  //num only
  $(".number_only").keydown(function (e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        return false;
    }
  });

  function randomInt(min, max) {
      return Math.floor(Math.random()*(max+1-min)) + min;
  };
  /*--------------------------------------
      BlockUI 
  ---------------------------------------*/
  function blockUI(message){
      $.blockUI({
        message: '<span class="text-semibold"><i class="zmdi zmdi-rotate-right zmdi-hc-spin"></i>&nbsp;Sedang Di Proses...</span>',
        baseZ: 10000,
        overlayCSS: {
            backgroundColor: '#000',
            opacity: 0.6,
            cursor: 'wait'
        },
        css: {
            border: 0,
            padding: '10px 15px',
            color: '#fff',
            '-webkit-border-radius': 2,
            '-moz-border-radius': 2,
            backgroundColor: '#333',
            'z-index' : 10020
        } 
      });
  }
  function blockElement(element){
      // $(element).block({
      //     message: '<div class="semibold"><h5><i class="zmdi zmdi-rotate-right zmdi-hc-spin zmdi-hc-2x"></i></h5></div>',
      //     baseZ: 100000,
      //     // timeout: 2000, //unblock after 2 seconds
      //     overlayCSS: {
      //       backgroundColor: '#fff',
      //       opacity: 0.8,
      //       cursor: 'wait',
      //     },
      //     css: {
      //         // width: 200,
      //         verticalAlign: 'middle',
      //         border: 0,
      //         padding: 0,
      //         backgroundColor: 'transparent'
      //     }, }); 
      $(element).block({
          message: '<span class="text-semibold"><i class="zmdi zmdi-rotate-right zmdi-hc-spin"></i>&nbsp;Loading...</span>',
          overlayCSS: {
              backgroundColor: '#000',
              opacity: 0.5,
              cursor: 'wait'
          },
          css: {
              border: 0,
              padding: '10px 15px',
              color: '#fff',
              '-webkit-border-radius': 2,
              '-moz-border-radius': 2,
              backgroundColor: '#333',
              'z-index' : 2000
          } 
      });

  }
  /*--------------------------------------
      Initialize Plugin
   ---------------------------------------*/
  function initializePlugin() {
    $('.summernote').summernote({
      placeholder: '',
      tabsize: 2,
      height: 100
    });
  }
  /*--------------------------------------
      SweetAlert
   ---------------------------------------*/
  function SweetAlert(title,text,type,timer,confirm) {
    swal({
        title: title,
        text: text,
        type: type,
        timer: timer,
        showConfirmButton: confirm
    })
  } 
  /*--------------------------------------
      Bootstrap Notify Notifications
   ---------------------------------------*/
  function notify(type,icon,title,message){
      $.notify({
          icon: icon,
          title: title,
          message: message,
          url: ''
      },{
          element: 'body',
          type: type,
          allow_dismiss: true,
          placement: {
            from: "bottom",
            align: "right"
          },
          offset: {
              x: 20,
              y: 20
          },
          spacing: 10,
          z_index: 1300,
          delay: 750,
          timer: 750,
          url_target: '_blank',
          mouse_over: false,
          // animate: {
          //     enter: 'fadeIn',
          //     exit: 'fadout'
          // },
          template:   '<div data-notify="container" class="alert alert-dismissible alert-{0} alert--notify" role="alert" style="width:500px;">' +
                          '<span data-notify="icon"></span> ' +
                          '<span data-notify="title">{1}</span> ' +
                          '<span data-notify="message">{2}</span>' +
                          '<div class="progress" data-notify="progressbar">' +
                              '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                          '</div>' +
                          '<a href="{3}" target="{4}" data-notify="url"></a>' +
                          '<button type="button" aria-hidden="true" data-notify="dismiss" class="alert--notify__close"><i class="zmdi zmdi-close-circle"></i></button>' +
                      '</div>'
      });
  }
</script>
<script>
  var toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 5000
  });
  setTimeout(function() {
      $('#alert-feed').fadeOut('slide',function(){$('#alert-feed').remove()});
  }, 6000);
</script>