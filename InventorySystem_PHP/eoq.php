<?php

function calculateEOQ($demand, $setupCost, $holdingCost) {
    // Calculate EOQ using the formula: EOQ = sqrt((2 * D * S) / H)
    $eoq = sqrt((2 * $demand * $setupCost) / $holdingCost);
    return $eoq;
}

function calculateTotalCost($demand, $eoq, $setupCost, $holdingCost) {
    // Calculate total cost using the formula: TC = (D / EOQ) * S + (EOQ / 2) * H
    $orderingCost = ($demand / $eoq) * $setupCost;
    $holdingCost = ($eoq / 2) * $holdingCost;
    $totalCost = $orderingCost + $holdingCost;
    return $totalCost;
}

$annualDemand = 10000; // units per year
$setupCostPerOrder = 50; // $ per order
$holdingCostPerUnit = 5000; // $ per unit per year

// Calculate EOQ
$eoq = calculateEOQ($annualDemand, $setupCostPerOrder, $holdingCostPerUnit);
echo "Economic Order Quantity (EOQ): " . number_format($eoq, 2) . " units\n";

// Calculate Total Cost at EOQ
$totalCost = calculateTotalCost($annualDemand, $eoq, $setupCostPerOrder, $holdingCostPerUnit);
echo "Total Cost at EOQ: $" . number_format($totalCost, 2) . "\n";

?>
