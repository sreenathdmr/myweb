<?php
$input = $dom->createElement('input');
$domAttribute = $dom->createAttribute('type');
$domAttribute->value = 'text';
$input->appendChild($domAttribute);
$domAttribute = $dom->createAttribute('name');
$domAttribute->value = 'e-mail';
$input->appendChild($domAttribute);
$dom->appendChild($input);

?>