         <?php if($show){?>
           <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo $title; ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                      
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                         <th>Unit</th>
                                        <th>Date</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($sales as $value) {?>
                                    <tr class="odd gradeX">
                                        <td>
                                        <?php echo $value['Item_name'];?>
                                        <input type="hidden" name="item_id[]" value="<?php echo $value['item_id'];?>">
                                        </td>
                                        <td><?php echo $value['sold_item']; ?></td>
                                        <td><?php echo $value['unit'];?></td>
                                        <td><?php echo $value['sold_date'];?></td>
                                       
                                        <td></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                            <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                       Customer Information
                      
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6 col-lg-offset-3">
                        
                                <form action="<?php echo $submit_url; ?>" method="POST" id="formID">
                                        <div class="form-group">
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
                                         <div class="form-group">
                                            <label>Select Search</label>
                                            <input type="date" class="form-control validate[required] datepicker" name="purchase_date"
                                            value="<?php echo @$purchases[0]['purchase_date']; ?>" id="req">
                                            
                                        </div>
                                         <div class="form-group">
                                            <input type="submit" value="Sell" class="btn btn-success">
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
                    <!-- /.panel -->
            </div>
                           
                            <!-- /.table-responsive -->
                                                    </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
<?php } else{?>
    

<?php }?>