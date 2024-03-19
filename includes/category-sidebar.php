
<!-- Categories SIDE BAR STARTS HERE-->
<div class="widget widget-categories mb-4 pb-4 border-bottom">
    <h3 class="widget-title">Categories</h3>
    <div class="accordion mt-n1" id="shop-categories">
        <?php
        $listcat = mysqli_query($con, "SELECT * FROM categories ORDER BY catname ASC");
        while ($lc = mysqli_fetch_assoc($listcat)) {
            $catid = $lc["id"];
            $listsubcat = mysqli_query($con, "SELECT * FROM subcategories WHERE catid='$catid' ORDER BY subcatname ASC");
        ?>
            <div class="accordion-item">
                <h3 class="accordion-header">
                    <a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapse-<?php echo $catid; ?>" href="#collapse-<?php echo $catid; ?> "><?php echo  $lc["catname"]; ?></a>
                </h3>
                <div id="collapse-<?php echo $catid; ?>" class="accordion-collapse collapse" data-bs-parent="#shop-categories">
                    <div class="accordion-body">
                        <div class="widget widget-links widget-filter">
                            <ul class="widget-list widget-filter-list pt-1" style="height: 12rem;" data-simplebar data-simplebar-auto-hide="false">
                                <?php
                                while ($lsc = mysqli_fetch_assoc($listsubcat)) {
                                ?>
                                    <li class="widget-list-item widget-filter-item">
                                        <a class="widget-list-link d-flex justify-content-between align-items-center" href="#">
                                            <span class="widget-filter-item-text"><?php echo $lsc['subcatname']; ?></span>
                                            
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<!-- Categories SIDE BAR ENDS HERE-->


