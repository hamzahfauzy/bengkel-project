<?php
get_header();
$attr  = ['class' => "form-control"];
?>
<style>
  .select2 {
    width: 100% !important
  }
</style>
<div class="card">
  <div class="card-header d-flex flex-grow-1 align-items-center">
    <p class="h4 m-0"><?php get_title() ?></p>
  </div>
  <div class="card-body">
    <?php if ($error_msg): ?>
      <div class="alert alert-danger"><?= $error_msg ?></div>
    <?php endif ?>
    <form action="<?= routeTo('workshop/invoices/edit-sales', ['code' => $code]) ?>" method="post" onsubmit="if(items.length == 0){ alert('Sorry! Item cannot empty'); return false }else{ return true }" enctype="multipart/form-data">
      <?= csrf_field() ?>
      <input type="hidden" name="ws_invoices[record_type]" value="<?= $record_type ?>" id="record_type">
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="row mb-3">
            <label class="mb-2 col-4">Invoice No.</label>
            <div class="col-8">
              <input type="text" name="ws_invoices[code]" class="form-control" value="<?= $code ?>" readonly>
            </div>
          </div>
          <div class="row mb-3">
            <label class="mb-2 col-4">Total Price</label>
            <div class="col-8">
              <input type="text" name="ws_invoices[total_price]" class="form-control" value="<?= number_format($sales->total_price) ?>" readonly>
            </div>
          </div>
          <div class="row mb-3">
              <label class="mb-2 col-4">Diskon</label>
              <div class="col-8">
                  <input type="text" name="ws_invoices[total_discount]" class="form-control" value="<?= number_format($sales->total_discount) ?>" id="total_discount" readonly>
              </div>
          </div>
          <?php if ($record_type == 'SALES'): ?>
            <div class="row mb-3">
              <label class="mb-2 col-4">Inspection</label>
              <div class="col-8">
                <select name="ws_invoices[inspection_id]" id="inspection_id" class="form-control">
                  <option value="">- Pilih -</option>
                  <?php foreach ($inspections as $inspection): ?>
                    <option value="<?= $inspection->id ?>" <?=$sales->inspection_id == $inspection->id ? 'selected=""' : ''?> data-customer="<?= $inspection->customer_id ?>" data-customername="<?= $inspection->customer_name ?>"><?= $inspection->code ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label class="mb-2 col-4">Due Date</label>
              <div class="col-8">
                <input type="date" name="ws_invoices[due_date]" class="form-control" value="<?= date($sales->due_date) ?>">
              </div>
            </div>
          <?php endif ?>
        </div>
        <div class="col-12 col-md-6">
          <?php if ($record_type == 'SALES'): ?>
            <div class="row mb-3">
              <label class="mb-2 col-4">Customer</label>
              <div class="col-8">
                <input type="hidden" name="ws_invoices[customer_id]" id="customer_id" value="<?= $sales->customer_id ?>">
                <div class="d-flex">
                  <input type="text" name="customer_name" id="customer_name" class="form-control" value="<?= $sales->customer->name ?>" required placeholder="Type new customer name">
                  <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#customerModal" style="width:150px">or Choose</button>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label class="mb-2 col-4">Pajak (%)</label>
              <div class="col-8">
                  <input type="text" name="ws_invoices[tax_alias]" id="tax_alias" value="<?= $sales->tax_alias ?>" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label class="mb-2 col-4">Pajak (Rp)</label>
              <div class="col-8">
                  <input type="text" name="ws_invoices[tax_price]" id="tax_price" value="<?= $sales->tax_price ?>" class="form-control" readonly>
              </div>
            </div>
          <?php endif ?>
          <div class="row mb-3">
            <label class="mb-2 col-4">Total Qty</label>
            <div class="col-8">
              <input type="text" name="ws_invoices[total_qty]" class="form-control" value="<?= $sales->total_qty ?>" readonly>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group mb-3 table-responsive">
        <table class="table table-bordered table-item">
          <thead>
            <tr>
              <th>No</th>
              <th>Product</th>
              <th>Price</th>
              <th>Discount</th>
              <th>Unit</th>
              <th>Qty</th>
              <th>Sub Total</th>
              <th>
                <?php if ($record_type == 'SALES'): ?>
                  <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#serviceModal">Tambah Servis</button>
                <?php endif ?>
                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#itemModal">Tambah Sparepart</button>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($sales->items as $index => $item): ?>
              <tr id="item_<?= $index + 1 ?>">
                <td>
                  <input type="hidden" name="items[<?= $index ?>][id]" value="<?= $item->id ?>">
                  <input type="hidden" name="items[<?= $index ?>][base_price]" value="<?= $item->base_price ?>" data-key="<?= $index ?>">
                  <?= $index + 1 ?>
                </td>
                <td><?= $item->product->name ?></td>
                <td><?= number_format($item->base_price) ?></td>
                <td><input type="number" class="form-control discount-input" style="width:100px" name="items[<?= $index ?>][discount]" value="<?= $item->total_discount ?>" data-key="<?= $index + 1 ?>">
                <td><?= $item->product->unit ?></td>
                <td><input type="number" step=".1" class="form-control qty-input" style="width:100px" name="items[<?= $index ?>][qty]" value="<?= $item->qty ?>" data-key="<?= $index + 1 ?>">
                </td>
                <td id="price-<?= $index + 1 ?>"><?= number_format($item->total_price) ?></td>
                <td><button class="btn btn-sm btn-danger remove-item-button" type="button" data-target="#item_<?= $index + 1 ?>" data-key="<?= $index + 1 ?>"><i class="fas fa-trash"></i></button></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div class="form-group">
        <button class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="itemModal" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="itemModalLabel">Form Item</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group mb-3">
          <label class="mb-2 w-100">Product</label>
          <select name="product" id="" class="form-control select2insidemodal">
            <option value="">- Pilih -</option>
            <?php foreach ($products as $product): ?>
              <option value="<?= $product->id ?>" data-type="<?= $product->record_type ?>" data-unit="<?= $product->unit ?>" data-price="<?= $product->price ?>"><?= $product->name ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add-item-button" data-select="product">Add</button>
      </div>
    </div>
  </div>
</div>

<?php if ($record_type == 'SALES'): ?>
  <div class="modal fade" id="serviceModal" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="serviceModalLabel">Form Servis</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label class="mb-2 w-100">Servis</label>
            <select name="service" id="" class="form-control select2insidemodal2">
              <option value="">- Pilih -</option>
              <?php foreach ($services as $service): ?>
                <option value="<?= $service->id ?>" data-type="<?= $service->record_type ?>" data-unit="<?= $service->unit ?>" data-price="<?= $service->price ?>"><?= $service->name ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary add-item-button" data-select="service">Add</button>
        </div>
      </div>
    </div>
  </div>
<?php endif ?>

<div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="customerModalLabel">Form Customer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group mb-3">
          <label class="mb-2 w-100">Customer</label>
          <select id="customerSelect" class="form-control select2insidemodal3">
            <option value="">- Pilih -</option>
            <?php foreach ($customers as $customer): ?>
              <option value="<?= $customer->id ?>"><?= $customer->name ?> - (<?= $customer->phone ?>)</option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary use-walking-guest" data-bs-dismiss="modal">Using new customer</button>
        <button type="button" class="btn btn-primary add-customer-button">Add</button>
      </div>
    </div>
  </div>
</div>
<?php get_footer() ?>

<script>
  var oldItems = <?= json_encode($sales->items) ?>

  oldItems.map((item, index) => {
    items.push({
      key: index + 1,
      id: item.id,
      name: item.product.name,
      unit: item.product.unit,
      qty: parseInt(item.qty),
      price: parseFloat(item.base_price),
      total_price: parseFloat(item.total_price),
      product: item.product_id,
      product_type: item.product.type,
      discount:0,
    })
  })
</script>