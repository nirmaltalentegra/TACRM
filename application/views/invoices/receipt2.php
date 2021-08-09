<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>


    <style type="text/css">
        #invoicePOS {
            box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
            padding: 2mm;
            margin: 0 auto;
            width: 100mm;
            background: #fff;
        }

        #invoicePOS ::selection {
            background: #f31544;
            color: #fff;
        }

        #invoicePOS ::moz-selection {
            background: #f31544;
            color: #fff;
        }

        #invoicePOS h1 {
            font-size: 1.5em;
            color: #222;
        }

        #invoicePOS h2 {
            font-size: 1.2em;
        }

        #invoicePOS h3 {
            font-size: 1.7em;
            font-weight: 300;
            line-height: 2em;
        }

        #invoicePOS p {
            font-size: 1.2em;
            color: #666;
            line-height: 1.2em;
        }

        #invoicePOS #top,
        #invoicePOS #mid,
        #invoicePOS #bot {
            /* Targets all id with 'col-' */
            border-bottom: 1px solid #eee;
        }

        #invoicePOS #top {
            min-height: 100px;
        }

        #invoicePOS #mid {
            min-height: 80px;
        }

        #invoicePOS #bot {
            min-height: 50px;
        }

        #invoicePOS #top .logo {
            height: 60px;
            width: 60px;
            background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
            background-size: 60px 60px;
        }

        #invoicePOS .clientlogo {
            float: left;
            height: 60px;
            width: 60px;
            background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
            background-size: 60px 60px;
            border-radius: 50px;
        }

        #invoicePOS .info {
            display: block;
            margin-left: 0;
        }

        #invoicePOS .title {
            float: right;
        }

        #invoicePOS .title p {
            text-align: right;
        }

        #invoicePOS table {
            width: 100%;
            border-collapse: collapse;
        }

        #invoicePOS .tabletitle {
            font-size: 0.7em;
            background: #eee;
        }

        #invoicePOS .service {
            border-bottom: 1px solid #eee;
        }

        #invoicePOS .item {
            width: 24mm;
        }

        #invoicePOS .itemtext {
            font-size: 0.7em;
        }

        #invoicePOS #legalcopy {
            margin-top: 5mm;
        }
    </style>


</head>

<body>
    <input type="button" onclick="printDiv('myprint')" value="print" />
    <div class="myprint" id="myprint" name="myprint" style="width:fit-content">
        <style type="text/css">
            #invoicePOS {
                box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
                padding: 2mm;
                margin: 0 auto;
                width: 100mm;
                background: #fff;
            }

            #invoicePOS ::selection {
                background: #f31544;
                color: #fff;
            }

            #invoicePOS ::moz-selection {
                background: #f31544;
                color: #fff;
            }

            #invoicePOS h1 {
                font-size: 1.5em;
                color: #222;
            }

            #invoicePOS h2 {
                font-size: 1.2em;
            }

            #invoicePOS h3 {
                font-size: 1.7em;
                font-weight: 300;
                line-height: 2em;
            }

            #invoicePOS p {
                font-size: 1.2em;
                color: #666;
                line-height: 1.2em;
            }

            #invoicePOS #top,
            #invoicePOS #mid,
            #invoicePOS #bot {
                /* Targets all id with 'col-' */
                border-bottom: 1px solid #eee;
            }

            #invoicePOS #top {
                min-height: 100px;
            }

            #invoicePOS #mid {
                min-height: 80px;
            }

            #invoicePOS #bot {
                min-height: 50px;
            }

            #invoicePOS #top .logo {
                height: 60px;
                width: 60px;
                background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
                background-size: 60px 60px;
            }

            #invoicePOS .clientlogo {
                float: left;
                height: 60px;
                width: 60px;
                background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
                background-size: 60px 60px;
                border-radius: 50px;
            }

            #invoicePOS .info {
                display: block;
                margin-left: 0;
            }

            #invoicePOS .title {
                float: right;
            }

            #invoicePOS .title p {
                text-align: right;
            }

            #invoicePOS table {
                width: 100%;
                border-collapse: collapse;
            }

            #invoicePOS .tabletitle {
                font-size: 0.9em;
                background: #eee;
            }

            #invoicePOS .service {
                border-bottom: 1px solid #eee;
            }

            #invoicePOS .item {
                width: 24mm;
            }

            #invoicePOS .itemtext {
                font-size: 0.9em;
            }

            #invoicePOS #legalcopy {
                margin-top: 5mm;
            }
        </style>
        <div id="invoicePOS" name="invoicePOS" class="invoicePOS print" style="width:fit-content">

            <center id="top">
                <div class="logo"></div>
                <div class="info">
                    <h2>Talent Inc</h2>
                </div>
                <!--End Info-->
            </center>
            <!--End InvoiceTop-->

            <div id="mid">
                <div class="info">
                    <h2>Customer Info</h2>
                    <p>
                        Name:
                        <?php echo $customer->firstname; ?>
                        Address :
                        <?php echo $customer->address; ?></br>
                        Email :
                        <?php echo  $customer->email; ?></br>
                        Phone :
                        <?php echo  $customer->phone ?></br>
                    </p>
                </div>
            </div>
            <!--End Invoice Mid-->
            <div id="mid">
                <div class="info">
                    <h2>Subject</h2>
                    <p>
                        Name:
                        <?php echo $subject ?><br>
                        Description :
                        <?php echo $description ?>
                    </p>
                </div>
            </div>
            <!--End Invoice Mid-->
            <div id="bot">

                <div id="table">
                    <table>
                        <tr class="tabletitle">
                            <td class="item">
                                <h2>Item</h2>
                            </td>
                            <td class="Hours">
                                <h2>Qty</h2>
                            </td>
                            <td class="Hours">
                                <h2>Rate</h2>
                            </td>
                            <td class="Rate">
                                <h2>Sub Total</h2>
                            </td>
                        </tr>
                        <?php foreach ($itemtbl as $item) { ?>
                            <tr class="service">

                                <td class="tableitem">
                                    <p class="itemtext">
                                        <?php echo $item['item_name'] ?>
                                    </p>
                                </td>
                                <td class="tableitem">
                                    <p class="itemtext">
                                        <?php echo $item['qty'] ?>
                                    </p>
                                </td>
                                <td class="tableitem">
                                    <p class="itemtext">
                                        <?php echo $item['rate'] ?>
                                    </p>
                                </td>
                                <td class="tableitem">
                                    <p class="itemtext">
                                        <?php echo $item['total'] ?>
                                    </p>
                                </td>
                            </tr>

                        <?php } ?>


                        <tr class="tabletitle">
                            <td>

                            </td>
                            <td>

                            </td>

                            <td class="Rate">
                                <h2>Total</h2>
                            </td>
                            <td class="payment">
                                <h2><?php echo  $total_amt ?></h2>
                            </td>
                        </tr>
                        <tr class="tabletitle">
                            <td>

                            </td>
                            <td>

                            </td>
                            <td class="Rate">
                                <h2>Balance</h2>
                            </td>
                            <td class="payment">
                                <h2><?php echo  $balance ?></h2>
                            </td>
                        </tr>

                    </table>
                </div>
                <!--End Table-->

                <div id="legalcopy">
                    <p class="legal"><strong>Thank you for your business!</strong>  Payment is expected within 31 days;
                        please
                        process this invoice within that time. There will be a 5% interest charge per month on late
                        invoices.
                    </p>
                </div>

            </div>
            <!--End InvoiceBot-->
        </div>
        <!--End Invoice-->
    </div>
</body>


<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>

</html>