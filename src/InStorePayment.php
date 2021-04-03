<?php

namespace Sunnysideup\PaymentInstore;

use SilverStripe\Core\Config\Config;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HiddenField;
use Sunnysideup\Ecommerce\Forms\OrderForm;
use Sunnysideup\Ecommerce\Model\Money\EcommercePayment;
use Sunnysideup\Ecommerce\Model\Order;
use Sunnysideup\Ecommerce\Money\Payment\PaymentResults\EcommercePaymentSuccess;

/**
 * Payment object representing an In Store Payment (order online and pick-up in store).
 *
 * @author Nicolaas [at] sunnysideup.co.nz
 */
class InStorePayment extends EcommercePayment
{
    private static $custom_message_for_in_store_payment = '';

    /**
     * Process the In Store payment method.
     *
     * @param mixed $data
     */
    public function processPayment($data, OrderForm $form)
    {
        $this->Status = 'Pending';
        $this->Message = Config::inst()->get(InStorePayment::class, 'custom_message_for_in_store_payment');
        $this->write();

        return EcommercePaymentSuccess::create();
    }

    public function getPaymentFormFields(?float $amount = 0, ?Order $order = null): FieldList
    {
        return new FieldList(
            new HiddenField('InStore', 'InStore', 0)
        );
    }

    public function getPaymentFormRequirements(): array
    {
        return [];
    }
}
