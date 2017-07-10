<?php
class Json2xml{
    public function json2xml($json = null){
        $xml = "";
        foreach($json as $key => $value){
            $xml .= $this->brackify($key,'o');
            if(is_array($value)){
                $xml .= $this->json2xml($value).PHP_EOL;
            }
            else{
                $xml .= $value.PHP_EOL;
            }
            $xml .= $this->brackify($key,'c'); 
        }
        return $xml;   
    }
    
    public function jsonfrompost($format = null){
        $json = array();
        $pdata = array();
        foreach($_POST as $key => $value){
            $pdata[$key] = $value;
        }
        //print_r($pdata);
        $fdata = array();
        foreach($_FILES as $key => $value){
            $fdata[$key] = $value;
        }
        //print_r($fdata);
        //die();
        return $json;
    }
    
    public function brackify($string,$type){
        switch ($type) {
            case 'o':
                $output = '<'.$string.'>'.PHP_EOL; 
                echo $output;
                return $output;
                break;
            case 'c':
                $output = '</'.$string.'>'.PHP_EOL; 
                echo $output;
                return $output;
                break;
            default:
                echo "Error";
        }
    }
}    


