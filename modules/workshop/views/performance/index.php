<?php get_header(); ?>
<style>.select2 {width:100% !important}</style>
<div class="card">
    <div class="card-header d-flex flex-grow-1 align-items-center">
        <p class="h4 m-0"><?php get_title() ?></p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-item">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Employee</th>
                        <th>Total Presence</th>
                        <th>Total Leave</th>
                        <th>Total Task</th>
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
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php get_footer() ?>
