
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Horn Cloud</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/pricing/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
   
  </head>
  <style>
    html {
  font-size: 14px;
}
@media (min-width: 768px) {
  html {
    font-size: 16px;
  }
}

.container {
  max-width: 960px;
}

.pricing-header {
  max-width: 700px;
}

.card-deck .card {
  min-width: 220px;
}

.border-top { border-top: 1px solid #e5e5e5; }
.border-bottom { border-bottom: 1px solid #e5e5e5; }

.box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }
  </style>
  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal"><a href="/" style="text-decoration:none; color:inherit;">Horn Cloud </a></h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#">Features</a>
        <a class="p-2 text-dark" href="#">Enterprise</a>
        <a class="p-2 text-dark" href="#">Support</a>
        
      </nav>
        <?php if(session()->has('user_id')): ?>
          
          <a class="btn btn-outline-primary" href="<?= site_url('/signin/logout') ?>">Log Out</a>
<?php else: ?>
        <a class="btn btn-outline-primary" href="<?= site_url('/signin') ?>">Sign In</a>
      <a class="btn btn-outline-primary" href="<?= site_url('/signup') ?>">Sign up</a>
      <?php endif; ?>
    </div>

    

    <section class="vh-100" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card rounded-3">
          <div class="card-body p-4">

            <h4 class="text-center my-3 pb-3">Tasks</h4>

            <form class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2" action="/task/create" method='post'>
              <div class="col-12">
                <div class="form-outline">
                  <input type="text" id="form1" class="form-control" name='description' />
                  <label class="form-label" for="form1">Enter a task here</label>
                </div>
              </div>

              <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>

              
            </form>
    <ul>

</ul>
            <table class="table mb-4">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Todo item</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                
                    <?php foreach($tasks as $task): ?>
                        <tr>
                    <?php if(!! $task): ?>
                        <th scope="row"><?= $task['id'] ?></th>
                        <td><?= $task['descripsion'] ?></td>
                        <td>
                    <button type="submit" class="btn btn-danger"><a href="<?= site_url("/task/delete/{$task['id']}") ?>" style='color:inherit; text-decoration:none;'>Delete</a></button>
                    <button type="submit" class="btn btn-success ms-1"><a href="<?= site_url("/task/edit/{$task['id']}") ?>" style='color:inherit; text-decoration:none;'>Edit</a></button>
                        <?php endif; ?>
                    </td>
                        </tr>
                    <?php endforeach; ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
  </body>
</html>

