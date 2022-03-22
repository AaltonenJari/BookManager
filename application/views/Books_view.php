<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Collection of books</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/books.css"); ?>">
  
 	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
</head>
<body>
	<div class="headerArea">
	 	<h1>Manage the book collection</h1>
	</div>

	<div id="content">
		<table id=main_table>
			<tr>
				<td>
					<div class="tableWrap">
						<table id="book-table">
			 				<thead>
			    				<tr>
    								<?php foreach ($field_names as $field_name) { ?>
    									<th <?php if ($sort_by == $field_name) echo "class=\"sort_" . $sort_order . "\"" ?>>
    			    						<span>
												<?php $hdrurl = base_url("index.php/books_controller/index") . "/" . $field_name . "/" .
    			    	                            (($sort_order == 'asc' && $sort_by == $field_name) ? 'desc' : 'asc'); ?>
	   			    								<a id="<?php echo $field_name; ?>"
   				    	   								href="<?php echo $hdrurl; ?>"><?php echo $field_name; ?></a>
    			    							</span>
    			    					</th>
    			    				<?php } ?>
            					</tr>
			 				</thead>
			 				<tbody>
      							<?php foreach ($books as $book) { ?>
               					<tr>
	    							<?php foreach ($field_names as $field_name) { ?>
										<td> <?php echo $book->$field_name; ?> </td>
									<?php } ?>
               					</tr>
								<?php } ?>
			 				</tbody>
						</table>
					</div>
				</td>
				<td>
					<div id="form_area">
					    <?php echo form_open('index.php/books_controller/manage_books'); ?>

						<table id="booktable">
							<tr>
								<td>
          						<?php echo form_label('Title'); ?>
        						</td>
							</tr>
							<tr>
								<td>
          						<?php echo form_input(array('id'=>'book_title','class'=>'book_title',
                                    'name'=>'book_title','value'=> '')); ?>
 
           						<?php echo form_input(array('type'  => 'hidden','id'=>'book_id','class'=>'book_id',
                                    'name'=>'book_id','value'=> '0')); ?>
        						</td>
							</tr>
							<tr>
								<td>
          						<?php echo form_label('Author'); ?>
        						</td>
							</tr>
							<tr>
								<td>
          						<?php echo form_input(array('id'=>'book_author','class'=>'book_author',
                                    'name'=>'book_author','value'=> '')); ?>
        						</td>
							</tr>
							<tr>
								<td>
          						<?php echo form_label('Description'); ?>
        						</td>
							</tr>
							<tr>
								<td>
          						<?php echo form_input(array('id'=>'book_description','class'=>'book_description',
                                    'name'=>'book_description','value'=> '')); ?>
        						</td>
							</tr>
						</table>
						<table id="bookbuttons">
							<tr>
				   				<td>
         						<?php 
         						$data = [
         						    'id'    => 'submit',
         						    'name'  => 'action',
         						    'value' => 'Save New',
         						    'class' => 'submit_btn'
         						];
         						$js = ['onClick' => 'jsFunction_add();'];
         						echo form_submit($data,' ',$js);
        						?>
        						</td>
				   				<td>
         						<?php echo form_submit(array('id' => 'submit', 'class'=> 'submit_btn', 'name' => 'action', 'value' => 'Save')); ?>
        						</td>
				   				<td>
         						<?php echo form_submit(array('id' => 'submit', 'class'=> 'submit_btn', 'name' => 'action', 'value' => 'Delete')); ?>
							</tr>
						</table>
						<table id="messageArea">
            				<tr>
               					<td>
               						<span id="formerrmsg"><?php echo $this->session->flashdata("error"); ?></span>
               					</td>
            				</tr>
						</table>
					<?php echo form_close(); ?>
					</div>
				</td>
			</tr>
		</table>		
	</div>
	<div class="bottomArea">
		<span>Total count of the books: <?php echo $book_count; ?></span>
	</div>
</bode>

<script>
$("#book-table tr").click(function(){
	   $(this).addClass('selected').siblings().removeClass('selected');

	   // book id as a parameter to a hidden field
	   var id=$(this).find('td:first').html();
	   id = id.trim();
	   document.getElementById("book_id").value = id;
	   

	   // Populate the form fields
	   var title=$(this).find('td:nth-child(2)').html();
	   var author=$(this).find('td:nth-child(3)').html();
	   var description=$(this).find('td:nth-child(4)').html();
	   title = title.trim(); // Remove blanks
	   author = author.trim();
	   description = description.trim();
	   document.getElementById("book_title").value = title;
	   document.getElementById("book_author").value = author;
	   document.getElementById("book_description").value = description;

	   // Hide error message when row is selected
	   document.getElementById("formerrmsg").innerText = "";
});

$('#book-table tr td:nth-child(4), #book-table th:nth-child(4)').hide();/* hide the description column */

function jsFunction_add() {
	document.getElementById("submit").value = "Add";
}

</script>
</html>
