<div class="m-flx-ctn">
  <p>Title : <b><?= $member['title'] ?></b></p>
  <span class="m-icn" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
</div>
<div class="m-flx-ctn">
  <p>Name : <b><?= $member['name'] ?></b></p>
  <span class="m-icn" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
</div>
<div class="m-flx-ctn">
  <p>Marital Status : <b><?= $member['marital_status'] ?></b></p>
  <span class="m-icn" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
</div>
<div class="m-flx-ctn">
  <p>Residence : <b><?= $member['residence'] ?></b></p>
  <span class="m-icn" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
</div>
<div class="m-flx-ctn">
  <p>Group Name : <b><?= $member['group_name'] ?></b></p>
  <span class="m-icn" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
</div>
<?php if ($member['email'] == '') : ?>
<?php else : ?>
  <div class="m-flx-ctn">
    <p>Email : <b><?= $member['email'] ?></b></p>
    <span class="m-icn" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
  </div>
<?php endif ?>
<div class="m-flx-ctn">
  <p>Phone No : <b><?= $member['contact'] ?></b></p>
  <span class="m-icn" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
</div>
<div class="m-flx-ctn">
  <p>Ministry : <b><?= $member['ministry'] ?></b></p>
  <span class="m-icn" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
</div>
<!-- status -->
<?php if ($member['status'] == 'Active') : ?>
  <div class="m-flx-ctn">
    <p>Status : <b><?= $member['status'] ?></b></p>
    <span class="m-icn active" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
  </div>
<?php elseif ($member['status'] == 'Normal') : ?>
  <div class="m-flx-ctn">
    <p>Status : <b><?= $member['status'] ?></b></p>
    <span class="m-icn normal" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
  </div>
<?php else : ?>
  <div class="m-flx-ctn">
    <p>Status : <b><?= $member['status'] ?></b></p>
    <span class="m-icn inactive" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
  </div>
<?php endif ?>
<div class="m-flx-ctn">
  <p>Date : <b><?= $member['date'] ?></b></p>
  <span class="m-icn" target="_parent" title="verified"><i class="fa fa-check-square"></i></span>
</div>