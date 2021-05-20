<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <?php foreach ($data_laporan as $detail) {
    ?>

        <div class="row clearfix">
            <div class="col-md-2 mb-4">

            </div>
            <div class="col-md-8 mb-4">
                <!-- Detail Data -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-center">Detail Laporan</h6>
                    </div>
                    <div class="card-body">
                        <table class="table-hover table-responsive">
                            <tbody>
                                <tr>
                                    <td><b>Judul Laporan</b></td>
                                    <td> </td>
                                    <td> </td>
                                    <td>:</td>
                                    <td> </td>
                                    <td><?= $detail->judul_laporan ?></td>
                                </tr>
                                <tr>
                                    <td><b>Nama Pelapor</b></td>
                                    <td> </td>
                                    <td> </td>
                                    <td>:</td>
                                    <td> </td>
                                    <td><?= $detail->nama; ?></td>
                                </tr>
                                <tr>
                                    <td><b>No. Hp Pelapor</b></td>
                                    <td> </td>
                                    <td> </td>
                                    <td>:</td>
                                    <td> </td>
                                    <td><?= $detail->no_hp; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Tanggal Kejadian</b></td>
                                    <td> </td>
                                    <td> </td>
                                    <td>:</td>
                                    <td> </td>
                                    <td><?= format_indo(date($detail->tgl_kejadian)); ?></td>
                                </tr>
                                <tr>
                                    <td><b>Isi Pesan</b></td>
                                    <td> </td>
                                    <td> </td>
                                    <td>:</td>
                                    <td> </td>
                                    <td><?= $detail->isi_pesan; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Tujuan Laporan</b></td>
                                    <td> </td>
                                    <td> </td>
                                    <td>:</td>
                                    <td> </td>
                                    <td><?= $detail->tujuan_lapoan; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Tanggal Pelaporan</b></td>
                                    <td> </td>
                                    <td> </td>
                                    <td>:</td>
                                    <td> </td>
                                    <td><?= format_indo(date($detail->tgl_kirim)); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-4">

            </div>
        </div>
    <?php } ?>
    <!--End Content Profile-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->