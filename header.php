<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElementalDatasets - Rental Management System</title>
    <style>
        body {
            font-family: 'Impact', fantasy;
            letter-spacing: 0.03em;
            margin: 0;
        }
        .header {
            background: #282828;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .left-header {
            display: flex;
            align-items: center;
        }
        .logo {
            margin-right: 10px;
            max-width: 125px;
            height: auto;
        }
        .logo-text {
            display: flex;
            flex-direction: column;
            color: #ffffff;
            font-size: 1.5em;
        }
        .logo-text div {
            line-height: 1;
            margin: 0;
        }
        .nav {
            display: flex;
            margin-right: 20px;
        }
        .nav-card {
            background-color: #fff;
            border-radius: 5px;
            padding: 10px;
            margin: 0 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
            transition: box-shadow 0.3s ease;
        }
        .nav-card:hover {
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        .nav-card a {
            text-decoration: none;
            color: #444;
            display: block;
            text-align: center;
        }
        .main-content {
            padding: 20px;
            background: #fff;
            margin-top: 10px;
        }
        .footer {
            display: block;
            background: #282828;
            color: white;
            text-align: center;
            padding: 20px 0;
            
            bottom: 0;
            width: 100%;
        }
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="left-header">
            <a href="rental.html" style="text-decoration: none; display: flex; align-items: center; color: white;">
                <img src="/Rent/images/Logo.png" alt="Logo" class="logo">
                <div class="logo-text">
                    <div>Elemental</div>
                    <div>Rental </div>
                    <div>Datasets</div>
                </div>
            </a>
        </div>
    <nav class="nav">
        <div class="nav-card"><a href="video.php">About Us</a></div>
        <div class="nav-card"><a href="property_listing.php">View Properties</a></div>
        <div class="nav-card"><a href="rent_groups.php">View Rental Groups</a></div>
        <div class="nav-card"><a href="avg_rent.php">View Average Monthly Rent</a></div>
    </nav>
    </header>