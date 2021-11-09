<center>

    <?php 
    if (isset($rcvData['outletUp'])) {
        foreach ($outletUp as $key => $value) {
    ?>

        <h1> <?php echo $value['outlet_name']; ?> </h1><br>

         <form class="needs-validation" action="<?php echo BASE_URL; ?>/Outlet/upData/<?php echo $value['id']; ?>" method="POST" novalidate> 
        <div class="form-row">

            <div class="col-md-6">
                <div class="position-relative form-group">
                    <label class="form-label" for="owner_name"> Outlet Owner Name : </label>
                    <input class="form-control form-control-sm" type="text" name="owner_name" autocomplete="off" value="<?php echo $value['owner_name']; ?>" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="position-relative form-group">
                    <label class="form-label" for="address"> Address : </label>
                    <input class="form-control form-control-sm" type="text" name="address" autocomplete="off" value="<?php echo $value['address']; ?>" required>
                </div>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="address"> Phone Number : </label>      
            </div>
            
            <div class="col-md-6 col-6">                
                    <input class="form-control form-control-sm" type="text" name="phn_one" autocomplete="off" value="<?php echo $value['phn_one']; ?>" required>               
            </div>

            <div class="col-md-6 col-6">                
                    <input class="form-control form-control-sm" type="text" name="phn_two" autocomplete="off" value="<?php echo $value['phn_two']; ?>" required>                
            </div>
            
        </div>   
            <input class="btn btn-info mt-4" type="submit" name="submit" value=" Update ">
        </form>


    <?php } ?>


    <?php
    } else {

        $user = $_SESSION['userData'];
        if ($user['role_id'] == '2') {
        ?>

        <h1> Outlet Information </h1>    

        <form class="needs-validation" action="<?php echo BASE_URL; ?>/Outlet/create" method="POST" novalidate>            
        <div class="form-row">

            <div class="col-md-6">
                <div class="position-relative form-group">
                    <label class="form-label" for="area_name"> Area Name : </label>
                    <select name="area_name" class="form-control form-control-sm select2">                
                        <?php
                            foreach ($areaList as $key => $value) {                    
                        ?>
                            <option value="<?php echo $value['area_name']; ?>"> <?php echo $value['area_name']; ?> </option>
                        <?php  } ?>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="position-relative form-group">
                    <label class="form-label" for="outlet_name"> Outlet Name : </label>
                    <input class="form-control form-control-sm" type="text" name="outlet_name" autocomplete="off" placeholder=" Mayer Doa Enterprise " required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="position-relative form-group">
                    <label class="form-label" for="owner_name"> Outlet Owner Name : </label>
                    <input class="form-control form-control-sm" type="text" name="owner_name" autocomplete="off" placeholder=" Mohammad Ali " required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="position-relative form-group">
                    <label class="form-label" for="address"> Address : </label>
                    <input class="form-control form-control-sm" type="text" name="address" autocomplete="off" placeholder=" H-25 R-1 Block-E Banasree Rampura " required>
                </div>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="address"> Phone Number : </label>      
            </div>
            
            <div class="col-md-6 col-6">                
                    <input class="form-control form-control-sm" type="text" name="phn_one" autocomplete="off" placeholder=" Phone Number " required>               
            </div>

            <div class="col-md-6 col-6">                
                    <input class="form-control form-control-sm" type="text" name="phn_two" autocomplete="off" placeholder=" Mobile Number " required>                
            </div>
            
        </div>   
            <input class="btn btn-info mt-4" type="submit" name="submit" value="Save Outlet Data">
        </form>

        <?php  }
    } ?>
    <br>

    <table class="table table-striped text-center" id="myTable">
        <thead>
            <tr>
                <th> S/L </th>
                <th> Outlet Name </th>
                <th> Owner Name </th>
                <th> Phone Number </th>                
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
                <?php
                    $serial = "1";
                    foreach ($outletList as $key => $value) {                 
                ?>
                    <tr>
                        <td> <?php echo $serial++ ?> </td>
                        <td> <?php echo $value['outlet_name']; ?> </td>
                        <td> <?php echo $value['owner_name']; ?> </td>
                        <td> <?php echo $value['phn_one'] .", ". $value['phn_two']; ?> </td>                        
                        <td>
                            <a href="<?php echo BASE_URL; ?>/Outlet/update/<?php echo $value['id']; ?>">
                                <i class="btn btn-info fa fa-edit m-1" ></i>
                            </a>
                            <a class="delete" href="<?php echo BASE_URL; ?>/Outlet/remove/<?php echo $value['id'];?>">
                                <i class="btn btn-danger fa fa-trash m-1"> </i>
                            </a>
                        </td>
                    </tr>                    
                <?php  } ?>
                
        </tbody>
    </table>

</center>