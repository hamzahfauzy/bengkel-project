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

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>Kustomer</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($customers as $no => $customer): ?>
                        <tr>
                            <td><?=$no+1?></td>
                            <td><?=$customer->customer_name?></td>
                            <td>Rp. <?=number_format($customer->total_transaction)?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ?>
