<?php include 'header.php'; ?>
<style>
    .card {
        border: 1px solid #ddd;
        padding: 10px;
        margin: 20px 10px;
        display: flex;
        cursor: pointer;
        flex-direction: column;
        border-radius: 10px; /* Rounded corners */
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2); /*  shadow */
        background-color: #f0f0f0; /* Light grey background */
    }

    .card-content {
        display: flex;
    }

    .card-image img {
        width: 150px; /* Width of the image */
        height: auto; /* Maintain aspect ratio */
        border-radius: 10px; /* Rounded corners for the image */
        margin-right: 10px; /* Space between image and text */
    }


    .card-text {
        flex: 1;
        padding: 10px 0; 
    }

    .card h3, .card p {
        margin: 5px 0;
        font-family: 'OCR A Std', monospace	
    }
</style>

<?php
    include 'connectdb.php';

    $query = "SELECT GroupCode, LeaseStartDate, TotalMonthlyRent FROM RentalGroup ORDER BY GroupCode ASC;";
    $result = $connection->query($query);

    // ... your existing PHP code ...

    while ($row = $result->fetch()) {
        echo "<div class='card' onclick='location.href=\"group_details.php?GroupCode=" . $row["GroupCode"] . "\";'>";
        echo "<div class='card-content'>";
        echo "<div class='card-image img'><img src='/Rent/images/icon.jpeg' alt='Group Image'></div>"; // Image to the left
        echo "<div class='card-text'>";
        echo "<h3>Group Code: " . $row["GroupCode"] . "</h3>";
        echo "<p>Lease Start Date: " . $row["LeaseStartDate"] . "</p>";
        echo "<p>Monthly Rent: $" . $row["TotalMonthlyRent"] . "</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }


    $connection = NULL;
?>
<?php include 'footer.php'; ?>