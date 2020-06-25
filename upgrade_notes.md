2020-06-25 03:39

# running php upgrade upgrade see: https://github.com/silverstripe/silverstripe-upgrader
cd /var/www/upgrades/payment_instore
php /var/www/ss3/upgrader/vendor/silverstripe/upgrader/bin/upgrade-code upgrade /var/www/upgrades/payment_instore/payment_instore  --root-dir=/var/www/upgrades/payment_instore --write -vvv
Writing changes for 2 files
Running upgrades on "/var/www/upgrades/payment_instore/payment_instore"
[2020-06-25 15:39:56] Applying RenameClasses to _config.php...
[2020-06-25 15:39:56] Applying ClassToTraitRule to _config.php...
[2020-06-25 15:39:56] Applying RenameClasses to PaymentInstoreTest.php...
[2020-06-25 15:39:56] Applying ClassToTraitRule to PaymentInstoreTest.php...
[2020-06-25 15:39:56] Applying RenameClasses to InStorePayment.php...
[2020-06-25 15:39:56] Applying ClassToTraitRule to InStorePayment.php...
modified:	tests/PaymentInstoreTest.php
@@ -1,4 +1,6 @@
 <?php
+
+use SilverStripe\Dev\SapphireTest;

 class PaymentInstoreTest extends SapphireTest
 {

modified:	src/InStorePayment.php
@@ -2,11 +2,18 @@

 namespace Sunnysideup\PaymentInstore;

-use EcommercePayment;
-use Config;
-use EcommercePaymentSuccess;
-use FieldList;
-use HiddenField;
+
+
+
+
+
+use SilverStripe\Core\Config\Config;
+use Sunnysideup\PaymentInstore\InStorePayment;
+use Sunnysideup\Ecommerce\Money\Payment\PaymentResults\EcommercePaymentSuccess;
+use SilverStripe\Forms\HiddenField;
+use SilverStripe\Forms\FieldList;
+use Sunnysideup\Ecommerce\Model\Money\EcommercePayment;
+


 /**
@@ -24,7 +31,7 @@
     public function processPayment($data, $form)
     {
         $this->Status = 'Pending';
-        $this->Message = Config::inst()->get("InStorePayment", "custom_message_for_in_store_payment");
+        $this->Message = Config::inst()->get(InStorePayment::class, "custom_message_for_in_store_payment");
         $this->write();
         return EcommercePaymentSuccess::create();
     }

Writing changes for 2 files
✔✔✔