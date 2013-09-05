<?php namespace Cdtx\Placeholder\Controllers;
use Controller,Response, Config;
use Cdtx\Placeholder\Placeholder;



class PlaceholderController extends Controller {
	
	public function generate($width,$height,$color=null)
	{
		if ($color == null or ! $this->isColor($color) ) $color = Config::get('placeholder::placeholder.color');

		$placeholder = new Placeholder();

		$image = $placeholder->render($width,$height,$color);
		
        $filename = $width.'x'.$height.'-'.$color;
        
        $headers = array(
        	'content-type' => 'image/png',
        	'content-disposition' => 'inline; filename='.$filename.'.png',
    		'content-transfer-encoding' => 'binary'
		);
        return Response::make($image, 200, $headers);
	}

	// Validate Color
	protected function isColor($color)
	{
		return true;
	}
}