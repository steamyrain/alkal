<body class="bg-gradient-primary">
  <div class="container"><br><br><br>
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-5 col-lg-6 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Login Alkal</h1>
                    </div>
                    <?php
                        $errorMessages = [
                            'ERR_LOGIN_INVALID_CREDENTIALS' => 'Incorrect username or password',
                            'ERR_LOGIN_INACTIVE_USER'       => 'Inactive user',
                            'ERR_LOGIN_UNVERIFIED_USER'     => 'Unverified user',
                        ];
                    ?>

                    <?php foreach(Auth::messages() as $type => $message){ ?>
                        <div class="alert alert-<?= $type ;?>">
                            <?= $errorMessages[$message] ;?>
                        </div>    
                    <?php } ?>                    
                <form method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Masukkan Username" name="username">
                      <?php echo form_error('username', '<div class="text-danger small ml-3">','</div>') ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" placeholder="Masukkan Password" name="password">
                      <?php echo form_error('password', '<div class="text-danger small ml-3">','</div>') ?>
                    </div>
                  <button class="btn btn-primary btn-user btn-block">login</button>
                </form>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
</body>
