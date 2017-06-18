<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class resize{

		public function rejpg($width,$height,$folder,$fileimage,$CoverImage)
		{
			if(trim($fileimage) != "")
			{
				
				$images = $fileimage;
			
				$size=GetimageSize($images);
				
				$images_orig = ImageCreateFromJPEG($images);
				$photoX = ImagesX($images_orig);
				$photoY = ImagesY($images_orig);
				$images_fin = ImageCreateTrueColor($width, $height);
				ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width, $height, $photoX, $photoY);
				ImageJPEG($images_fin,$folder.$CoverImage);
				ImageDestroy($images_orig);
				ImageDestroy($images_fin);

			}
		}
		
		public function repng($width,$height,$folder,$fileimage,$CoverImage) 
		{
 			
				$images = $fileimage;
				$images_orig = ImageCreateFromPNG($images);
				$photoX = ImagesX($images_orig);
				$photoY = ImagesY($images_orig);
				$images_fin = ImageCreateTrueColor($width, $height);
				imageSaveAlpha($images_fin, true); 
				ImageAlphaBlending($images_fin, false); 
				$transparentColor = imagecolorallocatealpha($images_fin, 255, 255, 255, 127); 
				imagefill($images_fin, 0, 0, $transparentColor); 

				ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1,$height+1, $photoX, $photoY);
				ImagePNG($images_fin,$folder.$CoverImage);
				ImageDestroy($images_orig);
				ImageDestroy($images_fin);
						
		}
		public function regif($width,$height,$folder,$fileimage,$CoverImage) 
		{
 			
				$images = $fileimage;
				$images_orig = ImageCreateFromGIF($images);
				$photoX = ImagesX($images_orig);
				$photoY = ImagesY($images_orig);
				$images_fin = ImageCreateTrueColor($width, $height);
				imageSaveAlpha($images_fin, true); 
				ImageAlphaBlending($images_fin, false); 
				$transparentColor = imagecolorallocatealpha($images_fin, 255, 255, 255, 127); 
				imagefill($images_fin, 0, 0, $transparentColor); 

				ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1,$height+1, $photoX, $photoY);
				ImageGIF($images_fin,$folder.$CoverImage);
				ImageDestroy($images_orig);
				ImageDestroy($images_fin);
						
		}
		public function filetype($filename)
		{
			if($filename == 'image/jpeg') { return 'jpg';}
			if($filename == 'image/png') { return 'png';}
			if($filename == 'image/gif') { return 'gif';}
		}
		



		
	}	
?>

