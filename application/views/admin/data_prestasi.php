<section class="content-header">
    <h1> Data Prestasi </h1>
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
                        <button type="button" onclick="render('tambah_prestasi')" class="btn btn-primary" title="Tambah Prestasi"><i class="fa fa-plus"></i></button>
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
                                    <th>Judul</th>
                                    <th>Lembaga</th>
                                    <th>Foto</th>
                                    <th>Tgl Upload</th>
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
    var thisTable = $('#myTable').DataTable({ "processing": true, "pageLength": 10, "serverSide": true, "order": [], "ajax": { "url": base_url + "api/get_prestasi", "type": "post" }, "columnDefs": [{ "targets": [0,1,2], "orderable": false, }, ], });
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
</script>