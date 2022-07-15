<div class="container bg-white">

 
<?php 
if (isset($_GET['id'])){
  $id = ($_GET['id']);
$sql = "SELECT * FROM tbl_user where nim = '$id'";
$conn = mysqli_query($dbconnect, $sql);
$data = mysqli_fetch_array($conn);

}
                                ?>

<form action="menu/proses_update_user.php" method="post" class="row  needs-validation" novalidate>
  <div class="col col-md-8">
  <div class="">
    <label for="validationCustom01" class="form-label">NIM</label>
    <input type="Number" class="form-control" name="nim" readonly id="validationCustom01" value="<?= $data['nim'] ?>" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  </div>

  <div class="col col-md-8">
  <div class="">
    <label for="validationCustom01" class="form-label">Nama</label>
    <input type="text" class="form-control" name="nama" id="validationCustom01" value="<?= $data['nama'] ?>" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  </div>

  <div class="col col-md-8">
  <div class="">
    <label for="validationCustom01" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="validationCustom01" value="" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  </div>

  
  <div class="col-12">
    <button class="btn btn-primary mt-3" name="submit" value="submit" type="submit">Selesai</button>
  </div>
</form>
</div>



<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
