<?php
    foreach($user['value'] as $user);
?>
<br>
<div class="container">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title"><?=$user['name']?>'s Schedule</h3><br>
            <p class="card-text"></p>
            <div class="card-columns" style="width: 40rem; min-height:300px;">
                <?php foreach($schedule['value'] as $item):?>
                <div class="card">
                    <div class="card-body bg-info text-white">
                        <h4 class="card-title"><?=$item['day']?></h4>
                        <p class="card-text" style="width=2em;"><?=date('h:i A',strtotime($item['entry_hour']))?>
                         - 
                         <?=date('h:i A',strtotime($item['out_hour']))?></p>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
                <div class="card-footer text-muted">
                    <a href="<?=base_url()?>User/home" class="btn btn-primary">Back</a>
                </div>
          </div>
        </div>
      </div>
</div>