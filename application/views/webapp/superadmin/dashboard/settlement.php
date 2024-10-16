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
    </style>
</head>
<body>
    <div class="invoice">
        <div class="header">
        <div class="company-info">
        <div class="logo">
        <img src="<?= base_url('upload/hotel_images/' . $company_details['image']); ?>" alt="Hotel Logo" style="width: 100px; height: auto;" />
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
            Name: <?= $customer['customer_name'] ?><br>
            Address: <?= $customer['address'] ?><br>
            Mob: <?= $customer['phone'] ?><br>
            GSTIN: <?= $customer['gst_number'] ?></p>
        </div>
        <div class="invoice-details">
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
                <tr>
                    <td data-label="Date">27/11/2022</td>
                    <td data-label="Description">Room Charge</td>
                    <td data-label="HSN/SAC Code">234514</td>
                    <td data-label="Base Amount">1339.29</td>
                    <td data-label="GST %">12.00</td>
                    <td data-label="GST Amount">160.71</td>
                    <td data-label="Total Amount">1500.00</td>
                </tr>
                <tr>
                    <td data-label="Date">28/11/2022</td>
                    <td data-label="Description">Room Charge</td>
                    <td data-label="HSN/SAC Code">345343</td>
                    <td data-label="Base Amount">1339.29</td>
                    <td data-label="GST %">12.00</td>
                    <td data-label="GST Amount">160.71</td>
                    <td data-label="Total Amount">1500.00</td>
                </tr>
                <tr>
                    <td data-label="Date">28/11/2022</td>
                    <td data-label="Description">Food Charge</td>
                    <td data-label="HSN/SAC Code">345343</td>
                    <td data-label="Base Amount">285.71</td>
                    <td data-label="GST %">5.00</td>
                    <td data-label="GST Amount">14.29</td>
                    <td data-label="Total Amount">300.00</td>
                </tr>
                <tr class="total-row">
                    <td colspan="3" data-label="GRAND TOTAL">GRAND TOTAL</td>
                    <td data-label="Base Amount">2964.29</td>
                    <td data-label="GST Amount"></td>
                    <td data-label="Total Amount">335.71</td>
                    <td data-label="Total Amount">3300.00</td>
                </tr>
            </tbody>
        </table>
        <div class="amount-in-words">
            THREE THOUSAND THREE HUNDRED RUPEES ONLY
        </div>
        <div class="payment-details">
            <table>
                <tr>
                    <td>NET AMOUNT</td>
                    <td>₹3,300.00</td>
                </tr>
                <tr>
                    <td>by Advance</td>
                    <td>1000.00</td>
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
                    <td><strong>₹2,300.00</strong></td>
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
            <button class="new-btn">New</button>
            <button class="save-btn">Save</button>
            <button class="settlement-btn">Settlement</button>
            <button class="print-btn">Print</button>
            <button class="delete-btn">Delete</button>
        </div>
    </div>
</body>
</html>
