<?php

namespace Sunnysideup\PaymentInstore;

use Override;
use SilverStripe\Core\Config\Config;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\HiddenField;
use SilverStripe\Forms\LiteralField;
use Sunnysideup\Ecommerce\Model\Money\EcommercePayment;
use Sunnysideup\Ecommerce\Model\Order;
use Sunnysideup\Ecommerce\Money\Payment\PaymentResults\EcommercePaymentSuccess;

/**
 * Payment object representing an In Store Payment (order online and pick-up in store).
 */
class InStorePayment extends EcommercePayment
{
    private static $table_name = 'InStorePayment';

    private static $custom_message_for_in_store_payment = '';

    /**
     * Process the In Store payment method.
     *
     * @param mixed $data
     */
    #[Override]
    public function processPayment($data, Form $form)
    {
        $this->Status = EcommercePayment::PENDING_STATUS;
        $this->Message = Config::inst()->get(InStorePayment::class, 'custom_message_for_in_store_payment');
        $this->write();

        return EcommercePaymentSuccess::create();
    }

    #[Override]
    public function getPaymentFormFields($amount = 0, ?Order $order = null): FieldList
    {
        $msg = _t(self::class . 'PAY_IN_STORE', 'Pay in Store');
        return FieldList::create(HiddenField::create('InStore', 'InStore', 0), LiteralField::create('PayInStore', '<div>' . $msg . '</div>'));
    }

    #[Override]
    public function getPaymentFormRequirements(): array
    {
        return [];
    }
}
