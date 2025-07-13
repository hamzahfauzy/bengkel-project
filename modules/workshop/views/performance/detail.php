<?php get_header(); ?>
<div class="card">
    <div class="card-header d-flex flex-grow-1 justify-content-between">
        <p class="h4 m-0"><?php get_title() ?> (<?=date('d-m-Y', strtotime($start_date))?> - <?=date('d-m-Y',strtotime($end_date))?>)</p>
        <div>
            <a href="<?=routeTo('workshop/performance/detail', ['employee_id' => $employee->id, 'print' => true, 'start_date' => date('Y-m-d', strtotime($start_date)), 'end_date' => date('Y-m-d',strtotime($end_date))])?>" target="_blank" class="btn btn-success">Cetak</a>
        </div>
    </div>
    <div class="card-body">
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
                        <th>Kendaraan</th>
                        <th>Tanggal</th>
                        <th>Nilai Faktur</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; foreach($tasks as $index => $task): $total += $task->final_price ?? 0; ?>
                    <tr>
                        <td><?=$index+1?></td>
                        <td><?=$task->inspection_code?> <?=$task->description ? '-'.$task->description : ''?></td>
                        <td><?=$task->vehicle_name?></td>
                        <td><?=date('d-m-Y H:i', strtotime($task->created_at))?></td>
                        <td>Rp. <?=number_format($task->final_price ?? 0)?></td>
                    </tr>
                    <?php endforeach ?>
                    <?php if(empty($tasks)): ?>
                    <tr>
                        <td colspan="5"><i>Data not Found!</i></td>
                    </tr>
                    <?php else: ?>
                    <tr><td colspan="4">Total</td><td>Rp. <?=number_format($total)?></td></tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
        <?php endif ?>
    </div>
</div>

<?php get_footer() ?>
