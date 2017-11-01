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

		 GitHub Updates:
		 <hr style="border-color: #474747;margin: 0px 0 20px 0px;width: 20%;">
<?php

#var_dump($commits);
foreach ($commits as $it=>$item){
	if (is_array($item)){
		foreach ($item as $it2=>$item2){
				if (is_array($item2)){
					if(array_key_exists('author', $item2)){
					#	var_dump($item2);
						foreach ($item2 as $it3=>$item3){
							if($it3 == 'author'){
								echo "<p>".$item3['date']." ";
							}
							if($it3 == 'message'){
								echo "<b>".$item3 ."</b></p>";
							}

						
						}
		};
		};
		};
	};
};

	

	?>
			</div>
		


<!-- End Document -->
