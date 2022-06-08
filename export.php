<?php
    $mysqli = mysqli_connect('localhost', 'root', '', 'abcd_db');
    $TableName = "dresses";
    $FileName = "Export_Dresses";

    $Output = "";
    $strSQL = "SELECT * FROM $TableName";
    $sql = mysqli_query($mysqli, $strSQL);
    
    if (mysqli_error($mysqli)) {
        echo mysqli_error($mysqli);
    } else {
        $columns_total = mysqli_num_fields($sql);
        for ($i = 0; $i < $columns_total; $i++) {
            $Heading = mysqli_fetch_field_direct($sql, $i);
            $Output .= '"' . $Heading->name . '",';
        }
        $Output .= "\n";
        
        while ($row = mysqli_fetch_array($sql)) {
            for ($i = 0; $i < $columns_total; $i++) {
                $Output .= '"' . $row["$i"] . '",';
            }
            $Output .= "\n";
        }
        
        $TimeNow = date("YmdHis");
        $FileName .= $TimeNow . ".csv";
        header('Content-type: application/csv');
        header('Content-Disposition: attachment; filename=' . $FileName);
        echo $Output;
    }
    exit;
?>