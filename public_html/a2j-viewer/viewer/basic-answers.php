<?php
$AnswerKey = isset($_POST['AnswerKey']) ? $_POST['AnswerKey'] : null;

file_put_contents(__DIR__ . '/' . date('Y-m-d-H.i.s') .
 '-'. bin2hex(random_bytes(8)) .'.anx', $AnswerKey);
?>
