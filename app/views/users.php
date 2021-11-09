<?php 
    $user = $_SESSION['userData'];
?>
<center>
    <h2> User List </h2>

    <div class="table-responsive">
        <table class="table table-hover table-striped table-sm text-center">
            <tr>
                <th> S/L </th>
                <th> User Name </th>
                <?php 
                    if ($user['role_id'] == 2) { ?>
                        <th class="text-center"> Action </th>
                <?php  } ?>                
            </tr>
            <?php
            $serial = 1;
            foreach ($usersList as $key => $value) { ?>

                <tr>
                    <td> <?php echo $serial++ ?> </td>
                    <td> <?php echo $value['name'] ?> </td>
                    <?php 
                        if ($user['role_id'] == 2) { ?>
                            <td class="text-center">
                                <a class="btn btn-info" href="<?php echo BASE_URL; ?>/Index/edit/<?php echo $value['name']; ?>"> Edit </a>
                                <a onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger" href="<?php echo BASE_URL; ?>/Index/delete/<?php echo $value['id']; ?>"> Delete </a>
                            </td>
                    <?php  } ?>
                </tr>

            <?php } ?>
        </table>
    </div>

    <br><br>
    
    <?php
    $user = $_SESSION['userData'];
    if ($user['role_id'] == '2') { ?>

        <h1> Create Account For Member </h1>

        <form class="row row-cols-lg-auto g-3 needs-validation" action="<?php echo BASE_URL; ?>/Index/userCR" method="POST" novalidate>
            <div class="col-md-12">
                <label class="visually-hidden" for="Username">Username</label>
                <div class="input-group">
                    <div class="input-group-text"> 👩‍🦰 </div>
                    <input type="text" class="form-control" name="name" id="Username" placeholder="Username" required>
                    <div class="invalid-feedback">
                        Type username for member
                    </div>
                </div>                
            </div>            

            <div class="col-md-12">
                <label class="visually-hidden" for="Email">Email</label>
                <div class="input-group">
                    <div class="input-group-text"> 📧</div>
                    <input type="email" class="form-control" name="email" id="Email" placeholder="Email" required>
                    <div class="invalid-feedback">
                        Input member email address
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <label class="visually-hidden" for="Password">Password</label>
                <div class="input-group">
                    <div class="input-group-text"> 🔐 </div>
                    <input type="password" class="form-control" name="pass" id="Password" placeholder="Password" required>
                    <div class="invalid-feedback">
                        Password should be not empty
                    </div>
                </div>
            </div>

            <input type="hidden" name="company_name" value="<?php echo $user['company_name']; ?>">
            <input type="hidden" name="phn" value="<?php echo $user['email'] . "<br>"; ?><?php echo $user['phn']; ?>">
            <br><br><br><br><br>
            <div class="col-12">                
                <button type="submit" class="btn btn-success" value="Submit" name="submit"> Create Account </button>
            </div>
        </form>

    <?php  } ?>
    
</center>
<br><br>