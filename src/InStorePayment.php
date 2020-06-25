<?php

namespace Sunnysideup\PaymentInstore;

use SilverStripe\Core\Config\Config;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HiddenField;
use Sunnysideup\Ecommerce\Model\Money\EcommercePayment;
use Sunnysideup\Ecommerce\Money\Payment\PaymentResults\EcommercePaymentSuccess;

/**
 * Payment object representing an In Store Payment (order online and pick-up in store).
 * @author Nicolaas [at] sunnysideup.co.nz
 * @package payment
 */
class InStorePayment extends EcommercePayment
{
    private static $custom_message_for_in_store_payment = '';

    /**
     * Process the In Store payment method
     */
    public function processPayment($data, $form)
    {
        $this->Status = 'Pending';
        $this->Message = Config::inst()->get(InStorePayment::class, 'custom_message_for_in_store_payment');
        $this->write();
        return EcommercePaymentSuccess::create();
    }

    public function getPaymentFormFields($amount = 0, $order = null)
    {
        return new FieldList(
            new HiddenField('InStore', 'InStore', 0)
        );
    }

    public function getPaymentFormRequirements()
    {
        return null;
    }
}
