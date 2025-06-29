<link rel="stylesheet" href="<?= asset('theme/assets/vendor/css/core.css" class="template-customizer-core-css') ?>" />
<link rel="stylesheet" href="<?= asset('theme/assets/vendor/css/theme-default.css" class="template-customizer-theme-css') ?>" />
<style>
body {
    background-color: #FFF;
}
</style>
<h1><?=get_title()?></h1>
<p>Tanggal Awal : <?=date('d-m-Y', strtotime($start_date))?></p>
<p>Tanggal Akhir : <?=date('d-m-Y', strtotime($end_date))?></p>
<h4>Kehadiran</h4>
<div class="table-responsive">
    <table class="table table-bordered table-item">
        <thead>
            <tr>
                <th width="40px">No</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($presences as $index => $presence): ?>
            <tr>
                <td><?=$index+1?></td>
                <td><?=$presence->record_status?></td>
                <td><?=date('d-m-Y H:i', strtotime($presence->created_at))?></td>
            </tr>
            <?php endforeach ?>
            <?php if(empty($presences)): ?>
            <tr>
                <td colspan="3"><i>Data not Found!</i></td>
            </tr>
            <?php endif ?>
        </tbody>
    </table>
</div>

<h4 class="mt-4">Tasks</h4>
<?php if($employee->record_type == 'REGULAR'): ?>
<div class="table-responsive">
    <table class="table table-bordered table-item">
        <thead>
            <tr>
                <th width="40px">No</th>
                <th>Invoice</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($tasks as $index => $task): ?>
            <tr>
                <td><?=$index+1?></td>
                <td><?=$task->code?></td>
                <td><?=date('d-m-Y H:i', strtotime($task->created_at))?></td>
                <td>
                    <a href="<?= routeTo('workshop/invoice/detail', ['code' => $task->code])?>" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Detail</a>
                </td>
            </tr>
            <?php endforeach ?>
            <?php if(empty($tasks)): ?>
            <tr>
                <td colspan="4"><i>Data not Found!</i></td>
            </tr>
            <?php endif ?>
        </tbody>
    </table>
</div>
<?php else: ?>

<div class="table-responsive">
    <table class="table table-bordered table-item">
        <thead>
            <tr>
                <th width="40px">No</th>
                <th>Inspeksi</th>
                <th>Tanggal</th>
                <th>Nilai Faktur</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($tasks as $index => $task): ?>
            <tr>
                <td><?=$index+1?></td>
                <td><?=$task->inspection_code?> <?=$task->description ? '-'.$task->description : ''?></td>
                <td><?=date('d-m-Y H:i', strtotime($task->created_at))?></td>
                <td>Rp. <?=number_format($task->final_price ?? 0)?></td>
            </tr>
            <?php endforeach ?>
            <?php if(empty($tasks)): ?>
            <tr>
                <td colspan="3"><i>Data not Found!</i></td>
            </tr>
            <?php endif ?>
        </tbody>
    </table>
</div>
<?php endif ?>

<script>
window.print()
</script>