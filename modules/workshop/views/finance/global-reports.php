<?php get_header(); ?>
<style>.select2 {width:100% !important}</style>
<div class="card mb-4">
    <div class="card-header d-flex flex-grow-1 align-items-center">
        <p class="h4 m-0"><?php get_title() ?></p>
    </div>
    <div class="card-body">
        <form action="">
            <div class="row mb-4">
                <div class="col">
                    <label>Start Date</label>
                    <input type="date" name="start_date" class="form-control filters" id="" value="<?=isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-d')?>">
                </div>
                <div class="col">
                    <label>End Date</label>
                    <input type="date" name="end_date" class="form-control filters" id="" value="<?=isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d')?>">
                </div>
                <div class="col">
                    <label for="">&nbsp;</label>
                    <div>
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row mb-4">
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
<div class="row mb-4">
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

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const chartData = <?=json_encode($graphic)?>;

// Pisahkan data untuk label dan dataset
const labels = chartData.map(item => item.bulan);
const totalService = chartData.map(item => item.total_service);
const totalSparepart = chartData.map(item => item.total_sparepart);
const totalOmset = chartData.map(item => (parseInt(item.total_service)+parseInt(item.total_sparepart)));
const totalPemasukan = chartData.map(item => (parseInt(item.total_pemasukan)));
const totalPengeluaran = chartData.map(item => (parseInt(item.total_pengeluaran)));
const totalDiscount = chartData.map(item => (parseInt(item.total_discount)));

// Inisialisasi Chart
const ctx = document.getElementById('myChart').getContext('2d');
const serviceSparepartChart = new Chart(ctx, {
    type: 'bar',  // bisa diganti 'line' untuk line chart
    data: {
        labels: labels,
        datasets: [
            {
                label: 'Total Service',
                data: totalService,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },
            {
                label: 'Total Sparepart',
                data: totalSparepart,
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            },
            {
                label: 'Total Penjualan',
                data: totalOmset,
                backgroundColor: 'rgba(99, 255, 151, 0.5)',
                borderColor: 'rgb(99, 255, 159)',
                borderWidth: 1
            },
            {
                label: 'Total Pemasukan',
                data: totalPemasukan,
                backgroundColor: 'rgba(212, 235, 11, 0.5)',
                borderColor: 'rgba(232, 255, 99, 1)',
                borderWidth: 1
            },
            {
                label: 'Total Pengeluaran',
                data: totalPengeluaran,
                backgroundColor: 'rgba(255, 182, 99, 0.5)',
                borderColor: 'rgba(255, 206, 99, 1)',
                borderWidth: 1
            },
            {
                label: 'Total Discount',
                data: totalDiscount,
                backgroundColor: 'rgba(224, 99, 255, 0.5)',
                borderColor: 'rgba(237, 99, 255, 1)',
                borderWidth: 1
            }
        ]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<?php get_footer() ?>
