<?php    


    public function convertTest() {
        $myArray = json_decode($this->sample_data);
        echo $this->loopArray($myArray);
    }

    public function loopArray($myArray, $level = 0) {
        $output = '';
 
        foreach($myArray as $key => $value) {

            if (!is_int($key)) {
                $output .= '<br />' . $this->numberToDash($level). ' ' . $key;
            }

            if ((!is_object($value)) && (!is_array($value))) {
                $output .= ' : ' . $value;
            }

            if ((is_object($value)) || (is_array($value))) {
                $level++;
                foreach ($value as $obj => $oVal) {                    
                    if (is_object($obj)) {
                        $output .= $this->loopArray($obj, $level);
                    } else if (is_array($obj)) {
                        $output .= $this->loopArray($oVal, $level);
                    } else {
                        $output .= $this->loopArray(array($obj => $oVal), $level);
                    }
                }
            }
        }

        return $output;
    }

    public function numberToDash($count) {
        $dash = '';
        for ($x = 0; $x < $count; $x++) {
            $dash .= ' &#8594; ';
        }
        return $dash;
    }
