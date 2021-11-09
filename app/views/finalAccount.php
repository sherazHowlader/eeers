<center>
    <h1 style="font-variant:small-caps"> <b><i>Monthly Report</i></b> </h1>
    <br>
    <table class="table table-striped text-center table-responsive-sm" id="myTable" >
        <thead>
            <tr>
                <th> Product Name </th>
                <th> Stock </th>
                <th> Sell </th>
                <!-- <th> Damage </th> -->
                <th> InStock </th>
                <th> Total Value </th>
            </tr>
        </thead>
        <tbody>
            <?php
                $serial = "1";
                foreach ($prList as $key => $value) {
            ?>
            <tr>
                <td> <?php echo $value['pr_name']; ?> </td>
                <td> <?php echo $value['sumStore']; ?> </td>
                <td> <?php echo $value['sumSell'] ?> <span class="badge badge-pill badge-danger"> Return - <?php echo $value['sumDam']; ?> </span></td>
                <!-- <td> <?php echo $value['sumDam']; ?> </td> -->
                <td> <?php echo $value['sumStore'] - $value['sumSell']?> </td>
                <td> <?php echo $value['sumSellValue'] - $value['sumDamValue'] ?> <span class="badge badge-pill badge-danger"> Lose - <?php echo $value['sumDamValue']; ?> </span></td> </td>
                        
            </tr>
            <?php  } ?>
        </tbody>
    </table>
    <br><br><br><br><br>
</center>