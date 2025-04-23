<?php ob_start(); ?>

<div class="modal fade" id="exampleModal<?=$data->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModal<?=$data->id?>Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal<?=$data->id?>Label">Form Karyawan</h5>
      </div>
      <div class="modal-body">
        <form action="<?= routeTo('workshop/services/set-employee', ['id' => $data->id]) ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group mb-3">
                <label for="" class="mb-2">Karyawan</label>
                <?= \Core\Form::input('options-obj:ws_employees,id,name|record_type,MECHANIC', 'employee_id', ['class' => 'form-control']) ?>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$data->id?>">
Pilih Karyawan
</button>
<?php

$button = ob_get_clean();

if(empty($data->employee_id))
{
    return $button;
}

return '';