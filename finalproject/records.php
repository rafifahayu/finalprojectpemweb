<?php
session_start();
$conn = mysqli_connect("localhost", "root", "rhefinix29", "finalproject");
if (empty($_SESSION["username"])) {
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>ADMIN</title>
    <style>
    #judultabel {
    font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    color: black;
    text-align: center;
    width: 100%;
    }
    #tabel {
    font-family: "Franklin Gothic Medium", sansserif;
    border-collapse: collapse;
    text-align: center;
    width: 100%;
    }
    #tabel td, #tabel th {
    border: 3px solid #ff5c8a;
    padding: 8px;
    }
    #tabel tr:nth-child(even){background-color:#ffdeeb;}
    #tabel tr:hover{background-color: lightgray;}
    #tabel th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #ff99b9;
    color: #ffffff;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h1 id=judultabel class="text-center">TABEL PEMESANAN</h1>
                <!-- <nav> <a href="index.php" class="badge badge-info" >TAMBAH DATA</a></nav> -->
                <nav> <a href="logout.php" class="badge badge-danger" >LOGOUT</a></nav><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table id=tabel class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Pemesan</th>
                            <th>Pesanan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        include 'model.php';
                        $model = new Model();
                        $rows = $model->fetch();
                        $i = 1;
                        if (!empty($rows)) {
                            foreach ($rows as $row) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['pemesan']; ?></td>
                            <td><?php echo $row['pesanan']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <!-- <td><?php echo $row['Email']; ?></td> -->
                            <td>
                                <a href="read.php?pemesan=<?php echo $row['pemesan']; ?>"
                                    class="badge badge-success">Read</a>
                                <a href="edit.php?pemesan=<?php echo $row['pemesan']; ?>"
                                    class="badge badge-success">Edit</a>
                                <a href="delete.php?pemesan=<?php echo $row['pemesan']; ?>"
                                    class="badge badge-danger">Delete</a>
                            </td>
                        </tr>

                        <?php
                            }
                        } else {
                            echo "no data";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>
<?php
} else {
    echo "<script> alert('You are not logged in!'); </script>";
}
?>
