<center>
    <h1 style="font-variant:small-caps"> <b><i> Report </i></b> </h1>
    <br>
    <table class="table table-striped text-center table-responsive-sm" id="myTable">
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

                <div class="row">
                    <div class="col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content bg-midnight-bloom">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading"> Total Sell - </div>
                                    <!-- <div class="widget-subheading">Last year expenses</div> -->
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-white"><span> <b> <?php echo $value['sumSellValue'] . " TK" ?> </b> </span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content bg-night-fade">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading"> Total Damage - </div>
                                    <!-- <div class="widget-subheading">Last year expenses</div> -->
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-white"><span> <b> <?php echo $value['sumDamValue'] . " TK" ?> </b> </span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content bg-happy-green">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading"> Total Profit - </div>
                                    <!-- <div class="widget-subheading">Last year expenses</div> -->
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-white"><span> <b> <?php echo "Pending..." ?> </b> </span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </tr>
        <?php  } ?>
    </table>
    <br><br><br><br><br>
</center>