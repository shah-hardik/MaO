<div class="row-fluid ">
    <div class="box span12">
        <div class="box-header well" data-original-title >
            <h2><i class="icon-list-alt"></i> Create User </h2>

        </div>

        <div class="box-content">
            <form class="form-horizontal" enctype="multipart/form-data" name="frmPageManagement" action="" method="post">
                <fieldset>

                    <?php include 'messages.php'; ?>

                    <div class="control-group" >
                        <label class="control-label" for="user_name">Name</label>
                        <div class="controls">
                            <input  class="input-xlarge" name="fields[user_name]" id="user_name" type="text" value="" required />
                        </div>
                    </div>
                    <div class="control-group" >
                        <label class="control-label" for="user_email">E-mail</label>
                        <div class="controls">
                            <input  class="input-xlarge" name="fields[user_email]" id="user_email" type="email" value=""  required />
                        </div>
                    </div>
                    <div class="control-group" id="password_div">
                        <label class="control-label" for="user_password">Password</label>
                        <div class="controls">
                            <input  class="input-xlarge" name="fields[user_password_add]" id="user_password_add" type="password" value="" required/>
                            <input  class="input-xlarg" style="display:none;" name="fields[user_password_edit]" id="user_password_edit" type="password" value="" />
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="form-actions">
                        <input type="hidden" name="fields[user_id]" id="user_id" value="" />
                        <button type="submit" class="btn btn-primary" id="submitPage">Save</button>
                        <button type="submit" class="btn btn-primary display-none" id="editPage">Edit</button>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>
</div>

<?php if (isset($_SESSION['user']['user_type']) && $_SESSION['user']['user_type'] == 'admin') { ?>
    <div class="row-fluid ">
        <div class="box span12">
            <div class="box-header well" data-original-title >
                <h2><i class="icon-list-alt"></i> List of Users </h2>
            </div>
            <div class="box-content">

                <fieldset>
                    <?php if (!empty($users)): ?>  
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th> 
                                </tr>
                            </thead>   
                            <tbody >

                                <?php foreach ($users as $each_user): ?>
                                    <tr id="user_<?php print $each_user['id'] ?>">
                                        <td>
                                            <?php print $each_user['full_name']; ?>
                                        </td>
                                        <td>
                                            <?php print $each_user['email']; ?>
                                        </td>
                                        <td>
                                            <?php print _normalDate($each_user['created_at']); ?>
                                        </td>
                                        <td>
                                            <?php print _normalDate($each_user['modified_at']); ?>
                                        </td>
                                        <td>
                                            <i onclick="doUpdateUser('<?php print $each_user['id'] ?>')" data-rel="tooltip" title="Click to Edit" class="icon-edit pointer"></i>
                                            <i data-rel="tooltip" onclick="doDeleteUser('<?php print $each_user['id'] ?>')" title="Click to Delete"  class="icon-trash pointer "></i>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7">
                                        <?php $error = "No User exists!"; ?>
                                        <?php include "messages.php"; ?>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    <?php endif; ?> 
                </fieldset>
            </div>
        </div>
    </div>
<?php } ?>