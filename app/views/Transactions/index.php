<?php require APPROOT . '/views/inc/header.php'; ?>
  <h1>All transactions</h1>
  <p>so far....</p>
	<p>
	  <?php if(isset($data)):?>
		  </div>
		  <div class="card-body">
		  	<table class="table">
        		<?php flash('register_success'); ?>

		  		<tr>
		  			<th>#</th>
		  			<th>Sender</th>
		  			<th>Receiver</th>
		  			<th>Amount</th>
		  			<th>fee</th>
		  			<th>Date</th>
		  		</tr>
		  		<?php if (isset($data)) {
		  			if (!empty($data)) {
		  				foreach ($data as $key => $value) 
		  				{
		  					echo "<tr>";
		  					echo "<td>".$value->id."</td>";
		  					echo "<td>".$value->sender."</td>";
		  					echo "<td>".$value->receiver."</td>";
		  					echo "<td>".$value->amount."</td>";
		  					echo "<td>".$value->fee."</td>";
		  					echo "<td>".$value->trans_date."</td>";
		  					echo "</tr>";
		  				}
		  			}
		  		} ?>
		  	</table>
		  </div>
	  		
	  <?php else:?>
	  	<div class='text-warning'>
	  		NO transactions yet
	  	</div>
	  <?php endif;?>
	</p>


<?php require APPROOT . '/views/inc/footer.php'; ?>