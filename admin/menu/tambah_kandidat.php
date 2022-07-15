
<div class="container bg-white mb-4">
<?php 
    
  if(isset($_SESSION['addsuccess'])){
                                    $errLog = $_SESSION['addsuccess'];
                                    echo '<div class="alert alert-success" id="alert-message" class="alert-warning"><div class="center"><i class="glyphicon glyphicon-remove"></i> <strong>Berasil tambah data!</strong></div>
                                    '.$errLog.'</div>';
                                    unset($_SESSION['addsuccess']);
                                    
                                }
                                ?>
 <?php
  if(isset($_SESSION['error'])){
                                    $errLog = $_SESSION['error'];
                                    echo '<div class="alert alert-danger" id="alert-message" class="alert-warning"><div class="center"><i class="glyphicon glyphicon-remove"></i> <strong> GAGAL!</strong></div>
                                    '.$errLog.'</div>';
                                    unset($_SESSION['error']);
                                    
                                }
                                ?>

<form action="menu/proses_add_kandidat.php" enctype="multipart/form-data" method="post" class="row  needs-validation" novalidate>
 

  <div class="col col-md-8">
  <div class="">
    <label for="validationCustom01" class="form-label">Nama</label>
    <input type="text" class="form-control" name="nama" id="validationCustom01" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  </div>

  
  <div class="mb-3 col col-md-8">
    <label for="validationTextarea" class="form-label">VISI</label>
    <textarea class="form-control " name="visi" id="validationTextarea" placeholder="Required example textarea" required></textarea>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>

  <div class="mb-3 col col-md-8">
    <label for="validationTextarea" class="form-label">MISI</label>
    <textarea class="form-control " name="misi" id="validationTextarea" placeholder="Required example textarea" required></textarea>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>

  <div class="mb-3 col col-md-8">
    <label for="validationTextarea" class="form-label">Quote</label>
    <textarea class="form-control " name="motto" id="validationTextarea" placeholder="Required example textarea" required></textarea>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>


  <div class="col col-md-8 m-2">
    <div class="select">
    <label for="validationCustom01" class="form-label">Organisasi</label>
    <select class="form-select" aria-label="Organisasi" name="organisasi" id="validationCustom01" require>

    <option value="HMJ">HMJ</option>
    <option value="DEMA">DEMA</option>
    <option value="SEMA">SEMA</option>
    </select>
      
    </div>
   
  </div>

  <div class="col col-md-8">
  <div class="">
    <label for="validationCustom01" class="form-label">foto</label>
    <input class="form-control" type="file" name="foto" id="validationCustom01" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>



                            </div>  
  <div class="col-12">
    <button class="btn btn-primary mt-3" name="submit" value="submit" type="submit">Tambah Data</button>
  </div>
</form>
</div>
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