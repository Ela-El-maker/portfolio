<?php

/**** Handle file Upload ****/


function handleUpload($inputName, $model = null)
{
    try {
        if (request()->hasFile($inputName)) {




            if ($model && \File::exists(public_path($model->{$inputName}))) {
                \File::delete(public_path($model->{$inputName}));
            }


            $file = request()->file($inputName);
            $fileName = rand() . $file->getClientoriginalName();
            $file->move(public_path('/uploads'), $fileName);

            $filePath = "/uploads/" . $fileName;

            // dd($imagePath);
            return $filePath;
        }
    } catch (\Exception $e) {
        throw $e;
    }
}


/*** Delete File */


function deleteFileIfExists($filePath)
{
    try {
        if (\File::exists(public_path($filePath))) {
            \File::delete(public_path($filePath));
        }
    } catch (\Exception $e) {
        throw $e;
    }
}


/****Get dynamic colors */
function getColor($index)
{
    $colors = [
        "#FF6347", "#00FF00", "#8A2BE2", "#FF1493", "#8B4513",
        "#800000", "#4B0082", "#00FFFF", "#FF69B4", "#D2691E",
        "#800080", "#008000", "#000080", "#FFC0CB", "#FFD700",
        "#FF0000", "#00FF00", "#0000FF", "#FFFF00", "#FFA500",
    ];

    return $colors[$index % count($colors)];
}
