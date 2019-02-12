<section class="content-header">
    <h1> Tambah Pendaftar </h1>
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
                                <label class="col-sm-3 control-label">Mendaftar di </label>
                                <div class="col-sm-9">
                                    <select name="pilihan" class="form-control" required>
                                        <option value="" disabled selected> -- Pilih Tempat Mendaftar -- </option>
                                        <option value="1">MTs</option>
                                        <option value="2">MA</option>
                                        <option value="3">Pondok</option>
                                        <option value="4">MTs & Pondok</option>
                                        <option value="5">MA & Pondok</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nama Lengkap </label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_siswa" placeholder="Nama Lengkap Siswa" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Tempat Lahir </label>
                                <div class="col-sm-9">
                                    <input type="text" name="tempat_lahir" placeholder="Kota Tempat Lahir" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Tanggal Lahir </label>
                                <div class="col-sm-9">
                                    <input type="text" name="tgl_lahir" id="tgl_lahir" placeholder="Format dd-mm-yyyy" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Jenis Kelamin </label>
                                <div class="col-sm-9">
                                    <select name="gender" class="form-control" required>
                                        <option value="" disabled selected> -- Pilih Jenis Kelamin -- </option>
                                        <option value="0">Perempuan</option>
                                        <option value="1">Laki - Laki</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Alamat Siswa </label>
                                <div class="col-sm-9">
                                    <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat Siswa"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Asal Sekolah </label>
                                <div class="col-sm-9">
                                    <input type="text" name="asal_sekolah" placeholder="Asal Sekolah Siswa" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Orang Tua </label>
                                <div class="col-sm-9">
                                    <input type="text" name="orang_tua" placeholder="Nama Orang Tua" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Pekerjaan </label>
                                <div class="col-sm-9">
                                    <input type="text" name="pekerjaan" placeholder="Pekerjaan Orang Tua" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Penghasilan </label>
                                <div class="col-sm-9">
                                    <select name="penghasilan" class="form-control" required>
                                        <option value="" disabled selected> -- Penghasilan Orang Tua -- </option>
                                        <?php foreach ($penghasilan as $i) {
                                            echo "<option value='$i->id_penghasilan'> $i->gaji </option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">No Telp </label>
                                <div class="col-sm-9">
                                    <input type="text" name="no_telp" placeholder="Nomor Telp Orang Tua" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Catatan Siswa </label>
                                <div class="col-sm-9">
                                    <textarea name="catatan" class="form-control" rows="3" placeholder="Catatan Tentang Siswa"></textarea>
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
    $("#tgl_lahir").datepicker({
        autoclose: true,
        format: "dd-mm-yyyy",
        orientation: "bottom left",
    })
    $("#formDaftar").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: base_url + "api/tambah_pendaftar",
            data: $(this).serialize(),
            dataType: "json",
            type: "post",
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