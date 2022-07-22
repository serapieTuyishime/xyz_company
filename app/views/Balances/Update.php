<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <?php flash('register_success'); ?>
        <h2>Balance update</h2>
        <p>Fill in amount to add.</p>
        <form action="<?php echo URLROOT; ?>/balances/update/<?php echo $data['id'] ?>" method="post">
          <div class="form-group">
              <label>ID:<sup>*</sup></label>
              <input type="text" name="id" disabled class="form-control form-control-lg" value="<?php echo $data['id']; ?>">
          </div>    
          <div class="form-group">
              <label>Balance:<sup>*</sup></label>
              <input type="text" name="balance" class="form-control form-control-lg <?php echo (!empty($data['balance_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['balance']; ?>">
              <span class="invalid-feedback"><?php echo $data['balance_err']; ?></span>
          </div>
          <div class="form-row">
            <div class="col">
              <input type="submit" class="btn btn-success btn-block" value="Go">
            </div>
            <div class="col">
              <a href="<?php echo URLROOT; ?>/users/index" class="btn btn-light btn-block">Cancel</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
