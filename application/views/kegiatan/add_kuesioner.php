    <div class="main-card card">
                <div class="card-body">
                    <h5 class="card-title">Mulai Survei Kegiatan</h5>
                    <form id="signupForm" class="col-md-10 mx-auto" method="post" action="<?=base_url('document/do_addKuesioner')?>" novalidate="novalidate">
                    
                        <div class="form-group">
                            <label for="username">Nama Kegiatan</label>
                                <select name="id_proposal" class="multiselect-dropdown form-control" required>
                                    <?php if(isset($check)){foreach ($check as $prop) : ?>
                                        <option value="<?= $prop['id_proposal']; ?>"><?= $prop['nama_kegiatan']; ?> - <?= $prop['tahun_akademik'];?> - <?= $prop['semester'];?></option>
                                    <?php endforeach; }?> 
                                </select>
                        </div>
                
                        <div class="form-group">
                            <label for="username">Deskripsi</label>
                            <div>
                            <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10" ></textarea>
                                <script>
                                    CKEDITOR.replace( 'deskripsi',{height:250} );
                                </script>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username">Kategori Pertanyaan</label>
                            <div>
                                <fieldset class="position-relative row form-group">
                                    <div class="col">
                                        <select name="id_kategori" class="multiselect-dropdown form-control" required>
                                            <?php if(isset($kategori)){foreach ($kategori as $kat) : ?>
                                                <option value="<?= $kat['id_kategori']; ?>"><?= $kat['nama_kategori']; ?></option>
                                            <?php endforeach; }?> 
                                        </select>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Durasi Kuesioner</label>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <input name="tgl_mulai" value="<?=date('Y-m-d')?>" type="date" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="tgl_selesai"  placeholder="Tanggal Selesai" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary float-right mb-3" name="signup" value="Sign up">Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mb-3 mt-4">
        <div class="card-header-tab card-header">
            <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                <i class="header-icon fa fa-reorder mr-3 text-muted opacity-6" style="font-size:16px"> </i>Daftar Survei
            </div>
        </div>
        <div class="card-body">
            <table style="width: 100%;" id="example"
                    class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kegiatan</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Link Kuesioner</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; foreach ($kuesioner as $kuesioner) : ?>
                <tr>
                <td class="align-middle"><?= $i++ ?></td>
                    <td class="align-middle"><?= $kuesioner['nama_kegiatan']; ?></td>
                    <td class="align-middle"><?= $kuesioner['tgl_mulai']; ?></td>
                    <td class="align-middle"><?= $kuesioner['tgl_selesai']; ?></td>
                    <td class="align-middle"><?= $kuesioner['link_kuesioner']; ?></td>
                    <td class="align-middle"><a class="btn btn-info btn-sm mr-2" role="button" href="<?= base_url('document/detailKuesioner')?>/<?= $kuesioner['id_kuesioner']?>">Lihat Kuesioner</a><a class="btn btn-danger btn-sm tombol-hapus mr-2 " role="button" href="<?= base_url('document/deleteKuesioner')?>/<?= $kuesioner['id_kuesioner']?>">Hapus</a><a class="btn btn-success btn-sm mr-2" role="button" href="<?= base_url('document/generateKuesioner')?>/<?= $kuesioner['id_kuesioner']?>">Generate Link</a></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>                              
 

