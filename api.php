<?php

$con = mysqli_connect("localhost", "root", "", "online_sup");
$response = array();

if ($con) {
    $sql = "SELECT * FROM boxes_section";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header("content-Type: JSON");
        $i = 0;

        while ($row = mysqli_fetch_assoc($result)) {
            $response[$i]['id'] = $row['box_id'];
            $response[$i]['title'] = $row['box_title'];
            $response[$i]['desc'] = $row['box_desc'];

            $i++;
        }

        echo json_encode($response, JSON_PRETTY_PRINT);
    }

} else {
    echo "DB NOT CONNECTED";
}

?>