<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!-- Primary Page Layout -->

  
		<h5>Contact</h5>
<div class="columns">
            
<p>
<div class="main six columns"><li>
I can assist you in converting Excel files to database App.<br>
<li>
From simple contact form to any Web app development.<br>
<li>
Just fill out this form and I will get back to you soon.
</div>
<style>
@media screen and (max-width: 1000px) {
	fieldset{
		float: none !important;
		margin-top: 10% !important;
		
		}
	
	
	}
</style>
			
			<div class="two columns">
			<?php $attributes = array("class" => "form-horizontal", "name" => "contact");
            echo form_open("../../contact/submit", $attributes);?>
			<fieldset>
			<div class="form-group">
                <div >
                    <input class="form-control" name="name" placeholder="Your Name" type="text" value="<?php echo set_value('name'); ?>" />
                    <span class="text-danger"><?php echo form_error('name'); ?></span>
                </div>
            </div>

            <div class="form-group">

                <div >
					                    <?php 
                    echo form_dropdown('subject', //$subject_opts,
			 'other');
                    ?>
                    <span class="text-danger"><?php echo form_error('subject'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <div >

				<input class="form-control" name="email" placeholder="Your Email ID" type="text" value="<?php echo set_value('email'); ?>" />
                    <span class="text-danger"><?php echo form_error('email'); ?></span>

			
                </div>
            </div>

            <div class="form-group">
                <div >
                    <textarea class="form-control" name="message" rows="4" placeholder="Your Message" maxlength="500"><?php echo set_value('message'); ?></textarea>
                    <span class="text-danger"><?php echo form_error('message'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <div >
                    <input name="submit" type="submit" class="btn btn-primary" value="Send" />
                </div>
            </div>
            </fieldset>
            <?php echo form_close(); ?>
            <?php echo $this->session->flashdata('msg'); ?>
</div>
</div>
<!-- End Document -->
