<?php require APPROOT . '/views/inc/header.php'; ?>
  <h1>My transactions</h1>
  <p>so far....</p>
	<p>
	  <?php if(isset($data['user_info'])):?>
	  	<div class="row">
		  	<div class="row col-md-8">
		  		<div class="col-md-6"><span class="font-weight-bold">
		  			My cash: </span> <label style="font-style: italic;"><?php echo $data['user_info']->balance; ?></label></div>
		  		<div class="col-md-6"><span class="font-weight-bold">
		  			My Bonuses: </span> <label style="font-style: italic;"><?php echo $data['user_info']->bonus; ?></label></div>
		  	</div>
		  	<div class="col-md-4">
		  		<a href="<?php echo URLROOT."/transactions/send"?>"><button class="btn btn-danger"><i class="fa fa-plus"></i> Transfer</button></a>
		  	</div>
		  </div>
		  <div class="card-body">
		  	<table class="table">
        		<?php flash('register_success'); ?>

		  		<tr>
		  			<th>#</th>
		  			<th>Receiver</th>
		  			<th>Amount</th>
		  			<th>fee</th>
		  			<th>Date</th>
		  		</tr>
		  		<?php if (isset($data['myTransactions'])) {
		  			if (!empty($data['myTransactions'])) {
		  				foreach ($data['myTransactions'] as $key => $value) 
		  				{
		  					echo "<tr>";
		  					echo "<td>".$value->id."</td>";
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
	  		<a href="<?php echo URLROOT."/users/login"?>"><button class="btn btn-block btn-danger">Login first to see your transactions</button></a>
	  	</div>
	  <?php endif;?>
	</p>


<?php require APPROOT . '/views/inc/footer.php'; ?>