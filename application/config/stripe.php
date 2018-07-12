<?php
require_once('../application/libraries/lib/Stripe.php');

$stripe = array(
  "secret_key"      => "sk_test_y8ahIpCF8f0htozHHWT2e39P",
  "publishable_key" => "pk_test_m2tSzMsaphDIvBvr4NyAVK9t"
);

Stripe::setApiKey($stripe['secret_key']);
