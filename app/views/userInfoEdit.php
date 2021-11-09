<center>  
        <h1> Update User Info </h1>
        <?php 
            foreach ($userInfo as $key => $value) { ?>

        <form class="row row-cols-lg-auto g-3 needs-validation" action="<?php echo BASE_URL; ?>/Index/update/<?php echo $value['name'];?>" method="POST" novalidate>
            <div class="col-md-12">
                <label class="visually-hidden" for="Username">Username</label>
                <div class="input-group">
                    <div class="input-group-text"> 👩‍🦰 </div>
                    <input type="text" class="form-control" name="name" id="Username" value="<?php echo $value['name'];?>">
                    <div class="invalid-feedback">
                        Type username for member
                    </div>
                </div>                
            </div>            

            <div class="col-md-12">
                <label class="visually-hidden" for="Email">Email</label>
                <div class="input-group">
                    <div class="input-group-text"> 📧</div>
                    <input type="email" class="form-control" name="email" id="Email" value="<?php echo $value['email'];?>" required>
                    <div class="invalid-feedback">
                        Input member email address
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <label class="visually-hidden" for="Password">Password</label>
                <div class="input-group">
                    <div class="input-group-text"> 🔐 </div>
                    <input type="text" class="form-control" name="pass" id="Password" value="<?php echo $value['pass'];?>" required>
                    <div class="invalid-feedback">
                        Password should be not empty
                    </div>
                </div>
            </div>

            <input type="hidden" class="form-control" name="id" id="Password" value="<?php echo $value['id'];?>">
            
            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-success" value="Submit" name="submit"> Update </button>
            </div>
        </form>
        <?php  } ?>
    <br><br>
</center>

<br><br>