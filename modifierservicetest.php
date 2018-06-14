<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Modifier service</title>
    <?php include 'assets/php/allcss.php'; ?>
  </head>
  <body>
    <?php include 'assets/php/nav.php'; ?>

    <div class="container-fluid">
      <div class="bandeprincipale row mh-100vh">
        <div class="bg-white p-5 rounded my-4 my-lg-0" id="login-block">

          <div class="row register-form">
              <div class="col-md-8 offset-md-2">
                  <form class="custom-form">
                      <h1>Modifier un service</h1>
                      <div class="form-row form-group">
                          <div class="col-sm-4 label-column"><label class="col-form-label">Nom</label></div>
                          <div class="col-sm-6 input-column"><input class="form-control" type="text"></div>
                      </div>
                      <div class="form-row form-group">
                          <div class="col-sm-4 label-column"><label class="col-form-label">Prix</label></div>
                          <div class="col-sm-6 input-column"><input class="form-control" type="text"></div>
                      </div>
                      <div class="form-row form-group">
                          <div class="col-sm-4 label-column"><label class="col-form-label">Temps</label></div>
                          <div class="col-sm-6 input-column"><input class="form-control" type="text"></div>
                      </div>
                      <div class="form-row form-group">
                          <div class="col-sm-4 label-column"><label class="col-form-label">Type</label></div>
                          <div class="col-sm-6 input-column">
                              <div class="dropdown"><button class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">Dropdown </button>
                                  <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">First Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a></div>
                              </div>
                          </div>
                      </div>
                      <div class="form-row form-group">
                          <div class="col-sm-4 label-column"><label class="col-form-label">Sous type</label></div>
                          <div class="col-sm-6 input-column">
                              <div class="dropdown"><button class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">Dropdown </button>
                                  <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">First Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a></div>
                              </div>
                          </div>
                      </div>
                      <div class="form-row form-group">
                          <div class="col-sm-4 label-column"><label class="col-form-label">Description</label></div>
                          <div class="col-sm-6 input-column"><input class="form-control" type="text"></div>
                      </div>
                      <button class="btn btn-light submit-button" type="button">Modifier</button>
                    </form>
              </div>
          </div>



        </div>
      </div>
    </div>

  </body>
</html>
