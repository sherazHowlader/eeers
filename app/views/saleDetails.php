<center>
    <h1> 
        <?php 
            $url = $_REQUEST['url'];
            $url = rtrim($url,'/');
            $url = explode('/',$url);
            
            if(isset($url['2'])){
                echo $url['2'];
            }           
        ?>
    </h1>
    <br>
<?php    
    foreach ($outlet_info as $key => $value) { ?>
    
        <h6 class="btn btn-primary"> Owner Name - <span class="badge badge-light"><?php echo $value['owner_name']; ?></span> </h6>

        <h6 class="btn btn-primary"> Phone Number - 
            <span class="badge badge-light">
                <a href="tel:<?php echo $value['phn_one']?>"> <?php echo $value['phn_one']; ?> </a>                
            </span> 
            <span class="badge badge-light">                
                <a href="tel:<?php echo $value['phn_two']?>"> <?php echo $value['phn_two']; ?> </a>
            </span>
        </h6>

        <h6 class="btn btn-primary"> Address - <span class="badge badge-light"><?php echo $value['address']; ?></span> </h6>
        
    <?php  } ?>



    <br><br>


    <table class="table table-striped text-center" id="myTable">
        <thead>
            <tr>            
                <th> Product Name </th>
                <th> Quantity </th>
                <th> Rate </th>
                <th> Value </th>
                <th> Date </th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
            <?php        
            foreach ($sellInfo as $key => $value) { ?>
                <tr>
                    <td> <?php echo $value['pr_name']; ?> </td>
                    <td> <?php echo $value['sl_quantity']; ?> </td> 
                    <td> <?php echo $value['sl_price']; ?> </td> 
                    <td> <?php echo $value['sl_value']; ?> </td> 
                    <td> <?php echo $value['deposit_date']; ?> </td> 
                    <td>
                        <a href="<?php echo BASE_URL; ?>/Sales/update/<?php echo $value['id']; ?>"> 
                            <i class="btn btn-info fa fa-edit m-1"></i>
                        </a>
                        <a class="delete" href="<?php echo BASE_URL; ?>/Sales/remove/<?php echo $value['id']; ?>"> 
                            <i class="btn btn-danger fa fa-trash m-1"> </i>
                        </a>
                    </td> 
                </tr>
            <?php  } ?>
        </tbody>
    </table>
</center>