<?php
include('connectdb.php');
if ($_POST['data']) {
    $request = $_POST['data'];
    // if (!$sth = $conn->query("SELECT * FROM v_cskh")) {
    //     die(var_export($conn->errorinfo(), TRUE));
    // }
    $stm = $conn->query("SELECT name, phone,address,note,email FROM v_cskh where phone like '%" . $request['from'] . "%'");
    $result = $stm->fetchAll(PDO::FETCH_OBJ);
    if (count($result) >0) {
        echo json_encode($result[0]);
    }else{
        echo json_encode([
            'name'=>'',
            'phone'=>'',
            'address' =>'',
            'note'  => '',
            'email' => ''
        ]);
    }
    exit;
}
