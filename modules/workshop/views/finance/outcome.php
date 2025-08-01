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
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex" style="gap: 10px;">
                    <div class="data-section">
                        <h5 class="p-0">Total Pengeluaran</h5>
                        <h3>Rp. <?=number_format($outcome->total_outcome) ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($outcomes as $no => $outcome): ?>
                        <tr>
                            <td><?=$no+1?></td>
                            <td><?=$outcome->hari?></td>
                            <td>Rp. <?=number_format($outcome->total_outcome)?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
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

// Inisialisasi Chart
const ctx = document.getElementById('myChart').getContext('2d');
const serviceSparepartChart = new Chart(ctx, {
    type: 'bar',  // bisa diganti 'line' untuk line chart
    data: {
        labels: labels,
        datasets: [
            {
                label: 'Total Pengeluaran',
                data: totalService,
                backgroundColor: 'rgba(99, 255, 151, 0.5)',
                borderColor: 'rgb(99, 255, 159)',
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
