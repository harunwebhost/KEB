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
                                        <th>Unit</th>
                                        <th></th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($suppliers as $value) {?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $value['Item_name'];?></td>
                                        <td><?php echo $value['unit'];?></td>
                                        <td></td>
                                       <td>
                                        <a href="<?php echo $edit_page.$value['item_id']; ?>" class="btn btn-warning">Edit</a>
                                       
                                        <a href="<?php echo $delete_page.$value['item_id']; ?>" class="btn btn-danger">Delete</a>
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
                        <form action="<?php echo $submit_url; ?>" method="POST" id="formID">
                                        <div class="form-group">
                                            <label>Product name</label>
                                            <input class="form-control validate[required] text-input" name="Item_name"
                                           value="<?php echo @$item[0]['Item_name']; ?>">
                                         </div>
                                         <div class="form-group">
                                            <label>Select Unit</label>
                                            <select name="unit" class="form-control">
                                                <?php foreach ($unit as $value){
                                                  ?>
                                                  <option value="<?php echo $value; ?>"
                                                  <?php if($value['unit']==$value){echo "selected";} ?>
                                                  ><?php echo $value; ?></option>
                                                <?php }?>
                                            </select>
                                         </div>

                                        <?php if(!empty($item[0]['item_id'])){?>
                                        <input type="hidden" name="item_id" 
                                        value="<?php echo $item[0]['item_id'];?>">
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