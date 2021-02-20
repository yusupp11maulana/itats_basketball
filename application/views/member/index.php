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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>IB | Member</title>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url()?>cmember">Member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cjurusan">Jurusan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- NAVBAR -->
    <!-- content -->
    <!-- Konten -->
    <div align="center">
        <div class="bg-light rounded-lg warna" style="margin-top: 100px; width: 95%">
            <div class="row">
                <div class="col-sm-4 mt-4">
                    <h2 class="mb-4">Dashboard Member</h2>
                </div>
            </div>
            <div class="row" style="width: 95%">
                <div class="col">
                    <!-- TABEL -->
                    <table class="table table-hover table-striped">
                        <thead class="bg-primary text-center text-light">
                            <tr>
                                <th scope="col" style="width: 12%">ID Registrasi</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col" style="width: 14%">Foto Profil</th>
                                <th scope="col" style="width: 13%">NPM Mahasiswa</th>
                                <th scope="col" style="width: 18%">Nama Mahasiswa</th>
                                <th scope="col" style="width: 12%">Jurusan</th>
                                <th scope="col">Kelas</th>
                                <th scope="col" style="width: 12%">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($registrasi as $see) : ?>
                            <tr>
                                <th scope="row"><?php echo $see['id_regist'];?></th>
                                <td><?php echo $see['tanggal'];?></td>
                                <td align=center><?php
                                    $fotop = $see['foto'];
                                    if ($fotop == "NEW") { ?>
                                    <img src="<?php echo base_url();?>assets/person.svg" class="rounded" style="width: 50%">
                                <?php } else { ?>
                                    <img src="<?php echo base_url();?>assets/fotomhs/<?php echo $fotop; ?>" class="rounded-circle" style="width: 50%">
                                <?php }
                                    ?></td>
                                <td><?php echo $see['npm'];?></td>
                                <td><?php echo $see['namamhs'];?></td>
                                <td><?php echo $see['nama_jur'];?></td>
                                <td><?php echo $see['kelas'];?></td>
                                <td>
                                    <div align="center">
                                        <a data-toggle="modal" href="#modalUpdatemem<?php echo $see['id_regist'];?>"><button type="button" class="btn btn-info btn-sm font-weight-bolder">Update</button></a>
                                </td>
                            </tr>
                            <!-- MODAL -->
                            <div class="modal fade" id="modalUpdatemem<?php echo $see['id_regist'];?>" tabindex="-1" role="dialog" aria-labelledby="modalJurusanLabel" aria-hidden="">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalJurusanLabel">Update</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="cmember/update" enctype="multipart/form-data" method="POST">
                                                <div class="form-group row">
                                                    <div class="col-sm-3">
                                                        <label for="recipient-name" class="col-form-label  ml-4">ID Pendaftaran</label>
                                                    </div>
                                                    <div class="col-sm-8 ml-1">
                                                        <input type="text" class="form-control" id="idp" name="idp" value="<?php echo $see['id_regist'];?>" placeholder="ID Pendaftaran" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-3">
                                                        <label for="recipient-name" class="col-form-label  ml-4">NPM</label>
                                                    </div>
                                                    <div class="col-sm-8 ml-1">
                                                        <input type="text" class="form-control" id="npm" name="npm" value="<?php echo $see['npm'];?>" placeholder="NPM">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-3">
                                                        <label for="recipient-name"  class="col-form-label  ml-4">Nama Mahasiswa</label>
                                                    </div>
                                                    <div class="col-sm-8 ml-1">
                                                        <input type="text" class="form-control" value="<?php echo $see['namamhs'];?>" id="nmmhs" name="nmmhs" placeholder="Nama Mahasiswa">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-3">
                                                        <label for="recipient-name" class="col-form-label  ml-4">Jurusan</label>
                                                    </div>
                                                    <div class="col-sm-8 ml-1">
                                                        <select class="form-control" id="jur" name="jur">
                                                            <option value="<?php echo $see['id_jur']?>"><?php echo $see['nama_jur'] . " " . $see['kelas'];?> </option>
                                                            <?php
                                                                $query = "SELECT*FROM jurusan";
                                                                $panggil = mysql_query($query);

                                                                while ($tampil = mysql_fetch_array($panggil)) :; ?>
                                                                <option value="<?php echo $tampil['id_jur']; ?>"><?php echo $tampil['nama_jur'] . " " . $tampil['kelas']; ?></option>
                                                            <?php endwhile;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-3">
                                                            <label for="recipient-name" class="col-form-label  ml-4">Foto Profil</label>
                                                        </div>
                                                        <div class="col-sm-4 ml-1">
                                                            <input type="file" id="fotop" name="fotop">
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label for="recipient-name" class="col-form-label  ml-4">Foto berukuran 3*3, Format PNG/JPG, Penamaan dengan NPM tanpa (.)</label>
                                                        </div>
                                                    </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-primary">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /MODAL -->
                        <?php endforeach;?>
                        </tbody>
                    </table>
                    <!-- /TABEL -->
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 mb-4 mt-3" >
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalJurusan" data-whatever="@getbootstrap">Registrasi</button>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL -->
    <div class="modal fade" id="modalJurusan" tabindex="-1" role="dialog" aria-labelledby="modalJurusanLabel" aria-hidden="">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalJurusanLabel">Registrasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="cmember/insert" method="POST">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label for="recipient-name" class="col-form-label  ml-4">ID Pendaftaran</label>
                            </div>
                            <div class="col-sm-8 ml-1">
                                <input type="text" class="form-control" id="idp" name="idp" value="<?php echo $kode?>" placeholder="ID Pendaftaran" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label for="recipient-name" class="col-form-label  ml-4">NPM</label>
                            </div>
                            <div class="col-sm-8 ml-1">
                                <input type="text" class="form-control" id="npm" name="npm" placeholder="NPM">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label for="recipient-name" class="col-form-label  ml-4">Nama Mahasiswa</label>
                            </div>
                            <div class="col-sm-8 ml-1">
                                <input type="text" class="form-control" id="nmmhs" name="nmmhs" placeholder="Nama Mahasiswa">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label for="recipient-name" class="col-form-label  ml-4">Jurusan</label>
                            </div>
                            <div class="col-sm-8 ml-1">
                                <select class="form-control" id="jur" name="jur">
                                    <option value=""> Jurusan - Kelas </option>
                                    <?php
                                        $query = "SELECT*FROM jurusan";
                                        $panggil = mysql_query($query);

                                        while ($tampil = mysql_fetch_array($panggil)) :; ?>
                                        <option value="<?php echo $tampil['id_jur']; ?>"><?php echo $tampil['nama_jur'] . " " . $tampil['kelas']; ?></option>
                                    <?php endwhile;?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /MODAL -->
    <!-- CONTENT -->
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- Sweatalert -->
    
  </body>
</html>