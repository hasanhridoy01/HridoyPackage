<?php

namespace hasanhridoy01\Hridoy;


class Hridoy
{
    /**
     * get slug manage
     */
    public static function slug($slug)
    {
        return str_replace(' ', '-', $slug);
    }

    /**
     * get video manage
     */
    public static function video($link)
    {
        if ( str_contains($link, 'youtube.com') ) {
            return str_replace('watch?v=', 'embed/', $link);
    	}elseif ( str_contains($link, 'vimeo.com') ) {
    		return str_replace('vimeo.com', 'player.vimeo.com/video', $link);
    	}else{
            return 'Invalid Video..';
        }
    }

    /** 
     * get photo upload manage method
     */
    public static function PhotoUpload($request, $file, $path)
    {
        if($request -> hasFile($file)){
          $image = $request -> file($file);
          $unique_file_name = md5(time().rand()) .'.'. $image -> getClientOriginalExtension();
          $image -> move(public_path($path), $unique_file_name);
          return $unique_file_name;
        }else{
            return '';
        }
    }
}



