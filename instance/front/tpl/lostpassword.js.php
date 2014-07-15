<script type="text/javascript">
    $(document).ready(function(){ 
        //uploadify - multiple uploads
        $('#file_upload').uploadify({
            'fileTypeDesc' : 'School Logo',
            'fileTypeExts' : '*.img; *.jpg; *.gif', 
            'multi':false,
            'buttonText': 'Upload School Logo',
            'removeCompleted' : false,
            'fileSizeLimit' : '100MB',
            'swf'      : '<?php print _MEDIA_URL ?>misc/uploadify.swf',
            'uploader' : '<?php print _U ?>handleUpload',
            'formData' : { '<?php echo session_name(); ?>' : '<?php echo session_id(); ?>' }
            // Put your options here
        }); 
    });
   

</script>