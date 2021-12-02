<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class TestController extends Controller
{
      public function generate($id){
      $renderer = new ImageRenderer(
          new RendererStyle(400),
          new ImagickImageBackEnd()
      );
      $writer = new Writer($renderer);
      $writer->writeFile('Hello World!', 'qrcode.png');
      $image = base64_encode($writer->writeString($id));

 



      return view('test')->with("qr_image" ,$image );
    }
}
