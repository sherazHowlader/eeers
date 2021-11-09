<center>
    <?php 
        if (isset($rcvData['storeProduct'])) {

            foreach ($storeProduct as $key => $value) {

            $user = $_SESSION['userData'];
            if ($user['role_id'] == '2') { 
    ?>

                <h1> Store Product Update</h1>

                <form class="needs-validation" action="<?php echo BASE_URL; ?>/Store/upData/<?php echo $value['id']; ?>" method="POST" novalidate>

                    <label class="form-label m-2"> Product name : </label>
                    <input class="form-control form-control-sm" type="text" name="pr_name" autocomplete="off" value="<?php echo $value['pr_name']; ?>" required>        
        
                    <label class="form-label m-2" for="price"> Price (DP) : </label>
                    <input class="form-control form-control-sm" type="text" name="price" autocomplete="off" value="<?php echo $value['st_price']; ?>" required>
                    
                    <label class="form-label m-2" for="quantity"> Quantity : </label>
                    <input class="form-control form-control-sm" type="text" name="quantity" autocomplete="off" value="<?php echo $value['st_quantity']; ?>" required>
                                
                    <input class="btn btn-info mt-4" type="submit" name="submit" value="Update">
                </form>
    <?php } } ?> 
    
    <?php }elseif(isset($rcvData['damageProduct'])) {

            foreach ($damageProduct as $key => $value) {

            $user = $_SESSION['userData'];
            if ($user['role_id'] == '2') { 
    ?>
                <h1> <?php echo $value['pr_name']; ?> - Update </h1>

                <form class="needs-validation" action="<?php echo BASE_URL; ?>/Damage/upData/<?php echo $value['id']; ?>" method="POST" novalidate>

                    <label class="form-label m-2"> Product name : </label>
                    <input class="form-control form-control-sm" type="text" name="pr_name" autocomplete="off" value="<?php echo $value['pr_name']; ?>" required>        
        
                    <label class="form-label m-2" for="price"> Price (DP) : </label>
                    <input class="form-control form-control-sm" type="text" name="price" autocomplete="off" value="<?php echo $value['dm_price']; ?>" required>
                    
                    <label class="form-label m-2" for="quantity"> Quantity : </label>
                    <input class="form-control form-control-sm" type="text" name="quantity" autocomplete="off" value="<?php echo $value['dm_quantity']; ?>" required>
                                
                    <input class="btn btn-info mt-4" type="submit" name="submit" value="Update">
                </form>
    <?php } } ?> 

        <?php }elseif(isset($rcvData['voucherInfo'])) {

            foreach ($voucherInfo as $key => $value) {

            $user = $_SESSION['userData'];
            if ($user['role_id'] == '2') { 
    ?>
                <h1> Voucher Information </h1>

                <form class="needs-validation" action="<?php echo BASE_URL; ?>/Sales/upData/<?php echo $value['id']; ?>" method="POST" novalidate>

                    <label class="form-label m-2"> Product name : </label>
                    <input class="form-control form-control-sm" type="text" name="pr_name" autocomplete="off" value="<?php echo $value['pr_name']; ?>" required>        
        
                    <label class="form-label m-2" for="price"> Price (DP) : </label>
                    <input class="form-control form-control-sm" type="text" name="price" autocomplete="off" value="<?php echo $value['sl_price']; ?>" required>
                    
                    <label class="form-label m-2" for="quantity"> Quantity : </label>
                    <input class="form-control form-control-sm" type="text" name="quantity" autocomplete="off" value="<?php echo $value['sl_quantity']; ?>" required>
                                
                    <input class="btn btn-info mt-4" type="submit" name="submit" value="Update">
                </form>
    <?php } } } ?> 
<br>
<br>
</center>