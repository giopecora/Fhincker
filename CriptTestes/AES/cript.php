<?php

include( 'aes.class.php' );

/**
 *  Gerando um chave de 128 bits com o auxílio do método "keygen" e
 * agregando um sal a geração da chave.
 *
 */
$key = AES::keygen( AES::KEYGEN_128_BITS, "DEATH_STAR" );

/**
 * Instância do objeto AES de criptografia e descriptografia de dados.
 *
 */
$aes = new AES( $key );

// Cofigicando.
/*$encode = $aes->encrypt($_POST['msg']);

// Chave simétrica gerada de 128 bits
echo "<p><b>Chave Simétrica 128 bits: ".$key."</b></p><br />";

echo "<p><b>Texto criptografado: ".base64_encode($encode)."</b></p><br />";

// Decodificando a string.*/
$decode = $aes->decrypt( $_POST['msg'] );

echo "<p><b>Texto descriptografado: ".$decode."</b></p><br />";

?>