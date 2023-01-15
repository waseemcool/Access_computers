<?php

    require "connection.php";

    $province = $_GET["province"];

    // echo $province;

    $alldistrictrs = Database::search("SELECT * FROM `district` WHERE `province_id` = '" . $province . "'");

    $districtnum = $alldistrictrs->num_rows;

    for ($i = 0; $i < $districtnum; $i++) {

        $alldistrict = $alldistrictrs->fetch_assoc();

        ?>

        <option value="<?php echo $alldistrict["id"]; ?>"><?php echo $alldistrict["name"]; ?></option>

        <?php

    }

?>