  <center>
    <h1> Sales Voucher </h1>

    <?php
    $user = $_SESSION['userData'];
    if ($user['role_id'] == '2') { ?>

      <form class="needs-validation" class="" action="<?php echo BASE_URL; ?>/Sales/create" method="post" novalidate>
        <label class="form-label m-2" for="member_id"> Outlet Name : </label>
        <select name="outlet_name" class="form-control select2">
          <?php
          foreach ($outlet_info as $key => $value) {
          ?>
            <option value="<?php echo $value['outlet_name']; ?>"> <?php echo $value['outlet_name']; ?> </option>
          <?php  } ?>

        </select>

        <label class="form-label m-2" for="member_id"> Product : </label>
        <select name="pr_name" class="form-control select2">
          <?php
          foreach ($product_list as $key => $value) {
          ?>
            <option value="<?php echo $value['pr_name']; ?>"> <?php echo $value['pr_name']; ?> </option>
          <?php  } ?>

        </select>

        <label class="form-label m-2" for="price"> Price (TP): </label>
        <input class="form-control form-control-sm" autocomplete="off" type="text" name="price" placeholder="BDT">

        <label class="form-label m-2" for="quantity"> Quantity : </label>
        <input class="form-control form-control-sm" autocomplete="off" type="text" name="quantity" placeholder="00">

        <label class="form-label m-2" for="deposit_date"> Order Date : </label>
        <input class="form-control form-control-sm" type="date" name="deposit_date" required>
        <div class="invalid-feedback">
          Select Your Order Date
        </div>

        <input class="btn btn-primary mt-4" type="submit" name="meal" value="Submit">
      </form>

    <?php  } ?>

    <br><br>

    <table class="table table-striped text-center" id="myTable">
      <thead>
        <tr>
          <th> S/L </th>
          <th> Outlet Name </th>
          <th> Total Value (BDT) </th>
          <th> Details </th>
        </tr>
      </thead>
      <tbody>
        <?php
        $serial = "1";
        foreach ($sellInfo as $key => $value) {
        ?>
          <tr>
            <td> <?php echo $serial++ ?> </td>
            <td> <?php echo $value['outlet_name']; ?> </td>
            <td> <?php echo $value['total_value']; ?> </td>
            <td>
              <a href="<?php echo BASE_URL; ?>/Sales/details/<?php echo $value['outlet_name']; ?> ">
                <i class="btn btn-info fa fa-info-circle"> </i>
              </a>              
            </td>
          </tr>
        <?php  } ?>
      </tbody>
    </table>

    <br><br><br>

  </center>