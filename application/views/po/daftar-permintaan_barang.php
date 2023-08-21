<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Pengajuan Barang
                </h4>
            </div>
            <div class="col-auto">
                <!-- <a href="<?= base_url('supplier/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Supplier
                    </span>
                </a> -->
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Pengaju</th>
                    <th>Nama Barang</th>
                    <th>Jenis Barang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($barang_pengajuan) :
                    $no = 1;
                    foreach ($barang_pengajuan as $s) :
                        $user = $this->admin->get('user', ['id_user'=>$s['user_id']]);
                        $jenis_barang = $this->admin->get('jenis', ['id_jenis' => $s['jenis_id']])
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $user['nama']; ?></td>
                            <td><?= $s['nama_barang']; ?></td>
                            <td><?= $jenis_barang['nama_jenis']; ?></td>
                            <th>
                                <a href="" class="btn btn-circle btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin hapus?')" href="" class="btn btn-circle btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </th>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>