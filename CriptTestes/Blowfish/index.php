<?php
set_time_limit (0);



function decrypt($text){
  $retval = "";
  $cipher = mcrypt_module_open(MCRYPT_BLOWFISH, '', MCRYPT_MODE_ECB, ''); 
  $ivsize = mcrypt_enc_get_iv_size($cipher);
  $iv = substr($text, 0, $ivsize);
  mcrypt_generic_init($cipher, 'Darth_Vader', $iv);  
  $retval = mdecrypt_generic($cipher, $text);     
  return $retval;
}

$ponteiro = fopen ("C:\wamp64\www\Fhincker\Docs\soldier_data.BLF","r");

//LÊ O ARQUIVO ATÉ CHEGAR AO FIM
$linha = "";
while (!feof ($ponteiro)) {
  //LÊ UMA LINHA DO ARQUIVO
  $linha .= fgets($ponteiro,4096);
  //IMPRIME NA TELA O RESULTADO
  $linha."<br>";
}//FECHA WHILE

//FECHA O PONTEIRO DO ARQUIVO
fclose ($ponteiro);

 $cpo = decrypt($linha);
 file_put_contents("_giovane_teste.txt", var_export($cpo,true), FILE_APPEND);