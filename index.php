<?php
require_once "vendor/autoload.php";

use Myclasses\Crud\Crud;
$crud = new Crud();

include_once 'header.php'; 

?>

<div class="clearfix"></div>

<div class="container">
	<a href="add.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Records</a>
</div>

<div class="clearfix"></div><br />

<div class="container">
     <table class='table table-bordered table-responsive'>
	     <tr>
			<th>SN</th>
			<th>Name</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Status</th>
			<th colspan="2" align="center">Actions</th>
	     </tr>
 	
 		<?php $tasks = $crud->getAll('tasks',array('id','name','start_date','end_date','status'));

 			$sn = 1;
	     	if(!empty($tasks)):
		     	foreach($tasks  as $task ): ?>
			     	<tr>
			     		<td><?php echo $sn; ?></td>
			     		<td><?php echo $task['name']; ?></td>
			     		<td><?php echo $task['start_date']; ?></td>
			     		<td><?php echo $task['end_date']; ?></td>
			     		<td><?php echo $task['status']; ?></td>
			     		<td align="center">
		                	<a href="edit.php?id=<?php print($task['id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
		                </td>
		                <td align="center">
		                	<a href="delete.php?id=<?php print($task['id']); ?>" class="delete"><i class="glyphicon glyphicon-remove-circle"></i></a>
		                </td>
			     	</tr>
		     	<?php 
		     	$sn++; 
	     		endforeach;
	     	endif;
	     ?>
</table>
       
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(".delete").click(function(){
			if (confirm('Are you sure you want delete this task?')) 
			    return true;
			else
			    return false;
		})
	})
</script>
<?php include_once 'footer.php'; 