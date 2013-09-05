<?php namespace Cdtx\Placeholder;
use Config;

use Imagine\Gd\Imagine;
use Imagine\Image\Box;
use Imagine\Image\Palette\RGB;


class Placeholder {
	

	public function render($width, $height,$color)
	{
		$imagine = new Imagine();

		$size  = new Box($width, $height);

		$palette = new RGB();

		$color = $palette->color($color, 0);

		$image = $imagine->create($size, $color);

		return $image;
	}


}