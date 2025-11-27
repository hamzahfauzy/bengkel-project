<?php
ob_start(); 
?>
<button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#filterModal">Filter</button>

<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="filterModalLabel">Filter</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="">
        <input type="hidden" name="table" value="ws_services">
      <div class="modal-body">
        <div class="form-group mb-3">
            <label class="mb-2 w-100">Kustomer</label>
            <input type="text" name="_filter[customer]" id="" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label class="mb-2 w-100">Merk Kendaraan</label>
            <input type="text" name="_filter[vehicle_merk]" id="" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label class="mb-2 w-100">Tipe Kendaraan</label>
            <input type="text" name="_filter[vehicle_type]" id="" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label class="mb-2 w-100">Nomor Polisi</label>
            <input type="text" name="_filter[police_number]" id="" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label class="mb-2 w-100">Alamat Customer</label>
            <textarea class="form-control" name="_filter[customer_address]"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php

$html_content = ob_get_clean(); 
return $html_content;

?>