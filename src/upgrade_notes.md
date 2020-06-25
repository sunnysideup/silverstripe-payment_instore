2020-06-25 03:40

# running php upgrade inspect see: https://github.com/silverstripe/silverstripe-upgrader
cd /var/www/upgrades/payment_instore
php /var/www/ss3/upgrader/vendor/silverstripe/upgrader/bin/upgrade-code inspect /var/www/upgrades/payment_instore/payment_instore/src  --root-dir=/var/www/upgrades/payment_instore --write -vvv
Writing changes for 0 files
Running post-upgrade on "/var/www/upgrades/payment_instore/payment_instore/src"
[2020-06-25 15:40:17] Applying ApiChangeWarningsRule to InStorePayment.php...
[2020-06-25 15:40:17] Applying UpdateVisibilityRule to InStorePayment.php...
Writing changes for 0 files
✔✔✔
# running php upgrade inspect see: https://github.com/silverstripe/silverstripe-upgrader
cd /var/www/upgrades/payment_instore
php /var/www/ss3/upgrader/vendor/silverstripe/upgrader/bin/upgrade-code inspect /var/www/upgrades/payment_instore/payment_instore/src  --root-dir=/var/www/upgrades/payment_instore --write -vvv
Writing changes for 0 files
Running post-upgrade on "/var/www/upgrades/payment_instore/payment_instore/src"
[2020-06-25 15:40:45] Applying ApiChangeWarningsRule to InStorePayment.php...
[2020-06-25 15:40:45] Applying UpdateVisibilityRule to InStorePayment.php...
Writing changes for 0 files
✔✔✔