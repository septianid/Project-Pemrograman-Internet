<!-- Status here-->
<?php
$id=$_REQUEST['question'];
$stmt = $mysqli -> prepare("SELECT diskusi.judul,diskusi.id_diskusi, diskusi.isi, diskusi.tgl, tb_user.nama_user FROM `diskusi` INNER JOIN tb_user on diskusi.id_user = tb_user.id_user and diskusi.id_diskusi = $id limit 1 ");
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($judul,$id_diskusi,$isi,$tgl,$nama_user);
$stmt->fetch();
$tgl_tampil= date_create($tgl);
 ?>

    <div class="container" style="margin-top:70px">

      <!-- Main Content-->
      <div class="row">
        <div class="col-md-9">

                <ul class="posts">
                  <li class="post" style="padding: 25px; "id="message1" >
                    <div class="h2">
                      <?php echo $judul; ?>
                    </div>
                    <span class="glyphicon glyphicon-user"></span> <?php echo$nama_user; ?>
                    |
                    <span class='glyphicon glyphicon-calendar' aria-hidden='false'>  </span> <?php echo date_format($tgl_tampil,'d/m/y H:i');?>
                    <?php echo $isi; ?>

                    <form class="" action="kontrol/komentar.php" method="post">
                      <textarea name="editor1" id="editor1"  placeholder="Your code and Your Comments">
                  </textarea>
                      <input type="hidden" name="id_pertanyaan" value="<?php echo $id; ?>">
                        <div class="group button-group pull-right">
                          <button type="submit" name="button" class="btn" style="background-color: #a11cb6;color:#fff;margin-top:10px;">SUBMIT</button>
                        </div>
                    </form>
                    <div class="row">
                      <div class="col-md-12">

                          <?php
                          $q= $mysqli -> query("SELECT  komentar.id_komentar, komentar.isi_komentar, komentar.tgl,tb_user.nama_user FROM komentar INNER join tb_user on komentar.id_user= tb_user.id_user AND komentar.id_diskusi=$id_diskusi ORDER BY komentar.tgl DESC");
                          if ($q->num_rows>0) {
                            while ($row = $q->fetch_assoc()) {
                            $id_komentar=$row['id_komentar'];
                              $isi_komen = $row['isi_komentar'];
                              $tgl=$row['tgl'];
                              $tgl_tampil= date_create($tgl);
                              $komen_user = $row['nama_user'];

                            ?>
                          <ul class="posts">

                            <li class="post" style="background-color:#b696be;">
                              <span class="glyphicon glyphicon-user"></span><?php echo $komen_user; ?>
                              |
                              <span class='glyphicon glyphicon-calendar' aria-hidden='false'>  </span> <?php echo date_format($tgl_tampil,'d/m/y H:i');?>
                                <?php echo $isi_komen;?>
                            </li>
                          </ul>
<?php }} ?>
                      </div>
                    </div>

                  </li>
                </ul>

      </div>
      <div class="col-md-3">
        <h1>kategori</h1>
      </div>
    </div>
    </div>
