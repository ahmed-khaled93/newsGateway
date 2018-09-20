<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\AlbumRepository;
use App\Http\Requests\Backend\Albums\storeNewAlbumRequest;
use App\Http\Requests\Backend\Albums\storeNewImageRequest;
use App\Photo;
use App\Album;
use App\Category;
use Alaouy\Youtube\Facades\Youtube;

class AlbumController extends Controller
{

	protected $categoryRepository;
	protected $albumRepository;

	public function __construct(CategoryRepository $categoryRepository, AlbumRepository $albumRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->albumRepository = $albumRepository;
    }

// =================================== Front End ===========================================

// ===================================== Albums	============================================

	public function albums()
	{
		$albums = $this->albumRepository->getAllAlbums(); 
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
		$videoList = Youtube::getPlaylistItemsByPlaylistId('PLtcN3LudGcGt_M7xWBQ1uRALL2cEkTY8V');
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
		// Get playlist by channel ID, return an array of PHP objects
		$playlists = Youtube::getPlaylistsByChannelId('UCiIjvco_YNUTCbyrpZtrG4w');
		return view('frontend.albums.channelPlaylists', compact('playlists'));
	}

	public function channelListItems($id)
	{
		// Get items in a playlist by playlist ID, return an array of PHP objects
		$playlistItems = Youtube::getPlaylistItemsByPlaylistId($id);
		return view('frontend.albums.channelPlaylistItems',compact('playlistItems'));
	}

// ========================================================================================

// =================================== Back End ===========================================

// =================================== Albums =============================================
	
	public function photoAlbums()
	{
		$albums = $this->albumRepository->getAllAlbums();
		$menu = ['media', 'photos'];
		return view('backend.albums.albums', compact('photos','albums', 'menu'));
	}


	public function storeNewAlbum(storeNewAlbumRequest $request)
	{
    	$album = $this->albumRepository->storeNewAlbum($request);
		return redirect('/dashboard/multimedia/albums');
	}


	public function showAlbumPhotos($albumId)
	{	
		$albums = $this->albumRepository->getAllAlbums();
		$photos = $this->albumRepository->showAlbumPhotos($albumId);
		return view('backend.albums.photos', compact('photos','albums', 'albumId'));
	}	


	public function storeNewImage(storeNewImageRequest $request, $albumId)
	{	
		$album = $this->albumRepository->storeNewImage($albumId);
		return back();
	}


	public function deleteImage(Request $request)
	{
		$delete = $this->albumRepository->deleteImage($request);
		return back();
	}



}
