<?php
 include "dbcon.php";
 if (isset($_GET['id'])) {
 
 	$del_img=$_GET['id'];
 	
 	$que="DELETE FROM gazipurassoc WHERE id=$del_img";
 	$res=mysqli_query($conn,$que);
 	if ($res) {
 		

 	?>

 	<script>
 		alert('Data deleted');
 		window.location.href='adminuser.php?deleted';

 	</script>
 	<?php
 	
 }

 	else{
 		?>

 			<script>
 				
 				alert('Data not deleted');
 				window.location.href='adminuser.php?error';
 			</script>
 			<?php
 		}}
 		?>

 




