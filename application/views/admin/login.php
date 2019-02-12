<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Administrator</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/bootstrap.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/AdminLTE.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script>var base_url = "<?php echo base_url();?>";</script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?php echo base_url() ?>"><b>Sistem Informasi</b> <br> <small>Penerimaan Santri Baru</small></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Silahkan Login Terlebih Dahulu</p>
            <form id="formLogin">
                <div class="form-group has-feedback">
                    <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-8">
                        <button type="submit" class="btn btn-primary btn-block btn-flat"> Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="<?php echo base_url('assets/backend/js/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/backend/js/bootstrap.min.js')?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="<?php echo base_url('assets/backend/js/app.js')?>"></script>
    <script>
        $("#formLogin").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: base_url + "authentication",
                data: $(this).serialize(),
                type: "post",
                dataType: "json",
                success: function (data) {
                    if (data.success == true) {
                        toastr["success"](data.message, "Berhasil...");
                        window.setTimeout(function(){location.reload()},3000)
                    } else {
                        toastr["error"](data.message, "Gagal...");
                    }
                },
                errro: function (data) {
                    console.log(data);
                }
            })
        })
    </script>
</body>

</html>