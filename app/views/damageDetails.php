<center>
    <h1> 
        <?php 
            $url = $_REQUEST['url'];
            $url = rtrim($url,'/');
            $url = explode('/',$url);            
            if(isset($url['2'])){
                echo $url['2']." - Damage";
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
            foreach ($prDetails as $key => $value) { 
                    if (!$value['dm_quantity'] == 0) { ?>
                <tr>                
                    <td> <?php echo $value['pr_name']; ?> </td>
                    <td> <?php echo $value['dm_quantity']; ?> </td>
                    <td> <?php echo $value['dm_price']; ?> </td>                
                    <td> <?php echo $value['deposit_date']; ?> </td>
                    <td>
                        <a href="<?php echo BASE_URL; ?>/Damage/update/<?php echo $value['id']; ?>"> 
                           <i class="btn btn-info fa fa-edit m-1"></i> 
                        </a>
                        <a class="delete" href="<?php echo BASE_URL; ?>/Damage/remove/<?php echo $value['id']; ?>"> 
                           <i class="btn btn-danger fa fa-trash m-1"> </i>
                        </a>    
                    </td>
                </tr>
            <?php } } ?>
        </tbody>
    </table>
</center>