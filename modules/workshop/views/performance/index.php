<?php get_header(); ?>
<style>.select2 {width:100% !important}</style>
<div class="card">
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

        <div class="table-responsive">
            <table class="table table-bordered table-item">
                <thead>
                    <tr>
                        <th width="40px">No</th>
                        <th>Karyawan</th>
                        <th>Total Kehadiran</th>
                        <th>Total Cuti</th>
                        <th>Total Pekerjaan</th>
                        <th>Total Transaksi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($employees as $index => $employee): ?>
                    <tr>
                        <td><?=$index+1?></td>
                        <td><?=$employee->name?></td>
                        <td><?=number_format($employee->total_presence)?></td>
                        <td><?=number_format($employee->total_leave)?></td>
                        <td><?=number_format($employee->total_task)?></td>
                        <td>Rp. <?=number_format($employee->total_transaction ?? 0)?></td>
                        <td>
                            <a href="<?= routeTo('workshop/performance/detail', ['employee_id' => $employee->id, 'start_date' => isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-d'), 'end_date' => isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d')]) ?>" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Detail</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    <?php if(empty($employees)): ?>
                    <tr>
                        <td colspan="6"><i>Data not Found!</i></td>
                    </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php get_footer() ?>
