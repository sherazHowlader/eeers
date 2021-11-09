<center>
    <h1 style="font-variant:small-caps"> <b> Profile Picture Upload </b> </h1>
    <br>
    <?php        
        foreach ($profilePic as $key => $value) {  ?>

          <img height="250px" width="250px" style="border-radius:50%" src="<?php echo BASE_URL; ?>/images/profile/<?php echo $value['profile_pic']; ?>" alt="profile picture">

        <?php  } ?>

        <br><br>

        <form action="<?php echo BASE_URL; ?>/Profile/upData" enctype="multipart/form-data" method="POST">

            <div>

                <?php        
                foreach ($profilePic as $key => $value) { ?>
                    <!-- get current picture name  -->
                    <input type="hidden" name="imgName" value="<?php echo $value['profile_pic']; ?>">
                <?php  } ?>
                
                <input class="btn btn-sm btn-secondary m-2" type="file" name="profile_pic" required>
                
                <input class="btn btn-lg btn-outline-secondary " type="submit" name="submit" value="Change">
            </div>

        </form>

</center>
<br><br>