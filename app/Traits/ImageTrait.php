<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait ImageTrait
{
    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function traitUpLoadImg($request, $fieldname, $directory) {


        if( $request->hasFile( $fieldname ) ) {
            $file = $request->$fieldname;
            $fileNameOrigin =$file->getClientOriginalName();
            $fileNameHash = Str::random(20). '.'. $file->getClientOriginalExtension();


            $path = $request->file($fieldname)->storeAs(
                'public/'.$directory.'/' . auth()->id(), $fileNameHash
            );

            $data =[
                'file_name' =>$fileNameOrigin,
                'file_path' =>Storage::url($path)
            ];
            return $data;
        }
            return null;

    }

    public function traitUpLoadmultipleImg($file, $directory) {

        $fileNameOrigin =$file->getClientOriginalName();
        $fileNameHash = Str::random(20). '.'. $file->getClientOriginalExtension();

        $path = $file->storeAs(
            'public/'.$directory.'/' . auth()->id(), $fileNameHash
        );

        $data =[
            'file_name' =>$fileNameOrigin,
            'file_path' =>Storage::url($path)
        ];
        return $data;

    }



}
