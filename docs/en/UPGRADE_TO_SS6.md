# Upgrade Guide: Moving to Silverstripe CMS 6

This document outlines the necessary steps and breaking changes required to upgrade your project to be compatible with Silverstripe CMS 6 and the latest version of this module.

---

### ⚠️ BREAKING CHANGE: Core Dependency Updates

Your project's dependencies must be updated to align with Silverstripe CMS 6.

-   **`sunnysideup/ecommerce`**: This module now requires version `^33.0`. You must update from `5.x-dev`. Review the ecommerce module's changelog for its own set of breaking changes.
-   **`silverstripe/recipe-cms`**: The core framework dependency has been updated to `^6.0`.

```json
"require": {
    "sunnysideup/ecommerce": "^33.0",
    "silverstripe/recipe-cms": "^6.0"
}
```

---

### ⚠️ BREAKING CHANGE: Database Administration Configuration

The YAML configuration for database build tasks has been updated. The deprecated `SilverStripe\ORM\DatabaseAdmin` class has been removed.

-   **Action Required**: You must update your `.yml` configuration files to use the new `SilverStripe\Dev\DbBuild` class for any class name remapping or other database-related configurations.

**Before:**
```yaml
SilverStripe\ORM\DatabaseAdmin:
  classname_value_remapping:
    InStorePayment: Sunnysideup\PaymentInstore\InStorePayment
```

**After:**
```yaml
SilverStripe\Dev\DbBuild:
  classname_value_remapping:
    InStorePayment: Sunnysideup\PaymentInstore\InStorePayment
```

---

### API Changes

To conform with modern PHP standards and improve code clarity, several methods now use the `#[Override]` attribute. This is a non-breaking change but indicates that these methods are implementations of parent or interface contracts.

The following methods in `InStorePayment` have been updated:
- `processPayment()`
- `getPaymentFormFields()`
- `getPaymentFormRequirements()`
