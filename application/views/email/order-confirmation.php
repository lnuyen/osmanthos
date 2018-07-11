<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Scent Market — Order Confirmation</title>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css' />
  
        <style>
            #emailContainer td {
                background-color: #FCF8F9;
                color: #222;
                font-family: 'Open Sans', sans-serif; 
                font-size: 12px;
                font-weight: 300;
                line-height: 24px;
            }
            #footer td, #header td {
                border:1px solid #EEE;
            }
            #footer td {
                background-color: #FFF;
                border-top: none;
                color: #222;
                font-family: 'Open Sans', sans-serif; 
                font-size: 12px;
                font-weight: 300;
                line-height: 24px;
            }
            #header td {
                border-bottom: none;
            }
            a {
                color: #93CCEA;
            }
            a.social-icon {
                background: url(http://thescentmarket.com/assets/public/images/email/social-icons.png);
                display: inline-block;
                height:30px;
                margin-left: 4px;
                overflow: hidden;
                text-indent: -999px;
                vertical-align: top;
                width:30px;
            }
            a.social-icon#twitter {
                background-position: -36px 0;
                margin-left: 20px; 
            }
            a.social-icon#pinterest {
                background-position: -74px 0; 
            }
            a.social-icon#instagram {
                background-position: -110px 0; 
            }
        </style>
    </head>
    <body>

        <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
            <tr>
                <td align="center" valign="top">
                    <table border="0" cellpadding="20" cellspacing="0" width="600" id="header">
                        <tr>
                            <td align="left" valign="top">
                                <p style="text-align:center;"><a href="http://thescentmarket.com" style=""><img src="http://thescentmarket.com/assets/public/images/email/scent-market-mail-logo.png" alt="Scent Market"></a></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" valign="top">
                    <table border="0" cellpadding="20" cellspacing="0" width="600" id="emailContainer">
                        <tr>
                            <td align="left" valign="top">
                                <p>Hi <?php echo ucfirst($ship['firstName']); ?> <?php echo ucfirst($ship['lastName']); ?>,</p>
                                <p>Thank you for your order. Your payment has been processed and you will receive notification when items ship. 
                                Every product is made to order and shipments are usually sent within 2-3 days of when your order is placed. Please review your order details below:</p>
                                <br/>
                                <p style="font-size:16px;"><strong>Order No. </strong><?php echo $order_id; ?></p>

                                <?php foreach ($cart as $item): ?>
                                <div style="border-top: 1px solid #DDD; border-bottom: 1px solid #DDD; margin: -1px 0 0; padding: 1px 10px; text-transform: uppercase;">
                                    <p><strong>Item: </strong><?php echo $item['name']; ?>
                                        <?php if ($this->cart->has_options($item['rowid'])) {
                                            $array = $this->cart->product_options($item['rowid']);
                                            echo ', ' . reset($array);
                                        } ?>
                                    </p>
                                    <p><strong>Quantity: </strong><?php echo $item['qty']; ?></p>
                                    <p><strong>Price:</strong> $<?php echo $item['price']; ?></p>
                                </div>
                                <?php endforeach; ?>

                                <p style="font-size:16px;"><strong>Order Total:</strong> $<?php echo $price; ?>.00</p>
                                <br/>
                                <p style="font-size:80%; text-align:center;">Questions? Email us at <a href="mailto:hello@thescentmarket.com">hello@thescentmarket.com</a></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" valign="top">
                    <table border="0" cellpadding="20" cellspacing="0" width="600" id="footer">
                        <tr>
                            <td align="left" valign="top">
                                <p style="text-align:center;">
                                    <a href="http://twitter.com/scentmarket" class="social-icon" id="twitter" target="_blank">Twitter</a>
                                    <a href="http://facebook.com/scentmarket" class="social-icon" id="facebook" target="_blank">Facebook</a>
                                    <a href="http://pinterest.com/scentmarket" class="social-icon" id="pinterest" target="_blank">Pinterest</a>
                                    <a href="http://instagram.com/scentmarket" class="social-icon" id="instagram" target="_blank">Instagram</a>
                                </p>
                                <p style="font-size:80%; text-transform:uppercase; text-align:center;">Create Your Own Fragrance. © TheScentMarket.com</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

    </body>
</html>