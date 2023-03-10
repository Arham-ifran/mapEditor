<?php

declare(strict_types=1);

namespace Mollie\WooCommerce\PaymentMethods;

class In3 extends AbstractPaymentMethod implements PaymentMethodI
{
    public function getConfig(): array
    {
        return [
            'id' => 'in3',
            'defaultTitle' => __('in3', 'mollie-payments-for-woocommerce'),
            'settingsDescription' => '',
            'defaultDescription' => '',
            'paymentFields' => false,
            'instructions' => false,
            'supports' => [
                'products',
                'refunds',
            ],
            'filtersOnBuild' => false,
            'confirmationDelayed' => false,
            'orderMandatory' => true,
        ];
    }

    public function getFormFields($generalFormFields): array
    {
        return $generalFormFields;
    }
}
