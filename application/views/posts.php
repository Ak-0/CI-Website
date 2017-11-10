<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>p {
    background: whitesmoke;
    border-radius: 7px;
    padding: 5px;
}</style>
  <!-- Primary Page Layout -->

  
		<h5>Posts</h5>		<div class="main eleven columns">

		<a href="https://github.com/Ak-0/CI-Website"> GitHub Updates:</a>
		 <hr style="border-color: #474747;margin: 0px 0 20px 0px;width: 20%;">
<?php
$updates = json_decode (json_encode ($commits), FALSE);
foreach($updates as $commit)
{
	echo(date('M-d',strtotime($commit->commit->author->date)));
	if(isset($commit->author)){	echo('<p>'.$commit->author->login.' ');}
	echo(' <a href ="'.$commit->html_url.'">'.$commit->commit->message.'</a></p>');
}







	

	?>
			</div>
		


<!-- End Document -->
