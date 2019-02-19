<section class="content-header">
    <h1> Data Testimoni </h1>
    <?php if (isset($breadcrumb)) {
        echo $breadcrumb;
    } ?>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="btn-group pull-right">
                        <button type="button" onclick="render('tambah_testimoni')" class="btn btn-primary" title="Tambah Testimoni"><i class="fa fa-plus"></i></button>
                        <button type="button" id="hapus" class="btn btn-primary" title="Hapus Data Terpilih"><i class="fa fa-trash"></i></button>
                        <button type="button" id="refresh" class="btn btn-primary" title="Refresh Data Siswa"><i class="fa fa-refresh"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-hover table-striped table-condensed" width="100%">
                            <thead>
                                <tr>
                                    <th style="text-align:center">No</th>
                                    <th><input type="checkbox" id="master"></th>
                                    <th><i class="fa fa-edit"></i></th>
                                    <th>Nama</th>
                                    <th>Posisi</th>
                                    <th>Testimoni</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach ($testimoni as $item) {
                                    echo "<tr>";
                                    echo "<td>$no</td>";
                                    echo "<td><input type='checkbox' class='check_id' data-id='$item->id_testimoni'></td>";
                                    echo "<td><a href='javascript:void(0)' title='Edit Testimoni'><i class='fa fa-edit'></i></a></td>";
                                    echo "<td>$item->nama</td>";
                                    echo "<td>$item->tempat</td>";
                                    echo "<td>$item->testimoni</td>";
                                    echo "<td><img src='".base_url().$item->foto."' class='img-thumbnail' width='100px'></td>";
                                    echo "</tr>";
                                    $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $('#myTable').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [0,1,2,6]
        }]
    });
</script>