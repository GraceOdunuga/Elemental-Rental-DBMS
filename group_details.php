<?php include 'header.php'; ?>
    <style>
        body { 
            margin: 0; padding: 0; 
            background-color: #f4f4f4; 
        }
        
        .container { 
            max-width: 70%; 
            border: 1px solid #ddd;
            margin: 20px auto;
            background: #fff; 
            padding: 20px; 
            display: flex; 
            align-items: flex-start; 
            justify-content: space-between; /* Space between the text and the image */
            border-radius: 10px; /* Round corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .group-image { 
            flex: 1; 
            text-align: right; /* Align the image to the right */
        }

        .group-image img {
            max-width: 100%;
            border-radius: 20px; /* Round the edges */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adds a shadow */
        }

        .group-details { 
            flex: 3; 
        }

        h2, h3, h4 { 
            color: #333; 
            font-family: 'OCR A Std', monospace;
        }

        p { 
            margin: 10px 0; 
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
    </style>
</head>
<body>


<div class="container">
    <div class="group-details">
        <h2>Rental Group Details</h2>
        <?php
        include 'connectdb.php';

        $groupCode = $_GET['GroupCode'];
        
        $queryGroup = "SELECT * FROM RentalGroup WHERE GroupCode = $groupCode;";
        $resultGroup = $connection->query($queryGroup);
        
        if ($rowGroup = $resultGroup->fetch()) {
            echo "<h3>Group Code: " . $rowGroup["GroupCode"] . "</h3>";
            echo "<p>Property Type: " . $rowGroup["PropertyType"] . "</p>";
            echo "<p>Bedrooms: " . $rowGroup["Bedrooms"] . "</p>";
            echo "<p>Bathrooms: " . $rowGroup["Bathrooms"] . "</p>";
            echo "<p>Parking: " . ($rowGroup["Parking"] ? 'Yes' : 'No') . "</p>";
            echo "<p>Laundry: " . $rowGroup["Laundry"] . "</p>";
            echo "<p>Max Rent: $" . $rowGroup["MaxRent"] . "</p>";
            echo "<p>Accessibility: " . ($rowGroup["Accessibility"] ? 'Yes' : 'No') . "</p>";
            echo "<p>Lease Start Date: " . $rowGroup["LeaseStartDate"] . "</p>";
            echo "<p>Lease End Date: " . $rowGroup["LeaseEndDate"] . "</p>";
            echo "<p>Total Monthly Rent: $" . $rowGroup["TotalMonthlyRent"] . "</p>";
        
            echo "<h4>Students:</h4>";
            $queryStudents = "SELECT FirstName, LastName FROM Student WHERE GroupCode = $groupCode;";
            $resultStudents = $connection->query($queryStudents);
        
            while ($rowStudent = $resultStudents->fetch()) {
                echo "<p>" . $rowStudent["FirstName"] . " " . $rowStudent["LastName"] . "</p>";
            }
        } else {
            echo "<p>Group not found.</p>";
        }
        
        $connection = NULL;
        ?>
        <div class="button-container">
            <a href="preferences_form.php?groupCode=<?php echo $groupCode; ?>" class="preferences-button">Edit Preferences</a>
        </div>
    </div>
    <div class="group-image">
        <img src='/Rent/images/group2.jpeg' alt="Group Image">
    </div>
</div>



<?php include 'footer.php'; ?>
</body>
</html>
