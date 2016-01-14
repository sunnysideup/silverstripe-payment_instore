<?php

/**
 * Payment object representing an In Store Payment (order online and pick-up in store).
 * @author Nicolaas [at] sunnysideup.co.nz
 * @package payment
 */
class InStorePayment extends EcommercePayment {

	private static $custom_message_for_in_store_payment = "";

	/**
	 * Process the In Store payment method
	 */
	function processPayment($data, $form) {
		$this->Status = 'Pending';
		$this->Message = Config::inst()->get("InStorePayment", "custom_message_for_in_store_payment");
		$this->write();
		return EcommercePayment_Success::create();
	}

	function getPaymentFormFields() {
		return new FieldList(
			new HiddenField("InStore", "InStore", 0)
		);
	}

	function getPaymentFormRequirements() {
		return null;
	}

}

