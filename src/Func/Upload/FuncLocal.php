<?php namespace Nhanduc\Core\Func\Upload;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Nhanduc\Core\Func\Exceptions\UploadException;

/** :: Nhanduc ::
***********************************************************************************************************************
* @source  : FuncS3.php
* @project :
*----------------------------------------------------------------------------------------------------------------------
* VER  DATE           AUTHOR          DESCRIPTION
* ---  -------------  --------------  ---------------------------------------------------------------------------------
* 1.0  2020/11/12     Name_0070
* ---  -------------  --------------  ---------------------------------------------------------------------------------
* Project Description
* Copyright(c) 2020 Nhanduc Ltd. ,All rights reserved.
**********************************************************************************************************************/
class FuncLocal {
    
    /**
     * @param $file
     * @param string $name
     * @param string $path
     * @throws UploadException
     */
    public function actionUpload($file, $name, $path) {
        try{
            $extension = $file->getClientOriginalExtension();
            $filename = time() . $name;
            $file->move($path, $filename );

            return $filename;
        } catch (Exception $e) {
			throw  new UploadException("Error when upload server");
		}
    }

    /**
     * Function uploadImage
     * @param string $file,
     * @param string $rootPath
     * @param array $path
     * @throws UploadException
     */
    public function uploadImage($file, $rootPath, $fileName, ...$paths) {
        
        if(empty($file)) {
            throw  new UploadException("File does not exists");
        } else  if(!preg_match("/(bmp|gif|png|jpe?g)/i", $file->getClientOriginalExtension())) {
            throw  new UploadException("Only image files are possible.");
        } else if(empty($rootPath)) {
            throw  new UploadException("Path does not exist");
        }

        try {
            $image = Image::make($file->getRealPath())->stream();
            $pathArray = array(sprintf("/%s", $rootPath));
          
            foreach ($paths as $val) {
                if(is_array($val)) {
                    foreach ($val as $value) {
                        array_push($pathArray, sprintf("/%s", (string) $value));
                    }
                } else {
                    array_push($pathArray, sprintf("/%s", (string) $val));
                }
            }
            $fileName = preg_replace('/[^a-zA-Z0-9_. -]/s', '', str_replace(' ', '', time() .'_'. $file->getClientOriginalName()));
   
            Storage::disk('public')->put(sprintf("%s/", (string) join('', $pathArray)) . $fileName, $image);

            return $fileName;
        } catch (Exception $e) {
            throw  new UploadException("Error when upload File");;
        }
    }

    /**
     * Function uploadCropImage
     * @param string $file,
     * @param string $rootPath
     * @param int $x
     * @param int $y
     * @param int $width
     * @param int $height
     * @param array $path
     * @throws UploadException
     */
    public function uploadCropImage($file, $rootPath, $x, $y, $width, $height, ...$paths) {
        
        if(empty($file)) {
            throw  new UploadException("File does not exists");
        } else  if(!preg_match("/(bmp|gif|png|jpe?g)/i", $file->getClientOriginalExtension())) {
            throw  new UploadException("Only image files are possible.");
        } else if(empty($rootPath)) {
            throw  new UploadException("Path does not exist");
        }

        try {
            $pathArray = array(sprintf("/%s", $rootPath));
            $image = Image::make($file->getRealPath())
                        ->crop($width, $height, $x, $y, function($constraint){
                            $constraint->upsize();
                        })->stream();
          
            foreach ($paths as $val) {
                if(is_array($val)) {
                    foreach ($val as $value) {
                        array_push($pathArray, sprintf("/%s", (string) $value));
                    }
                } else {
                    array_push($pathArray, sprintf("/%s", (string) $val));
                }
            }
            $fileName = preg_replace('/[^a-zA-Z0-9_. -]/s', '', str_replace(' ', '', time() .'_'. $file->getClientOriginalName()));
   
            Storage::disk('public')->put(sprintf("%s/", (string) join('', $pathArray)) . $fileName, $image);

            return $fileName;
        } catch (Exception $e) {
            throw  new UploadException("Error when upload File");;
        }
    }

    /**
     * Function uploadResizeImage
     * @param string $file,
     * @param string $rootPath
     * @param array $path
     * @param int $width
     * @param int $height
     * @throws UploadException
     */
    public function uploadResizeImage($file, $rootPath, $width, $height, ...$paths) {
        
        if(empty($file)) {
            throw  new UploadException("File does not exists");
        } else  if(!preg_match("/(bmp|gif|png|jpe?g)/i", $file->getClientOriginalExtension())) {
            throw  new UploadException("Only image files are possible.");
        } else if(empty($rootPath)) {
            throw  new UploadException("Path does not exist");
        }

        try {
            $pathArray = array(sprintf("/%s", $rootPath));
            $image = Image::make($file->getRealPath())
                        ->fit($width, $height, function($constraint) {
                            $constraint->upsize();
                        })->stream();
          
            foreach ($paths as $val) {
                if(is_array($val)) {
                    foreach ($val as $value) {
                        array_push($pathArray, sprintf("/%s", (string) $value));
                    }
                } else {
                    array_push($pathArray, sprintf("/%s", (string) $val));
                }
            }
            $fileName = preg_replace('/[^a-zA-Z0-9_. -]/s', '', str_replace(' ', '', time() .'_'. $file->getClientOriginalName()));
   
            Storage::disk('public')->put(sprintf("%s/", (string) join('', $pathArray)) . $fileName, $image);

            return $fileName;
        } catch (Exception $e) {
            throw  new UploadException("Error when upload File");;
        }
    }

    /**
     * Function uploadRotateImage
     * @param string $file,
     * @param string $rootPath
     * @param array $path
     * @throws UploadException
     */
    public function uploadRotateImage($file, $rootPath, $orientation = 0, ...$paths) {
        
        if(empty($file)) {
            throw  new UploadException("File does not exists");
        } else  if(!preg_match("/(bmp|gif|png|jpe?g)/i", $file->getClientOriginalExtension())) {
            throw  new UploadException("Only image files are possible.");
        } else if(empty($rootPath)) {
            throw  new UploadException("Path does not exist");
        }

        try {
            $pathArray = array(sprintf("/%s", $rootPath));
            $image = Image::make($file->getRealPath())->rotate($orientation)->stream();
          
            foreach ($paths as $val) {
                if(is_array($val)) {
                    foreach ($val as $value) {
                        array_push($pathArray, sprintf("/%s", (string) $value));
                    }
                } else {
                    array_push($pathArray, sprintf("/%s", (string) $val));
                }
            }
            $fileName = preg_replace('/[^a-zA-Z0-9_. -]/s', '', str_replace(' ', '', time() .'_'. $file->getClientOriginalName()));
   
            Storage::disk('public')->put(sprintf("%s/", (string) join('', $pathArray)) . $fileName, $image);

            return $fileName;
        } catch (Exception $e) {
            throw  new UploadException("Error when upload File");;
        }
    }

    /**
     * Function uploadFile
     * @param string $file,
     * @param string $rootPath
     * @param array $path
     * @throws UploadException
     */
    public function uploadFile($file, $rootPath, $fileName, ...$paths) {
        if(empty($file)) {
            throw  new UploadException("File does not exists");
        } else if(empty($rootPath)) {
            throw  new UploadException("Path does not exist");
        }

        try {
            $pathArray = array(sprintf("/%s", $rootPath));
            foreach ($paths as $val) {
                if(is_array($val)) {
                    foreach ($val as $value) {
                        array_push($pathArray, sprintf("/%s", (string) $value));
                    }
                } else {
                    array_push($pathArray, sprintf("/%s", (string) $val));
                }
            }
            $fileName = preg_replace('/[^a-zA-Z0-9_. -]/s', '', str_replace(' ', '', time() . '_' . $file->getClientOriginalName()));
            Storage::disk('public')->putFileAs(sprintf("%s/", (string) join('', $pathArray)), $file, $fileName);

            return $fileName;
        } catch (Exception $e) {
            throw  new UploadException("Error when upload Image");;
        }
    }

    /**
     * Function deleteDirectory
     * @param string $path
     */
    public function deleteDir($path){
        $directory = sprintf("public/%s", (string) $path);
        Storage::deleteDirectory($directory);
    }

    /**
     * @param $rootPath
     * @param $fileName
     * @param array ...$path
     * @return bool
     * @throws UploadException
     */
    public function deleleFile($rootPath, $fileName, ...$path)
    {
        if(empty($rootPath)) throw  new UploadException("Path does not exist");

        $pathArray = array(sprintf("/%s", $rootPath));
        foreach ($path as $val){
            if(is_array($val)){
                foreach ($val as $value){
                    array_push($pathArray, sprintf("/%s", (string)$value));
                }
            }else{
                array_push($pathArray, sprintf("/%s", (string)$val));
            }
        }
        array_push($pathArray, sprintf("/%s", $fileName));
        return Storage::disk('public')->delete(join('',$pathArray));
    }
}
