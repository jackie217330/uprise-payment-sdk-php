<?php

namespace Checkout\Payments\Source\Apm;

use Checkout\Common\PaymentSourceType;
use Checkout\Payments\Source\AbstractRequestSource;

class RequestMultiBancoSource extends AbstractRequestSource
{
    public function __construct()
    {
        parent::__construct(PaymentSourceType::$multibanco);
    }

    /**
     * @var string values of Country
     */
    public $payment_country;

    /**
     * @var string
     */
    public $account_holder_name;

    /**
     * @var string
     */
    public $billing_descriptor;
}
