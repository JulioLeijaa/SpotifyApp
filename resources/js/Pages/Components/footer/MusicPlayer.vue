<template>
    <div class="flex items-center justify-between px-5">
        <div class="flex">
            <img src="music/AnotherOneBitesTheDust.jpg" alt="Img Song" width="80" height="80">

            <div class="flex items-center ml-4">
                <div>
                    <p class="text-xl font-bold text-gray-100">Tema</p>
                    <p class="text-base font-medium text-white">Artista</p>
                </div>
            </div>

            <div class="flex items-center ml-4">
                <div>
                    <img src="assets/CorazonColoreado.png" alt="Img Song" width="25" height="25">
                </div>
            </div>
        </div>

        <div class="flex">
            <!-- Inicio Botones -->
            <div class="">
                <div class="shuffle-icon">
                    <i class="icon ion-ios-shuffle" @click="shuffleToggle"></i>
                </div>

                <div class="skip-backward">
                    <i class="icon ion-ios-skip-backward" @click="skip('backward')"></i>
                </div>

                <div class="play">
                    <i class="icon ion-ios-play" v-if="!isPlaying" @click="playCurrentSong"></i>
                    <i class="icon ion-ios-pause" v-else @click="pause"></i>
                </div>

                <div class="skip-forward">
                    <i class="icon ion-ios-skip-forward" @click="skip('forward')"></i>
                </div>

                <div class="repeat">
                    <div class="repeat-info" v-if="onRepeat">{{loop.value}}</div>
                    <i class="icon ion-ios-repeat" @click="repeat"></i>
                </div>
            </div>
             <!-- Fin Botones -->
        </div>

        <div class="flex">
            <img src="music/AnotherOneBitesTheDust.jpg" alt="Img Song" width="80" height="80">

            <div class="flex items-center ml-4">
                <div>
                    <p class="text-xl font-bold text-gray-100">Tema</p>
                    <p class="text-base font-medium text-white">Artista</p>
                </div>
            </div>

            <div class="flex items-center ml-4">
                <div>
                    <img src="assets/CorazonColoreado.png" alt="Img Song" width="25" height="25">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:'MusicPlayer',
    // data () {
    //     return {
    //         defaultSong: "https://res.cloudinary.com/dmf10fesn/video/upload/v1548882863/audio/Post_Malone_-_Wow._playvk.com.mp3",
    //         isPlaying: false,
    //         isLoaded: false,
    //         isCurrentlyPlaying: "",
    //         onRepeat: false,
    //         shuffle: false,

    //         loop: {
    //             state: false,
    //             value: 1
    //             },

    //         durationSeconds: 0,
    //         currentSeconds: 0,
    //         audioPlayer: undefined,
    //         previousVolume: 35,
    //         volume: 100,
    //         autoPlay: false,
    //         progressPercentageValue: "0%",



    //         previousPlaylistIndex: 0,
    //         hasNext: false,
    //         originalSongArray: [],

    //         currentSong: {
    //         id: "",
    //         title: "",
    //         artist: "",
    //         album: "",
    //         url: "",
    //         cover_art_url: ""
    //         },

    //         /** ui control variables*/

    //         showPlaylist: false
    //     }
    // }
}
</script>

<style scoped>

</style>
