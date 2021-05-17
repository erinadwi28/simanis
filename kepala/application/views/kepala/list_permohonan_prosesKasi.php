<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between">
        <h3 class="judullist py-3">Data Permohonan Proses Kasi</h3>
        <nav aria-label="breadcrumb" class="nav-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Permohonan Proses Kasi</li>
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
                            <th>Nama Pemohon</th>
                            <th>Jenis Layanan PTSP</th>
                            <th>Tanggal Permohonan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_permohonan as $permohonan) {
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $permohonan->nama ?></td>
                                <td><?= $permohonan->nama_layanan ?></td>
                                <td><?= format_indo(date($permohonan->tgl_permohonan)); ?></td>
                                <td><label class="badge badge-info"><i class="far fa-clock"> <?= $permohonan->status ?></i>
                                    </label></td>
                                <td class="text-center">
                                    <div>
                                        <a href="<?= base_url() ?>dashboard/detail_data_permohonan/<?= $permohonan->id_permohonan_ptsp ?>/<?= $permohonan->id_layanan ?>" class="btn btn-primary btn-sm">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </div>
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