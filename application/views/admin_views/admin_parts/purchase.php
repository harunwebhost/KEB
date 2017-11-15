
<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                       <?php echo  $title; ?>
                        <?php require_once('button.php'); ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6 col-lg-offset-3">
                        <form action="<?php echo $submit_url.$purchases[0]['purchase_id']; ?>" method="POST" id="formID">
                                        <div class="form-group">
                                            <label>Supplier</label>
                                            <select name="deler_id" class="form-control">
                                                <?php foreach ($supplier as $value){
                                                  ?>
                                                  <option 
                                                  value="<?php echo $value['deler_id'] ?>"
                                                  <?php if($value['deler_id']==$purchases[0]['deler_id']){echo "selected";} ?>><?php echo $value['name'] ?></option>
                                                <?php }?>
                                            </select>
                                         </div>
                                         <div class="form-group">
                                            <label>Purchase Item</label>
                                            <select name="item_id" class="form-control">
                                                <?php foreach ($items as $value){
                                                  ?>
                                                  <option value="<?php echo $value['item_id'] ?>"
                                                  <?php if($value['item_id']==$purchases[0]['item_id']){echo "selected";} ?>
                                                  ><?php echo $value['Item_name'] ?></option>
                                                <?php }?>
                                            </select>
                                         </div>

                                       
                                         
                                         

                                         <div class="form-group">
                                            <label>Select Date</label>
                                            <input type="date" class="form-control validate[required] datepicker" name="purchase_date"
                                            value="<?php echo @$purchases[0]['purchase_date']; ?>" id="req">
                                            
                                        </div>
                                         <div class="form-group">
                                            <label>Refrence#</label>
                                            <input class="form-control validate[required] text-input" name="purchase_refrence"
                                           value="<?php echo @$purchases[0]['purchase_refrence']; ?>"
                                            
                                        </div>
                                          <div class="form-group">
                                            <label>Units</label>
                                            <select name="unit" class="form-control">
                                                <?php foreach ($unit as $value): ?>
                                                  <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                                <?php endforeach ?>
                                                
                                            </select>
                                         </div>
                                         <div class="form-group">
                                            <label>Quantity</label>
                                            <input class="form-control validate[required] text-input datepicker" name="total_item"
                                            value="<?php echo @$purchases[0]['total_item']; ?>">
                                            
                                        </div>
                                        <?php if(!empty($purchases[0]['purchase_id'])){?>
                                        <input type="hidden" name="purchase_id" 
                                        value="<?php echo $purchases[0]['purchase_id'];?>">
                                        <?php } ?>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <input type="submit" value="<?php echo $button; ?>" class="btn btn-success">
                            <!-- /.row (nested) -->
                            </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
            </div>