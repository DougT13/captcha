<?php

   session_start(); // inicial a sessao
   header("Content-type: image/jpeg"); // define o tipo do arquivo

    function captcha($larguraInt,$alturaInt,$tamanho_fonte,$quantidade_letras){
        $imagem = imagecreate($larguraInt,$alturaInt); // define a largura e a altura da imagem
        $fonte = getcwd()."/arial.ttf"; //voce deve ter essa ou outra fonte de sua preferencia em sua pasta
        $preto  = imagecolorallocate($imagem,0,0,0); // define a cor preta
        $branco = imagecolorallocate($imagem,255,255,255); // define a cor branca

        // define a palavra conforme a quantidade de letras definidas no parametro
        $quantidade_letras;
        $palavra = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"),0,($quantidade_letras));
        $_SESSION["palavra"] = $palavra; // atribui para a sessao a palavra gerada
        for($i = 1; $i <= $quantidade_letras; $i++){
            imagettftext($imagem,$tamanho_fonte,rand(-25,25),($tamanho_fonte*$i),
            ($tamanho_fonte + 10),$branco,$fonte,substr($palavra,($i-1),1));
            // atribui as letras a imagem
        }
        imagejpeg($imagem); // gera a imagem
        imagedestroy($imagem); // limpa a imagem da memoria
    }
    

    $largura = $_POST['l']; // recebe a largura
    $altura = $_POST['a']; // recebe a altura
    $larguraInt = intval($largura);
    $alturaInt = intval($altura);
    $tamanho_fonte = 20; // recebe o tamanho da fonte
    $quantidade_letras = 5; // recebe a quantidade de letras que o captcha terá


    captcha($largura,$altura,$tamanho_fonte,$quantidade_letras);
    
?>