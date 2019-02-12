<?php $d = $detail->data; ?>
<section class="content-header">
    <h1> Edit Pendaftar #<?=$d->no_daftar ?></h1>
    <?php if (isset($breadcrumb)) {
        echo $breadcrumb;
    } ?>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="box box-success">
                <form class="form-horizontal" id="formDaftar">
                    <input type="hidden" name="id_pendaftar" value="<?=$d->id_pendaftar?>">
                    <div class="box-body">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Mendaftar di </label>
                                <div class="col-sm-9">
                                    <select name="pilihan" class="form-control" required>
                                        <option value="1" <?=$d->is_mts==1&&$d->is_pondok==0?"selected":""?>>MTs</option>
                                        <option value="2" <?=$d->is_ma==1&&$d->is_pondok==0?"selected":""?>>MA</option>
                                        <option value="3" <?=$d->is_mts==0&&$d->is_ma==0&&$d->is_pondok==1?"selected":""?>>Pondok</option>
                                        <option value="4" <?=$d->is_mts==1&&$d->is_pondok==1?"selected":""?>>MTs & Pondok</option>
                                        <option value="5" <?=$d->is_ma==1&&$d->is_pondok==1?"selected":""?>>MA & Pondok</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nama Lengkap </label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_siswa" placeholder="Nama Lengkap Siswa" class="form-control" required autocomplete="off" value="<?=$d->nama_siswa?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Tempat Lahir </label>
                                <div class="col-sm-9">
                                    <input type="text" name="tempat_lahir" placeholder="Kota Tempat Lahir" class="form-control" required autocomplete="off" value="<?=$d->tempat_lahir?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Tanggal Lahir </label>
                                <div class="col-sm-9">
                                    <input type="text" name="tgl_lahir" id="tgl_lahir" placeholder="Format dd-mm-yyyy" class="form-control" required autocomplete="off" value="<?=date('d-m-Y', strtotime($d->tanggal_lahir))?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Jenis Kelamin </label>
                                <div class="col-sm-9">
                                    <select name="gender" class="form-control" required>
                                        <option value="0" <?=$d->gender==0?"selected":""?>>Perempuan</option>
                                        <option value="1" <?=$d->gender==1?"selected":""?>>Laki - Laki</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Alamat Siswa </label>
                                <div class="col-sm-9">
                                    <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat Siswa"><?=$d->alamat?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Asal Sekolah </label>
                                <div class="col-sm-9">
                                    <input type="text" name="asal_sekolah" placeholder="Asal Sekolah Siswa" class="form-control" required autocomplete="off" value="<?=$d->asal_sekolah?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Orang Tua </label>
                                <div class="col-sm-9">
                                    <input type="text" name="orang_tua" placeholder="Nama Orang Tua" class="form-control" required autocomplete="off" value="<?=$d->orang_tua?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Pekerjaan </label>
                                <div class="col-sm-9">
                                    <input type="text" name="pekerjaan" placeholder="Pekerjaan Orang Tua" class="form-control" required autocomplete="off" value="<?=$d->pekerjaan?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Penghasilan </label>
                                <div class="col-sm-9">
                                    <select name="penghasilan" class="form-control" required>
                                        <?php foreach ($penghasilan as $i) {
                                            echo "<option value='$i->id_penghasilan' ";
                                            echo $d->penghasilan==$i->id_penghasilan?"selected":"";
                                            echo "> $i->gaji </option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">No Telp </label>
                                <div class="col-sm-9">
                                    <input type="text" name="no_telp" placeholder="Nomor Telp Orang Tua" class="form-control" required autocomplete="off" value="<?=$d->no_telp?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Catatan Siswa </label>
                                <div class="col-sm-9">
                                    <textarea name="catatan" class="form-control" rows="3" placeholder="Catatan Tentang Siswa"><?=$d->catatan?></textarea>
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
            url: base_url + "api/update_pendaftar",
            data: $(this).serialize(),
            dataType: "json",
            type: "post",
            success: function (result) {
                if (result.success == true) {
                    toastr["success"](result.message, "Berhasil...");
                    render("edit_siswa?id="+result.id);
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