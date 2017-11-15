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
                                        <th>GST#</th>
                                        <th>Contact</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($suppliers as $value) {?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $value['name'];?></td>
                                        <td><?php echo $value['GST'];?></td>
                                        <td><?php echo $value['mobile'];?></td>
                                       
                                        
                                      <td>

                                        
                                       <a href="<?php echo $edit_page.$value['deler_id']; ?>" class="btn btn-warning">Edit</a>
                                       
                                        <a href="<?php echo $delete_page.$value['deler_id']; ?>" class="btn btn-danger">Delete</a>
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
                                            <label>Supplier</label>
                                            <input class="form-control validate[required] text-input" name="name"
                                           value="<?php echo @$suppliers[0]['name']; ?>">
                                         </div>
                                         <div class="form-group">
                                            <label>GST#</label>
                                            <input class="form-control validate[required] text-input" name="GST"
                                           value="<?php echo @$suppliers[0]['GST']; ?>">
                                            
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>Contact</label>
                                            <input class="form-control validate[required] text-input datepicker" name="mobile"
                                            value="<?php echo @$suppliers[0]['mobile']; ?>">
                                            
                                        </div>
                                        <?php if(!empty($suppliers[0]['deler_id'])){?>
                                        <input type="hidden" name="deler_id" 
                                        value="<?php echo $suppliers[0]['deler_id'];?>">
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