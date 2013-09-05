<?php namespace Cdtx\Placeholder\Controllers;
use Controller,Response, Config, App;
use Cdtx\Placeholder\Placeholder;



class PlaceholderController extends Controller {
	
	public function generate($width,$height,$color=null)
	{
		// Validate Color
		if ($color == null or ! $this->isColor($color) ) $color = Config::get('placeholder::placeholder.color');

		// Validate Size
		if (! $this->checkSize($width) or ! $this->checkSize($height)) App::abort('404');

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
		if(preg_match('/^[a-f0-9]{6}$/i', $color)) //hex color is valid
		{
		      return true;
		} 
		else return false;
	}

	protected function checkSize($value)
	{
		if ( (int) $value > 0)
		{
			return true;
		}
	}
}