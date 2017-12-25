<?php 
require 'vendor/autoload.php';

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

define('SITE_URL', 'http://'.$_SERVER['HTTP_HOST']);
$paypal = new ApiContext(
            new OAuthTokenCredential(
                'AT2yyQjxq29Q0xVqu3tDAtqtQcgxoio4raQ9_1OEOLOahZsfzRYG847dfahcnZbw2z3zVPImJHcdH1kQ',
                'ELaHxkKssmFhz751l9TI4ew06UinmfWniLYNx32CfWOJ1uyDm9tlz97bTR4F60jW7Sihk0LcxIxtLhNR'
            )
        );
$experienceProfileId = 'XP-743H-QNR6-6T7D-WVGU';