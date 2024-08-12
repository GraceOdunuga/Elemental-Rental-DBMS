<?php include 'header.php'; ?>

<style>
    body { 
        margin: 0; padding: 0; 
        background-color: #f4f4f4; 
    }
    
    .container { 
        max-width: 50%; 
        border: 1px solid #ddd;
        margin: 40px auto;
        background: #fff; 
        padding: 20px; 
        border-radius: 10px; /* Round corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center; /* Center align the content for the new layout */
    }

    .group-image img {
        max-width: 80%;
        margin: 0 auto 20px; /* Adds margin to the bottom */
        border-radius: 20px; /* Round the edges */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adds a shadow */
    }

    h2, h3, h4, p { 
        color: #333; 
        font-family: 'OCR A Std', monospace;
    }

    .button-container {
        text-align: center; /* Centers the button wrapper */
        margin-top: 20px; /* Adds some space above the button */
    }

    .preferences-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        font-family: 'OCR A Std', monospace;
        border-radius: 5px;
        cursor: pointer;
    }

    .preferences-button:hover {
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    }

    .left-aligned {
        text-align: left;
    }
</style>
</head>
<body>

<div class="container">
    <div class="group-image">
        <img src='/Rent/images/oppa.jpeg' alt="Group Image">
    </div>
    <div class="group-details">
        <?php
        include 'connectdb.php';
        
        // Retrieve the data from the POST request
        $groupCode = $_POST["group_id"];

        $propertyType = $_POST["property_type"];
        $bedrooms = intval($_POST["bedrooms"]);
        $bathrooms = intval($_POST["bathrooms"]);
        $parking = $_POST["parking"] == '1' ? 1 : 0; // Assuming database column is BOOLEAN
        $laundry = $_POST["laundry"];
        $maxRent = doubleval($_POST["max_rent"]);
        $accessibility = $_POST["accessibility"] == '1' ? 1 : 0;
        
        // Prepare the UPDATE statement to update the existing record
        $updateQuery = "UPDATE RentalGroup SET 
                        PropertyType = :propertyType, 
                        Bedrooms = :bedrooms, 
                        Bathrooms = :bathrooms, 
                        Parking = :parking, 
                        Laundry = :laundry, 
                        MaxRent = :maxRent, 
                        Accessibility = :accessibility
                        WHERE GroupCode = :groupCode";
        
        $updateStmt = $connection->prepare($updateQuery);
        
        // Bind parameters to the prepared statement
        $updateStmt->bindParam(':groupCode', $groupCode);
        $updateStmt->bindParam(':propertyType', $propertyType);
        $updateStmt->bindParam(':bedrooms', $bedrooms);
        $updateStmt->bindParam(':bathrooms', $bathrooms);
        $updateStmt->bindParam(':parking', $parking);
        $updateStmt->bindParam(':laundry', $laundry);
        $updateStmt->bindParam(':maxRent', $maxRent);
        $updateStmt->bindParam(':accessibility', $accessibility);
        
        echo "<h2>Rental Group " . htmlspecialchars($groupCode) . " Details</h2>";

        $updateSuccess = false;
        if ($updateStmt->execute()) {
            $updateSuccess = true;// Display updated preferences
            echo "<h3>Preferences Updated Successfully!</h3>";
            
            echo "<div class='left-aligned'>";
            echo "<p><strong>Property Type:</strong> $propertyType</p>";
            echo "<p><strong>Bedrooms:</strong> $bedrooms</p>";
            echo "<p><strong>Bathrooms:</strong> $bathrooms</p>";
            echo "<p><strong>Parking:</strong> " . ($parking ? 'Yes' : 'No') . "</p>";
            echo "<p><strong>Laundry:</strong> $laundry</p>";
            echo "<p><strong>Max Rent:</strong> $$maxRent</p>";
            echo "<p><strong>Accessibility:</strong> " . ($accessibility ? 'Yes' : 'No') . "</p>";
                        echo "</div>"; // Close the right-aligned div

        }
        
        $connection = null;
        ?>

        <div class="button-container">
            <a href="rental.html" class="preferences-button">HomePage</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>