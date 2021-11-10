<center>
    <h1> Product Listing </h1>

    <?php
    $user = $_SESSION['userData'];
    if ($user['role_id'] == '2') { ?>

        <form class="needs-validation" action="<?php echo BASE_URL; ?>/Store/create" method="POST" novalidate>
        <div class="form-row">
            <div class="col-md-6">
                <label class="form-label m-2"> Product name : </label>

                <select name="pr_name" class="form-control form-control-sm select2">                
                    <?php
                        foreach ($productList as $key => $value) { ?>

                        <option value="<?php echo $value['brand_name']." - ".$value['pr_name']." - ".$value['madeIn'];?>"> 
                            <?php echo $value['brand_name']." - ".$value['pr_name']." - ".$value['madeIn'];?> 
                        </option>
                    <?php  } ?>

                </select>  
            </div>

            <input type="hidden" name="pro_image" value="<?php echo $value['pro_image']; ?>" required>

            <div class="col-md-6">
                <label class="form-label m-2" for="price"> Price (DP) : </label>
                <input class="form-control form-control-sm" type="text" name="price" autocomplete="off" placeholder="BDT" required>
            </div>

            <div class="col-md-6">
                <label class="form-label m-2" for="quantity"> Quantity : </label>
                <input class="form-control form-control-sm" type="text" name="quantity" autocomplete="off" placeholder="Quantity" required>
            </div>
            
            <div class="col-md-6">
                <label class="form-label m-2" for="date"> Entry Date : </label>
                <input class="form-control form-control-sm" type="date" name="deposit_date" required>
            </div>
            
        </div>          
            <input class="btn btn-primary mt-4" type="submit" name="submit" value="Submit">
        </form>

    <?php  } ?>

    <br><br>

    <table class="table table-striped text-center" id="myTable">
        <thead>
            <tr>
                <th> S/L </th>
                <th> Product </th>
                <th> Store </th>
                <th> Value </th>
                <th> Details </th>
            </tr>
        </thead>
        <tbody>
                <?php
                    $serial = "1";
                    foreach ($prList as $key => $value) {                 
                ?>
                    <tr>                        
                        <td> <?php echo $serial++ ?> </td>
                        <td> <?php echo $value['pr_name']; ?> </td>
                        <td> <?php echo $value['sumStore'] - $value['sumSell'] - $value['sumDam']; ?> </td>               
                        <td> <?php echo $value['sumStoreValue'] - $value['sumSellValue'] - $value['sumDamValue']; ?> </td>                
                        <td> 
                            <a href="<?php echo BASE_URL; ?>/Store/details/<?php echo $value['pr_name']; ?>"> 
                                <i class="btn btn-info fa fa-info-circle"> </i>
                            </a>    
                        </td>
                    </tr>                    
                <?php  } ?>
                
        </tbody>
            <?php                    
                foreach ($storeCapital as $key => $value) {                 
            ?>
                <tr class="tbl_footer table-danger ">
                    <td colspan="2"> Total Value - </td>
                    <td colspan="3"> <b> <?php echo $value['sumStoreValue'] - $value['sumSellValue'] - $value['sumDamValue']. " TK"?></b> </td>
                </tr>
            <?php  } ?>
    </table>
    <br><br><br>
</center>