<!DOCTYPE html>
<html>
<head>
    <title>Update Rental Preferences</title>
    <style>
        body {
            background-color: #f0f0f0; 
            font-family: 'OCR A Std', monospace;
            margin: 0 auto;
            width: 50%;
            padding: 20px;
        }

        h1 {
            color: #333;
        }


        p {
            font-size: 18px;
        }

        input[type="number"], select, input[type="date"], input[type="radio"] {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="radio"] {
            width: auto;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h1>Update Rental Preferences</h1>

<?php
include 'connectdb.php';
// Extract Group ID from the URL
$group_id = $_GET['groupCode'];
?>

<form action="insert.php" method="post"> 
    <p>Property Type:</p>
    <select name="property_type">
        <option value="house">House</option>
        <option value="apartment">Apartment</option>
        <option value="room">Room</option>
    </select> <br> <br>

    <p>Bedrooms:</p>
    <input type="number" name="bedrooms" min="1"> <br> <br>

    <p>Bathrooms:</p>
    <input type="number" name="bathrooms" min="1"> <br> <br>

    <p>Parking:</p>
    <label><input type="radio" name="parking" value="1"> Yes</label>
    <label><input type="radio" name="parking" value="0"> No</label> <br> <br>

    <p>Laundry:</p>
    <select name="laundry">
        <option value="ensuite">Ensuite</option>
        <option value="shared">Shared</option>
    </select> <br> <br>

    <p>Max Rent:</p>
    <input type="number" name="max_rent" step="0.01" min="0"> <br> <br>

    <p>Accessibility:</p>
    <label><input type="radio" name="accessibility" value="1"> Yes</label>
    <label><input type="radio" name="accessibility" value="0"> No</label> <br> <br>

    <input type="hidden" name="group_id" value="<?php echo htmlspecialchars($group_id); ?>">



    <input type="submit" value="Update Preferences">
</form> 

</body>
</html>
