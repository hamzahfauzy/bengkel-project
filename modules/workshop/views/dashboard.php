<?php get_header(); ?>

<form>
    <div class="row mb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-7 d-flex" style="gap:8px">
                        <input type="date" class="form-control" name="start_date" value="<?= isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-01') ?>" style="width:min-content">
                        <input type="date" class="form-control" name="end_date" value="<?= isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d') ?>" style="width:min-content">
                        <button class="btn btn-info">Refresh</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="row">
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex" style="gap: 10px;">
                    <div class="data-section">
                        <h5 class="p-0">Total Pemasukan</h5>
                        <h3>Rp. <?=number_format($totalPemasukan) ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex" style="gap: 10px;">
                    <div class="data-section">
                        <h5 class="p-0">Total Penjualan</h5>
                        <h3>Rp. <?=number_format($allOmset) ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex" style="gap: 10px;">
                    <div class="data-section">
                        <h5 class="p-0">Service</h5>
                        <h3>Rp. <?=number_format($omset->total_service) ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex" style="gap: 10px;">
                    <div class="data-section">
                        <h5 class="p-0">Sparepart</h5>
                        <h3>Rp. <?=number_format($omset->total_sparepart) ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex" style="gap: 10px;">
                    <div class="data-section">
                        <h5 class="p-0">Total Discount</h5>
                        <h3>Rp. <?=number_format($totalDiscount) ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex" style="gap: 10px;">
                    <div class="data-section">
                        <h5 class="p-0">Total Pengeluaran</h5>
                        <h3>Rp. <?=number_format($totalPengeluaran) ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex" style="gap: 10px;">
                    <div class="data-section">
                        <h5 class="p-0">Total Service</h5>
                        <h3><?=number_format(array_sum(array_column($allServices, 'jumlah'))) ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex" style="gap: 10px;">
                    <div class="data-section">
                        <h5 class="p-0">Menunggu</h5>
                        <h3><?=number_format($service_stats['MENUNGGU ANTRIAN']) ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex" style="gap: 10px;">
                    <div class="data-section">
                        <h5 class="p-0">Sedang Dikerjakan</h5>
                        <h3><?=number_format($service_stats['PEKERJAAN SERVICE']) ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex" style="gap: 10px;">
                    <div class="data-section">
                        <h5 class="p-0">Service Selesai</h5>
                        <h3><?=number_format($service_stats['SELESAI']) ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>
