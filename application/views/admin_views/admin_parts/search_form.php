         <?php if($show){?>
           <div class="col-lg-12">
                  <div class="col-lg-12">
                                  <div class="panel panel-default">
                        <div class="panel-heading">
                       Customer Information
                      
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                        
                                <form action="<?php echo $submit_url; ?>" method="GET" id="formID">
                                        <div class="form-group col-lg-4">
                                            <label>Select Customers</label>
                                            <select name="customer_id" class="form-control">
                                                <?php foreach ($customer as $value){
                                                  ?>
                                                  <option value="<?php echo $value['customer_id'] ?>"
                                                  <?php if($value['customer_id']==$customer[0]['customer_id']){echo "selected";} ?>
                                                  ><?php echo $value['customer_name'] ?></option>
                                                <?php }?>
                                            </select>
                                         </div>
                                         <div class="form-group col-lg-4">
                                            <label>Select From</label>
                                            <input type="date" class="form-control validate[required] datepicker" name="from">
                                            
                                        </div>
                                         <div class="form-group col-lg-4">
                                            <label>Select To</label>
                                            <input type="date" class="form-control validate[required] datepicker" name="to">
                                            
                                        </div>
                                         <div class="form-group col-lg-4">
                                            <input type="submit" value="Search" class="btn btn-success">
                                         </div>
                                 </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            
                            <!-- /.row (nested) -->
                           
                        </div>
                        <!-- /.panel-body -->
                            </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
<?php } else{?>
    

<?php }?>