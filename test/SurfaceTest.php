<?php

include('../src/Surface.php');
use PHPUnit\Framework\TestCase;

class SurfaceTest extends TestCase
{
    public function testFindSurface()
    {
        $height = 10;
        $altitudes = array(30, 27, 17, 42, 29, 12, 45, 41, 42, 42);
        $surfaceTest =  new surface($altitudes, $height);
        $this->assertSame(7, $surfaceTest->findSurface());
    }
    public function testZeroAltitude()
    {
        $height = 10;
        $altitudes = array(30, 0, 17, 42, 0, 12, 45, 41, 42, 42);
        $surfaceTest =  new surface($altitudes, $height);
        $this->assertSame(7, $surfaceTest->findSurface());
    }
    public function testDifferentHeight()
    {
        $height = 2;
        $altitudes = array(30, 27, 17, 42, 29, 12, 45, 41, 42, 42);
        $surfaceTest =  new surface($altitudes, $height);
        try {
            $surfaceTest->findSurface();
          $this->fail('Expected exception height is different that altitude number.');
        } catch (Exception $e) {
            $this->assertSame("Height is different that altitude number.", $e->getMessage());
        }
    }
    public function testDifferentAltitudeNumber()
    {
        $height = 10;
        $altitudes = array(30, 27, 17, 42, 29, 12, 45, 41, 42, 42, 40, 49, 40);
        $surfaceTest =  new surface($altitudes, $height);
        try {
          $surfaceTest->findSurface();
          $this->fail('Expected exception height is different that altitude number.');
        } catch (Exception $e) {
            $this->assertSame("Height is different that altitude number.", $e->getMessage());
        }
    }
    public function testHeightIsEmpty()
    {
        $height = '';
        $altitudes = array(30, 27, 17, 42, 29, 12, 45, 41, 42, 42, 40, 49, 40);
        $surfaceTest =  new surface($altitudes, $height);
        try {
            $surfaceTest->findSurface();
            $this->fail('Expected exception height argument is empty or invalid format.');
        } catch (Exception $e) {
            $this->assertSame("Height argument is empty or invalid format.", $e->getMessage());
        }
    }
    public function testAltitudeIsEmpty()
    {
        $height = 10;
        $altitudes = array();
        $surfaceTest =  new surface($altitudes, $height);
        try {
            $surfaceTest->findSurface();
            $this->fail('Expected exception Altitude argument is empty.');
        } catch (Exception $e) {
            $this->assertSame("Altitude argument is empty.", $e->getMessage());
        }
    }
    function testOverflowAltitudesNumber()
    {
        $height = 100001;
        $altitudes = array();
        for ($i = 0; $i <= 100000; $i++) {
            array_push($altitudes, 1);
        }
        $surfaceTest =  new surface($altitudes, $height);
        try {
            $surfaceTest->findSurface();
            $this->fail('Expected exception Invalid number of altitudes(overflow)).');
        } catch (Exception $e) {
            $this->assertSame("Invalid number of altitudes(overflow)).", $e->getMessage());
        }
    }
    public function testOverflowHeightNumber()
    {
        $height = 100001;
        $altitudes = array(30, 27, 17, 42, 29, 12, 45, 41, 42, 42, 40, 49, 40);
        $surfaceTest =  new surface($altitudes, $height);
        try {
            $surfaceTest->findSurface();
            $this->fail('Expected exception Invalid height(over, under flow or invalid type).');
        } catch (Exception $e) {
            $this->assertSame("Invalid height(over, under flow or invalid type).", $e->getMessage());
        }
    }
    public function testFileExist()
    {
        $fileName = "../src/surface.txt";
        $nbLines = count(fileReader($fileName));
        $this->assertSame(2, $nbLines);
    }
    public function testStringToIntArray()
    {
        $str = "12 23 34 45 32 12 34";
        $this->assertSame(array(12, 23, 34, 45, 32, 12, 34), convertArrayInteger($str));
    }
    public function testWrongTypeNumber()
    {
        $str = "aa 23 34 45 32 12 34";
        try {
            convertArrayInteger($str);
            $this->fail('Expected exception invalid altitude(invalid format in file surface.txt)).');
        } catch (Exception $e){
            $this->assertSame('Invalid altitude(invalid format in file surface.txt)).', $e->getMessage());
        }
    }
}
?>