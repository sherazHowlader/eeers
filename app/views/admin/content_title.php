<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">                
            <i class="fas fa-home"></i>
            </div>
            <div>
                <?php
                    $user = $_SESSION['userData'];
                    echo $user['company_name'];
                ?>
            </div>
        </div>
    </div>
</div>