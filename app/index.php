<?php
$path = "./";
$diretorio = dir($path);
 
echo "<h3>Lista de Arquivos do diretório<br /></h3>";
while($arquivo = $diretorio -> read()){
echo "<a href='".$path.$arquivo."'>".$arquivo."</a><br />";
}
$diretorio -> close();
