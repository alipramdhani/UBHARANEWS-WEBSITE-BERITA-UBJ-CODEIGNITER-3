<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>UbharaNews | Tambah Berita</title>
		<link rel="stylesheet" href="<?php echo base_url('assets/css/update_NewsData.css') ?>">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@22,400,0,0" />
	</head>
	<body id="canvas">
    <!-- partials sidebar -->
	  <header id="header">
      <?php $this->load->view("_partials/admin/sidebarAdmin.php") ?>
    </header>
    <!-- content -->
    <section id="editForm">
      <div class="formContent">
        <h3 class="judul my-5 text-center">Data Berita - UbharaNews</h3>

        <div class="container rounded-2 shadow-sm pt-5 pb-3 px-5 my-3 bg-white">
          <div>  
            <?php echo $this->session->flashdata('message'); ?>
          </div>
          <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('newsdata/loadUpdate/'.$queryAllNews['news_code']); ?>">
            <div>
              <div class="d-flex gap-3">
                  <div class="mb-3 w-25">
                      <label for="news_code" class="form-label">Kode Berita</label>
                      <fieldset disabled>
                        <input type="text" class="form-control" id="news_code" name="news_code" value="<?php echo $queryAllNews['news_code']; ?>" required>
                      </fieldset>
                  </div>
                <div class="mb-3 flex-fill">
                    <label for="news_headline" class="form-label">Judul Berita</label>
                    <input type="text" class="form-control" id="news_headline" name="news_headline" value="<?php echo $queryAllNews['news_headline']; ?>" required>
                </div>
                <div class="mb-3 flex-fill">
                    <label for="news_publish" class="form-label">Tanggal Publish</label>
                    <input type="date" class="form-control" id="news_publish" name="news_publish" value="<?php echo $queryAllNews['news_publish']; ?>" required>
                </div>
              </div>
              <div class="mb-3">
                <label for="news_content" class="form-label">Isi Berita</label>
                <textarea class="form-control" name="news_content" rows="6" id="news_content"><?php echo $queryAllNews['news_content']; ?></textarea>
              </div>
              <div class="d-flex gap-3">
                <div class="mb-3 flex-fill">
                    <label for="news_reporter" class="form-label">Reporter</label>
                    <input type="text" class="form-control" id="news_reporter" name="news_reporter" value="<?php echo $queryAllNews['news_reporter']; ?>" required>
                </div>
                <div class="mb-3 flex-fill">
                  <label for="news_editor" class="form-label">Editor</label>
                  <input type="text" class="form-control" id="news_editor" name="news_editor" value="<?php echo $queryAllNews['news_editor']; ?>" required>
                </div>
              </div>
              <div class="d-flex gap-3">
                <div class="mb-3 flex-fill">
                    <label for="news_category" class="form-label">Kategori</label>
                    <select class="form-select" aria-label="Default select example" name="news_category" id="news_category">
                    <?php foreach ($queryAllCategory as $category): ?>
                      <option value="<?php echo $category['category_name']; ?>">
                          <?php echo $category['category_name']; ?>
                      </option>
                      <?php endforeach ?>
                  </select>
                </div>
                <div class="mb-3 flex-fill">
                  <label for="userfile" class="form-label">Gambar</label>
                  <input type="file" class="form-control" id="userfile" name="userfile" size="20" require="">
                  <p style="color: red; font-style:italic;"><?php echo $queryAllNews['news_images']; ?></p>
                </div>
            </div>
            </div>
            <div class="d-flex justify-content-end gap-3">
              <a href="<?php echo base_url('admin/data-berita') ?>" class="btn btn-primary px-3"><b>Kembali</b></a>
              <button class="btn btn-success add-confirm update-confirm px-5" type="submit"><b>Simpan</b></button>
            </div>
          </form>
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
      $('.update-confirm').on('click', function (event) {
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
          title: "Simpan Data?",
          text: "Apakah anda yakin mengubah data?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Simpan!",
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
                  text: "Batal Mengubah Data.",
                  icon: "error"
              });
          }
      });
      })
    </script>
	</body>
</html>

