<?php include "inc_files/before_content.code"; ?>
<div id="content">
	<?php
	if (isset($_SESSION['error']))
		{
		echo "<span style='color:green'><b>". $_SESSION['error'] . "</b></span>";
		unset($_SESSION['error']);
		}
	?>
		<p class="image"><img src="inc_files/tel.jpg" title="GSM,2014 г."></p>
		<p class="image"><img src="inc_files/note2.jpg" width="400px" height="400px" title="GSM,2013 г."></p>
		<p class="image"><img src="inc_files/iphone6.jpg" width="400px" height="250px" title="GSM,2015 г."></p>
		</div>
		<?php include "inc_files/after_content.code"; ?>