<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <?php flash('register_success'); ?>
        <h2>Start a transfer</h2>
        <p>Select user ID to send to.</p>
        <form action="<?php echo URLROOT; ?>/transactions/send" method="post">
          <div class="form-group">
              <label>ID:<sup>*</sup></label>
              <input type="text" name="id" class="form-control form-control-lg <?php echo (!empty($data['id_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['receiver']; ?>">
              <span class="invalid-feedback"><?php echo $data['id_err']; ?></span>
          </div>    
          <div class="form-group">
              <label>Amount:<sup>*</sup></label>
              <input type="text" name="balance" class="form-control form-control-lg <?php echo (!empty($data['balance_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['balance']; ?>">
              <span class="invalid-feedback"><?php echo $data['balance_err']; ?></span>
          </div>
          <div class="form-row">
            <div class="col">
              <input type="submit" class="btn btn-success btn-block" value="Go">
            </div>
            <div class="col">
              <a href="<?php echo URLROOT; ?>/transactions/myTransactions" class="btn btn-light btn-block">Cancel</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
