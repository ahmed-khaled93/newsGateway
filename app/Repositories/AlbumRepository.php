<?php

namespace App\Repositories;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Backend\Albums\storeNewAlbumRequest;
use App\Category;
use App\Album;
use App\Photo;

class AlbumRepository
{
// ============================== FrontEnd ======================================
	
	public function getAllAlbums()
	{
		$albums = Album::all();
		return $albums;
	}

// =============================== BackEnd ======================================

	public function storeNewAlbum(storeNewAlbumRequest $request)
	{
		$album = new Album(request(['title']));
    	$album->save();
	}

	public function showAlbumPhotos($albumId)
	{
		$photos = Photo::where('album_id', '=', $albumId)->get();
		return $photos;
	}

	public function storeNewImage($albumId)
	{
		$album = new Photo(request(['title','album_id']));
		
		$image = request('image');
    	$album->image  = time().'.'.$image->getClientOriginalExtension();
    	$image->move(public_path('/images/albums'),$album->image );

    	$album->save();
	}


	public function deleteImage($request)
	{
		$delete = Photo::find($request->hdnDeleteId);
		
		if ($delete->image) 
		{	
			$image_path = public_path('/images/albums').'/'.$delete->image;
	    	unlink($image_path);
	    }
		
		$delete->delete();
	}

}