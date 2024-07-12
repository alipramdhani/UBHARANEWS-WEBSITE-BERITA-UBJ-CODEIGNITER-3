<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>UbharaNews | Data Admin </title>
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
          
        <a data-bs-toggle="modal" data-bs-target="#tambahModal" class="btn btn-primary mb-5">Tambah Admin</a>
            <!-- Modal Tambah Berita-->
            <!-- Start -->
          <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admindata/loadAdd') ?>">
                      <div class="modal-header">
                        <h3>Tambah Data Berita</h3>
                      </div>
                      <div class="modal-body px-4">
                        <div class="mb-3">
                          <label for="admin_id" class="form-label">ID admin</label>
                          <input type="text" class="form-control" id="admin_id" name="admin_id" required>
                        </div>
                        <div class="mb-3">
                          <label for="admin_name" class="form-label">Nama Lengkap</label>
                          <input type="text" class="form-control" id="admin_name" name="admin_name"
                          required>
                        </div>
                        <div class="mb-3">
                          <label for="username" class="form-label">Username</label>
                          <input type="text" class="form-control" id="username" name="username"
                          required>
                        </div>
                        <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="text" class="form-control" id="email" name="email"
                          required>
                        </div>
                        <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="text" class="form-control" id="password" name="password"
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
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Dibuat</th>
                <th scope="col">Diedit</th>
                <th colspan="2">Aksi</th>
              </tr>
              </thead>
              <tbody>
              <?php
              foreach ($queryAllAdmin as $key => $admin) { ?>
                <tr>
                  <td style="width: 50px;"><?php echo $admin['admin_id'] ?></td>
                  <td><?php echo $admin['admin_name'] ?></td>
                  <td><?php echo $admin['username'] ?></td>
                  <td><?php echo $admin['email'] ?></td>
                  <td><div class="input-group">
                    <div class="input-group">
                      <input style="width: 100px;" type="password" class="form-control border-0" value="<?php echo $admin['password'] ?>" id="password_<?php echo $key ?>" readonly>
                      <button class="btn border-0" type="button" onclick="togglePasswordVisibility(<?php echo $key ?>)">
                          <span class="material-symbols-rounded" id="icon_<?php echo $key ?>"> visibility </span>
                      </button>
                    </div>
                  </td>
                  <td style="width: 150px;"><?php echo $admin['createAt'] ?></td>
                  <td style="width: 150px;"><?php echo $admin['updateAt'] ?></td>
                  <td style="width:50px; vertical-align: top;">
                    <a class="" data-bs-toggle="modal" data-bs-target="#editModalAdmin_<?php echo $admin['admin_id']; ?>">
                      <span class="material-symbols-rounded  p-1 rounded btn bg-warning ">
                        edit_square
                      </span>
                    </a>
                    <div class="modal fade" id="editModalAdmin_<?php echo $admin['admin_id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <form enctype="multipart/form-data" action="<?php echo base_url('admindata/loadUpdate/'.$admin['admin_id']); ?>" method="post">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="editModalLabel">Edit Admin</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body px-4">
                                      <div class="mb-3">
                                          <label for="categoey_id" class="form-label">ID Admin</label>
                                          <input type="text" class="form-control text-black-50" id="categoey_id" name="categoey_id"
                                          value="<?php echo $admin['admin_id']; ?>" readonly>
                                      </div>
                                      <div class="mb-3">
                                          <label for="admin_name" class="form-label">Nama Lengkap</label>
                                          <input type="text" class="form-control " id="admin_name" name="admin_name"
                                          value="<?php echo $admin['admin_name']; ?>" >
                                      </div>                                    
                                      <div class="mb-3">
                                          <label for="username" class="form-label">Username</label>
                                          <input type="text" class="form-control " id="username" name="username"
                                          value="<?php echo $admin['username']; ?>" >
                                      </div>                                    
                                      <div class="mb-3">
                                          <label for="email" class="form-label">Email</label>
                                          <input type="text" class="form-control " id="email" name="email"
                                          value="<?php echo $admin['email']; ?>" >
                                      </div>                                    
                                      <div class="mb-3">
                                          <label for="password" class="form-label">Password</label>
                                          <input type="text" class="form-control " id="password" name="password"
                                          value="<?php echo $admin['password']; ?>" >
                                      </div>                                    
                                      <div class="mb-3">
                                          <label for="createAt" class="form-label">Dibuat</label>
                                          <input type="text" class="form-control text-black-50" id="createAt" name="createAt"
                                          value="<?php echo $admin['createAt']; ?>" readonly>
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
                  <form action="<?php echo base_url('admindata/loadDelete/'.$admin['admin_id']); ?>">
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
    <script>
        function togglePasswordVisibility(key) {
            var passwordField = document.getElementById('password_' + key);
            var icon = document.getElementById('icon_' + key);
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.innerHTML = 'visibility_off';
            } else {
                passwordField.type = 'password';
                icon.innerHTML = 'visibility';
            }
        }
    </script>
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

