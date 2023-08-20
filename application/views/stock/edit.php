<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Edit MinMax
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('satuan') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <?= form_open('', [], ['id_minmax' => $minmax['id_minmax']]); ?>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="barang_id">Barang</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select name="barang_id" id="barang_id" class="custom-select">
                                <option value="" selected disabled>Pilih Barang</option>
                                <?php foreach ($barang as $b) : ?>
                                    <option value="<?= $b['id_barang'] ?>" <?php echo ($minmax['barang_id'] == $b['id_barang'] ? "selected" : "") ?>><?= $b['id_barang'] . ' | ' . $b['nama_barang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn btn-primary" href="<?= base_url('barang/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('barang_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="jumlah_minimal">Jumlah Minimal</label>
                    <div class="col-md-5">
                        <input value="<?= set_value('jumlah_minimal', $minmax['jumlah_minimal']); ?>" name="jumlah_minimal" id="jumlah_minimal" type="number" class="form-control">
                        <?= form_error('jumlah_minimal', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="jumlah_maximal">Jumlah Maximal</label>
                    <div class="col-md-5">
                        <input value="<?= set_value('jumlah_maximal', $minmax['jumlah_maximal']); ?>" name="jumlah_maximal" id="jumlah_maximal" type="number" class="form-control">
                        <?= form_error('jumlah_maximal', '<small class="text-danger">', '</small>'); ?>                   
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="keterangan">Keterangan</label>
                    <div class="col-md-5">
                        <input value="<?= set_value('keterangan', $minmax['keterangan']); ?>" name="keterangan"  id="keterangan" type="text" class="form-control">
                        <?= form_error('tanggal_keterangan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>