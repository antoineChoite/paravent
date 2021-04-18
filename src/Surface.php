<?php
//class
class Surface
{
    public $_height;
    public $_altitudes;

    function __construct($altitudes, $height)
    {
        $this->_altitudes = $altitudes;
        $this->_height = $height;
    }

    public function checkParam() {
        if (!$this->_altitudes) {
            throw new Exception('Altitude argument is empty.');
       }
       else if  (!$this->_height) {
           throw new exception('Height argument is empty or invalid format.');
       }
       else if (count($this->_altitudes) < 0 || count($this->_altitudes) > 100000) {
        throw new exception('Invalid number of altitudes(overflow)).');
       }
       else if ($this->_height < 1 || $this->_height > 100000) {
           throw new exception('Invalid height(over, under flow or invalid type).');
       }
       else if ($this->_height != count($this->_altitudes))
       {
            throw new exception('Height is different that altitude number.');
       }      
    }

    public function findSurface() 
    {
       $safeSurface = 0;
       $this->checkParam();
       $highAltitude = $this->_altitudes[0];
       foreach ($this->_altitudes as &$value) {
            if ($value < 0 || $value > 100000) {
                throw new exception('Invalid altitude(over, under flow or invalid types)).');
            }
            if ($value > $highAltitude)
                $highAltitude = $value;
            else if ($value < $highAltitude)
                $safeSurface++;
        }
        return $safeSurface;
    }
}

//Function
function fileReader($fileName) {
    if (file($fileName) == false) {
        throw new Exception('file error(file doesnt exist or invalid name).');
    }
    $lines = file($fileName);
    return $lines;
}
function convertArrayInteger($line) {
    $altitudeLine = explode(' ', trim($line));
    foreach ($altitudeLine as $testcase) {
        if (!is_numeric($testcase)) {
            throw new exception('Invalid altitude(invalid format in file surface.txt)).');
        }
    }
    $altitudes = array_map('intval', $altitudeLine);
    unset($altitudeLine);
    return $altitudes;
}

//Main
$fileName = "../src/surface.txt";
$lines = fileReader($fileName);
$height = $lines[0];
$altitudes = convertArrayInteger($lines[1]);
$montains = new surface($altitudes, intval($height));
echo $montains->findSurface();
unset($lines);
unset($height);
unset($altitudes);
unset($montains);
?>