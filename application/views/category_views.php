<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>UbharaNews | Data Category </title>
		<link rel="stylesheet" href="<?php echo base_url('assets/css/views_Category.css') ?>">
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
          
        <a data-bs-toggle="modal" data-bs-target="#tambahModal" class="btn btn-primary mb-5">Tambah Category</a>
            <!-- Modal Tambah Berita-->
            <!-- Start -->
          <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url('category/loadAdd') ?>">
                      <div class="modal-header">
                        <h3>Tambah Data Berita</h3>
                      </div>
                      <div class="modal-body px-4">
                        <div class="mb-3">
                          <label for="category_id" class="form-label">ID Kategori</label>
                          <input type="text" class="form-control" id="category_id" name="category_id" required>
                        </div>
                        <div class="mb-3">
                          <label for="category_name" class="form-label">Nama Kategori</label>
                          <input type="text" class="form-control" id="category_name" name="category_name"
                          required>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                      </div>
                    </form>
                  </div>
              </div>
            </div>
          <div class="rounded-2 pt-1 pb-3">
            <table class="table table-bordered">
              <thead>
              <tr class="table-light">
                <th scope="col">ID</th>
                <th scope="col">Nama kategori</th>
                <th scope="col">Dibuat</th>
                <th scope="col">Diedit</th>
                <th colspan="2">Aksi</th>
              </tr>
              </thead>
              <tbody>
              <?php
              foreach ($queryAllCategory as $category) { ?>
                <tr>
                  <td style="width: 50px;"><?php echo $category['category_id'] ?></td>
                  <td><?php echo $category['category_name'] ?></td>
                  <td style="width: 150px;"><?php echo $category['createAt'] ?></td>
                  <td style="width: 150px;"><?php echo $category['updateAt'] ?></td>
                  <td style="width:50px; vertical-align: top;">
                    <a class="" data-bs-toggle="modal" data-bs-target="#editModalCategory_<?php echo $category['category_id']; ?>">
                      <span class="material-symbols-rounded  p-1 rounded btn bg-warning ">
                        edit_square
                      </span>
                    </a>
                    <div class="modal fade" id="editModalCategory_<?php echo $category['category_id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <form enctype="multipart/form-data" action="<?php echo base_url('category/loadUpdate/'.$category['category_id']); ?>" method="post">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="editModalLabel">Edit Kategori</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body px-4">
                                      <div class="mb-3">
                                          <label for="categoey_id" class="form-label">ID Kategori</label>
                                          <input type="text" class="form-control text-black-50" id="categoey_id" name="categoey_id"
                                          value="<?php echo $category['category_id']; ?>" readonly>
                                      </div>
                                      <div class="mb-3">
                                          <label for="category_name" class="form-label">Nama Kategori</label>
                                          <input type="text" class="form-control " id="category_name" name="category_name"
                                          value="<?php echo $category['category_name']; ?>" >
                                      </div>                                    
                                      <div class="mb-3">
                                          <label for="createAt" class="form-label">Dibuat</label>
                                          <input type="text" class="form-control text-black-50" id="createAt" name="createAt"
                                          value="<?php echo $category['createAt']; ?>" readonly>
                                      </div>                               
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                      <button class="btn btn-primary" type="submit">Simpan</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                    </div>
                  </td>
                  <td style="width:50px; vertical-align: top;">
                  <form action="<?php echo base_url('category/loadDelete/'.$category['category_id']); ?>">
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

