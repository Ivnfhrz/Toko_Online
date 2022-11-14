<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css"/>
    <style>
        body {
        background-color: #4682b4;
        margin-top: 110px;
        }
        .card{
        padding:15px 30px;
        background-color: #f1f1f1;
        }
        .has-float-label input:focus,
        .has-float-label textarea:focus,
        .has-float-label select:focus{
        border-color: #2CA8B3;
        box-shadow: none;
        }
        .has-float-label .form-control:placeholder-shown:not(:focus) + * {
        font-size: 100%;
        margin-top: 4px;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-sm-6 offset-sm-3 col-12">
                <form action="proses_tambah_pelanggan.php" method="post" enctype="multipart/form-data" class="card w-100 card-block bg-faded">
                    <legend class="m-b-1 text-center text-info"> <strong> Tambah Pelanggan </strong></legend>
                    <div class="form-group input-group">
                        <span class="has-float-label">
                            <input class="form-control" type="text" name="nama" placeholder="Nama Pelanggan"/>
                            <label>Nama Pelanggan</label>
                        </span>
                    </div>
                    <div class="form-group input-group">
                        <span class="has-float-label">
                            <input class="form-control" type="text" name="alamat" placeholder="Alamat" rows="4"/>
                            <label>Alamat</label>
                        </span>
                    </div>
                    <div class="form-group input-group">
                        <span class="has-float-label">
                            <input class="form-control" type="text" name="telp" placeholder="Telp"/>
                            <label>Telp</label>
                        </span>
                    </div>
                    <div class="form-group input-group">
                        <span class="has-float-label">
                        <input type="text" name="username" value="" class="form-control">
                            <label>Username</label>
                        </span>
                    </div>
                    <div class="form-group input-group">
                        <span class="has-float-label">
                        <input type="password" name="password" value="" class="form-control">
                            <label>Password</label>
                        </span>
                    </div>
                    <input type="submit" name="simpan" value="Tambah Pelanggan" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</body>
</html>