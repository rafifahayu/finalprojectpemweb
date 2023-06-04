<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>READ DATA</title>
    <style>
        #judulnya {
          font-family:Arial, Helvetica, sans-serif;
          color: #ff5c8a;
          font-size: 50px;
        }
        #judultabelpribadi {
            font-family:Arial, Helvetica, sans-serif;
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 3px solid #ff5c8a;
            box-sizing: border-box;
            text-align: center;
            color: black;
            background-color: #ff99b9;
        }
        #tabelpribadi {
            font-family:Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            text-align: left;
            width: 100%;
            border: 3px solid #ff5c8a;
            padding: 8px;
            color: black;
            background-color: #ff99b9;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h1 id=judulnya class="text-center">DATA PESANAN</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mx-auto">
                <?php
                include 'model.php';
                $model = new Model();
                $pemesan = $_REQUEST['pemesan'];
                $row = $model->fetch_single($pemesan);
                if (!empty($row)) {
                    ?>
                    <div class="">
                        <div id="judultabelpribadi" class="">
                            Isi Pesanan
                        </div>
                        <div id="tabelpribadi" class="card-body">
                            <p>Pemesan: <?php echo $row['pemesan']; ?></p>
                            <p>Pesanan: <?php echo $row['pesanan']; ?></p>
                            <p>Status: <?php echo $row['status']; ?></p>
                        </div>
                        
                    </div>
                    <?php
                } else {
                    echo "Data not exist";
                }
                ?>
            </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
