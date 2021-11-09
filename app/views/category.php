<center>

    <?php
    if (isset($rcvData['catEdit'])) {
        foreach ($catEdit as $key => $value) {
    ?>
            <h2> Product Update </h2><br>

            <form class="needs-validation" action="<?php echo BASE_URL; ?>/Category/upData/<?php echo $value['id']; ?>" enctype="multipart/form-data" method="POST" novalidate>

                <div >
                    <img class="m-2" height="120px" width="120px" style="border-radius:50%" src="<?php echo BASE_URL; ?>/images/product/<?php echo $value['pro_image']; ?>" alt="Product">
                    <input type="hidden" name="imgName" value="<?php echo $value['pro_image']; ?>">
                </div>

                <div class="form-row">                
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="exampleCity" class="">Brand :</label>
                            <input type="text" name="brand_name" autocomplete="off" class="form-control" value="<?php echo $value['brand_name']; ?>" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="exampleCity" class="">Product Name :</label>
                            <input type="text" name="pr_name" autocomplete="off" class="form-control" value="<?php echo $value['pr_name']; ?>" required>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="exampleCity" class="">Made In :</label>
                            <input type="text" name="madeIn" autocomplete="off" class="form-control" value="<?php echo $value['madeIn']; ?>" required>
                        </div>
                    </div>

                    <div class="col-md-6 ">
                        <div class="position-relative form-group">
                            <label for="exampleCity" class=""> Product Image :</label>
                            <input class="btn btn-sm btn-outline-secondary form-control"type="file" name="pro_image" required>
                            <div class="invalid-feedback m-2"> Select your product </div>
                        </div>
                    </div>
                </div>                

                <button class="btn btn-primary" type="submit" name="submit"> Update Product </button>
            </form>

        <?php } ?>

        <?php
    } else {

        $user = $_SESSION['userData'];
        if ($user['role_id'] == '2') {
        ?>
            <h2> Product Description </h2><br>

            <form class="needs-validation" action="<?php echo BASE_URL; ?>/Category/create" enctype="multipart/form-data" method="POST" novalidate>

                <div class="form-row">

                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="exampleCity" class="">Brand :</label>
                            <input type="text" name="brand_name" autocomplete="off" class="form-control" placeholder="Exm - Oil" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="exampleCity" class="">Product Name :</label>
                            <input type="text" name="pr_name" autocomplete="off" class="form-control" placeholder="Exm - Fogg Scent Prince - 30ml" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="exampleCity" class="">Made In :</label>
                            <input type="text" name="madeIn" autocomplete="off" class="form-control" placeholder="Exm - Canada" required>
                        </div>
                    </div>

                    <div class="col-md-6 ">
                        <div class="position-relative form-group">
                            <label for="exampleCity" class=""> Product Image :</label>
                            <input class="btn btn-sm btn-outline-secondary form-control"type="file" name="pro_image" required>
                            <div class="invalid-feedback m-2"> Select your product </div>
                        </div>
                    </div>

                </div>                

                <button id="showtoast" class="btn btn-info m-2" type="submit" name="submit"> Add Product </button>
            </form>
            
    <?php  }
    } ?>
    <br>

    <table class="table table-striped text-center" id="myTable">
        <thead>
            <tr>
                <th> Product </th>
                <th> Brand Name </th>
                <th> Product Name </th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($catList as $key => $value) {
            ?>
                <tr>
                    <td> 
                        
                    <!-- <?php echo $value['pro_image']; ?>  -->

                        <img height="30px" width="30px" style="border-radius:50%" src="<?php echo BASE_URL; ?>/images/product/<?php echo $value['pro_image']; ?>" alt="Product">
                    </td>


                    <td> <?php echo $value['brand_name']; ?> </td>
                    <td> <?php echo $value['pr_name']; ?>
                        <span class="badge badge-pill badge-success"><?php echo $value['madeIn']; ?></span>
                    </td>
                    <td>
                        <a href="<?php echo BASE_URL; ?>/Category/update/<?php echo $value['id']; ?>">
                            <i class="btn btn-info fa fa-edit m-1"></i>
                        </a>
                        <a class="delete" href="<?php echo BASE_URL; ?>/Category/remove/<?php echo $value['id'];?> & img=<?php echo $value['pro_image'];?>">
                            <i class="btn btn-danger fa fa-trash m-1"> </i>
                        </a>
                    </td>
                </tr>
            <?php  } ?>
        </tbody>
    </table>
    <br><br><br>
</center>