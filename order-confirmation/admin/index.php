<?php

include 'inc/header.php';

include('config.php');

 
?>


<script type="text/javascript" src="http://socialcircle.biz/sendmail/admin/inc/jquery.min.js"></script>
	<script type="text/javascript" src="http://socialcircle.biz/sendmail/admin/inc/jquery.totemticker.js"></script>
	<script type="text/javascript">
		$(function(){
			$('#vertical-ticker').totemticker({
				row_height	:	'100px',
				
				start		:	'#start',
				mousestop	:	true,
			});
		});
	</script>


<style>



.left_column

{

float:left;

width: 30%;

padding: 10px;  

}



.middle_column

{

float:left;

width: 30%;

padding: 10px;          

}



.right_column

{

float:right;

width: 30%;

padding: 10px;

}



</style>

  <div id="main_body" class="row">
    <div id="main" class="col-md-12">
    <div style="background:#000; opacity:0.7; padding:15px; color:#fff;">

    	<h2>Social Connect</h2>
 
      Hi, All welcome to The Social Connect.

	  </div>

	  



    </div>
 

  </div>

  <!-- end main_body -->
  
<?php

include 'inc/footer.php';

?>



 