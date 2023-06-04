<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>EDIT DATA</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5">
          <h1 id=judulnya class="text-center">EDIT DATA</h1>
          <style>
          #judulnya {
          font-family:Arial, Helvetica, sans-serif;
          color: black;
          font-size: 38px;
        }
          #subjudul {
            font-family:Arial, Helvetica, sans-serif;
            color: #ff5c8a;
          }
        </style>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5 mx-auto">
          <?php

              include 'model.php';
              $model = new Model();
              $pemesan = $_REQUEST['pemesan'];
              $row = $model->edit($pemesan);

              if (isset($_POST['update'])) {
                if (isset($_POST['pemesan']) && isset($_POST['pesanan']) && isset($_POST['status'])) {
                  if (!empty($_POST['pemesan']) && !empty($_POST['pesanan']) && !empty($_POST['status']) ) {
                    
                    $data['pemesan'] = $pemesan;
                    $data['pesanan'] = $_POST['pesanan'];
                    $data['status'] = $_POST['status'];

                    $update = $model->update($data);

                    if($update){
                      echo "<script>alert('Data has been updated!');</script>";
                      echo "<script>window.location.href = 'records.php';</script>";
                    }else{
                      echo "<script>alert('Update failed!');</script>";
                      echo "<script>window.location.href = 'records.php';</script>";
                    }

                  }else{
                    echo "<script>alert('Empty');</script>";
                    header("Location: edit.php?pemesan=$pemesan");
                  }
                }
              }

          ?>
          <form action="" method="post">
            <div class="form-group">
              <label id=subjudul for="">Pemesan</label>
              <input type="text" name="pemesan" value="<?php echo $row['pemesan']; ?>" class="form-control">
            </div>
            <div class="form-group">
              <label id=subjudul for="">Pesanan</label>
              <input type="name" name="pesanan" value="<?php echo $row['pesanan']; ?>" class="form-control">
            </div>
            <div class="form-group">
              <label id=subjudul for="">Status</label>
              <input type="text" name="status" value="<?php echo $row['status']; ?>" class="form-control">
            </div>
            <div class="form-group">
              <button type="submit" name="update" class="btn-blockfa-border">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>