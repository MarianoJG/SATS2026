<?php

/* Include the `fusioncharts.php` file that contains functions  to embed the charts. */

include("fusioncharts.php");

/* The following 4 code lines contain the database connection information. Alternatively, you can move these code lines to a separate file and include the file here. You can also modify this code based on your database connection. */

/* $hostdb = "localhost";  // MySQl host
$userdb = "stasacco_admin";  // MySQL username
$passdb = "@HS20172020";  // MySQL password
$namedb = "stasacco_Tests";  // MySQL database name */

$hostdb = "localhost";  // MySQl host
$userdb = "root";  // MySQL username
$passdb = "";  // MySQL password
$namedb = "stasacco_bdsats2021";  // MySQL database name

// Establish a connection to the database
$dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);

/*Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect */
if ($dbhandle->connect_error) {
   exit("There was an error with your connection: ".$dbhandle->connect_error);
}
?>


<?php

      // Form the SQL query that returns the top 10 most populous countries
      // $strQuery = "SELECT categoria, edad_actual FROM trabajador_sindicalizado ORDER BY edad_actual DESC LIMIT 10";
      // 
      
      // $strQuery = "SELECT departamento,  COUNT(*) AS id_trabajador FROM trabajadores WHERE tipo_empleado = 'Sindicalizado' AND departamento='Secretaria de Desarrollo Social'  ; ";

      
   
      $strQuery = "SELECT tipo_empleado, categoria,  COUNT(*) AS id_trabajador FROM trabajadores group by tipo_empleado ;  ";


      // Execute the query, or else return the error message.
      $result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");

      // If the query returns a valid response, prepare the JSON string
      if ($result) {
         // The `$arrData` array holds the chart attributes and data
         $arrData = array(
            "chart"                => array(
            "caption"              => "%  de Trabajadores ",
            "subcaption"           => " Registrados en el sistema",
            "xAxisName"            => "Departamento",
            // "yAxisName"            => "Total ",
            // "paletteColors"        => "#0075c2",
            // "bgColor"              => "#ffffff",
            "borderAlpha"          => "20",
            "canvasBorderAlpha"    => "0",
            "usePlotGradientColor" => "0",
            "plotBorderAlpha"      => "10",
            "placevaluesInside"    => "1", 
            "subcaptionFontBold"   => "0",
            "divLineDashed"        => "1",
            "captionFontSize"      => "16",
            "subcaptionFontSize"   => "14",
            "yAxisNameFontSize"    => "14",
            "showValues"           => "0",
            "theme"                => "ocean"
            )
         );

         $arrData["data"] = array();

   // Push the data into the array

         while($row = mysqli_fetch_array($result)) {
            array_push($arrData["data"], array(

               "label" => $row["tipo_empleado"],
               "value" => $row["id_trabajador"],

               
               
               )
            );
         }

         /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

         $jsonEncodedData = json_encode($arrData);

         /*Create an object for the column chart. Initialize this object using the FusionCharts PHP class constructor. The constructor is used to initialize the chart type, chart id, width, height, the div id of the chart container, the data format, and the data source. */

            $columnChart = new FusionCharts("doughnut2d", "chartContainer", "100%", 400, "chart-1", "json", $jsonEncodedData);

         // Render the chart
         $columnChart->render();

         // Close the database connection
         $dbhandle->close();

      }

   ?>

   