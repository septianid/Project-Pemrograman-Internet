

<!-- Status here-->
    <div class="container" style="margin-top:70px">
      <?php
        if (isset($_REQUEST['status'])) {
          if ($_REQUEST['status'] == 'sukses') {
              echo '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Sukses!</strong> Data berhasil di hapus.
                  </div>';
          }
          else{
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Gagal!</strong> Terjadi kesalahan saat menghapus data.
                </div>';
          }
        }
       ?>
        <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default" style="margin-top:30px;">
            <div class="panel-body" style="background-color: #e3b9ed;">
              <div class="col-md-1">

              </div>
              <div class="col-md-10">
                <form action="kontrol/message.php" method="post">
                <input type="text" class="form-control status-box" name="judul" placeholder="Your Question" style="margin-bottom:5px;" >
                <textarea name="editor1" id="editor1"  placeholder="Your code and Your Comments">
            </textarea>

                <div class="group button-group pull-right">
                  <button type="submit" class="btn" style="margin-top:10px;background-color: #a11cb6;color:#fff;">Post</button>
                </div>
              </div>
              </form>
              <div class="col-md-1">

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Main Content-->
      <div class="row">
        <div class="col-md-9">
          <?php
          $q= $mysqli -> query("SELECT diskusi.id_diskusi, diskusi.judul, diskusi.isi, diskusi.tgl, tb_user.nama_user,tb_user.foto_user FROM `diskusi` INNER JOIN tb_user on diskusi.id_user = tb_user.id_user order by diskusi.tgl DESC");

            if ($q->num_rows>0) {
              $i=0;
              while ($row = $q->fetch_assoc()) {

                $id = $row['id_diskusi'];
                $judul = $row['judul'];
                $isi = $row['isi'];
                $tgl=$row['tgl'];
                $tgl_tampil= date_create($tgl);
                $user = $row['nama_user'];
                $url_foto = $row['foto_user'];

              ?>
                <ul class="posts">
                  <li class="post" style="padding: 35px; "id="message1" >
                    <div class="h2">
                    <?php echo "<a href=?content=diskusicomment&question=".$id.">".$judul."</a>"; ?>
                    </div>

                    <div class="h5">
                      <?php echo "<span class='glyphicon glyphicon-user' aria-hidden='false'></span> ".$user." | <span class='glyphicon glyphicon-calendar' aria-hidden='false'></span> ".date_format($tgl_tampil,'d/m/y H:i');
                          if ($_SESSION['status'] == 'admin') {
                            echo "<a href='kontrol/hapus.php?id=".$id."' class='btn btn-danger btn-sm'>Hapus</a>";
                          }
                      ?>

                    </div>
                      <div class="h4" >
                        <?php echo $isi; ?>
                      </div>
                      <div class="group button-group pull-right">
                        <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample<?php echo $i; ?>" aria-expanded="false" aria-controls="collapseExample" style="margin-top:15px;
                        background-color: #a11cb6;
                        color:#fff;">Comments
                        </a>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                        <?php
                          echo  '<div class="collapse" id="collapseExample'.$i.'"><ul class="posts">';

                          $q2 = $mysqli -> query("SELECT komentar.isi_komentar,komentar.tgl, komentar.id_user,tb_user.nama_user FROM komentar INNER JOIN tb_user  on komentar.id_user= tb_user.id_user and komentar.id_diskusi = $id ORDER BY tgl DESC");
                          if ($q2->num_rows>0) {
                            while ($row2 = $q2->fetch_assoc()) {
                              $komen_isi = $row2['isi_komentar'];
                              $komen_tgl = $row2['tgl'];
                              $tgl_tampil_komen= date_create($komen_tgl);
                              $komen_user = $row2['nama_user'];

                              echo '

                                <li class="post" style="background-color:#b696be;">
                                <span class="glyphicon glyphicon-user" aria-hidden="false"></span>'.$komen_user.'
                                 '.$komen_isi.'
                                </li>
                              ';
                            }
                          }else{
                            echo '
                              <li class="post" style="background-color:#b696be;">
                               tidak ada komentar
                              </li>
                            ';
                          }
                          echo "</ul>";
                            ?>
                          </div>
                        </div>
                      </div>
                  </li>
                </ul>

                <?php

              $i++;
            }
            } ?>
        </div>
        <div class="col-md-3">
          <h1>kategori</h1>
        </div>

      </div>
    </div>
