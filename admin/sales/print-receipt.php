<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');
    $receipt_number = $_GET['receipt_number'];
    // $receipt_number = 8;
    $receipt_details = $conn->query("SELECT * FROM official_receipts WHERE receipt_number = '$receipt_number'")->fetch_assoc();
    $sales = $conn->query("SELECT s.amount, s.original_amount, p.name FROM sales s INNER JOIN products p ON p.id = s.product_id 
        WHERE s.receipt_number = '$receipt_number'");
    $services_rendered = $conn->query("SELECT se.actual_price, se.price, s.name FROM services_rendered se 
        INNER JOIN services s ON s.id = se.service_id
        WHERE se.receipt_number = '$receipt_number'");
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Animal Haven Veterinary Clinic</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <style>
        #row1{
            display:flex;
            flex-direction:row;
            justify-content: space-around;
        }

        #column1{
            display:flex;
            flex-direction:column;

        }


        #column2{
            display:flex;
            flex-direction:column;
            width: 500px;
        }
        table {
            border-collapse: collapse;
            width: 250px;
        }
        table, th, td {
            border:1px solid black;
            padding: 0px 3px;

        }
        td{
            height: 21px;
        }
        .center{
            text-align: center;
        }
        .heading h4{
            margin:0;
        }
        .heading p{
            font-size: 12;
            margin: 0
        }
        .receipt-body p {
            margin:0px;
        }
    </style>
    <body>
        <div id="row1">
            <div id = "column1">
                <table>
                    <tbody>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <strong>In settlement of the follwing:</strong>
                            </td>
                        </tr>
                        <tr>
                            <td>Particulars.</td>
                            <td>Amount</td>
                        </tr>
                        <?php while($sale = $sales->fetch_assoc()){?>
                        <tr>
                            <td><?=$sale['name']?></td>
                            <td><?=$sale['original_amount']?></td>
                        </tr>
                        <?php }?>
                        <?php while($service_rendered = $services_rendered->fetch_assoc()){?>
                        <tr>
                            <td><?=$service_rendered['name']?></td>
                            <td><?=$service_rendered['price']?></td>
                        </tr>
                        <?php }?>
                        <tr>
                            <td>Total</td>
                            <td><?=$receipt_details['total_sales']?></td>
                        </tr>
                        <tr>
                            <td>Less: SC/PWD Discount</td>
                            <td><?=$receipt_details['discount']?></td>
                        </tr>
                        <tr>
                            <td>Total Due</td>
                            <td><?=$receipt_details['amount_due']?></td>
                        </tr>
                        <tr>
                            <td>Less:Withholding Tax</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Total Payment</td>
                            <td><?=$receipt_details['amount_given']?></td>
                        </tr>
                        <tr>
                            <td>Change</td>
                            <td><?=$receipt_details['customer_change']?></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <strong>Form of Payment</strong>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                Cash: <span style="color:red"><?php echo $receipt_details['payment_method'] == 'cash' ? "X": "" ?></span>
                                &nbsp&nbsp&nbsp&nbsp&nbsp
                                Check: <?php echo $receipt_details['payment_method'] == 'check' ? "X": "" ?> 
                            </td>
                        </tr>
                        <tr>
                            <td>Check No:</td>
                            <td><?=$receipt_details['check_number']?></td>
                        </tr>
                        <tr>
                            <td>Bank:</td>
                            <td><?=$receipt_details['bank']?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id = "column2">
                <div class = "center heading">
                    <h4 style="margin-bottom: 0">ANIMAL HAVEN VETERINARY CLINIC</h4>
                    <p>ID 35 Km 6, Betag, La Trinidad, Benguet</p>
                    <p>GINA V. MAGALGALIT - Prop.</p>
                    <p>Non-VAT Reg. TIN: 416-961-609-000</p>
                    <p>Contact No: 09998273392</p>                    
                </div>
                <div class="receipt-body">
                    <p style="float:left">
                        <b>OFFICIAL RECEIPT</b>
                    </p>
                    <p style="float:right">
                        Date: <?= date_format(date_create($receipt_details['transaction_date']) , "M. d, Y")?> 
                    </p>
                    <br>
                    <br>
                    <p>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <?=str_pad("Received from ", 60, "_")?>
                    </p>
                    <p><?=str_pad("with address at ", 65, "_")?></p>
                    <p><?=str_pad("engaged in the business style of ", 65, "_")?></p>
                    <p><?=str_pad("the sum of pesos", 65, "_")?></p>
                    <p><?=str_pad("", 50, "_")?> (₱_________)</p>
                    <p><?=str_pad("In () partial/ () full payment of ", 70, "_")?></p>
                    <p><?=str_pad("", 65, "_")?></p>
                </div>
                <br>
                <div class = "receipt-footer" >
                    <table style="float:left">
                        <tbody>
                            <tr style="height: 40px; vertical-align: top">
                                <td colspan="2"><small>TIN/ Sr. Citizen TIN</small></td>
                            </tr>
                            <tr style="height: 40px; vertical-align: top">
                                <td><small>OSCA/PWD ID No.</small></td>
                                <td><small>Signature</small></td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="float:right;">
                        By: _______________________
                        <p style="margin: 0; text-align: center"><small>Authorized Representative</small></p>
                    </div>
                </div>
                <h4 style="color:red">No.<?=$receipt_details['receipt_number']?></h4>                
            </div>
        </div>
        <!-- <button id = "print-button" onclick="printPage()">Print</button> -->
        
        
        
    </body>
    <script>
        function printPage(){
            // document.getElementById('print-button').
            window.print();
        }
    </script>
</html>