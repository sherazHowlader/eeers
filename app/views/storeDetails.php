<center>
    <h1> 
        <?php 
            $url = $_REQUEST['url'];
            $url = rtrim($url,'/');
            $url = explode('/',$url);            
            if(isset($url['2'])){
                echo $url['2']." - Store";
            }
        ?>
    </h1>

    

    <br><br>

    <table class="table table-striped text-center" id="myTable">
        <thead>
            <tr>                
                <th> Product Name </th>
                <th> Quantity </th>
                <th> Rate </th>
                <th> Date </th>         
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
            <?php           
            foreach ($prDetails as $key => $value) { ?>
                <tr>                   
                    <td> <?php echo $value['pr_name']; ?> </td>
                    <td> <?php echo $value['st_quantity']; ?> </td>
                    <td> <?php echo $value['st_price']; ?> </td>                
                    <td> <?php echo $value['deposit_date']; ?> </td> 
                    <td>                        
                        <?php 
                            if ($value['st_quantity'] == 0) { ?>
                                <a class="falseMsg"> 
                                    <i class="btn btn-info fa fa-edit m-1"></i>
                                </a>
                                <?php }else{ ?>
                                    <a href="<?php echo BASE_URL; ?>/Store/update/<?php echo $value['id']; ?>"> 
                                        <i class="btn btn-info fa fa-edit m-1"></i> 
                                    </a>
                        <?php  } ?>

                        <?php 
                            if ($value['st_quantity'] == 0) { ?>
                                <a class="falseMsg"> 
                                    <i class="btn btn-danger fa fa-trash-alt m-1"></i>
                                </a>
                                <?php }else{ ?>
                                    <a class="delete" href="<?php echo BASE_URL; ?>/Store/remove/<?php echo $value['id']; ?>"> 
                                        <i class="btn btn-danger fa fa-trash m-1"> </i>
                                    </a>
                        <?php  } ?>

                    </td>
                </tr>
            <?php  } ?>
        </tbody>
    </table>
</center>