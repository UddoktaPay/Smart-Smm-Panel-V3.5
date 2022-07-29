
<div id="main-modal-content">
  <div class="modal-right">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <?php
          $id = (!empty($payment->id))? $payment->id: '';
          if ($id != "") {
            $url = cn($module."/ajax_update/$id");
          }else{
            $url = cn($module."/ajax_update");
          }
        ?>
        <form class="form actionForm" action="<?php echo $url?>" data-redirect="<?php echo cn($module); ?>" method="POST">
          <div class="modal-header bg-pantone">
            <h4 class="modal-title"><i class="fa fa-edit"></i> <?php echo $payment->name; ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <div class="form-body">
              <div class="row justify-content-md-center">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label class="form-label" ><?php echo lang("method_name"); ?></label>
                    <input type="hidden" class="form-control square" name="payment_params[type]" value="<?php echo $payment->type; ?>">
                    <input type="text" class="form-control square" name="payment_params[name]" value="<?php echo (!empty($payment->name))? $payment->name : '' ; ?>">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label" ><?php echo lang("Minimal_payment"); ?></label>
                    <input type="number" class="form-control square" name="payment_params[min]" value="<?php echo (!empty($payment->min))? $payment->min : '' ; ?>">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label" ><?php echo lang("Maximal_payment"); ?></label>
                    <input type="number" class="form-control square" name="payment_params[max]" value="<?php echo (!empty($payment->max))? $payment->max : '' ; ?>">
                  </div>
                </div>
               
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label" ><?php echo lang("new_users"); ?></label>
                    <select name="payment_params[new_users]" class="form-control square">
                      <option value="1" <?php echo (!empty($payment->new_users) && $payment->new_users == 1)? 'selected' : '' ; ?>><?php echo lang("allowed"); ?></option>
                      <option value="0" <?php echo (isset($payment->new_users) && $payment->new_users != 1)? 'selected' : '' ; ?>><?php echo lang("not_allowed"); ?></option>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label"><?php echo lang("Status"); ?></label>
                    <select name="payment_params[status]" class="form-control square">
                      <option value="1" <?php echo (!empty($payment->status) && $payment->status == 1) ? 'selected' : '' ; ?>><?php echo lang("Active")?></option>
                      <option value="0" <?php echo (isset($payment->status) && $payment->status != 1) ? 'selected' : '' ; ?>><?php echo lang("Deactive")?></option>
                    </select>
                  </div>
                </div>

                <?php
                  $payment_params = json_decode($payment->params);
                  $option = $payment_params->option;
                ?>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-label"><?php echo lang("take_fee_from_user"); ?></label>
                    <select name="payment_params[take_fee_from_user]" class="form-control square">
                      <option value="1" <?php echo (!empty($option->take_fee_from_user) && $option->take_fee_from_user == 1) ? 'selected' : '' ; ?>><?php echo lang("Active")?></option>
                      <option value="0" <?php echo (isset($option->take_fee_from_user) && $option->take_fee_from_user != 1) ? 'selected' : '' ; ?>><?php echo lang("Deactive")?></option>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-12">
                  <hr>
                  <div class="form-group">
                    <label class="form-label">UddoktaPay API Key<span class="form-required">*</span></label>
                    <input type="text" class="form-control" name="payment_params[option][api_key]" value="<?php echo (isset($option->api_key)) ? $option->api_key : ''; ?>">
                  </div>

                  <div class="form-group">
                    <label class="form-label">UddoktaPay API URL<span class="form-required">*</span></label>
                    <input type="text" class="form-control"  name="payment_params[option][api_url]" value="<?php echo (isset($option->api_url)) ? $option->api_url : ''; ?>">
                  </div>
                  
                  <div class="form-group">
                    <label class="form-label">USD Convert Rate<span class="form-required">*</span></label>
                    <input type="text" class="form-control"  name="payment_params[option][convert_rate]" value="<?php echo (isset($option->convert_rate)) ? $option->convert_rate : ''; ?>">
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1"><?php echo lang("Submit")?></button>
            <button type="button" class="btn round btn-default btn-min-width mr-1 mb-1" data-dismiss="modal"><?php echo lang("Cancel")?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
