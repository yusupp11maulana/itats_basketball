<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">

    <script src="<?php echo base_url()?>assets/alert/sweetalert2.all.min.js"></script>

    <title>IB | Jurusan</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="chome"><h4>ITATS BASKETBALL</h4></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container" style="font-family: 'Josefin Sans', sans-serif; font-size: 20px">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="chome">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cmember">Member</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url()?>cjurusan">Jurusan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- NAVBAR -->
    <!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script type="text/javascript" src="assets/sweetalert/sweetalert.min.js"></script>
    <title>Tabel Jurusan</title>
</head>

<body>
    <?php if($this->session->flashdata('kosong')){
        echo "<script>Swal.fire({
            icon: 'warning',
            title: 'Oooops...',
            text: 'Isilah Data Dengan Benar!',
          });</script>";
    } else if($this->session->flashdata('berhasil')){
        echo "<script>Swal.fire({
            icon: 'success',
            title: 'Yeaaayyy...',
            text: 'Data Anda Berhasil Di Simpan',
          });</script>";
    }
    ?>
    <!-- Konten -->
    <div class="container bg-light rounded-lg warna" style="margin-top: 100px">
        <div class="row justify-content-center">
            <div class="col-11 mt-4">
                <h2 class="mb-4" style="margin-left: -30px">Tabel Jurusan</h2>
                <!-- TABEL -->
                <table class="table table-hover table-striped">
                    <thead class="bg-primary text-center text-light">
                        <tr>
                            <th scope="col" style="width: 150px">Kode Jurusan</th>
                            <th scope="col" style="width: 280px">Nama Jurusan</th>
                            <th scope="col" style="width: 110px">Kelas</th>
                            <th scope="col" style="width: 200px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($jurusan as $see) :?>
                        <tr>
                            <th scope="row"><?php echo $see['id_jur'];?></th>
                            <td><?php echo $see['nama_jur'];?></td>
                            <td><?php echo $see['kelas'];?></td>
                            <td>
                                <div align="center">
                                    <a data-toggle="modal" href="#modalUpdateJur<?php echo $see['id_jur'];?>"><button type="button" class="btn btn-info btn-sm font-weight-bolder">Update</button></a>
                                    <a href="cjurusan/delete/<?php echo $see['id_jur'];?>"  class="btn btn-warning btn-sm font-weight-bolder tombol-hapus">Delete</a>
                            </td>
                        </tr>
                        <!-- MODAL Update-->
                        <div class="modal fade" id="modalUpdateJur<?php echo $see['id_jur'];?>" tabindex="-1" role="dialog" aria-labelledby="modalJurusanLabel" aria-hidden="">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalJurusanLabel">Update Data Jurusan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="cjurusan/update" method="POST">
                                            <div class="form-group row">
                                                <div class="col-sm-3">
                                                    <label for="recipient-name" class="col-form-label  ml-4">Kode Jurusan</label>
                                                </div>
                                                <div class="col-sm-8 ml-1">
                                                    <input type="text" class="form-control" name="kj" id="kj" value="<?php echo $see['id_jur'];?>" placeholder="Kode Jurusan" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-3">
                                                    <label for="recipient-name" class="col-form-label  ml-4">Nama Jurusan</label>
                                                </div>
                                                <div class="col-sm-8 ml-1">
                                                    <input type="text" class="form-control" id="nj" name="nj" placeholder="Nama Jurusan" value="<?php echo $see['nama_jur'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-3">
                                                    <label for="recipient-name" class="col-form-label  ml-4">Kelas</label>
                                                </div>
                                                <div class="col-sm-8 ml-1">
                                                    <select class="form-control" id="kelas" name="kelas">
                                                        <option value="<?php echo $see['kelas'];?>"><?php echo $see['kelas'];?></option>
                                                        <option value="Pagi">Pagi</option>
                                                        <option value="Malam">Malam</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /MODAL update -->
                        <?php endforeach;?>
                    </tbody>
                </table>
                <!-- /TABEL -->
            </div>
        </div>
        <div class="row">
            <div class="col ml-5 mb-5 mt-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalJurusan" data-whatever="@getbootstrap">Insert Data</button>
            </div>
        </div>
    </div>
    <!-- MODAL -->
    <div class="modal fade" id="modalJurusan" tabindex="-1" role="dialog" aria-labelledby="modalJurusanLabel" aria-hidden="">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalJurusanLabel">Insert Data Jurusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="cjurusan/insert" method="POST">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label for="recipient-name" class="col-form-label  ml-4">Kode Jurusan</label>
                            </div>
                            <div class="col-sm-8 ml-1">
                                <input type="text" class="form-control" name="kj" id="kj" value="<?php echo $kode?>" placeholder="Kode Jurusan" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label for="recipient-name" class="col-form-label  ml-4">Nama Jurusan</label>
                            </div>
                            <div class="col-sm-8 ml-1">
                                <input type="text" class="form-control" id="nj" name="nj" placeholder="Nama Jurusan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label for="recipient-name" class="col-form-label  ml-4">Kelas</label>
                            </div>
                            <div class="col-sm-8 ml-1">
                                <select class="form-control" id="kelas" name="kelas">
                                    <option value="">-- Kelas --</option>
                                    <option value="Pagi">Pagi</option>
                                    <option value="Malam">Malam</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /MODAL -->
    <!-- /Konten -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
<!-- CSS -->
<style>
    .tombol {
        border-color: #2d98da;
        color: #2d98da;
    }

    .tombol:hover {
        background-color: #2d98da !important;
        border-color: #2d98da;
    }

    .tombol:focus {
        box-shadow: 0 0 0 .2rem #2d98da;
        border-color: #2d98da;
    }

    .warna {
        border: solid;
        border-width: 0px;
        border-top-width: 5px;
        border-color: #045890;
        -webkit-backdrop-filter: blur(30px);
        box-shadow: 0 6px 90px 0 rgba(0, 0, 0, 0.16);
    }

    .btn-sm {
        font-size: .630rem;
    }
</style>

</html>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- HAPUS -->
    <script>
        $('.tombol-hapus').on('click',function(e){
            e.preventDefault();
            const href = $(this).attr('href');

            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data Anda Akan Terhapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.value) {
                    document.location.href=href;
                }
                });
        });
    </script>
<!-- Hapus -->

  </body>
</html>