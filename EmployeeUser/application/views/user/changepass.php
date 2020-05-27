
<div class="container"><br>
    <div class="row-md-6">
        <?=form_open('User/change_pass')?>
        <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Change Your Password
                <div class='alert alert-info mt-3' role='alert'>
                    <?php
                        $message=$this->session->flashdata('status');
                        if(isset($message)){
                            echo $message;
                        }else{
                            echo "Insert Your Old and New Password";
                        }
                    ?>
                </div>
                <?php if(validation_errors()):?>
                    <div class="alert alert-danger" role="alert">
                        <?=validation_errors()?>
                    </div>
                <?php endif?>
            </div>
            <div class="card-body">
                <div class="form-group">
                <label for="oldpass">Old Password</label>
                <input type="password" class="form-control" name="oldpass" id="oldpass">
                </div>
                <div class="form-group">
                <label for="newpass">New Password</label>
                <input type="password" class="form-control" name="newpass" id="newpass">
                </div>
                <div class="form-group">
                <label for="confirmpass">Confirm New Password</label>
                <input type="password" class="form-control" name="confirmpass" id="confirmpass">
                </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="submit" name="change_pass" class="btn btn-primary float-right">Submit</button>
                <?=form_close()?>
                <a href="<?=base_url()?>User" class="btn btn-danger">Back</a>
            </div>
        </div>
            
    </div>
</div>