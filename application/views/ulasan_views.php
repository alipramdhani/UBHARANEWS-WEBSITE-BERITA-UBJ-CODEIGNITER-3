<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>UbharaNews | Data Ulasan </title>
		<link rel="stylesheet" href="<?php echo base_url('assets/css/views_Admin.css') ?>">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
	</head>
	<body id="canvas">
    <!-- partials sidebar -->
	  <header id="header">
      <?php $this->load->view("_partials/admin/sidebarAdmin.php") ?>
    </header>
    <!-- content -->
    <section id="newsTable">
      <div class="tableContent">

        <h3 class="judul my-5 text-center">Data Berita - UbharaNews</h3>

        <div class="container rounded-2 shadow-sm pt-5 pb-3 px-5 my-3 bg-white">
            <!-- Modal Tambah Berita-->
            <!-- Start -->
          <div class="rounded-2 pt-1 pb-3">
            <table class="table table-bordered">
              <thead>
              <tr class="table-light">
                <th scope="col">ID</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Email</th>
                <th scope="col">Komentar</th>
                <th scope="col">Dibuat</th>
                <th colspan="2">Aksi</th>
              </tr>
              </thead>
              <tbody>
              <?php
              foreach ($ulasans as $key => $ulasan) { ?>
                <tr>
                    <td style="width: 50px;">
                        <?php echo $ulasan['ulasan_id'] ?>
                    </td>
                    <td>
                        <?php echo $ulasan['name'] ?>
                    </td>
                    <td>
                        <?php echo $ulasan['email'] ?>
                    </td>
                    <td style="width: 500px; text-align:justify;">
                        <?php echo $ulasan['ulasan'] ?>
                    </td>
                    <td style="width: 150px;">
                        <?php echo $ulasan['created_at'] ?>
                    </td>
                    <td style="width:50px; vertical-align: top;">
                        <form action="<?php echo base_url('ulasan/deleteUlasan/'.$ulasan['ulasan_id']); ?>">
                                <button class="btn delete-confirm p-0">
                                <span class="material-symbols-rounded p-1 rounded btn bg-danger">
                                    delete
                                </span>
                                </button>
                        </form>
                  </td>
                </tr>
              <?php } ?>
              
              <?php if (isset($error_message)) : ?>
                <tr>
                  <td colspan="10">
                    <div class="text text-secondary text-center my-5"><?php echo $error_message; ?></div>
                  </td>
                </tr>
              <?php endif; ?>
              </tbody>
            </table> 

          </div>
        </div>
      </div>
    </section>
    
    <!-- footer -->
    <footer class="footer">
      <?php $this->load->view("_partials/admin/footerAdmin.php") ?>
    </footer>

    <!-- Javascript area -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            const successMessage = '<?php echo $this->session->flashdata('message'); ?>';
    
            if (successMessage) {
                Swal.fire({
                    icon: "success",
                    title: successMessage,
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    </script>
    <script>
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const form = $(this).closest('form');
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success mx-2 py-2 px-3",
                cancelButton: "btn btn-danger mx-2 py-2 px-3"
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: "Apakah Anda yakin?",
            text: "Data ini akan dihapus secara permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Hapus!",
            cancelButtonText: "Batal!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire({
                    title: "Dibatalkan",
                    text: "Batal Menghapus Data.",
                    icon: "error"
                });
            }
        });
    });
  </script>
	</body>
</html>

