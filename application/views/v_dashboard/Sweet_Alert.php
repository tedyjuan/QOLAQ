  <?php if ($this->session->flashdata('success')) { ?>
      <script>
          swal({
              title: 'Good job!',
              text: "Data Sukses Tersimpan!",
              type: 'success',
              padding: '2em'
          })
      </script>
  <?php } else if ($this->session->flashdata('error')) { ?>
      <script>
          Swal.fire({
              type: 'error',
              title: 'Maaf Data Gagal Disimpan',
          })
      </script>
  <?php } else if ($this->session->flashdata('warning')) { ?>
      <script>
          Swal.fire({
              type: 'warning',
              title: 'Mohon Input Data Dengan Benar',
          })
      </script>
  <?php } else if ($this->session->flashdata('info')) { ?>
      <script>
          Swal.fire({
              type: 'info',
              title: 'Produk Tidak Boleh Sama',
          })
      </script>
  <?php } ?>