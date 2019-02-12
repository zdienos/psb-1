<section class="content-header">
    <h1> Data Pengguna </h1>
    <?php if (isset($breadcrumb)) {
        echo $breadcrumb;
    } ?>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="box box-success">
                <form class="form-horizontal" id="formDaftar">
                    <div class="box-body">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nama Lengkap </label>
                                <div class="col-sm-9">
                                    <input type="text" name="real_name" placeholder="Nama Lengkap Pengguna" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Username </label>
                                <div class="col-sm-9">
                                    <input type="text" name="username" placeholder="Username Pengguna" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Password </label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" placeholder="Password Pengguna" class="form-control" required autocomplete="off">
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
                                    <th>Username</th>
                                    <th>Nama Lengkap</th>
                                    <th>Level</th>
                                    <th>Last Login</th>
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
    var thisTable = $('#myTable').DataTable({ "processing": true, "pageLength": 25, "serverSide": true, "order": [], "ajax": { "url": base_url + "api/get_pengguna", "type": "post" }, "columnDefs": [{ "targets": [0,1,2], "orderable": false, }, ], });
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