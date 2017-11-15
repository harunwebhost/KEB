         <?php if($show){?>
           <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo $title; ?>
                            <div class="btn-group pull-right" role="group">
                        <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         More Action
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a href="#" onclick="printDiv('dataTables-example')">Print</a></li>
                         <li><a href="" id="btnExport">Export to xls</a></li>
                        </ul>
                      </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                      
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th colspan="4"><h3 align="center">MAHALAXMI ELECTRIC GOKAK</h3></th>
                                </tr>
                                    <tr>
                                            <th>Customer: <?php echo $customer[0]['customer_name'] ?></th>
                                        <th>Customer: <?php echo $customer[0]['customer_contact'] ?></th>
                                        <th>Date: <?php echo date('Y-m-d') ?></th>
                                        <th>Print by Admin</th>
                                    </tr>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                         <th>Unit</th>
                                        <th>Date</th>
                                        
                                        
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
                                       
                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                            
                    <!-- /.panel -->
            </div>
                           
                            <!-- /.table-responsive -->
                                                    </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
<?php } ?>
<script>
    function printDiv() {
    var divToPrint = document.getElementById('dataTables-example');
    var htmlToPrint = '' +
        '<style type="text/css">' +
        'table th, table td {' +
        'border:1px solid #000;' +
        'padding;0.5em;' +
        '}' +
        '</style>';
    htmlToPrint += divToPrint.outerHTML;
    newWin = window.open("");
    newWin.document.write(htmlToPrint);
    newWin.print();
    newWin.close();
}
</script>

