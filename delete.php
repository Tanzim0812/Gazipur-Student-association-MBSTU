<?php
 include "dbcon.php";
 if (isset($_GET['image'])) {
 
 	$del_img=$_GET['image'];
 	
 	$que="DELETE FROM tbl_uploads WHERE id=$del_img";
 	$res=mysqli_query($conn,$que);
 	if ($res) {


 	?>

 	<script>
 		alert('image deleted');
 		window.location.href='admin.php?deleted';

 	</script>
 	<?php
 	unlink('images/$del_img');
 }

 	else{
 		?>

 			<script>
 				
 				alert('image not deleted');
 				window.location.href='admin.php?error';
 			</script>
 			<?php
 		}}
 		?>

 




