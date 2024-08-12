<?php include 'header.php'; ?>
<style>
  table {
    width: 80%; /* Reduce width to create space around the table */
    margin: 20px auto; 
    border-spacing: 0; /* Removes the default spacing around the table */
    background-color: white; 
    border-radius: 10px; /* Rounded corners */
    overflow: hidden; 
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); /* adds shadow */
    font-family: 'OCR A Std', monospace;
  }

  th, td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #f2f2f2;
  }

  th {
    background-color: #d9d9d9; /* Darker gray background for header */
  }

  /* Zebra-striping for rows  from w3 schools*/
  tr:nth-child(even) {
    background-color: #f9f9f9; /* Light gray for even rows */
  }

  .title {
    font-size: 1.2em;
    margin-bottom: 20px;
    text-align: center;
    color: #6D6969; /* Soft color for the tagline */
}

  .main-image {
    display: block; 
    margin: auto;
    border-radius: 10px; /*  round the corners of the image */
}

</style>

<div class="main-content">
        <p class="title">Properties</p>
        <img src="/Rent/images/page2.jpeg" alt="Main Page Image" class="main-image">
</div>

<table>
    <tr>
        <th>Property ID</th>
        <th>Owner Full Name</th>
        <th>Manager Full Name</th>
    </tr>

    <?php
    include 'connectdb.php';

    $query = "SELECT rp.PropertyID, o.FirstName AS OwnerFirstName, o.LastName AS OwnerLastName, pm.FirstName AS ManagerFirstName, pm.LastName AS ManagerLastName FROM RentalProperty AS rp JOIN OwnsProperties AS op ON rp.PropertyID = op.PropertyID JOIN Owner AS o ON op.OwnerID = o.OwnerID LEFT JOIN PropertyManager AS pm ON rp.PropertyManagerID = pm.ManagerID ORDER BY rp.PropertyID ASC;";

    $result = $connection->query($query);

    while ($row = $result->fetch()) {
        $ownerFullName = $row["OwnerFirstName"] . ' ' . $row["OwnerLastName"];
        $managerFullName = $row["ManagerFirstName"] . ' ' . $row["ManagerLastName"];
        
        echo "<tr>";
        echo "<td>".$row["PropertyID"]."</td>";
        echo "<td>".$ownerFullName."</td>";
        echo "<td>".$managerFullName."</td>";
        echo "</tr>";
    }

    $connection = NULL;
    ?>
</table>
<?php include 'footer.php'; ?>