<div class="container-fluid">
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <?=$title?>
                </div>
                <div class="card-body">
                    <?php if(validation_errors()):?>
                        <div class="alert alert-danger" role="alert">
                            <?=validation_errors()?>
                        </div>
                    <?php endif?>
                    <?=form_open('User/edit')?>
                    <?php foreach($user['value'] as $user);?>
                    <?php foreach($acc['value'] as $acc);?>
                    <table class="table" style="width:100%;">
                        <thead>
                            <th><h4>Profile</h4></th>
                            <th><h4>Account</h4></th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" style="max-width: 25rem;" value="<?=$user['name']?>" required>
                                    </div>                                
                                </td>
                                <td>
                                    <div class="form-group">
                                      <label for="email">E-mail</label>
                                      <input type="email" class="form-control" name="email" id="email" style="max-width: 25rem;" value="<?=$acc['email']?>" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                      <label for="age">Age</label>
                                      <input type="number" class="form-control" name="age" id="age" style="max-width: 25rem;" value="<?=$user['age']?>" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                      <label for="change_pass">Change Password</label><br>
                                      <a href="<?=base_url()?>User/change_pass" class="btn btn-danger">Change Password</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                      <label for="address">Address</label>
                                      <input type="text" class="form-control" name="address" id="address" style="max-width: 25rem;" value="<?=$user['address']?>" required>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-muted">
                    <button type="submit" class="btn btn-primary float-right">Modify</button>
                    <?=form_close()?>
                    <a href="<?=base_url()?>User" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>