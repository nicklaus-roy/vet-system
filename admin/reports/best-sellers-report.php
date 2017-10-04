<?php
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    include($root.'/admin/layouts/master.php');
?>
<div class="row" id = "app-best-selling">
    <div class="col s12">
        <div class="section">
            <h5>
                Best Sellers And Most Availed Service Report
            </h5>
        </div>
        <ul class="tabs">
            <li class="tab col s3"><a href="#best-sellers" @click = "renderBestSellersGraph()">Best Selling Products</a></li>
            <li class="tab col s3"><a href="#most-availed" @click = "renderMostAvailedGraph()">Most Availed Services</a></li>
        </ul>
        <div id="best-sellers" class="col s12">
            <canvas id="bestSellerChart" width="1200" height="400"></canvas>
        </div>
        <div id="most-availed" class="col s12">
            <canvas id="mostAvailedChart" width="1000" height="400"></canvas>
        </div>

    </div>
</div>

<?php
    include('../layouts/scripts.php');
?>
<script src="/js/chart.min.js"></script>
<script src="best-selling.js"></script>
<script>
</script>

<?php
    include($root.'/admin/layouts/footer.php');
?>