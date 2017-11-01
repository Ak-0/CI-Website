<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<script src="//cdn.ckeditor.com/4.7.2/standard/ckeditor.js"></script>
<h5><?php echo $title; ?></h5>
<font color=black>

<?php echo validation_errors(); ?>

<?php echo form_open('news/create'); ?>
    <label for="title">Title</label>
    <input class="form-control" type="text" name="title"/><br />

    <label for="text">Text</label>
		<?php echo form_textarea($textarea); ?>
	<br />

    <input type="submit" name="submit" value="Create" />
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'text' );
            </script>
</form></font>
