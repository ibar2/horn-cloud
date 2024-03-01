<?= $this->extend('Base/base.php') ?>
<?= $this->section('title') ?> upload image <?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="vh-100" >
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-9"> <!-- Adjusted col-xl-11 to col-xl-9 -->
        <div class="card " style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-6 order-2 order-lg-1"> <!-- Adjusted col-xl-5 to col-xl-6 -->
                <?= form_open_multipart('/upload/image') ?>
                <?php if (session()->has('warning')): ?>
                    <ul>
                        <?php foreach(session('warning') as $error): ?>
                            <li><?= $error ?></li>
                        
                        <?php endforeach; ?>
                    </ul>

                <?php endif ?>
                <label class="form-label" for="customFile">upload image here</label>
                <input type="file" class="form-control" id="customFile" name='image' />
                <button  class='btn btn-primary' style='margin-top:20px;'> submit </button>
            </div>
        </div>
    </div>  
</div>
</section>  

</form>

<?= $this->endSection() ?>