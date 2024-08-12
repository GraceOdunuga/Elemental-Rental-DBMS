<?php include 'header.php'; ?>
<style>
    table {
        width: 60%; 
        margin: 20px auto; 
        border-spacing: 0.5; 
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
        color: #6D6969; 
    }

    .main-image {
        width: 60%; 
        height: auto;
        display: block; 
        margin: 20px auto; 
        border-radius: 10px; /*  round the corners of the image */
    }

</style>

<div class="title">
        <p class="title">Properties Average Monthly Rent</p>
</div>

<table>
<tr>
    <th>Houses</th>
    <th>Apartments</th>
    <th>Rooms</th>
</tr>
<?php
include 'connectdb.php';

$query = "SELECT PropertyType, AVG(CostPerMonth) AS AverageRent FROM RentalProperty GROUP BY PropertyType ORDER BY PropertyType DESC;";

$result = $connection->query($query);

$averages = ['house' => 0, 'apartment' => 0, 'room' => 0];

while ($row = $result->fetch()) {
    $averages[$row["PropertyType"]] = $row["AverageRent"];
}

echo "<tr>";
echo "<td>".number_format($averages['house'], 2)."</td>";
echo "<td>".number_format($averages['apartment'], 2)."</td>";
echo "<td>".number_format($averages['room'], 2)."</td>";
echo "</tr>";

$connection = NULL;
?>
</table>

<div class="image">
        <img src="/Rent/images/iroh2.jpeg" alt="Main Page Image" class="main-image">
</div>

</body>
</html>
<?php include 'footer.php'; ?>