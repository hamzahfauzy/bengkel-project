<?php get_header(); ?>
<style>.select2 {width:100% !important}</style>
<div class="card">
    <div class="card-header d-flex flex-grow-1 align-items-center">
        <p class="h4 m-0"><?php get_title() ?></p>
    </div>
    <div class="card-body">
        <?php if($error_msg): ?>
        <div class="alert alert-danger"><?=$error_msg?></div>
        <?php endif ?>
        <?php if($success_msg): ?>
        <div class="alert alert-success"><?=$success_msg?></div>
        <?php endif ?>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="row mb-3">
                    <label class="mb-2 col-4">Invoice No.</label>
                    <div class="col-8">
                        <?= $invoice->code?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="mb-2 col-4">Total Price</label>
                    <div class="col-8">
                        Rp. <?= number_format($invoice->total_price) ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="mb-2 col-4">Total Payment</label>
                    <div class="col-8">
                        Rp. <?= number_format($invoice->total_payment) ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="row mb-3">
                    <label class="mb-2 col-4">Customer</label>
                    <div class="col-8">
                        <?=$invoice->customer->name?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="mb-2 col-4">Total Qty</label>
                    <div class="col-8">
                        <?=number_format($invoice->total_qty)?>
                    </div>
                </div>
                <?php if($invoice->record_type == 'SALES' && $invoice->vehicle_id): ?>
                <div class="row mb-3">
                    <label class="mb-2 col-4">Vehicle</label>
                    <div class="col-8">
                        <?= $invoice->vehicle->name?> - <?=$invoice->vehicle->police_number?>
                    </div>
                </div>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group mb-3 table-responsive">
            <table class="table table-bordered table-item">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Unit</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($invoice->items as $index => $item): ?>
                    <tr>
                        <td><?=$index+1?></td>
                        <td>(<?=$item->product_type?>) <?=$item->product_name?></td>
                        <td><?=number_format($item->base_price)?></td>
                        <td><?=number_format($item->qty)?></td>
                        <td><?=$item->product_unit?></td>
                        <td><?=number_format($item->final_price)?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="employeeModalLabel">Form Employee</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="service_form">
            <?= csrf_field() ?>
            <input type="hidden" name="invoice_item_id" value="" id="invoice_item_id">
            <div class="form-group mb-3">
                <label class="mb-2 w-100">Employee</label>
                <select name="employee" id="" class="form-control select2insidemodal">
                    <option value="">- Pilih -</option>
                    <?php foreach($employees as $employee): ?>
                    <option value="<?=$employee->id?>"><?=$employee->name?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="document.querySelector('#service_form').submit()">Save</button>
      </div>
    </div>
  </div>
</div>

<?php get_footer() ?>
