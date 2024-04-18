<?php
$no_of_recods_per_page = 10;
$total_records = 33;

$total_pages = ceil($total_records / $no_of_records_per_page);

for ($i = 1; $i <= $total_pages; $i++) {
    echo $i . ' ';
}
?>
