<div class="card">
    <div class="card-body">
        <legend class="border-bottom border-primary">INFORMASI</legend>
        <ol>
            <?php foreach($informasi as $info):?>
               <a type="button" data-toggle="modal" data-target="#exampleModalLong<?=$info['id_informasi']?>">
            <li class="border-bottom">
               <?= $info['judul_informasi']?>
               <p class="">
                <?php
                    $str= $info['detail_informasi'];
                    if (strlen($str) > 400)
                    $str = substr($str, 0, 400) . '...';
                    echo $str;
                ?>
               </p>
            </li>
               </a> 
            <?php endforeach ?>
        </ol>
    </div>
</div>


<!-- Modal -->
<?php foreach($informasi as $detail):?>
<div class="modal fade" id="exampleModalLong<?=$detail['id_informasi']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?=$detail['judul_informasi']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?=$detail['detail_informasi']?>
      <div class="row mt-4 text-secondary">
        <!-- <div class="col"><?=$detail['dibuat_tanggal']?></div> -->
        <div class="col"><span class="float-right">Dibuat oleh <?=$detail['dibuat_oleh']?> pada <?=$detail['dibuat_tanggal']?></span></div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>