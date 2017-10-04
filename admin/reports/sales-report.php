<?php
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    include($root.'/admin/layouts/master.php');
?>
<div class="row" id = "app-sales-report">
    <div class="col s12">
        <div class="section">
            <h5>
                Sales Report
            </h5>
        </div>
        <ul class="tabs">
            <li class="tab col s3"><a href="#monthly" @click = "renderMonthlyChart()">Monthly</a></li>
            <li class="tab col s3"><a href="#yearly" @click = "renderYearlyChart()">Yearly</a></li>
        </ul>
        <div id="monthly" class="col s12">
            <canvas id="monthlyChart" width="1000" height="400"></canvas>
        </div>
        <div id="yearly" class="col s12">
            <canvas id="yearlyChart" width="1000" height="400"></canvas>
        </div>

    </div>
</div>

<?php
    include('../layouts/scripts.php');
?>
<script src="/js/chart.min.js"></script>
<script src="reports.js"></script>
<script>
</script>

<?php
    include($root.'/admin/layouts/footer.php');
?>