<?php

namespace App\Helpers;

class CalculationHelper
{
    /**
     * Calculates the selling fee for a given price.
     *
     * @param string $price The price of the item.
     * @return string The selling fee.
     */
    public static function calculateSellingFee(string $price): string
    {
        /**
         * Get the selling fees setting value.
         *
         * @var float $sellingFees
         */
        $sellingFees = GlobalHelper::getSettingValue('selling_fees');

        /**
         * Get the payment charges fixed setting value.
         *
         * @var float $fixed
         */
        $fixed = GlobalHelper::getSettingValue('payment_charges_fixed');

        /**
         * Calculate the selling fee.
         *
         * @var float $fee
         */
        $fee = bcmul($price, bcdiv($sellingFees, 100.00, 4), 4);
        $finalPrice = bcadd($fee, $fixed, 4);
        return number_format($finalPrice, 2);
    }

    /**
     * Calculates the processing fee for a given price.
     *
     * @param string $price The price of the item.
     * @return string The processing fee.
     */
    public static function calculateProcessingFee(string $price): string
    {
        /**
         * Get the payment charges percentage setting value.
         *
         * @var float $percentage
         */
        $percentage = GlobalHelper::getSettingValue('payment_charges_percentage');

        /**
         * Calculate the processing fee.
         *
         * @var float $finalPrice
         */
        $finalPrice = bcmul($price, bcdiv($percentage, 100, 4), 4);

        return number_format($finalPrice, 2);
    }

    /**
     * Calculates the earnings for a given price, selling fee, and processing fee.
     *
     * @param string $price The price of the item.
     * @param string $sellingFee The selling fee.
     * @param string $processingFee The processing fee.
     * @return string The earnings.
     */
    public static function calculateEarnings(string $price, string $sellingFee, string $processingFee): string
    {
        /**
         * Format the price, selling fee, and processing fee.
         *
         * @var float $formattedPrice
         * @var float $formattedSellingFee
         * @var float $formattedProcessingFee
         */
        $formattedPrice = str_replace(',', '', number_format(floatval($price), 2));
        $formattedSellingFee = str_replace(',', '', number_format(floatval($sellingFee), 2));
        $formattedProcessingFee = str_replace(',', '', number_format(floatval($processingFee), 2));

        /**
         * Calculate the earnings.
         *
         * @var float $calculationStepOne
         * @var float $finalCalculation
         */
        $calculationStepOne = bcsub($formattedPrice, $formattedSellingFee, 4);
        $finalCalculation = bcsub($calculationStepOne, $formattedProcessingFee, 4);

        return number_format($finalCalculation, 2);
    }
}
