<?php

namespace App\Services;

// use App\Events\SongLikeToggled;
// use App\Models\Interaction;
// use App\Models\Album;
use App\Repositories\AlbumRepository;
// use App\Repositories\Playlist;
// use App\Repositories\PlaylistRepository;


class AlbumService
{
    private $albumRepository;

    public function __construct(AlbumRepository $albumRepository)
    {
        dd(' bbbbewwwwwwe');
        // $this->albumRepository = $albumRepository;
    }

    // public function executeSomething(int $artist_id)//: array
    // {
    //     // $this->interaction
    //     // $myPlaylist = $this->playlistRepository->getMyPlaylist(1);


    //     // return tap($this->interaction->firstOrCreate([
    //     //     'song_id' => $songId,
    //     //     'user_id' => $user->id,
    //     // ]), static function (Interaction $interaction): void {
    //     //     if (!$interaction->exists) {
    //     //         $interaction->liked = false;
    //     //     }

    //     //     ++$interaction->play_count;
    //     //     $interaction->save();
    //     // });
    // }

    
    /**
     * Increase the number of times a song is played by a user.
     *
     * @return Interaction The affected Interaction object
     */
    public function increasePlayCount(string $songId, User $user): Interaction
    {
        return tap($this->interaction->firstOrCreate([
            'song_id' => $songId,
            'user_id' => $user->id,
        ]), static function (Interaction $interaction): void {
            if (!$interaction->exists) {
                $interaction->liked = false;
            }

            ++$interaction->play_count;
            $interaction->save();
        });
    }

    /**
     * Like or unlike a song on behalf of a user.
     *
     * @return Interaction the affected Interaction object
     */
    public function toggleLike(string $songId, User $user): Interaction
    {
        return tap($this->interaction->firstOrCreate([
            'song_id' => $songId,
            'user_id' => $user->id,
        ]), static function (Interaction $interaction): void {
            $interaction->liked = !$interaction->liked;
            $interaction->save();

            event(new SongLikeToggled($interaction));
        });
    }



}
