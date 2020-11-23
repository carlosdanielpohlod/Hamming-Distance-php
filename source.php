<?php
public class Hamming {
    public function difference($str01, $str02, $len, $count){
        for($j = 0; $j < $len; $j ++){
            if($str01[$j] != $str02[$j])
                $count ++;
            
        }
        return $count;
    }
    public function validateArrays($array01, $array02){
        
        if(!is_array($array01) || !is_array($array02)){
            throw new Exception('only arrays acepted');
        }

        if(sizeof($array01) != sizeof($array02)){
            throw new Exception('different size arrays');
        }
        if(count($array01) != count($array01)){
            throw new Exception('different sub-arrays number');
        }
        return ;
    }
    public function distance($array01, $array02){
        $this->validateArrays($array01, $array02);
        $len = sizeof($array01);
        $subarrays = count($array01);
        $differences = [];
        for($i = 0; $i < $len; $i ++){       
            for($k = 0; $k < $subarrays; $k ++){
                $count = 0;
                $str01 = $array01[$i][$k];
                
                $str02 = $array02[$i][$k];
                
                
                $strlen01 = strlen($str01);
                $strlen02 = strlen($str02);
              
                if($strlen01 > $strlen02){
                    $count = $this->difference($str01, $str02, $strlen02, $count);
                    $count += $strlen01 - $strlen02;
                    
                }elseif($strlen02 > $strlen01){
                    $count = $this->difference($str02, $str01, $strlen01, $count);
                    $count += $strlen02 - $strlen01;
                    
                }elseif($strlen01 == $strlen02){
                    $count = $this->difference($str02, $str01, $strlen01, $count);
                    
                }
                
                $differences[] = [$count];
            }
        }
        return $differences;
    }
}
?>
