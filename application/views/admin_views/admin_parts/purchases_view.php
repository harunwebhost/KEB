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
                                        <th>Item</th>
                                        <th>Dealer</th>
                                        <th>Date</th>
                                        <th>Refrence#</th>
                                        <th>Units</th>
                                        <th>Total</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($purchases as $value) {?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $value['Item_name'];?></td>
                                        <td><?php echo $value['name'];?></td>
                                        <td><?php echo $value['purchase_date'];?></td>
                                        <td><?php echo $value['purchase_refrence'];?></td>
                                        <td><?php echo $value['unit'];?></td>
                                        <td><?php echo $value['total_item'];?></td>
                                        
                                    <!--     <td>

                                        
                                       <a href="<?php echo $edit_page.$value['purchase_id']; ?>" class="btn btn-warning">Edit</a>
                                       
                                        <a href="<?php echo $delete_page.$value['purchase_id']; ?>" class="btn btn-danger">Delete</a>
                                       
                                        
                            </td> -->
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
       