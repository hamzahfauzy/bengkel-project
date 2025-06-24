<?php get_header(); ?>
<style>.select2 {width:100% !important}</style>
<div class="card">
    <div class="card-header d-flex flex-grow-1 align-items-center">
        <p class="h4 m-0"><?php get_title() ?></p>
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
                        <th></th>
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
                    <?php if(empty($tasks)): ?>
                    <tr>
                        <td colspan="3"><i>Data not Found!</i></td>
                    </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>

        <h4>Tasks</h4>
        <?php if($employee->record_type == 'REGULAR'): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-item">
                <thead>
                    <tr>
                        <th width="40px">No</th>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th></th>
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
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tasks as $index => $task): ?>
                    <tr>
                        <td><?=$index+1?></td>
                        <td><?=$task->description?></td>
                        <td><?=date('d-m-Y H:i', strtotime($task->created_at))?></td>
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
    </div>
</div>

<?php get_footer() ?>
