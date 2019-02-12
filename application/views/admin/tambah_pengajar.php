<section class="content-header">
    <h1> Tambah Pengajar </h1>
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
                                    <input type="text" name="nama_pengajar" placeholder="Nama Lengkap Pengajar" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Lembaga </label>
                                <div class="col-sm-9">
                                    <select name="lembaga" class="form-control">
                                        <option value="" disabled selected> -- Pilih Lembaga --</option>
                                        <option value="1">MTs</option>
                                        <option value="2">MA</option>
                                        <option value="3">Yayasan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Profesi </label>
                                <div class="col-sm-9">
                                    <input type="text" name="profesi" class="form-control" placeholder="Profesi" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Foto Pengajar </label>
                                <div class="col-sm-9">
                                    <input type="file" name="photo" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Profil </label>
                                <div class="col-sm-9">
                                    <textarea name="profil" class="form-control" rows="7" placeholder="Profil Pengajar"></textarea>
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
        </div>
    </div>
</section>
<script>
    $("#formDaftar").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: base_url + "api/tambah_pengajar",
            type: "post",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function (result) {
                if (result.success == true) {
                    toastr["success"](result.message, "Berhasil...");
                    $("#formDaftar")[0].reset();
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