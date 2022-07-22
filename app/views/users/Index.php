<?php require APPROOT . '/views/inc/header.php'; ?>
  <div>
  	<table class="table">
      <?php flash('register_success'); ?>
  		<tr class="tr">
  			<th><i class="fa fa-hashtag"></i></th>
  			<th>Name</th>
  			<th>Email</th>
  			<th>Bonus</th>
  			<th>Balance</th>
  			<th>Actions</th>
  		</tr>
  		<?php if (isset($data['all_users'])) {
  			if (!empty($data['all_users'])) {
  				foreach ($data['all_users'] as $key => $value) 
  				{
  					echo "<tr>";
  					echo "<td>".$value->id."</td>";
  					echo "<td>".$value->name."</td>";
  					echo "<td>".$value->email."</td>";
  					echo "<td>".$value->bonus."</td>";
  					echo "<td>".$value->balance."</td>";
  					echo "<td> <div class='row'><div class='col-md-3'><a href='".URLROOT."/balances/update/".$value->id."'>Bal</a></div><div class='col-md-3'>Edit</div> <div class='col-md-3'>del</div></div> </td>";
  					echo "</tr>";
  				}
  			}
  			# code...
  		} ?>
  	</table>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>