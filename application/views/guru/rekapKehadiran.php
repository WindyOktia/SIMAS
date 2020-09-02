<a href="<?=base_url('admin/detailPresensi')?>/<?=$id?>" class="btn btn-sm btn-secondary"><i class="mr-2 fa fa-arrow-circle-left"></i> Kembali</a>

<div class="card card-body border-warning mt-3">
    <form action="" method="get">
        <div class="form-group my-auto">
            <!-- <label for="">Filter Tahun Akademik</label> -->
            <div class="row">
                <div class="col-md-2">
                    <select name="dari" id="" class="form-control">
                        <option value="all">semua tahun</option>
                        <option value="2018/2019">2018/2019</option>
                        <option value="2019/2020">2019/2020</option>
                    </select>
                </div>
                <span class=" my-auto"> sampai </span>
                <div class="col-md-2">
                    <select name="sampai" id="" class="form-control">
                        <option value="all">semua tahun</option>
                        <option value="2018/2019">2018/2019</option>
                        <option value="2019/2020">2019/2020</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="semester" id="" class="form-control">
                        <option value="all" >semua semester</option>
                        <option value="Genap" >Genap</option>
                        <option value="Ganjil" >Ganjil</option>
                    </select>
                </div>
                <div class="col-md-2 ml-5">
                    <button type="submit" class="btn btn-success btn-block ">Filter Data</button>
                </div>
                <div class="col-md-2 ml-5">
                   <a href="<?=base_url('admin/detailPresensi')?>/<?=$id?>" class="btn btn-danger btn-block">Hapus Filter</a>
                </div>
            </div>
        </div>
    </form>
</div>