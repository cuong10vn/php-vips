<?php

use Jcupitt\Vips;

class VipsNewTest extends PHPUnit\Framework\TestCase
{

    public function testVipsNewFromArray()
    {
        $image = Vips\Image::newFromArray([1, 2, 3]);

        $this->assertEquals($image->width, 3);
        $this->assertEquals($image->height, 1);
        $this->assertEquals($image->bands, 1);

        $image = Vips\Image::newFromArray([1, 2, 3], 8, 12);
        $this->assertEquals($image->width, 3);
        $this->assertEquals($image->height, 1);
        $this->assertEquals($image->bands, 1);
        $this->assertEquals($image->scale, 8);
        $this->assertEquals($image->offset, 12);
    }

    public function testVipsNewFromFile()
    {
        $filename = dirname(__FILE__) . '/images/img_0076.jpg';
        $image = Vips\Image::newFromFile($filename);

        $this->assertEquals($image->width, 1600);
        $this->assertEquals($image->height, 1200);
        $this->assertEquals($image->bands, 3);
    }

    public function testVipsFindLoad()
    {
        $filename = dirname(__FILE__) . '/images/img_0076.jpg';
        $loader = Vips\Image::findLoad($filename);

        $this->assertEquals($loader, 'VipsForeignLoadJpegFile');
    }

    public function testVipsNewFromBuffer()
    {
        $filename = dirname(__FILE__) . '/images/img_0076.jpg';
        $buffer = file_get_contents($filename);
        $image = Vips\Image::newFromBuffer($buffer);

        $this->assertEquals($image->width, 1600);
        $this->assertEquals($image->height, 1200);
        $this->assertEquals($image->bands, 3);
    }

    public function testVipsFindLoadBuffer()
    {
        $filename = dirname(__FILE__) . '/images/img_0076.jpg';
        $buffer = file_get_contents($filename);
        $loader = Vips\Image::findLoadBuffer($buffer);

        $this->assertEquals($loader, 'VipsForeignLoadJpegBuffer');
    }

}

/*
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * End:
 * vim600: expandtab sw=4 ts=4 fdm=marker
 * vim<600: expandtab sw=4 ts=4
 */
