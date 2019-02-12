<section class="content-header">
    <h1> Data Gelombang </h1>
    <?php if (isset($breadcrumb)) {
        echo $breadcrumb;
    } ?>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="box box-success">
                <form class="form-horizontal" id="formDaftar">
                    <input type="hidden" name="id_gelombang" value="0" id="id_gelombang">
                    <div class="box-body">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Gelombang </label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_gelombang" id="nama_gelombang" placeholder="Gelombang 1/2/3" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Tgl Mulai </label>
                                <div class="col-sm-9">
                                    <input type="text" name="tgl_mulai" id="tgl1" placeholder="Format yyyy-mm-dd" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Tgl Selesai </label>
                                <div class="col-sm-9">
                                    <input type="text" name="tgl_akhir" id="tgl2" placeholder="Format yyyy-mm-dd" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-9 col-sm-offset-3">
                                    <button type="reset" class="btn btn-primary"> <i class="fa fa-refresh"></i> Reset</button>
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="btn-group pull-right">
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
                                    <th>Gelombang</th>
                                    <th>Tgl Mulai</th>
                                    <th>Tgl Selesai</th>
                                    <th>Jumlah Pendaftar</th>
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
<script>
    $("#tgl1, #tgl2").datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        orientation: "bottom left",
    })
    function edit_gelombang(id_gelombang) {
        $.post(base_url + "api/get_detail_gelombang", {id:id_gelombang}, function (x) {
            $("#id_gelombang").val(x.id_gelombang);
            $("#nama_gelombang").val(x.nama_gelombang);
            $("#tgl1").val(x.tgl_mulai);
            $("#tgl2").val(x.tgl_akhir);
        })
    }
    var thisTable = $('#myTable').DataTable({ "processing": true, "pageLength": 25, "serverSide": true, "order": [], "ajax": { "url": base_url + "api/get_gelombang", "type": "post" }, "columnDefs": [{ "targets": [0,1,2], "orderable": false, }, ], });
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
                alert("Pilih Admin terlebih dahulu.");
            } else {
                var check = confirm("Are you sure you want to delete this row?");
                if (check == true) {
                    var join_selected_values = allVals.join(",");
                    $.ajax({
                        url: base_url + 'api/delete_pengguna',
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
    $("#refresh").click(function () {
        thisTable.ajax.reload();
    })
    $("#formDaftar").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: base_url + "api/tambah_pengguna",
            data: $(this).serialize(),
            dataType: "json",
            type: "post",
            success: function (result) {
                if (result.success == true) {
                    toastr["success"](result.message, "Berhasil...");
                    $("#formDaftar")[0].reset();
                    thisTable.ajax.reload();
                } else {
                    toastr["error"](result.message, "Gagal...");
                }
            },
            error: function (data) {
                toastr["error"]("Terjadi Kesalahan Saat Posting Data", "Gatot...");
            }
        })
    })
</script>