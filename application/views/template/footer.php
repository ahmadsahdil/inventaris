</div>
</div>
<!-- /.control-sidebar -->
  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; <a href="<?= base_url(); ?>">BP2MI Mataram</a>.</strong>
  </footer>

  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->

  <script src="<?= base_url(); ?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url(); ?>assets/dist/js/adminlte.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>

  <!-- Datatables -->
  <script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="<?= base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
  <!-- Print 
    -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
  <script src="<?= base_url(); ?>assets/public/js/lazysizes.min.js" async></script>
  <script>
    $(document).on("click", "#edit-profile", function(e) {
      var edit_id = '<?= $this->session->userdata('_user_id'); ?>';
      if (edit_id == "") {
        alert("Edit Id Required");
      } else {
        $.ajax({
          url: "<?= base_url(); ?>admin/user/editprofile",
          type: "post",
          dataType: "json",
          data: {
            edit_id: edit_id
          },
          success: function(data) {
            if (data.response == "success") {
              $("#modal-profile").modal('show');
              $("#profile_nama").val(data.post.nama);
              $("#profile_username").val(data.post.username);
              $("#profile_email").val(data.post.email);
            } else {
              toastr["error"](data.message)
              toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
              }
            }
          }
        })
      }
    })


    $(document).on("click", "#update-profile", function(e) {
      e.preventDefault();

      var fd = new FormData();
      var edit_id = '<?= $this->session->userdata('_user_id') ?>';
      var nama = $('#profile_nama').val();
      var username = $('#profile_username').val();
      var email = $('#profile_email').val();
      fd.append('nama', nama);
      fd.append('username', username);
      fd.append('email', email);
      fd.append('edit_id', edit_id);

      if (profile_nama == "" || profile_email == "") {
        alert("All field is Required");
      } else {
        $.ajax({
          url: "<?= base_url(); ?>admin/user/proses_editprofile",
          type: "post",
          dataType: "json",
          data: fd,
          contentType: false,
          processData: false,
          // async: false,
          cache: false,
          success: function(data) {
            if (data.response == "success") {
              Swal.fire({
                icon: 'success',
                title: data.message,
                showConfirmButton: false,
                timer: 1700
              })

            } else {
              Swal.fire({
                icon: 'error',
                title: data.message,
                showConfirmButton: false,
                timer: 1700
              })
            }
            $("#modal-profile").modal('hide');
          }
        });
        $("#form_profile")[0].reset();
      }
    });

    $(document).on("click", "#ubah-password", function(e) {
      e.preventDefault();
      var fd = new FormData();
      var passwordlama = $('#passwordlama').val();
      var passwordbaru = $('#passwordbaru').val();
      fd.append('passwordlama', passwordlama);
      fd.append('passwordbaru', passwordbaru);
      $.ajax({
        url: "<?= base_url('admin/user/edit_password') ?>",
        type: "post",
        dataType: "json",
        data: fd,
        contentType: false,
        processData: false,
        cache: false,
        success: function(data) {
          if (data.response == "success") {
            Swal.fire({
              icon: 'success',
              title: data.message,
              showConfirmButton: false,
              timer: 1700
            })

          } else {
            Swal.fire({
              icon: 'error',
              title: data.message,
              showConfirmButton: false,
              timer: 1700
            })
          }
        }
      });
      $("#password-edit")[0].reset();
    });

    $('.nav-link').on('click', function() {
      $('.nav-link').removeClass('active');
      $(this).addClass('active');
    });

    $(document).ready(function() {
      bsCustomFileInput.init();
    });

    $(document).ready(function() {
      $('#form-checkbox').click(function() {
        if ($(this).is(':checked')) {
          $('#passwordlama').attr('type', 'text');
          $('#passwordbaru').attr('type', 'text');
        } else {
          $('#passwordlama').attr('type', 'password');
          $('#passwordbaru').attr('type', 'password');
        }
      });
    });

    $(document).ready(function() {
      $('#signout').click(function() {
        Swal.fire({
          title: 'Perhatian',
          text: "Yakin Keluar?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya,keluar!'
        }).then((result) => {
          if (result.value) {
            window.location.href = "<?= base_url('login/signout'); ?>";
          }
        })
      })
    })

    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
  </script>
  </body>

  </html>