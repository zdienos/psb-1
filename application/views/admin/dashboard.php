<section class="content-header">
    <h1> Dashboard </h1>
    <?php if (isset($breadcrumb)) {
        echo $breadcrumb;
    } ?>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="box box-solid box-warning">
                <div class="box-header">
                    <h3 class="box-title">Jalan Pintas </h3>
                </div>
                <div class="box-body">
                    <a class="btn btn-app" onclick="render('tambah_siswa')"> <i class="fa fa-plus"></i> Tambah Siswa </a>
                    <a class="btn btn-app" onclick="render('data_pendaftar/4')"> <span class="badge bg-maroon"><?=$jml_pendaftar?></span> <i class="fa fa-database"></i> Data Siswa </a>
                    <a class="btn btn-app" onclick="render('data_pengajar')"><span class="badge bg-blue"><?=$jml_pengajar?></span> <i class="fa fa-graduation-cap"></i> Data Pengajar </a>
                    <a class="btn btn-app" onclick="render('data_prestasi')"><span class="badge bg-green"><?=$jml_pengajar?></span> <i class="fa fa-trophy"></i> Data Prestasi </a>
                    <a class="btn btn-app" onclick="render('data_testimoni')"> <span class="badge bg-red"><?=$jml_testimoni?></span> <i class="fa fa-bullhorn"></i> Testimoni </a>
                    <a class="btn btn-app" onclick="render('data_fasilitas')"> <span class="badge bg-yellow"><?=$jml_fasilitas?></span><i class="fa fa-home"></i> Fasilitas </a>
                    <a class="btn btn-app" onclick="render('data_penghasilan')"><span class="badge bg-green"><?=$jml_penghasilan?></span> <i class="fa fa-money"></i> Penghasilan </a>
                    <a class="btn btn-app" onclick="render('data_gelombang')"> <span class="badge bg-purple"><?=$jml_gelombang?></span> <i class="fa fa-exchange"></i> Gelombang </a>
                    <?php if ($this->session->level >= 9) { ?>
                    <a class="btn btn-app" onclick="render('data_pengguna')"> <span class="badge bg-teal"><?=$jml_pengguna?></span> <i class="fa fa-group"></i> Admin </a>
                    <a class="btn btn-app"> <i class="fa fa-cogs"></i> Pengaturan </a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="box box-solid box-success">
                <div class="box-header">
                    <h3 class="box-title">Statistik Pendaftar</h3>
                </div>
                <div class="box-body">
                    <canvas id="bar-chart" width="100%"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="box box-solid box-primary">
                <div class="box-header">
                    <h3 class="box-title">Statistik Jenis Kelamin</h3>
                </div>
                <div class="box-body">
                    <canvas id="pie-chart" width="100%"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
new Chart($("#bar-chart"), {
    type: 'bar',
    data: {
        labels: ["MTs", "MA", "Pondok", "MTs & Pondok", "MA & Pondok"],
        datasets: [{
            label: "Pendaftar",
            backgroundColor: ["#16a085", "#2980b9", "#d35400", "#8e44ad", "#2c3e50"],
            data: <?=json_encode($grafik)?>
        }]
    },
    options: {
        responsive: true,
        legend: {
            display: false
        },
        title: {
            display: true,
            text: 'Statistik Pendaftar YPI Minhajut Tholabah'
        }
    }
});
new Chart($("#pie-chart"), {
    type: 'pie',
    data: {
        labels : ["Laki-laki", 'Perempuan'],
        datasets: [{
            label: "Pendaftar",
            backgroundColor: ["#f39c12", "#8e44ad"],
            data: <?=json_encode($pie)?>
        }]
    },
    options: {
        responsive: true,
    }
})
</script>