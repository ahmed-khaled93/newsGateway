<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Http\Requests\Backend\Albums\storeNewAlbumRequest;
use App\Photo;
use App\Album;
use App\Catg;
use Alaouy\Youtube\Facades\Youtube;

class AlbumController extends Controller
{

	protected $categoryRepository;

	public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

// =================================== Front End ===========================================

// ===================================== Albums	============================================

	public function albums()
	{

		$albums = Album::all();
		

		// $view = Photo::with('albums')->where('id', '=', $albums->album_id)->get();  

		return view('frontend.albums.albums', compact('albums'));

	}

	public function viewAlbums($albumId)
	{
		
		$photos = Photo::where('album_id', '=', $albumId)->get(); 

		return view('frontend.albums.photos', compact('photos'));

	}
    
// ==================================== Videos =======================================
	
	public function videoLists()
	{

		// $videoList = Youtube::listChannelVideos('PLW3lvQc1c47vqc_kbkEaRx68EHxO_z7O5', 15);

		$videoList = Youtube::getPlaylistItemsByPlaylistId('PLtcN3LudGcGt_M7xWBQ1uRALL2cEkTY8V');

		// dd($videoList);

		return view('frontend.albums.videoAlbums', compact('videoList'));

	}


	public function videos()
	{
		
		$videoList = Youtube::getPlaylistItemsByPlaylistId('PLtcN3LudGcGt_M7xWBQ1uRALL2cEkTY8V');

		return view('frontend.albums.videos', compact('videoList'));

	}


	public function showVideo($listId, $videoId)
	{

		return view('frontend.albums.showVideo')->with('video', $videoId);		

	}

//===================================== Channels ====================================

	public function channels()
	{

		$channel = Youtube::getChannelById('UCiIjvco_YNUTCbyrpZtrG4w');

		return view('frontend.albums.channels', compact('channel'));

	}

	public function channelLists()
	{
		// $channel = Youtube::getChannelById('UCiIjvco_YNUTCbyrpZtrG4w');

		// Get playlist by channel ID, return an array of PHP objects
		$playlists = Youtube::getPlaylistsByChannelId('UCiIjvco_YNUTCbyrpZtrG4w');

		// dd($channel);
		return view('frontend.albums.channelPlaylists', compact('playlists'));

	}

	public function channelListItems($id)
	{
		// dd($id);

		// Get items in a playlist by playlist ID, return an array of PHP objects
		$playlistItems = Youtube::getPlaylistItemsByPlaylistId($id);

		return view('frontend.albums.channelPlaylistItems',compact('playlistItems'));

	}

// ========================================================================================

// =================================== Back End ===========================================

// =================================== Albums =============================================
	
	public function photoAlbums()
	{
		$photos = Photo::all();
		$albums = Album::all();
		$menu = ['media', 'photos'];
		return view('backend.albums.albums', compact('photos','albums', 'menu'));
	}


	public function storeNewAlbum(storeNewAlbumRequest $request)
	{

    	$album = $this->categoryRepository->storeNewAlbum($request);

		return redirect('/dashboard/multimedia/albums');
	}


	public function showAlbumPhotos($albumId)
	{	
		$albums = Album::all();

		// $album->photos 

		$photos = Photo::where('album_id', '=', $albumId)->get();
		// dd($photos);

		return view('backend.albums.photos', compact('photos','albums', 'albumId'));

	}	

	public function storeNewImage(Request $request, $albumId)
	{	
		

		$this->validate($request, [

        	'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

    	]);

		
    	$album = new Photo(request(['title','album_id']));

		$image = request('image');
		
    	$album->image  = time().'.'.$image->getClientOriginalExtension();

    	$image->move(public_path('/images/albums'),$album->image );

    	$album->save();


		return back();
	}


	public function deleteImage(Request $request)
	{

		dd($request);
		$hdnDeleteId = $request->hdnDeleteId;

		$delete = Photo::find($request->hdnId);
		// dd($delete);
		
		if ($delete->image) {
			// dd($delete->image);
			
			$image_path = public_path('/images/albums').'/'.$delete->image;
	    	
	    	unlink($image_path);
	    }
		

		$delete->delete();

		return back();


	}



}
