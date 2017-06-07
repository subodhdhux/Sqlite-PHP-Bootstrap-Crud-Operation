<?php
	require_once "vendor/autoload.php";
    use Myclasses\Crud\Crud;
    use Myclasses\Form\Validation;

    $crud = new Crud();
    $validation = new Validation();
	
	include_once 'header.php'; 

	if(isset($_GET['id']))
	 	$id = $_GET['id'];
	else
		header("Location: index.php");

	$errors = array();

	if(isset($_POST['update']))
	{
		$data = array( 
					'name' => $_POST['name'],
	                'description' => $_POST['description'],
	                'start_date' => $_POST['start_date'],
	                'end_date' => $_POST['end_date'],
	                'status' => $_POST['status'],
	            );
	 

		$rules = array( 
					'name' => 'required',
	                'description' => 'required'
	            );

		$validation->setRules($rules);
		if($validation->Check())
		{
			if($crud->update('tasks',$id,$data))
			{
				 $msg = "<div class='alert alert-info'>
				    <strong>WOW!</strong> Task Updated Successfully <a href='index.php'>List</a>!
				    </div>";
			}
			else
			{
				 $msg = "<div class='alert alert-warning'>
				    <strong>SORRY!</strong> Error While Updating !
				    </div>";
			}
		}
		else
		{
			$errors = $validation->errors;
		}



		
	}

	if($crud->getOne('tasks',$id))
		extract($crud->getOne('tasks',$id));
	else
		header("Location: index.php");
?>

<div class="clearfix"></div>

<div class="container">
	<?php
		
		if(isset($msg))
			echo $msg;
	?>
</div>

<div class="clearfix"></div><br />

<div class="container">
    <form method='post' name="task" id="task">
    	<table class='table table-bordered'>
	        <tr>
	            <td>Name</td>
	            <td><input type='text' name='name' id="name" class='form-control' value="<?php echo set_value('name',$name); ?>" >
	            	<?php if(isset($errors['name'])): ?>
		            	<label id="name-error" class="error" for="name"><?php echo $errors['name']; ?></label>
		            <?php endif; ?> 
	            </td>
	        </tr>
	        <tr>
	            <td>Description</td>
	            <td><textarea name='description' id="description" class='form-control' ><?php echo set_value('description',$description); ?></textarea>
	            	<?php if(isset($errors['description'])): ?>
		            	<label id="description-error" class="error" for="description"><?php echo $errors['description']; ?></label>
		            <?php endif; ?> 
	            </td>
	            	
	        </tr>
	        <tr>
	            <td>Start Date</td>
	            <td><input type='text' name='start_date' id="start_date" class='form-control' value="<?php echo set_value('start_date',$start_date); ?>" ></td>
	        </tr>
	        <tr>
	            <td>End date</td>
	            <td><input type='text' name='end_date' id="end_date" value="<?php echo set_value('end_date',$end_date); ?>"  class='form-control' ></td>
	        </tr>
	        <tr>
	            <td>Status</td>
	            <td>
	            <input type="radio" name="status" value="Active" <?php echo set_radio('status', 'Active', $status, true); ?>> Active
	            <input type="radio" name="status" value="Closed" <?php echo set_radio('status', 'Closed', $status); ?>> Closed
	           <!--  <input type='text' name='status' id="status" value="<?php echo set_value('status',$status); ?>"  class='form-control' >
	            	<?php if(isset($errors['status'])): ?>
		            	<label id="name-error" class="error" for="status"><?php echo $errors['status']; ?></label>
		            <?php endif; ?>  -->
	            </td>
	            	
	        </tr>
	            <td colspan="2">
	                <button type="submit" class="btn btn-primary" name="update">
				       <span class="glyphicon glyphicon-edit"></span>  Update this Record
				    </button>
	                <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Cancel</a>
	            </td>
	        </tr>
    	</table>
	</form>
</div>
<script type="text/javascript">

	
	$(document).ready(function(){

		function getDate( element ) {
            var date;
            
            try {
                date = $.datepicker.parseDate( dateFormat, element.value );
            } catch( error ) {
                date = null;
            }
     
            return date;
        }

        var dateFormat = "mm/dd/yy",
        start_date = $( "#start_date" ).datepicker({
                                                         defaultDate: "+1w",
                                                         changeMonth: true,
                                                         numberOfMonths: 2
                                                    })
                                        .on( "change", function() {
                                                end_date.datepicker( "option", "minDate", getDate( this ) );
                                         });

        end_date = $( "#end_date" ).datepicker({
                                                    defaultDate: "+1w",
                                                    changeMonth: true,
                                                    numberOfMonths: 2
                                              })
                                    .on( "change", function() {
                                        start_date.datepicker( "option", "maxDate", getDate( this ) );
                                    });
                                    

		$.validator.setDefaults({
				submitHandler: function() {
					$("#task").submit();
				}
			});

		$("#task").validate({
			rules: {
				name: "required",
				description: "required"
			},
			messages: {
				name: "Please enter Name",
				description: "Please enter Description"
			}
		});
	})
	
</script>
<?php include_once 'footer.php'; 