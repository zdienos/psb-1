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
                        <button type="button" class="btn btn-primary action" data-id="3" title="Hapus Data Terpilih"><i class="fa fa-trash"></i></button>
                        <a href="<?=base_url('export/').$id?>" target="_blank" class="btn btn-primary" title="Export Excel"><i class="fa fa-file-excel-o"></i></a>
                        <button type="button" id="refresh" class="btn btn-primary" title="Refresh Data Siswa"><i class="fa fa-refresh"></i></button>
                        <button type="button" class="btn btn-success action" data-id="1" title="Set Diterima"><i class="fa fa-check"></i></button>
                        <button type="button" class="btn btn-danger action" data-id="2" title="Set Ditolak"><i class="fa fa-close"></i></button>
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
                                    <th>Nama Lengkap</th>
                                    <th>Tempat, Tgl lahir</th>
                                    <th>Asal Sekolah</th>
                                    <th>Orang Tua</th>
                                    <th>No Telp</th>
                                    <th>Status</th>
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
    var thisTable=$("#myTable").DataTable({processing:!0,pageLength:50,serverSide:!0,order:[],ajax:{url:base_url+"api/get_pendaftar",type:"post",data:{id:dataID}},columnDefs:[{targets:[0,1,2,3,9,10],orderable:!1}]});function tampilDetail(a){$.ajax({url:base_url+"api/get_detail_pendaftar",data:{id:a},type:"post",dataType:"json",success:function(a){if(1==a.success){var e=a.data,t=new Date(e.tanggal_lahir),s=e.tempat_lahir+", "+t.getDate()+" "+["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"][t.getMonth()]+" "+t.getFullYear(),i=1==e.is_mts?1==e.is_pondok?"MTs dan Pondok":"MTs":"",l=1==e.is_ma?1==e.is_pondok?"MA dan Pondok":"MA":"",n=1==e.is_pondok&&0==e.is_mts&&0==e.is_ma?"Pondok":"";$(".modal-title").html(e.nama_siswa),$("#nodaftar").html(e.no_daftar),$("#pilihan").html(i+l+n),$("#nama_lengkap").html(e.nama_siswa),$("#ttl").html(s),$("#gender").html(0==e.gender?"Perempuan":"Laki-laki"),$("#alamat").html(e.alamat),$("#asal_sekolah").html(e.asal_sekolah),$("#orang_tua").html(e.orang_tua),$("#pekerjaan").html(e.pekerjaan),$("#gaji").html(e.gaji),$("#no_telp").html(e.no_telp),$("#catatan").html(e.catatan)}else toastr.error(a.message,"Gagal...")}}),$("#myModal").modal("show")}$("#master").on("click",function(a){$(this).is(":checked",!0)?$(".check_id").prop("checked",!0):$(".check_id").prop("checked",!1)}),$(".action").click(function(){var a=$(this).data("id"),e=[];if($(".check_id:checked").each(function(){e.push($(this).attr("data-id"))}),e.length<=0)alert("Pilih siswa terlebih dahulu.");else if(1==confirm("Apakah anda yakin melakukan tindakan ini. Lanjutkan..?")){var t=e.join(",");$.post(base_url+"api/set_pendaftar","ids="+t+"&act="+a,function(a){console.log(a),1==a.success?(toastr.success(a.message,"Berhasil..."),thisTable.ajax.reload()):toastr.error(a.message,"Gagal...")})}}),$("#refresh").click(function(){thisTable.ajax.reload()});
    <?php if ($this->session->level == 9) { ?>
    $("#permanent").click(function(){var e=[];if($(".check_id:checked").each(function(){e.push($(this).attr("data-id"))}),e.length<=0)alert("Pilih siswa terlebih dahulu.");else if(1==confirm("Are you sure you want to delete this row?")){var a=e.join(",");$.post(base_url+"api/delete_pendaftar_permanent","ids="+a,function(e){1==e.success?(toastr.success(e.message,"Berhasil..."),thisTable.ajax.reload()):toastr.error(e.message,"Gagal...")})}});
    <?php } ?>
</script>