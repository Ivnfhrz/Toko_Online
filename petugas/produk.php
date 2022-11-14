<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Daftar Buku</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <style>
    #card {
      width: 25rem;
    }
    .div{
         background-color: #000000;;
    }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

  </head>
  <body>

    <header>
    <?php
        include "header.php";
    ?>
    </header>

    <main class="bg-#CFFF8D">
    <section class="py-5 text-center container">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Sports Station 22</h1>
            <p class="lead text-muted">Toko Sports Berkualitas </p>
            <form method="POST" action="Produk.php" class="d-flex">
                    <input class="form-control me-2" type="search" name="cari"
                    placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </section>
    <div>
    <div class="album py-5 bg-#C8FFD4">
        <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <?php
          include "koneksi.php";
          if (isset($_POST['cari'])) {
              $cari = $_POST['cari'];
              $query_buku = mysqli_query($conn, "select * from produk where id_produk = '$cari' or nama_produk like '%$cari%'");
          }
          else{
              $query_buku = mysqli_query($conn, "select * from produk");
          }
          while($data_produk = mysqli_fetch_array($query_buku)){
          ?>  
          <div class="col">
            <div id="card" class="card shadow-sm" style="height: 500px; background-color:#CFFF8D;">
                <img width="192", height="300" src="../foto_produk/<?=$data_produk['foto_produk']?>" class="bd-placeholder-img card-img-top" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                <rect fill="#55595c"/></img>

                <div class="card-body">
                <p class="card-text"><b><?=$data_produk['nama_produk']?></b></p>
                <p class="card-text"><?=$data_produk['deskripsi']?></p>
                <p class="card-text"><?=$data_produk['harga']?></p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <!-- <a href="beli_produk.php?id_produk=<?=$data_produk['id_produk']?>" type="button" class="btn btn-sm btn-outline-secondary">Beli</a> -->
                     <a href="ubah_produk.php?id_produk=<?=$data_produk['id_produk']?>" class="btn btn-success">Ubah<a>
                    <a href="hapus.php?id_produk=<?=$data_produk['id_produk']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a> 
                    </div>
                   
                </div>
                </div>
            </div>
            </div>
          <?php
          }
          ?>
        </div>
        </div>
    </div>
    </div>
    </main>
    
    <?php
        include "footer.php";
    ?>
	
	<button class="btn btn-success" style="position: fixed; bottom: 10px;
        right:10px; border-radius:50px;" data-bs-toggle="modal"
        data-bs-target="#tambahbuku"> tambah</button>
        
<div class="modal fade" id="tambahbuku" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah buku</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="proses_upload.php" method="post" enctype="multipart/form-data">
        Nama Produk :
        <input type="text" required class="form-control" name="nama_produk"><br>
        Harga :
        <input type="number" required class="form-control" name="harga"><br>
     	  Deskripsi:
        <textarea rows="4" class="form-control" name="deskripsi"></textarea><br>
        Upload Foto :
        <input type="file" required name="foto_produk" class="from-control"><br>
        <input type="submit" name="simpan" value="SIMPAN" class="btn btn-success">
        </form>
      </div>
    </div>
  </div>
 </div>
	
  </body>
</html>