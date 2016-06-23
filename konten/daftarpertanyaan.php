    <!-- Status here-->
        <div class="container" style="margin-top:70px">

          <!-- Main Content-->
          <div class="">
            <div class="col-md-9">
              <?php
              $q= $mysqli -> query("SELECT diskusi.judul,diskusi.id_diskusi, diskusi.isi, diskusi.tgl, tb_user.nama_user FROM `diskusi` INNER JOIN tb_user on diskusi.id_user = tb_user.id_user order by diskusi.tgl DESC");
                if ($q->num_rows>0) {
                  while ($row = $q->fetch_assoc()) {
                    $judul = $row['judul'];
                    $id = $row['id_diskusi'];
                    $isi = $row['isi'];
                    $tgl=$row['tgl'];
                    $user = $row['nama_user'];
                  ?>
                    <ul class="posts">
                      <li class="post" style="padding: 35px; "id="message1" >
                        <div class="h2">
                          <a href="?content=diskusicomment&question=<?php echo $id;?>">
                        <?php echo $judul; ?>
                        </a>
                        </div>
                        <div name="">
                          <?php echo $isi; ?>
                        </div>

                          <div class="group button-group pull-right">
                            <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="margin-top:15px;
                            background-color: #a11cb6;
                            color:#fff;">Comments
                            </a>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="collapse" id="collapseExample">
                                <ul class="posts">

                                  <li class="post" style="background-color:#b696be;">

                                      @css @javascript Front end development is awesome! #awesome #js #frontend
                                  </li>
                                </ul>

                              </div>
                            </div>
                          </div>

                      </li>


                    </ul>
                    <?PHP
                  }
                } ?>


          </div>
          <div class="col-md-3">
            <h1>kategori</h1>
          </div>
        </div>
        </div>
