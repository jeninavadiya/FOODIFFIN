<?php 

require('stripe-php-master/init.php');

$publishablekey="pk_test_51MVAzYSC0bQIuKk2ZU40LmV61fXqLz1LKqMDvnVXQvnwdorvsugzT5z4wtK6VaO0XHPv6wNecIbjRP8RlNKZv69B00egMZyt3M";
$secretkey="sk_test_51MVAzYSC0bQIuKk2wpGM3bVrEACeKNigznVwXCyLD6xPCuBAvAHcHhR3haWr8hyAovtTDSFoj6h1X18kr7eUd4PH0076CzmkbJ";

\Stripe\Stripe::setApiKey($secretkey);
    
?>