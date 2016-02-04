<?php

ob_start();

include 'inc/header.php';

include('config.php');

?>



<?php

	if (!isset($_SESSION['valid'])) {

		header('Location: redirect.php?action=invalid_permission');	

	} 
  
  $query = "SELECT * FROM `ras_companyinfo` ORDER BY `id` ASC"; 
   $result = $conn->query($query);
 

?>
 
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
table a{color:#fff;}

 
</style>

  <div id="main_body" class="row">

    <div id="main" class="col-md-12">
    <div style="background: rgb(96, 95, 30) none repeat scroll 0% 0%; opacity: 0.88; padding: 15px; color: rgb(255, 255, 255);">
    	 
    	<h3>All Company  Users</h3>
           
			  <table width="100%" border="1" cellspacing="0" cellpadding="6">
              <tbody>
                 
				
 <tr>
 <td>Client Id</td>  
 <td>User Name</td>  
 <td>Email</td>
    
 
 
     
</tr>
				
				<?php 
					 
					$item_num = 1;
					while($row = $result->fetch_assoc()) {
				?>
				
				
                <tr>
<td><?php echo $row['client_id'];?></td>  
<td><a href="user_by_id.php?username=<?php echo $row['fname'];?>"><?php echo stripslashes(ucfirst($row['fname']));?></a></td>
 <td><?php echo $row['email'];?></td>
   
</tr>
               

			<?php //$i++;
                $item_num ++; } ?>
			</tbody>
			</table>
			 

    </div>
    <div style="clear:"><!--//--></div>
    </div>

   

    

     
  </div>

   

  

<?php

include 'inc/footer.php';

?>



 