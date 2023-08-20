<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Stock 
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('Stock/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Setting MinMax
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Minimal</th>
                    <th>Jumlah Maximal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($stock) :
                    foreach ($stock as $j) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $j['id_barang']; ?></td>
                            <td><?= $j['nama_barang']; ?></td>
                            <td><?= $j['jumlah_minimal']; ?></td>
                            <td><?= $j['jumlah_maximal']; ?></td>
                            <td>
                                <a href="<?= base_url('stock/edit/') . $j['id_minmax'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>