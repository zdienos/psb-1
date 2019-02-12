<section class="content-header">
    <h1> Data Gelombang </h1>
    <?php if (isset($breadcrumb)) {
        echo $breadcrumb;
    } ?>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-hover table-striped table-condensed" width="100%">
                            <thead>
                                <tr>
                                    <th style="text-align:center">No</th>
                                    <th><input type="checkbox" id="master"></th>
                                    <th><i class="fa fa-edit"></i></th>
                                    <th>Penghasilan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach ($penghasilan as $item) {
                                    echo "<tr>";
                                    echo "<td>$no</td>";
                                    echo "<td><input type='checkbox' class='check_id' data-id='$item->id_penghasilan'></td>";
                                    echo "<td><a href='javascript:void(0)' title='Edit Penghasilan' ><i class='fa fa-edit'></i></a></td>";
                                    echo "<td>$item->gaji</td>";
                                    echo "</tr>";
                                    $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $('#myTable').DataTable();
</script>