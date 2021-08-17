<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Order No#</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <style>
            .carttable{
                border-color: #fff;
            }

            .carttable td{
                padding: 5px 10px;
                border-color: #9E9E9E;
            }
            .carttable tr{
                /*padding: 0 10px;*/
                border-color: #9E9E9E;
                font-size: 12px
            }

            .detailstable td{
                padding:10px 20px;
            }

            .gn_table td{
                padding:3px 0px;
            }
            .gn_table th{
                padding:3px 0px;
                text-align: left;

            }
            .style_block{
                float: left;
                padding: 1px 1px;
                margin: 2.5px;
                /* background: #000; */
                color: white;
                border: 1px solid #e4e4e4;
                width: 47%;
                font-size: 12px;
            }


            .style_block span {
                background: #fff;
                margin-left: 5px;
                color: #000;
                padding: 0px 5px;
                width: 50%;
            }
            .style_block b {
                width: 46%;
                float: left;
                background: #dedede;
                color: black;
            }
            span.fr_value {
                margin-left: 1px;
                padding: 0;
                font-size: 9px;
                text-align: -webkit-left;
                position: absolute;
                margin-top: 0px;
                width: 20px;
            }

            .socialicons{
                height: 50px;
                /* float: left; */
                position: inherit;
                width: 50px;
                display: inline-block;
                margin-right: 20px;
            }

            .socialicons img {
                width: 50px;

            }
        </style>
    </head>
    <body style="margin: 0;
          padding: 0;
          background: rgb(225, 225, 225);
          font-family: sans-serif;">
        <div class="" style="padding:50px 0px">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="700" style="background: #FFF!important;padding: 0 20px">
                <tr>
                    <td >
                        <center><img src="<?php echo site_mail_logo; ?> " style="margin: 10px;
                                     height: 80px;color:white;
                                     width: auto;"/><br/>
                            <h3 style="color:black;">Thank you for your order</h3>
                        

                            <h4 style="color:black;"> Order No.: <?php echo $order_data->order_no; ?></h4>
                        </center>
                    </td>

                </tr>
            </table>
            <table class="detailstable" align="center" border="0" cellpadding="0" cellspacing="0" width="700" style="background: #fff">
                <tr>
                    <td style="font-size: 12px;width: 50%;padding: 2px 20px;padding-top: 25px;" >
                        <b>Delivery Address</b><hr/>
                    </td>

                    <td style="font-size: 12px;width: 50%;padding: 2px 20px;padding-top: 25px;" >

                        <b>Order Information</b><hr/>

                    </td>
                </tr>
                <tr>

                    <td style="font-size: 12px;width: 50%" >

                        <span style="text-transform: capitalize;margin-top: 10px;"> 
                            <?php echo $order_data->name; ?>
                        </span> <br/>
                        <div style="    padding: 5px 0px;font-size: 10px">
                            <?php echo $order_data->address1; ?><br/>
                            <?php echo $order_data->address2; ?><br/>


                        </div>
                        <table class="gn_table">
                            <tr>
                                <th>Email</th>
                                <td>: <?php echo $order_data->email; ?> </td>
                            </tr>
                            <tr>
                                <th>Contact No.</th>
                                <td>: <?php echo $order_data->contact_no; ?> </td>
                            </tr>
                        </table>

                       



                    </td>
                    <td style="font-size: 12px;width: 50%" >

                        <table class="gn_table">

                            <tr>
                                <th>Order No.</th>
                                <td>: <?php echo $order_data->order_no; ?> </td>
                            </tr>
                            <tr>
                                <th>Date/Time</th>
                                <td>: <?php echo $order_data->order_date; ?> <?php echo $order_data->order_time; ?>  </td>
                            </tr>
                            <tr>
                                <th>Payment Mode</th>
                                <td>: <?php echo $order_data->payment_mode; ?> </td>
                            </tr>
                            <tr>
                                <th>Txn No.</th>
                                <td>: <?php echo $payment_details['txn_id'] ? $payment_details['txn_id'] : '---'; ?> </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>: <?php
                                    if ($order_status) {
                                        echo end($order_status)->status;
                                    } else {
                                        echo "Pending";
                                    }
                                    ?> </td>
                            </tr>
                        </table>


                    </td>
                </tr>
            </table>
            <table class="carttable"  border-color= "#9E9E9E" align="center" border="1" cellpadding="0" cellspacing="0" width="700" style="background: #fff;padding:20px">
                <tr style="font-weight: bold">
                    <td style="width: 20px;text-align: center">S.No.</td>
                    <td colspan="2"  style="text-align: center">Product</td>

                    <td style="text-align: right;width: 100px">Price (In <?php echo trim(globle_currency); ?>)</td>
                    <td style="text-align: right">Qnty.</td>
                    <td style="text-align: right;width: 100px">Total (In  <?php echo trim(globle_currency); ?>)</td>
                </tr>
                <!--cart details-->
                <?php
                foreach ($cart_data as $key => $product) {
                    ?>
                    <tr>
                        <td style="text-align: right">
                            <?php echo $key + 1; ?>
                        </td>

                        <td style="width: 50px">
                            <center>   <img src=" <?php echo $product->file_name; ?>" style="height: 50px;"></img>
                        </td>

                        <td style="width: 200px;">
                            <?php echo $product->title; ?><br/>
                            <small style="font-size: 10px;">(<?php echo $product->sku; ?>)</small>


                        </td>

                        <td style="text-align: right">
                            <?php // echo $product->price; ?>
                            <?php echo number_format($product->price, 2, '.', ''); ?>
                        </td>

                        <td style="text-align: right">
                            <?php echo $product->quantity; ?>
                        </td>

                        <td style="text-align: right;">
                            <?php // echo $product->total_price; ?>
                            <?php echo number_format($product->total_price, 2, '.', ''); ?>
                        </td>
                    </tr>

                    <?php
                }
                ?>
                <!--end of cart details-->




                <tr>
                    <td colspan="3"  rowspan="5" style="font-size: 12px">
                        <b>Total Amount in Words: </b><br/>
                        <span style="text-transform: capitalize">  <?php echo $order_data->amount_in_word; ?></span>
                    </td>

                </tr>
                <tr>
                    <td colspan="2" style="text-align: right">Sub Total</td>
                    <td style="text-align: right;width: 60px"><?php echo globle_currency . " " . number_format($order_data->sub_total_price, 2, '.', ''); ?> </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right">Delivery Charges</td>
                    <td style="text-align: right;width: 60px"><?php echo globle_currency . " " . number_format($order_data->shipping_price, 2, '.', ''); ?> </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right">Coupon Discount</td>
                    <td style="text-align: right;width: 60px"><?php echo globle_currency . " " . number_format($order_data->credit_price, 2, '.', ''); ?> </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right">Toal Amount</td>
                    <td style="text-align: right;width: 60px"><?php echo globle_currency . " " . number_format($order_data->total_price, 2, '.', ''); ?> </td>
                </tr>


                <tr>
                    <td colspan="6" style="font-size: 12px;background: lightgrey;">



                        <?php echo EMAIL_FOOTER; ?>
              

                        <br/>
                        <span style="    text-align: center;
                              width: 100%;
                              float: left;
                              margin-top: 24px;
                              /*                              background-color: white;*/
                              color: black;
                              font-size: 10px;"> (This is computer generated receipt and does not require physical signature.)</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="padding: 0px;">



                    </td>
                </tr>

            </table>


        </div>
    </body>
</html>