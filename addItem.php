<?php
/* Include the `../src/fusioncharts.php` file that contains functions to embed the charts.*/
include("fusioncharts.php");
/* The following 4 code lines contains the database connection information. Alternatively, you can move these code lines to a separate file and include the file here. You can also modify this code based on your database connection.   */
$hostdb = "webhost.engr.illinois.edu";  // MySQl host
$userdb = "pricetracker_cs411";  // MySQL username
$passdb = "cs411";  // MySQL password
$namedb = "pricetracker_cs411";  // MySQL database name
// Establish a connection to the database
$dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);
/*Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect */
if ($dbhandle->connect_error) {
  exit("There was an error with your connection: ".$dbhandle->connect_error);
}
?>

<html>
    <head>
        <title>Price Tracker </title>
        <script src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
        <script src="http://static.fusioncharts.com/code/latest/fusioncharts.charts.js"></script>
        <script src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.zune.js"></script>
    </head>

<body>


<?php
    include 'lib/checkFunction.php';

    $link = mysql_connect('webhost.engr.illinois.edu', 'pricetracker_cs411', 'cs411');
    if (!$link) {
    die('Could not connect: ' . mysql_error());
    }
    mysql_select_db('pricetracker_cs411');
    
    $iasin = $_POST["search_param"];
    
    $response = getAmazonPrice("com", $iasin);

    $iname = $response[title];

    $iprice = $response[price];
    $iurl = $response[url];
    $image = $response[image];
    
    
    if($iprice <= 0.01){
        exit("<h1>unable to find ASIN: ($iasin)</h1>");
    }
    
    
    
    echo "<img src=$image />
            <h1>Item ASIN: $iasin <br/>
            Item Name: $iname <br/>
            Current Price: $$iprice <br/> 
            <a href=$iurl>Amazon Page</a> <br/></h1>";

    $sql="SELECT * FROM Item WHERE Item_NO = '$iasin' ";
    if((mysql_num_rows(mysql_query($sql))<1))
    {
        echo "<h1>Sorry! Item is not in the database yet. Start tracking now, please come back later!</h1>";
        $sql="INSERT INTO `Item`(`Item_NO`, `Item_Name`, `Item_URL`) VALUES ('$iasin','$iname','$iurl')";
        mysql_query($sql);
        $date = date('Y-m-d');
        mysql_query("INSERT INTO Price(Price_Item_NO, Price_Date, Price_price) VALUES('$iasin', '$date', '$iprice')");
    }
    else
    {
        $strQuery = "SELECT Price_Date, Price_price FROM Price WHERE Price_Item_NO = '$iasin'";
        //$strQuery = "SELECT Price_Date, Price_price FROM Price WHERE Price_Item_NO = '$asin'";
        // Execute the query, or else return the error message.
         $result = $dbhandle->query($strQuery)or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        // If the query returns a valid response, prepare the JSON string
        if ($result) {
        $arrData = array(
                    "chart" => array(
                    "caption"=> $iname,
                    "subCaption"=> "Price Tracker",
                    "xAxisname"=> "Date",
                    "yAxisName"=> "Price",
                    "showValues" => "0",
                    "theme" => "zune"
                    ));
        $arrData["data"] = array();
        // Push the data into the array
        while($row = mysqli_fetch_array($result)) {
        array_push($arrData["data"], array(
            "label" => $row["Price_Date"],
            "value" => $row["Price_price"]
            )
        );
        }
        $jsonEncodedData = json_encode($arrData);
        // chart object
        $msChart = new FusionCharts("line", "chart1" , "1200", "500", "chart-container", "json", $jsonEncodedData);
        // Render the chart
        $msChart->render();
        // closing db connection
        $dbhandle->close();
        }
    }
?>
    <center>
        <div id="chart-container"></div>
    </center>
</body>
</html>