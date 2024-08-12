<?php include 'header.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental World Information</title>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental World Information</title>
    <style>
        body {
            background-color: #dddddd; 
        }

        .container {
            display: flex;
            flex-direction: column; 
            align-items: center; 
            justify-content: center; 
            margin-top: 30px;
            margin-bottom: 50px; /* Adds space at the bottom of the container */
        }

        .card {
            width: 45%;
            padding: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            border-radius: 10px; /* Keeps the card edges rounded */
            background-color: #f9f9f9;
            font-family: 'OCR A Std', monospace;
            margin-bottom: 20px; 
        }

        h2 {
            text-align: center;
        }

        .info {
            margin: 20px auto;
            text-align: left;
        }

        .video-container {
            width: 50%;
            border-radius: 10px; /* Rounds the edges of the video container */
            overflow: hidden; 
        }

        video {
            width: 100%;
            border-radius: 10px; /* round the edges of the video itself */
        }
</style>

</head>

<body>

<?php 
include 'connectdb.php'; 

// Using $connection->query() to execute queries and fetch data
$rentersResult = $connection->query("SELECT COUNT(DISTINCT RenterID) AS rentersCount FROM Student")->fetch(PDO::FETCH_ASSOC);
$ownersResult = $connection->query("SELECT COUNT(DISTINCT OwnerID) AS ownersCount FROM Owner")->fetch(PDO::FETCH_ASSOC);
$managersResult = $connection->query("SELECT COUNT(DISTINCT ManagerID) AS managersCount FROM PropertyManager")->fetch(PDO::FETCH_ASSOC);
$propertiesResult = $connection->query("SELECT COUNT(DISTINCT PropertyID) AS propertiesCount FROM RentalProperty")->fetch(PDO::FETCH_ASSOC);
?>

<div class="container">
    <div class="card">
        <h2>Welcome to Elemental Rental Datasets</h2>
        <p>Where the elements of Earth, Water, Fire, and Air converge in harmony to manage your rental world.</p>
        <div class="info">
            <p>With <?php echo $rentersResult['rentersCount']; ?> renters,</p>
            <p><?php echo $ownersResult['ownersCount']; ?> owners,</p>
            <p><?php echo $managersResult['managersCount']; ?> managers, and</p>
            <p><?php echo $propertiesResult['propertiesCount']; ?> properties</p>
            <p>all information in one location.</p>
        </div>
    </div>
    <div class="video-container">
        <video controls autoplay>
            <source src="/Rent/images/avatar_video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</div>


<?php include 'footer.php'; ?>

</body>
</html>
