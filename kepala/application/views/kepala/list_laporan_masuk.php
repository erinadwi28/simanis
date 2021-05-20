<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between">
        <h3 class="judullist py-3">Data Laporan Masuk</h3>
        <nav aria-label="breadcrumb" class="nav-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Laporan Masuk</li>
            </ol>
        </nav>
    </div>

    <!-- DataTables Warga -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelapor</th>
                            <th>Judul Laporan</th>
                            <th>Tanggal Pelaporan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_laporan as $laporan) {
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $laporan->nama ?></td>
                                <td><?= $laporan->judul_laporan ?></td>
                                <td><?= format_indo(date($laporan->tgl_kirim)); ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url() ?>dashboard/detail_laporan/<?= $laporan->id_pengaduan ?>" class="btn btn-primary btn-sm">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->