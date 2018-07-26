<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Request;

use Illuminate\Support\Facades\Input;
use Image;

class UploadController extends Controller
{

	// رفع صوره
	public static function UploadImage($inp,$folder='upload',$allow=array("image/gif","image/jpeg","image/png")){
		if(Request::hasFile($inp)) {
		if(Input::file($inp)->isValid()) {

			$path = Input::file($inp)->path();										// باتش الملف
			$extension = Input::file($inp)->extension();							// إمتداد الملف
			$OriginalName = Input::file($inp)->getClientOriginalName(); 			// الإسم الأساسى للملف
			$fileName = time().rand(11111,99999).'.'.$extension;					// إسم عشوائى يراعى فيه عدم تكرار الاسم مع ملف آخر
			$Mime = Input::file($inp)->getMimeType();								// نوع الملف
			list($width, $height, $type, $attr) = @getimagesize($path);				// عرض وأرتفاع الملف
			$Size = Input::file($inp)->getSize();									// حجم الملف
			$destinationPath = base_path().'/'.$folder; // مجلد الرفع
			if(
				in_array($Mime,$allow)
				and
				($width > 0 and $height > 0)
				){
				Input::file($inp)->move($destinationPath,$fileName);				// رفع الملف

				$results = collect([
					'mime'=>$Mime,
					'size'=>$Size,
					'width'=>$width,
					'height'=>$height,
					'name'=>$OriginalName,
					'new_name'=>$fileName,
					'file'=>$destinationPath.'/'.$fileName
				]);
				// $optionArray = self::getSizeByAuto($width, $height , 255, 255); // جلب العرض والطول بشكل متناسب

				// تخليق الصوره المصغره
				//$img = Image::make($folder.'/'.$fileName);
				// resize image instance
				//$img->resize($optionArray['optimalWidth'],$optionArray['optimalHeight']);

				// insert a watermark
				//$img->insert('public/watermark.png');

				// save image in desired format
				//$img->save($folder.'/thumbnail/'.$fileName);

				return $results;
			}else{
				return ;
			}

		}
		}
		return ;
	}
	public static function getSizeByAuto($oldWidth, $oldHeight , $newWidth, $newHeight)
	{
		if ($oldHeight < $oldWidth)
		// *** Image to be resized is wider (landscape)
		{
			$optimalWidth = $newWidth;
			$optimalHeight= self::getSizeByFixedWidth($oldWidth, $oldHeight , $newWidth);
		}
		elseif ($oldHeight > $oldWidth)
		// *** Image to be resized is taller (portrait)
		{
			$optimalWidth = self::getSizeByFixedHeight($oldWidth, $oldHeight , $newHeight);
			$optimalHeight= $newHeight;
		}
		else
		// *** Image to be resizerd is a square
		{
			if ($newHeight < $newWidth) {
				$optimalWidth = $newWidth;
				$optimalHeight= self::getSizeByFixedWidth($oldWidth, $oldHeight , $newWidth);
			} else if ($newHeight > $newWidth) {
				$optimalWidth = self::getSizeByFixedHeight($oldWidth, $oldHeight , $newHeight);
				$optimalHeight= $newHeight;
			} else {
				// *** Sqaure being resized to a square
				$optimalWidth = $newWidth;
				$optimalHeight= $newHeight;
			}
		}

		return array('optimalWidth' => $optimalWidth, 'optimalHeight' => $optimalHeight);
	}
	private static  function getSizeByFixedWidth($oldWidth, $oldHeight ,$newWidth)
	{
		$ratio =$oldHeight / $oldWidth;
		$newHeight = $newWidth * $ratio;
		return $newHeight;
	}

	private static  function getSizeByFixedHeight($oldWidth, $oldHeight ,$newHeight)
	{
		$ratio = $oldWidth /$oldHeight;
		$newWidth = $newHeight * $ratio;
		return $newWidth;
	}
}
