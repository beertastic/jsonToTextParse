<?php    

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