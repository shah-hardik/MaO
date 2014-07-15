<?php if ($error): ?>
    <div class="alert alert-error">
        <strong>Sorry!</strong> &nbsp;&nbsp;<?php print $error ?>
    </div>
<?php endif; ?>

<?php if ($greetings): ?>
    <div class="alert alert-success">
        <strong>Success!</strong> &nbsp;&nbsp;<?php print $greetings ?>
    </div>
<?php endif; ?>