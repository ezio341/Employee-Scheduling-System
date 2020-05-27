<div class="container-fluid">
<div class="card">
    <div class="card-header">
        <?=$title?>
        <?php
            $message=$this->session->flashdata('status');?>
            <?php if(isset($message)):?>
                <div class='alert alert-info dismissible fade show' role='alert'>
                    <?=$message?>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button> 
                </div>
            <?php 
                endif;
            ?>

    </div>
    <div class="card-body">
    <?php foreach($user['value'] as $user);?>
    <?php foreach($acc['value'] as $acc);?>
        <a href="<?=base_url()?>User/edit">
            <svg class="bi bi-pencil float-right" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
            <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
          </svg>
        </a><br><br>
        <table style="width:100%;" class='table'>
            <thead>
                <th colspan='3'><h4>Profile</h4></th>
                <th colspan='3' class="border-left"><h4>Account</h4></th>
            </thead>
            <tbody>
            <tr>
                <td>Name</td>
                <td>:</td>
                <td><?=$user['name']?></td>
                <td class="border-left">Employee ID</td>
                <td>:</td>
                <td><?=$acc['emp_id']?></td>
            </tr>
            <tr>
                <td>Age</td>
                <td>:</td>
                <td><?=$user['age']?></td>
                <td class="border-left">Email</td>
                <td>:</td>
                <td><?=$acc['email']?></td>
            </tr>
            <tr>
                <td>Position</td>
                <td>:</td>
                <td><?=$user['position']?></td>
                <td class="border-left">User Name</td>
                <td>:</td>
                <td><?=$acc['username']?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td>:</td>
                <td class="border-right"><?=$user['address']?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="card-footer text-muted">
        <a href="<?=base_url()?>User/home" class="btn btn-primary">Back</a>
    </div>
</div>
</div>
