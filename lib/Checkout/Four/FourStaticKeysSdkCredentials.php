<?php

namespace Checkout\Four;

use Checkout\AuthorizationType;
use Checkout\CheckoutAuthorizationException;
use Checkout\PlatformType;
use Checkout\SdkAuthorization;

class FourStaticKeysSdkCredentials extends AbstractStaticKeysSdkCredentials
{

    /**
     * @param string|null $secretKey
     * @param string|null $publicKey
     */
    public function __construct(?string $secretKey, ?string $publicKey)
    {
        parent::__construct($secretKey, $publicKey);

    }

    /**
     * @throws CheckoutAuthorizationException
     */
    function getAuthorization(string $authorizationType): SdkAuthorization
    {
        switch ($authorizationType) {
            case AuthorizationType::$publicKey:
            case AuthorizationType::$publicKeyOrOAuth:
                if (empty($this->publicKey)) {
                    throw CheckoutAuthorizationException::invalidPublicKey();
                }
                return new SdkAuthorization(PlatformType::$four, $this->publicKey);
            case AuthorizationType::$secretKey:
            case AuthorizationType::$secretKeyOrOAuth:
                if (empty($this->secretKey)) {
                    throw CheckoutAuthorizationException::invalidSecretKey();
                }
                return new SdkAuthorization(PlatformType::$four, $this->secretKey);
            default:
                throw CheckoutAuthorizationException::invalidAuthorization($authorizationType);
        }
    }
}
