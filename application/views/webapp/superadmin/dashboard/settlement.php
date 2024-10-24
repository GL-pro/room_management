<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pippi Stay Invoice</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10px;
            box-sizing: border-box;
        }
        .invoice {
            border: 2px solid #ff7f7f;
            border-radius: 10px;
            padding: 15px;
            max-width: 800px;
            margin: 0 auto;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .company-info {
            border: 1px solid #ddd; /* Border around company info */
            padding: 10px; /* Padding for company info */
            border-radius: 5px; /* Rounded corners */
            flex-grow: 1; /* Allow company info to take remaining space */
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .invoice-title {
            background-color: #ff7f7f;
            color: white;
            padding: 5px 15px;
            border-radius: 5px;
            margin-left: 20px; /* Space between title and company info */
        }
        .details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .customer-details, .invoice-details {
            width: 100%;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            overflow-x: auto; /* Allows horizontal scrolling */
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #ff7f7f;
            color: white;
        }
        .total-row {
            background-color: #ffe6e6;
            font-weight: bold;
        }
        .amount-in-words {
            margin-top: 20px;
            font-style: italic;
            font-size: 14px;
        }
        .payment-details {
            margin-top: 20px;
        }
        .signatures {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            flex-wrap: wrap;
        }
        .button-container button {
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            margin-bottom: 10px;
            width: calc(50% - 5px);
        }
        .new-btn { background-color: #4CAF50; }
        .save-btn { background-color: #008CBA; }
        .settlement-btn { background-color: #f44336; }
        .print-btn { background-color: #555555; }
        .delete-btn { background-color: black; color: black; }
        @media (min-width: 768px) {
            .customer-details, .invoice-details {
                width: 48%;
            }
            .button-container button {
                width: auto;
            }
        }
        /* Mobile styles */
        @media (max-width: 767px) {
            .header {
                flex-direction: column; /* Stack header elements vertically */
                align-items: flex-start; /* Align items to the start */
            }
            .details {
                flex-direction: column; /* Stack details vertically */
            }
            .customer-details, .invoice-details {
                width: 100%; /* Full width on mobile */
            }
            table {
                display: block; /* Make table scrollable */
                overflow-x: auto; /* Enable horizontal scroll */
                white-space: nowrap; /* Prevent text wrapping */
            }
            .button-container button {
                width: 100%; /* Full width buttons on mobile */
            }
        }


        @media print {
    /* Show everything by default */
    * {
        visibility: visible;
    }

    /* Hide buttons during printing */
    .button-container {
        display: none; /* Hide the button container */
    }

    /* Make sure the invoice container fits the page width */
    .invoice {
        border: none; /* Remove border when printing */
        width: 100%;
        max-width: 100%;
        padding: 0;
        margin: 0;
    }

    /* Ensure table elements are properly displayed */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    /* Make sure borders are visible */
    th, td {
        border: 1px solid black !important; /* Ensure borders are visible */
        padding: 8px;
    }

    /* Avoid page breaks inside table rows and other elements */
    tr, th, td {
        page-break-inside: avoid;
    }

    /* Adjust fonts to make sure everything fits */
    body {
        font-size: 12px;
        line-height: 1.2;
    }

    /* Avoid page breaks within these elements */
    .customer-details, .invoice-details, .invoice-title, table, .payment-details, .signatures {
        page-break-inside: avoid; /* Prevent breaks within these sections */
    }

    /* Remove unnecessary margins and padding */
    body {
        margin: 0;
        padding: 0;
    }
}


    </style>




<style>
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 500px;
    border-radius: 8px;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.payment-options {
    display: flex;
    flex-direction: column;
    gap: 15px;
    margin: 20px 0;
}

.payment-options label {
    display: flex;
    align-items: center;
    gap: 10px;
}

.button-group {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 20px;
}

.button-group button {
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
}

#proceedPayment {
    background-color: #4CAF50;
    color: white;
    border: none;
}

#cancelPayment {
    background-color: #f44336;
    color: white;
    border: none;
}
</style>




</head>
<body>
    <div class="invoice">
        <div class="header">
        <div class="company-info">

<div class="logo"> 
    <img src="<?= base_url($company_details['image']); ?>" alt="Hotel Logo" style="width: 100px; height: auto;" />
</div>

    <p>
        <strong><?= $company_details['hotelname'] ?></strong><br>
        <?= $company_details['address'] ?><br>
        <?= $company_details['phone1'] ?>
    </p>
</div>
            <div class="invoice-title">INVOICE</div>
        </div>
        <div class="details">
        <div class="customer-details">
            <p><strong>Customer Details</strong><br>
            <input type="hidden" id="customer-id" value="<?= $customer['customer_id'] ?>">
            Name: <?= $customer['customer_name'] ?><br>
            Address: <?= $customer['address'] ?><br>
            Mob: <?= $customer['phone'] ?><br>
            GSTIN: <?= $customer['gst_number'] ?></p>
            No Pax: <?= $booking_details['noofguests'] ?></p>
        </div>
        <div class="invoice-details">


        <input type="hidden" id="settlement-id" value="<?= isset($settlement_id) ? $settlement_id : '' ?>">
        <input type="hidden" id="booking-id" value="<?= $booking_details['booking_id'] ?>">
        <input type="hidden" id="room-id" value="<?= $booking_details['hotel_roomid'] ?>">

            <p>Invoice No.: <?= $invoice_no ?><br>
            Invoice Date: <?= $invoice_date ?><br>
            Room: <?= $booking_details['hotel_roomid'] ?><br>
            Check In: <?= $booking_details['checkin'] ?><br>
            Check Out: <?= $booking_details['checkout'] ?><br>
            Guest Names: <?= $guest_names ?></p> <!-- Display comma-separated guest names -->
        </div>
    </div>




    <table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Description</th>
            <th>HSN/SAC Code</th>
            <th>Base Amount</th>
            <th>GST %</th>
            <th>GST Amount</th>
            <th>Total Amount</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $grand_total_base = 0;
    $grand_total_gst = 0;
    $grand_total_amount = 0;

    // Function to calculate the number of days between check-in and check-out with 12 PM condition
    function calculateDays($checkin_time, $checkout_time) {
        // Convert times to timestamps
        $checkin_date = strtotime($checkin_time);
        $checkout_date = strtotime($checkout_time);

        // Calculate the difference in days
        $days_diff = ($checkout_date - $checkin_date) / (60 * 60 * 24);

        // If the checkout time is exactly 12 PM, do not count it as an extra day
        $checkin_hour = date('H', $checkin_date);
        $checkout_hour = date('H', $checkout_date);

        if ($checkin_hour == 12 && $checkout_hour == 12) {
            return $days_diff;
        } else {
            return ceil($days_diff); // Round up to the nearest whole day
        }
    }

    // Iterate through room details to calculate charges
    foreach ($room_details as $index => $room) {
        $days_stayed = calculateDays($room['checkin'], $room['checkout']); // Get the exact number of days
        
        // Loop through each day and calculate charges
        for ($day = 0; $day < $days_stayed; $day++) {
            $date = date('Y-m-d', strtotime("+$day day", strtotime($room['checkin'])));

            // Room charge for each day
            $base_amount = $room['discountprice']; // Assuming daily base price remains the same

            // GST calculations
            $gst_amount = ($base_amount * $room['gst_percent']) / 100;
            $total_amount = $base_amount + $gst_amount;

            // Accumulate totals
            $grand_total_base += $base_amount;
            $grand_total_gst += $gst_amount;
            $grand_total_amount += $total_amount;
    ?>
    <tr>
    <td data-label="Date"><?php echo date('d/m/Y H:i', strtotime($date)); ?></td>
        <td data-label="Description">Room Charge - Room No: <?php echo $room['roomno']; ?></td>
        <td data-label="HSN/SAC Code"></td>
        <td data-label="Base Amount">
            <input type="number"
                   class="base-amount"
                   name="room_amounts[<?php echo $index; ?>]"
                   value="<?php echo number_format($base_amount, 2); ?>" 
                   data-index="<?php echo $index; ?>"
                   step="0.01">
        </td>
        <td data-label="GST %"><?php echo number_format($room['gst_percent'], 2); ?></td>
        <td data-label="GST Amount"><?php echo number_format($gst_amount, 2); ?></td>
        <td data-label="Total Amount"><?php echo number_format($total_amount, 2); ?></td>
    </tr>
    <?php 
        } // End for loop for days stayed
    }

    // Then display item charges
    foreach ($items_details as $index => $item) {
        $gst_amount = ($item['new_price'] * $item['gst_per']) / 100;
        $total_amount = $item['new_price'] + $gst_amount;
        
        // Accumulate totals
        $grand_total_base += $item['new_price'];
        $grand_total_gst += $gst_amount;
        $grand_total_amount += $total_amount;
    ?>
        <tr>
            <td data-label="Date">
                <?php echo date('d/m/Y', strtotime($item['adding_date'])); ?>
            </td>
            <td data-label="Description">
            Item Charge - <?php echo ucfirst($item['item_name']); ?>
            </td>
            <td data-label="HSN/SAC Code"><?php echo $item['hsn_code']; ?></td>
            <td data-label="Base Amount">
                <input type="number" 
                       class="base-amount" 
                       name="item_amounts[<?php echo $index; ?>]" 
                       value="<?php echo $item['new_price']; ?>" 
                       data-index="<?php echo $index; ?>" 
                       step="0.01">
            </td>
            <td data-label="GST %"><?php echo number_format($item['gst_per'], 2); ?></td>
            <td data-label="GST Amount"><?php echo number_format($gst_amount, 2); ?></td>
            <td data-label="Total Amount"><?php echo number_format($total_amount, 2); ?></td>
        </tr>
    <?php 
    }
    ?>
        <!-- Grand Total Row -->
        <tr class="total-row">
            <td colspan="3" data-label="GRAND TOTAL">GRAND TOTAL</td>
            <td data-label="Base Amount" id="grand-total-base">
                <?php echo number_format($grand_total_base, 2); ?>
            </td>
            <td data-label="GST %"></td>
            <td data-label="GST Amount" id="grand-total-gst">
                <?php echo number_format($grand_total_gst, 2); ?>
            </td>
            <td data-label="Total Amount" id="grand-total-amount">
                <?php echo number_format($grand_total_amount, 2); ?>
            </td>
        </tr>
    </tbody>
</table>

    <div class="amount-in-words">
    <!-- Will be dynamically filled with the grand total amount in words -->
    </div>
        <div class="payment-details">
            <table>
                <tr>
                    <td>NET AMOUNT</td>
                    <td id="net-amount">₹<?php echo number_format($grand_total_amount, 2); // Print grand total of total amount ?></td>
                </tr>
                <tr>
                    <td>by Advance</td>
                    <td id="advance-amount"><?php echo number_format($item['advance_amount'], 2); ?></td>
                </tr>
                <tr>
                    <td>by Cash</td>
                    <td></td>
                </tr>
                <tr>
                    <td>by Online Transfer</td>
                    <td></td>
                </tr>
                <tr>
                    <td>(-) Refund</td>
                    <td></td>
                </tr>
                <tr>
                    <td><strong>AMOUNT PAYABLE</strong></td>
                    <td id="amount-payable"><strong>₹<?php echo number_format($grand_total_amount - $item['advance_amount'], 2);  ?></strong></td>
                </tr>
            </table>
        </div>
        <div class="signatures">
            <div>
                <p>____________________</p>
                <p>Manager Signature</p>
            </div>
            <div>
                <p>____________________</p>
                <p>Customer Signature</p>
            </div>
        </div>
        <div class="button-container">
            <button class="new-btn" id="new-btn">Clear</button>
            <button class="save-btn" id="save-btn">Save</button>
            <button class="settlement-btn" id="settle-btn">Vaccat</button>
            <button class="print-btn">Print</button>
            <button class="delete-btn"  id="delete-btn">Cancel</button>
        </div>
    </div>
</body>
</html>



<!-- Modal HTML Structure -->
<!-- <div id="paymentModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Settlement Payment</h2>
        
        <form id="paymentForm">
            <label for="paymentMethod">Select Payment Method:</label><br>
            <input type="radio" id="cash" name="payment_method" value="cash">
            <label for="cash">Cash</label><br>
            <input type="radio" id="card" name="payment_method" value="card">
            <label for="card">Card</label><br>
            <input type="radio" id="upi" name="payment_method" value="card">
            <label for="card">Upi</label><br>

            <label for="paymentAmount">Enter Amount:</label>
            <input type="number" id="paymentAmount" name="payment_amount" step="0.01" required><br><br>
            
            <button type="button" id="proceedPayment">Vaccat</button>
            <button type="button" id="cancelPayment">Cancel</button>
        </form>
    </div>
</div>
 -->



 <!-- Settlement Modal -->
<div id="paymentModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Settlements</h2>
        
        <!-- Tabs for Paid/Unpaid -->
        <div class="tab-container">
            <button class="tab-btn active" onclick="showTab('unpaid')">Unpaid Settlements</button>
            <button class="tab-btn" onclick="showTab('paid')">Paid Settlements</button>
        </div>

        <!-- Unpaid Settlements Table -->
        <div id="unpaid-settlements" class="tab-content active">
            <table class="settlements-table">
                <thead>
                    <tr>
                        <th>Settlement ID</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="unpaid-settlements-body">
                    <!-- Will be populated dynamically -->
                </tbody>
            </table>
        </div>

        <!-- Paid Settlements Table -->
        <div id="paid-settlements" class="tab-content">
            <table class="settlements-table">
                <thead>
                    <tr>
                        <th>Settlement ID</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Payment Method</th>
                    </tr>
                </thead>
                <tbody id="paid-settlements-body">
                    <!-- Will be populated dynamically -->
                </tbody>
            </table>
        </div>

        <!-- Payment Form (shows when "Pay" button is clicked) -->
        <div id="paymentForm" class="payment-form" style="display: none;">
            <h3>Process Payment</h3>
            <input type="hidden" id="current-settlement-id">
            <div class="form-group">
                <label>Payment Method:</label>
                <div class="radio-group">
                    <input type="radio" name="payment_method" value="cash" id="cash">
                    <label for="cash">Cash</label>
                    <input type="radio" name="payment_method" value="card" id="card">
                    <label for="card">Card</label>
                </div>
            </div>
            <div class="form-group">
                <label for="paymentAmount">Amount:</label>
                <input type="number" id="paymentAmount" step="0.01">
            </div>
            <div class="button-group">
                <button id="cancelPayment">Cancel</button>
                <button id="proceedPayment">Proceed</button>
            </div>
        </div>
    </div>
</div>

<style>
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
}

.modal-content {
    background-color: white;
    margin: 15% auto;
    padding: 20px;
    width: 80%;
    max-width: 800px;
}

.tab-container {
    margin-bottom: 20px;
}

.tab-btn {
    padding: 10px 20px;
    cursor: pointer;
}

.tab-btn.active {
    background-color: #007bff;
    color: white;
}

.tab-content {
    display: none;
}

.tab-content.active {
    display: block;
}

.settlements-table {
    width: 100%;
    border-collapse: collapse;
}

.settlements-table th,
.settlements-table td {
    padding: 10px;
    border: 1px solid #ddd;
}

.payment-form {
    margin-top: 20px;
    padding: 20px;
    border-top: 1px solid #ddd;
}
</style>
<style>
.partial-payment {
    color: #ff6b6b;
    font-size: 0.9em;
    margin-bottom: 5px;
}

.payment-info {
    background: #f8f9fa;
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 15px;
}

.payment-date {
    font-size: 0.8em;
    color: #666;
    margin-top: 3px;
}

.pay-btn {
    background: #4CAF50;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
}

.pay-btn:hover {
    background: #45a049;
}
</style>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




<script>
    function numberToWords(number) {
        const words = ["", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", 
                       "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen"];
        const tens = ["", "", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"];
        const scales = ["", "Thousand", "Million"];
        if (number === 0) return "Zero";
        
        function getBelowHundred(num) {
            if (num < 20) return words[num];
            return tens[Math.floor(num / 10)] + (num % 10 > 0 ? " " + words[num % 10] : "");
        }
        
        function convert(num, scaleIdx = 0) {
            if (num === 0) return "";
            if (num < 100) return getBelowHundred(num);
            if (num < 1000) {
                return words[Math.floor(num / 100)] + " Hundred " + getBelowHundred(num % 100);
            }
            const scalePart = Math.floor(num / 1000);
            const remainder = num % 1000;
            return convert(scalePart, scaleIdx + 1) + " " + scales[scaleIdx] + (remainder > 0 ? " " + convert(remainder, scaleIdx) : "");
        }
        return convert(number).trim() + " Only";
    }


    // code to field hange values calculation
    function updateGrandTotal() {
        let grandTotalBase = 0;
        let grandTotalGst = 0;
        let grandTotalAmount = 0;

        // Calculate the total amounts for each item
        document.querySelectorAll('.base-amount').forEach(input => {
            const index = input.dataset.index;
            const baseAmount = parseFloat(input.value) || 0;
            const gstPercent = parseFloat(document.querySelector(`[data-index="${index}"]`).closest('tr').querySelector('[data-label="GST %"]').textContent) || 0;
            const gstAmount = (baseAmount * gstPercent) / 100;
            const totalAmount = baseAmount + gstAmount;

            // Accumulate grand totals
            grandTotalBase += baseAmount;
            grandTotalGst += gstAmount;
            grandTotalAmount += totalAmount;

            // Update GST and Total Amount columns in the same row
            const row = input.closest('tr');
            row.querySelector('[data-label="GST Amount"]').textContent = gstAmount.toFixed(2);
            row.querySelector('[data-label="Total Amount"]').textContent = totalAmount.toFixed(2);
        });

        // Update grand total row
        document.getElementById('grand-total-base').textContent = grandTotalBase.toFixed(2);
        document.getElementById('grand-total-gst').textContent = grandTotalGst.toFixed(2);
        document.getElementById('grand-total-amount').textContent = grandTotalAmount.toFixed(2);
        
        // Update the NET AMOUNT and AMOUNT PAYABLE
        const advanceAmount = parseFloat(document.querySelector('#advance-amount').textContent.replace(/₹|,/g, '')) || 0; // Correctly fetch advance amount
        const netAmount = grandTotalAmount; // Current grand total is the net amount
        const amountPayable = netAmount - advanceAmount;

        // Update NET AMOUNT and AMOUNT PAYABLE in the table
        document.getElementById('net-amount').textContent = "₹" + netAmount.toFixed(2);
        document.getElementById('amount-payable').textContent = "₹" + amountPayable.toFixed(2);

        // Convert the grand total amount to words and update the amount-in-words div
        const amountInWords = numberToWords(Math.round(grandTotalAmount));
        document.querySelector('.amount-in-words').textContent = amountInWords;
    }

    // Attach event listener to each base-amount input field
    document.querySelectorAll('.base-amount').forEach(input => {
        input.addEventListener('input', updateGrandTotal);
    });

    // Call updateGrandTotal initially to display the correct total at page load
    updateGrandTotal();
</script>


<script>
document.getElementById('save-btn').addEventListener('click', function () {
    const settlementId = document.getElementById('settlement-id').value; // Retrieve existing settlement ID
    const bookingId = document.getElementById('booking-id').value;
    const customerId = document.getElementById('customer-id').value;
    const invoiceNo = '<?= $invoice_no ?>'; // Assuming you're using PHP to set this
    const invoiceDate = '<?= $invoice_date ?>'; // Assuming you're using PHP to set this
    const roomId = document.getElementById('room-id').value;
    const grandTotalBase = document.getElementById('grand-total-base').textContent.replace(/,/g, '');
    const grandTotalGst = document.getElementById('grand-total-gst').textContent.replace(/,/g, '');
    const grandTotalAmount = document.getElementById('grand-total-amount').textContent.replace(/,/g, '');
    const netAmount = document.getElementById('net-amount').textContent.replace(/₹|,/g, '');
    const advanceAmount = document.getElementById('advance-amount').textContent.replace(/₹|,/g, '');

    // Collect all item details for settlement_item table
    const items = [];
    document.querySelectorAll('.base-amount').forEach(input => {
        const row = input.closest('tr');
        const description = row.querySelector('[data-label="Description"]').textContent.trim();
        const hsnCode = row.querySelector('[data-label="HSN/SAC Code"]').textContent.trim();
        const baseAmount = parseFloat(input.value) || 0;
        const gstPercent = parseFloat(row.querySelector('[data-label="GST %"]').textContent.trim()) || 0;
        const gstAmount = parseFloat(row.querySelector('[data-label="GST Amount"]').textContent.trim()) || 0;
        const totalAmount = parseFloat(row.querySelector('[data-label="Total Amount"]').textContent.trim()) || 0;
        items.push({
            description: description,
            hsn_code: hsnCode,
            base_amount: baseAmount,
            gst_percent: gstPercent,
            gst_amount: gstAmount,
            total_amount: totalAmount
        });
    });

    // Check if bookingId exists
    if (!bookingId) {
        alert("Booking ID is missing.");
        return;
    }

    // Send data via AJAX using fetch
    fetch('<?= site_url('Superadmin/settlement_save'); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            settlement_data: {
                settlement_id: settlementId || null, // Pass settlement_id if it exists
                booking_id: bookingId,
                customer_id: customerId,
                invoice_no: invoiceNo,
                invoice_date: invoiceDate,
                room_id: roomId,
                grand_total_base: parseFloat(grandTotalBase),
                grand_total_gst: parseFloat(grandTotalGst),
                grand_total_amount: parseFloat(grandTotalAmount),
                net_amount: parseFloat(netAmount),
                advance_amount: parseFloat(advanceAmount),
                amount_payable: (parseFloat(grandTotalAmount) - parseFloat(advanceAmount)).toFixed(2) // Calculate amount payable
            },
            settlement_items: items  // Include all item details here
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update the hidden field with the settlement ID
            document.getElementById('settlement-id').value = data.settlement_id;

            // Show success message
            alert('Settlement saved successfully!');
            // Optionally reload the page if necessary
            location.reload(); // Refreshes the current page
        } else {
            // Show error message
            alert('Settlement failed. Please try again.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    });
});
</script>


<!-- <script>
const modal = document.getElementById('paymentModal');
const closeBtn = document.getElementsByClassName('close')[0];
const cancelBtn = document.getElementById('cancelPayment');
const proceedBtn = document.getElementById('proceedPayment');

// Open modal when settlement button is clicked
document.getElementById('settle-btn').addEventListener('click', function() {
    const bookingId = document.getElementById('booking-id').value;
    if (!bookingId) {
        alert("No booking ID found. Please save the settlement first.");
        return;
    }
    modal.style.display = "block";
});

// Close modal functions
function closeModal() {
    modal.style.display = "none";
    document.getElementById('paymentForm').reset();
}

closeBtn.onclick = closeModal;
cancelBtn.onclick = closeModal;

window.onclick = function(event) {
    if (event.target == modal) {
        closeModal();
    }
}

// Handle payment submission
proceedBtn.addEventListener('click', function() {
    const bookingId = document.getElementById('booking-id').value;
    const paymentMethod = document.querySelector('input[name="payment_method"]:checked');
    const paymentAmount = document.getElementById('paymentAmount').value;
    if (!paymentMethod) {
        alert("Please select a payment method.");
        return;
    }
    if (!paymentAmount || paymentAmount <= 0) {
        alert("Please enter a valid payment amount.");
        return;
    }
    // First API call to change settlement status
    fetch('<?= site_url('Superadmin/change_settlement_status'); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            booking_id: bookingId,
            status: 'paid',
            payment_method: paymentMethod.value,
            amount: paymentAmount  // Include amount in the request body
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Second API call to update booking status
            return fetch('<?= site_url('Superadmin/update_booking_status'); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    booking_id: bookingId,
                    booking_status: 'vacant'
                })
            });
        } else {
            throw new Error(data.message || 'Failed to update settlement status');
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Payment processed successfully!');
            closeModal();
            location.reload();
        } else {
            throw new Error(data.message || 'Failed to update booking status');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred: ' + error.message);
    });
});
</script>  -->




<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('paymentModal');
    const closeBtn = document.getElementsByClassName('close')[0];
    const cancelBtn = document.getElementById('cancelPayment');
    const proceedBtn = document.getElementById('proceedPayment');
    const paymentForm = document.getElementById('paymentForm');

    // Load settlements when settlement button is clicked
    document.getElementById('settle-btn').addEventListener('click', function() {
        const bookingId = document.getElementById('booking-id').value;
        if (!bookingId) {
            alert("Please select a booking first.");
            return;
        }
        loadSettlements(bookingId);
        modal.style.display = "block";
    });

    // Function to load settlements
    function loadSettlements(bookingId) {
        // Create form data for POST request
        const formData = new FormData();
        formData.append('booking_id', bookingId);

        fetch('<?= site_url('Superadmin/get_settlements_by_booking') ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                populateSettlementTables(data.settlements);
            } else {
                alert(data.message || "Failed to load settlements");
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to load settlements. Please try again.');
        });
    }




    function populateSettlementTables(settlements) {
        const unpaidBody = document.getElementById('unpaid-settlements-body');
        const paidBody = document.getElementById('paid-settlements-body');
        
        unpaidBody.innerHTML = '';
        paidBody.innerHTML = '';

        settlements.forEach(settlement => {
            const amountPayable = parseFloat(settlement.amount_payable);
            const paidAmount = parseFloat(settlement.paid_amount) || 0;
            const remainingAmount = amountPayable - paidAmount;
            
            const row = `
                <tr>
                    <td>${settlement.settlement_id}</td>
                    <td>${amountPayable.toLocaleString('en-US', {
                        style: 'currency',
                        currency: 'INR'
                    })}</td>
                    <td>${new Date(settlement.date).toLocaleDateString()}</td>
                    ${settlement.settlement_status === 'unpaid' || settlement.settlement_status === 'partially_paid' ? 
                        `<td>
                            ${settlement.settlement_status === 'partially_paid' ? 
                                `<div class="partial-payment">
                                    Paid: ${paidAmount.toLocaleString('en-US', {
                                        style: 'currency',
                                        currency: 'INR'
                                    })}
                                </div>` : ''
                            }
                            <button class="pay-btn" onclick="showPaymentForm('${settlement.settlement_id}', ${remainingAmount}, ${amountPayable}, ${paidAmount})">
                                ${settlement.settlement_status === 'partially_paid' ? 'Pay Remaining' : 'Pay'}
                            </button>
                        </td>` : 
                        `<td>
                            Paid (${settlement.payment_method})
                            <div class="payment-date">
                                ${new Date(settlement.payment_date).toLocaleDateString()}
                            </div>
                        </td>`
                    }
                </tr>
            `;

            if (settlement.settlement_status === 'unpaid' || settlement.settlement_status === 'partially_paid') {
                unpaidBody.insertAdjacentHTML('beforeend', row);
            } else {
                paidBody.insertAdjacentHTML('beforeend', row);
            }
        });

        if (unpaidBody.innerHTML === '') {
            unpaidBody.innerHTML = '<tr><td colspan="4">No unpaid settlements</td></tr>';
        }
        if (paidBody.innerHTML === '') {
            paidBody.innerHTML = '<tr><td colspan="4">No paid settlements</td></tr>';
        }
    }

    // Modified showPaymentForm function
    window.showPaymentForm = function(settlementId, remainingAmount, totalAmount, paidAmount) {
        document.getElementById('current-settlement-id').value = settlementId;
        const paymentAmountInput = document.getElementById('paymentAmount');
        paymentAmountInput.value = remainingAmount;
        paymentAmountInput.max = remainingAmount;
        
        // Show payment details if partially paid
        const paymentDetails = document.getElementById('payment-details');
        if (paidAmount > 0) {
            paymentDetails.innerHTML = `
                <div class="payment-info">
                    <p>Total Amount: ${totalAmount.toLocaleString('en-US', { style: 'currency', currency: 'INR' })}</p>
                    <p>Paid Amount: ${paidAmount.toLocaleString('en-US', { style: 'currency', currency: 'INR' })}</p>
                    <p>Remaining: ${remainingAmount.toLocaleString('en-US', { style: 'currency', currency: 'INR' })}</p>
                </div>
            `;
            paymentDetails.style.display = 'block';
        } else {
            paymentDetails.style.display = 'none';
        }
        
        document.getElementById('paymentForm').style.display = 'block';
    }





    // Show payment form
    window.showPaymentForm = function(settlementId, amount) {
        document.getElementById('current-settlement-id').value = settlementId;
        document.getElementById('paymentAmount').value = amount;
        document.getElementById('paymentForm').style.display = 'block';
    }



    proceedBtn.addEventListener('click', function() {
    const settlementId = document.getElementById('current-settlement-id').value;
    const paymentAmount = parseFloat(document.getElementById('paymentAmount').value);
    const paymentMethod = document.querySelector('input[name="payment_method"]:checked');

    if (!paymentAmount || paymentAmount <= 0) {
        alert("Please enter a valid payment amount.");
        return;
    }

    if (!paymentMethod) {
        alert("Please select a payment method.");
        return;
    }
    const bookingId = document.getElementById('booking-id').value;
    const formData = new FormData();
    formData.append('settlement_id', settlementId);
    formData.append('amount', paymentAmount);
    formData.append('payment_method', paymentMethod.value);
    formData.append('booking_id', bookingId); 

    fetch('<?= site_url('Superadmin/change_settlement_status') ?>', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Show success message based on the response status
            if (data.status === 'paid') {
                alert('Payment processed successfully, and the booking status is now vacant.');
                // Optionally call updateBookingStatus here if needed
            } else if (data.status === 'partially_paid') {
                alert('Payment processed successfully, but some settlements are still unpaid.');
            }
            paymentForm.style.display = 'none';
            loadSettlements(document.getElementById('booking-id').value); // Reload the settlements
        } else {
            // Show error if the response indicates failure
            alert('Failed to process payment: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while processing payment. Please try again.');
    });
});


    // Function to update booking status
    function updateBookingStatus(settlementId) {
        const formData = new FormData();
        formData.append('settlement_id', settlementId);
        formData.append('booking_status', 'vacant');
        
        return fetch('<?= site_url('Superadmin/update_booking_status') ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                throw new Error('Failed to update booking status');
            }
        });
    }


    // Tab switching
    window.showTab = function(tabName) {
        const tabContents = document.querySelectorAll('.tab-content');
        const tabButtons = document.querySelectorAll('.tab-btn');
        
        tabContents.forEach(content => content.classList.remove('active'));
        tabButtons.forEach(btn => btn.classList.remove('active'));
        
        document.getElementById(`${tabName}-settlements`).classList.add('active');
        event.currentTarget.classList.add('active');
    }

    // Modal close handlers
    function closeModal() {
        modal.style.display = "none";
        paymentForm.style.display = "none";
        paymentForm.reset();
    }

    closeBtn.onclick = closeModal;
    cancelBtn.onclick = closeModal;
    window.onclick = function(event) {
        if (event.target === modal) {
            closeModal();
        }
    }
});

</script>










<script>
document.getElementById('delete-btn').addEventListener('click', function () {
    const bookingId = document.getElementById('booking-id').value; // Get the booking ID
    if (!bookingId) {
        alert("No booking ID found. Please save the settlement first.");
        return;
    }

    // Confirm deletion
    if (confirm("Are you sure you want to delete this settlement? This action will change the status to inactive.")) {
        fetch('<?= site_url('Superadmin/change_settlement_status_delete'); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                booking_id: bookingId,
                status: '0' // Set status to 0 to mark as deleted/inactive
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Response from server:', data); // Log the response for debugging
            if (data.success) {
                alert('Settlement status updated to inactive!');
                window.location.href = '<?= site_url('dashboard'); ?>'; // Redirect to the dashboard
            } else {
                alert('Failed to update settlement status: ' + (data.message || 'Please try again.'));
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    }
});
</script>





<!--Print code -->
<script>
// Print button functionality
document.querySelector('.print-btn').addEventListener('click', function() {
    window.print(); // Trigger the print dialog
});
</script>


<script>
document.getElementById('new-btn').addEventListener('click', function () {
    // Select all base amount input fields
    const baseAmountFields = document.querySelectorAll('.base-amount');

    // Clear each base amount input field
    baseAmountFields.forEach(function(field) {
        field.value = ''; // Clear the field
    });

    // Select all total amount cells and clear their inner text
    const totalAmountCells = document.querySelectorAll('tbody tr td[data-label="Total Amount"]');
    totalAmountCells.forEach(function(cell) {
        cell.innerText = '0.00'; // Clear the total amount field
    });

    // Reset grand totals to reflect the cleared fields
    document.getElementById('grand-total-base').innerText = '0.00';
    document.getElementById('grand-total-gst').innerText = '0.00';
    document.getElementById('grand-total-amount').innerText = '0.00';
    document.getElementById('net-amount').innerText = '₹0.00';
    
    // Keep advance amount unchanged
    // document.getElementById('advance-amount').innerText = '0.00'; // Commented out to keep it unchanged

    document.getElementById('amount-payable').innerText = '₹0.00';
});
</script>

