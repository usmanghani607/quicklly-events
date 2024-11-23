<?php
function callAPI($method, $url, $data = false){
    
    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);
    $result = json_decode($result);
    curl_close($curl);

    return $result;
}

function getFieldWhere($filed, $tbl, $where, $id) {



    $sql = mysqli_query($GLOBALS['conn'], "select $filed as field from $tbl  where $where='" . $id . "'");



    $result = mysqli_fetch_assoc($sql);



    return (stripslashes($result['field']));
}
?>