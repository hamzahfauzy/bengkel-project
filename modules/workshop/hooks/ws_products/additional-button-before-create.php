<?php

ob_start();

?>
<button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Import</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Import Products or Services</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?=routeTo('workshop/products/import')?>" method="post" name="formImport" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="record_type" value="<?= $_GET['filter']['record_type'] ?>">
            <div class="form-group">
                <label for="">File</label>
                <input type="file" name="file" id="" class="form-control">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="formImport.submit()">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php

$button = ob_get_clean();

return $button;