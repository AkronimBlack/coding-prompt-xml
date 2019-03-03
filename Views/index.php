<?php
if (array_key_exists('Error', $data['response'])) {
    echo $data['response']['Error'];
}else{
    ?>
    <h1>Hello there user <?php echo $data['response']['id'] ?></h1>
<?php
}
?>
