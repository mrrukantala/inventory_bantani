<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Edit Barang
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('barang') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Kembali
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open('', [], ['id_pengajuan' => $barang_pengajuan['id_pengajuan'],'user_id' => $barang_pengajuan['user_id'], 'status' => $barang_pengajuan['status']]); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_barang">Nama Barang</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_barang', $barang_pengajuan['nama_barang']); ?>" name="nama_barang" id="nama_barang" type="text" class="form-control" placeholder="Nama Barang...">
                        <?= form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="jenis_id">Jenis Barang</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <select name="jenis_id" id="jenis_id" class="custom-select">
                                <option value="" selected disabled>Pilih Jenis Barang</option>
                                <?php foreach ($jenis as $j) : ?>
                                    <option <?= set_select('jenis_id', $j['id_jenis']) ?> value="<?= $j['id_jenis'] ?>" <?php echo ($barang_pengajuan['jenis_id'] == $j['id_jenis'] ? 'selected' : '') ?>><?= $j['nama_jenis'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn btn-primary" href="<?= base_url('jenis/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('jenis_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="jumlah">Jumlah</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('jumlah', $barang_pengajuan['jumlah']); ?>" name="jumlah" id="jumlah" type="number" class="form-control">
                        <?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <?php if ($barang_pengajuan['status'] == 'pengajuan' && is_direktur()) {
                            ?>
                            <a href="<?= base_url('pengajuanbarang/konfirmasi/') . $barang_pengajuan['id_pengajuan']."/1" ?>" class="btn btn-success">Setuju</a>
                            <a href="<?= base_url('pengajuanbarang/konfirmasi/') . $barang_pengajuan['id_pengajuan']."/2" ?>" class="btn btn-danger">Tolak</a>
                        <?php
                        }
                        ?>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</bu>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>