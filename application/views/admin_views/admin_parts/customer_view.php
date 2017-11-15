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
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Sales History</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($customers as $value) {?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $value['customer_name'];?></td>
                                        <td><?php echo $value['customer_contact'];?></td>
                                        <td> <a href="<?php echo $customer_view.$value['customer_id']; ?>" class="btn btn-warning">View More</a></td>
                                         <td>

                                        
                                       <a href="<?php echo $edit_page.$value['customer_id']; ?>" class="btn btn-warning">Edit</a>
                                       
                                        <a href="<?php echo $delete_page.$value['customer_id']; ?>" class="btn btn-danger">Delete</a>
                                        </td> 
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                                                    </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
<?php } else{?>
    
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
                                            <label>Customer Name</label>
                                            <input class="form-control validate[required] text-input" name="customer_name"
                                           value="<?php echo @$customers[0]['customer_name']; ?>">
                                         </div>
                                         <div class="form-group">
                                            <label>Contact#</label>
                                            <input class="form-control validate[required] text-input" name="customer_contact"
                                           value="<?php echo @$customers[0]['customer_contact']; ?>">
                                            
                                        </div>
                                        
                                         
                                        <?php if(!empty($customers[0]['customer_id'])){?>
                                        <input type="hidden" name="customer_id" 
                                        value="<?php echo $customers[0]['customer_id'];?>">
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
<?php }?>