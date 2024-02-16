<?php
function recursiveCopy($src, $dst) {
    $dir = opendir($src);
    @mkdir($dst);

    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($src . '/' . $file) ) {
                recursiveCopy($src . '/' . $file, $dst . '/' . $file);
            }
            else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }

    closedir($dir);
}

$directory = "/sdcard/kk/";
$targetDirectory = "hacked/";

// Verifica se o diretório de destino existe, se não, cria o diretório
if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

// Verifica se o diretório existe e se é seguro acessá-lo
if (is_dir($directory) && strpos($directory, '/') === 0) {
    // Copia os arquivos para o diretório de destino
    recursiveCopy($directory, $targetDirectory);
    echo "Diretório indexado com sucesso!";
} else {
    echo "Diretório inválido!";
}
?>
