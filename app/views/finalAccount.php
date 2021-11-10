<center>
    <h1 style="font-variant:small-caps"> <b><i> Report </i></b> </h1>
    <br>
    <table class="table table-striped text-center table-responsive-sm" id="myTable" >
        <thead>
            <tr>
                <th> Product Name </th>
                <th> Stock </th>
                <th> Sell </th>               
                
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
                <td> <?php echo $value['sumStore'] - $value['sumSell'] - $value['sumDam']; ?> </td>
                <td> <?php echo $value['sumSell'] ?> 
                    <span class="badge badge-pill badge-danger"> Return - <?php echo $value['sumDam']; ?> </span>
                </td>
                
                
                <td> <?php echo $value['sumSellValue'] - $value['sumDamValue'] ?> 
                    <span class="badge badge-pill badge-danger"> Lose - <?php echo $value['sumDamValue']; ?> </span>
                </td>                        
            </tr>
            <?php  } ?>
        </tbody>
        <?php                    
                foreach ($storeCapital as $key => $value) {                 
            ?>
                <tr class="tbl_footer table-danger">
                    <td style="border-right: 2px solid black;"> <b> Total Sell - <?php echo $value['sumSellValue'] . " TK" ?> </b> </td>
                    <td colspan="3"> <b> Total Damage - <?php echo $value['sumDamValue'] . " TK" ?> </b> </td>
                </tr>
            <?php  } ?>
    </table>
    <br><br><br><br><br>
</center>