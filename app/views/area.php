<center>

    <?php 
        if (isset($rcvData['areaEdit'])) {
            foreach ($areaEdit as $key => $value) {
    ?>
                <h2> Update Area </h2><br>
                
                <form class="needs-validation" action="<?php echo BASE_URL; ?>/Area/upData/<?php echo $value['id']; ?>" method="POST" novalidate>           
                    
                    <div class="form-row">
        
                            <div class="col-md-6 offset-md-3">
                                <div class="position-relative form-group">
                                    <label for="exampleCity" class=""> Area Name :</label>
                                    <input type="text" name="area_name" autocomplete="off" class="form-control" value="<?php echo $value['area_name']; ?>" required>
                                </div>                       
                            </div>

                        </div>

                    <button class="btn btn-primary" type="submit" name="submit"> Change </button>
            </form>
    <?php } ?> 
    
    <?php
        }else{
            
            $user = $_SESSION['userData'];
            if ($user['role_id'] == '2') { 
    ?>
                <h2> Market Area Name </h2><br>
                
                <form class="needs-validation" action="<?php echo BASE_URL; ?>/Area/create" method="POST" novalidate>           
                    
                        <div class="form-row">
        
                            <div class="col-md-6 offset-md-3">
                                <div class="position-relative form-group">
                                    <label for="exampleCity" class=""> Area Name :</label>
                                    <input type="text" name="area_name" autocomplete="off" class="form-control" placeholder="Exm - Gulshan" required>
                                </div>                       
                            </div>

                        </div>

                        <button id="showtoast" class="btn btn-info" type="submit" name="submit"> Save Area </button>
                </form>        
            <?php  } } ?>        
    <br>

    <table class="table table-striped text-center" id="myTable">
        <thead>
            <tr>
                <th> Area Name </th>                
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
            <?php        
            foreach ($areaList as $key => $value) {
            ?>            
                    <tr>                
                        <td> <?php echo $value['area_name']; ?> </td>
                        <td>         
                            <a href="<?php echo BASE_URL; ?>/Area/update/<?php echo $value['id']; ?>"> 
                                <i class="btn btn-info fa fa-edit m-1"></i> 
                            </a>
                            <a class="delete" href="<?php echo BASE_URL; ?>/Area/remove/<?php echo $value['id']; ?>"> 
                                <i class="btn btn-danger fa fa-trash m-1"> </i>
                            </a>
                        </td>
                    </tr>            
            <?php  } ?>
        </tbody>
    </table>
    <br><br><br>
</center>