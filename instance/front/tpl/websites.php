<div class="row-fluid ">
    <div class="box span12">
        <div class="box-header well" data-original-title >
            <h2><i class="icon-list-alt"></i> Create Website </h2>

        </div>

        <div class="box-content">
            <form class="form-horizontal" enctype="multipart/form-data" name="frmPageManagement" action="" method="post">
                <fieldset>

                    <?php include 'messages.php'; ?>

                    <div class="control-group" >
                        <label class="control-label" for="school_name">Website Name</label>
                        <div class="controls">
                            <input  class="input-xlarge" name="fields[website_name]" id="website_name" type="text" value="" required />
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="form-actions">
                        <input type="hidden" name="fields[website_id]" id="website_id" value="" />

                        <button type="submit" class="btn btn-primary" id="submitPage">Save</button>
                        <button type="submit" class="btn btn-primary display-none" id="editPage">Update</button>


                    </div>

                </fieldset>
            </form>
        </div>
    </div>
</div>

<?php if (isset($_SESSION['user']['user_type']) && $_SESSION['user']['user_type'] == 'general_user') { ?>
    <div class="row-fluid ">
        <div class="box span12">
            <div class="box-header well" data-original-title >
                <h2><i class="icon-list-alt"></i> List of Websites </h2>
            </div>
            <div class="box-content">

                <fieldset>
                    <?php if (!empty($websites)): ?>  
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                <tr>
                                    <th>Website</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th> 
                                </tr>
                            </thead>   
                            <tbody >

                                <?php foreach ($websites as $each_website): ?>
                                    <tr id="website_<?php print $each_website['id'] ?>">
                                        <td>
                                            <a href="<?php print _U ?>records/<?php print $each_website['id'] ?>"><?php print $each_website['link']; ?></a>
                                        </td>
                                        <td>
                                            <?php print _normalDate($each_website['created_at']); ?>
                                        </td>
                                        <td>
                                            <?php print _normalDate($each_website['modified_at']); ?>
                                        </td>
                                        <td>
                                            <i onclick="doUpdateWebsite('<?php print $each_website['id'] ?>')" data-rel="tooltip" title="Click to Edit" class="icon-edit pointer"></i>
                                            <i data-rel="tooltip" onclick="doDeleteWebsite('<?php print $each_website['id'] ?>')" title="Click to Delete"  class="icon-trash pointer "></i>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7">
                                        <?php $error = "No Website exists!"; ?>
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