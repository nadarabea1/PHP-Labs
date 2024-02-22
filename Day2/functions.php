<?php
function store_submits_to_file($name, $email){
    $fp = fopen(submits_file, "a+"); 
    if($fp){
        $inputs = date("F d Y H:i a") . ";" . $_SERVER["REMOTE_ADDR"] . ";" . $email . ";" . $name . PHP_EOL; 
        if(fwrite($fp, $inputs)){
            fclose($fp);
            return true;
        } else {
            fclose($fp); 
            return false;
        }
    } else {
        return false;
    }
}

function display_all_submits(){
    $lines=file(submits_file);
    foreach($lines as $line){
        echo "<hr>";
        $words= explode(";", $line);
        $i=0;
        foreach($words as $word){
            switch($i){
                case 0:
                    echo "<h5>Visit Date:$word</h5>";
                    break;
                case 1:
                    echo "<h5>IP Address:$word</h5>";
                    break;
                case 2:
                    echo "<h5>Email:$word</h5>";
                    break;
                case 3:
                    echo "<h5>Name:$word</h5>";
                    break;
            }
            $i++;
        }
    }
}
