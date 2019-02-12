<section class="content-header">
    <h1> <?=$h1?> </h1>
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
                        <button type="button" onclick="render('tambah_siswa')" class="btn btn-primary" title="Tambah Pendaftar"><i class="fa fa-plus"></i></button>
                        <button type="button" id="hapus" class="btn btn-primary" title="Hapus Data Terpilih"><i class="fa fa-trash"></i></button>
                        <a href="<?=base_url('export/').$id?>" target="_blank" class="btn btn-primary" title="Export Excel"><i class="fa fa-file-excel-o"></i></a>
                        <button type="button" id="refresh" class="btn btn-primary" title="Refresh Data Siswa"><i class="fa fa-refresh"></i></button>
                        <?php if ($this->session->level == 9) {
                            echo "<button type='button' id='permanent' class='btn btn-danger' title='Hapus Permanent'><i class='fa fa-trash'></i></button>";
                        } ?>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-hover table-striped table-condensed" width="100%">
                            <thead class="thead">
                                <tr>
                                    <th style="text-align:center">No</th>
                                    <th><input type="checkbox" id="master"></th>
                                    <th><i class="fa fa-edit"></i></th>
                                    <th><i class="fa fa-search-plus"></i></th>
                                    <th>No Daftar</th>
                                    <th>Gelombang</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tempat, Tgl lahir</th>
                                    <th>Asal Sekolah</th>
                                    <th>Orang Tua</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-purple">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="judul"></h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <dl class="dl-horizontal">
                                <dt>No Daftar</dt><dd id="nodaftar"></dd>
                                <dt>Mendaftar di</dt><dd id="pilihan"></dd>
                                <dt>Nama Lengkap</dt><dd id="nama_lengkap"></dd>
                                <dt>Tempat, Tgl Lahir</dt><dd id="ttl"></dd>
                                <dt>Gender</dt><dd id="gender"></dd>
                                <dt>Alamat</dt><dd id="alamat"></dd>
                            </dl>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <dl class="dl-horizontal">
                                <dt>Asal Sekolah</dt><dd id="asal_sekolah"></dd>
                                <dt>Orang Tua</dt><dd id="orang_tua"></dd>
                                <dt>Pekerjaan</dt><dd id="pekerjaan"></dd>
                                <dt>Penghasilan</dt><dd id="gaji"></dd>
                                <dt>No Telp</dt><dd id="no_telp"></dd>
                                <dt>Catatan</dt><dd id="catatan"></dd>
                            </dl>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-purple" data-dismiss="modal">Tutup</button>
            </div>
        </div>

    </div>
</div>
<script>
    var dataID = <?=$id?>;
    var thisTable = $('#myTable').DataTable({ "processing": true, "pageLength": 50, "serverSide": true, "order": [], "ajax": { "url": base_url + "api/get_pendaftar", "type": "post", "data": {id:dataID} }, "columnDefs": [{ "targets": [0,1,2,3], "orderable": false, }, ], });
    $('#master').on('click', function(e) {
        if ($(this).is(':checked', true)) {
            $(".check_id").prop('checked', true);
        } else {
            $(".check_id").prop('checked', false);
        }
    });
    $("#hapus").click(function () {
        var allVals = [];  
        $(".check_id:checked").each(function() {  
            allVals.push($(this).attr('data-id'));
        });
        if (allVals.length <= 0) {
                alert("Pilih siswa terlebih dahulu.");
            } else {
                var check = confirm("Are you sure you want to delete this row?");
                if (check == true) {
                    var join_selected_values = allVals.join(",");
                    $.ajax({
                        url: base_url + 'api/delete_pendaftar',
                        type: 'POST',
                        data: 'ids=' + join_selected_values,
                        dataType: 'json',
                        success: function (result) {
                            if (result.success == true) {
                                toastr["success"](result.message, "Berhasil...");
                                thisTable.ajax.reload();
                            } else {
                                toastr["error"](result.message, "Gagal...");
                            }
                        },
                        error: function (data) {
                            toastr["error"]("Terjadi Kesalahan Saat Posting Data", "Gatot...");
                        }
                    });
                }
            }
    })
    function tampilDetail(params) {
        $.ajax({
            url: base_url + "api/get_detail_pendaftar",
            data: {id:params},
            type: "post",
            dataType: "json",
            success: function (result) {
                if (result.success == true) {
                    var x = result.data;
                    var bulan =  ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
                    var d = new Date(x.tanggal_lahir);
                    var ttl = x.tempat_lahir+", "+d.getDate()+" "+bulan[d.getMonth()]+" "+d.getFullYear();
                    var mts = x.is_mts==1?(x.is_pondok==1?"MTs dan Pondok":"MTs"):"";
                    var ma = x.is_ma==1?(x.is_pondok==1?"MA dan Pondok":"MA"):"";
                    var pondok = x.is_pondok==1?(x.is_mts==0&&x.is_ma==0?"Pondok":""):"";
                    $(".modal-title").html(x.nama_siswa);
                    $("#nodaftar").html(x.no_daftar);
                    $("#pilihan").html(mts+ma+pondok);
                    $("#nama_lengkap").html(x.nama_siswa);
                    $("#ttl").html(ttl);
                    $("#gender").html(x.gender==0?"Perempuan":"Laki-laki");
                    $("#alamat").html(x.alamat);
                    $("#asal_sekolah").html(x.asal_sekolah);
                    $("#orang_tua").html(x.orang_tua);
                    $("#pekerjaan").html(x.pekerjaan);
                    $("#gaji").html(x.gaji);
                    $("#no_telp").html(x.no_telp);
                    $("#catatan").html(x.catatan);
                } else {
                    toastr["error"](result.message, "Gagal...");
                }
            }
        })
        $("#myModal").modal('show');
    }
    $("#refresh").click(function () {
        thisTable.ajax.reload();
    })
    <?php if ($this->session->level == 9) { ?>
        $("#permanent").click(function () {
        var allVals = [];  
        $(".check_id:checked").each(function() {  
            allVals.push($(this).attr('data-id'));
        });
        if (allVals.length <= 0) {
                alert("Pilih siswa terlebih dahulu.");
            } else {
                var check = confirm("Are you sure you want to delete this row?");
                if (check == true) {
                    var join_selected_values = allVals.join(",");
                    $.ajax({
                        url: base_url + 'api/delete_pendaftar_permanent',
                        type: 'POST',
                        data: 'ids=' + join_selected_values,
                        dataType: 'json',
                        success: function (result) {
                            if (result.success == true) {
                                toastr["success"](result.message, "Berhasil...");
                                thisTable.ajax.reload();
                            } else {
                                toastr["error"](result.message, "Gagal...");
                            }
                        },
                        error: function (data) {
                            toastr["error"]("Terjadi Kesalahan Saat Posting Data", "Gatot...");
                        }
                    });
                }
            }
    })
    <?php } ?>
</script>