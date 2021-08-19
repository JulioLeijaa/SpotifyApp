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
                    <img src="assets/Corazon.png" alt="Img Song" width="25" height="25" v-if="!isLiked" @click="likeSong">
                    <img src="assets/CorazonColoreado.png" alt="Img Song" width="25" height="25" v-else @click="likeSong">
                </div>
            </div>
        </div>

        <div class="flex flex-col">
            <!-- Inicio Botones -->
            <div class="flex items-center justify-center">
                <div class="shuffle-icon mr-6">
                    <img src="assets/Suffle.png" alt="Shuffle button" width="25" height="25" v-if="!shuffle" @click="shuffleToggle">
                    <img src="assets/SuffleActivado.png" alt="Shuffle button" width="25" height="25" v-else @click="shuffleToggle">
                    <!-- <i class="icon ion-ios-shuffle" ></i> -->
                </div>

                <div class="skip-backward mr-6">
                    <img src="assets/SkipBackward.png" alt="Skip Backward button" width="25" height="25" @click="skip('backward')">
                    <!-- <i class="icon ion-ios-skip-backward" @click="skip('backward')"></i> -->
                </div>

                <div class="play">
                    <img src="assets/Play.png" alt="Shuffle button" width="40" height="40" v-if="!isPlaying" @click="playCurrentSong">
                    <!-- <i class="icon ion-ios-play" v-if="!isPlaying" @click="playCurrentSong"></i> -->
                    <img src="assets/Pause.png" alt="Shuffle button" width="40" height="40" v-else @click="pause">
                    <!-- <i class="icon ion-ios-pause" v-else @click="pause"></i> -->
                </div>

                <div class="skip-forward ml-6">
                    <img src="assets/SkipForward.png" alt="Skip Forward button" width="25" height="25" @click="skip('forward')">
                    <!-- <i class="icon ion-ios-skip-forward" @click="skip('forward')"></i> -->
                </div>

                <div class="flex repeat ml-6">
                    <img src="assets/Repeat.png" alt="Shuffle button" width="25" height="25" v-if="!onRepeat" @click="repeat">
                    <img src="assets/RepeatActivado.png" alt="Shuffle button" width="25" height="25" v-else @click="repeat">
                    <div class="repeat-info" v-if="onRepeat">{{loop.value}}</div>
                    <!-- <i class="icon ion-ios-repeat" @click="repeat"></i> -->
                </div>
            </div>
            <!-- Fin Botones -->

            <div class="flex items-center justify-center mt-2">
                <div class="time mr-2 font-medium text-gray-100">
                    <p>00:00</p>
                    <!-- {{currentPlayedTime}} -->
                </div>

                <div class="progress-container">
                    <div class="progress" id="progress-wrap">
                        <div class="progress-handle" :style="{left:progressPercentageValue}"></div>
                        <div class="transparent-seeker-layer" @click="seek"></div>
                        <div class="bar" :style="{width:progressPercentageValue}">
                            ------------------------------------------------------------------
                        </div>
                    </div>
                </div>

                <div class="time ml-2 font-medium text-gray-100">
                    <p>00:00</p>
                    <!-- {{duration}} -->
                </div>
            </div>

            <audio :loop="innerLoop" ref="audiofile" :src="defaultSong" preload style="display: none" controls></audio>
        </div>

        <div class="flex mr-4">
            <img src="music/AnotherOneBitesTheDust.jpg" alt="Img Song" width="80" height="80">
            <!-- <div class="play">
                <i class="icon ion-ios-volume-mute" @click="mute()">Mute</i>
            </div> -->
        </div>
    </div>
</template>

<script>
export default {
    name:'MusicPlayer',
    data() {
        return {
            isLiked: false,
            isPlaying: false,
            onRepeat: false,
            shuffle: false,

            loop: {
            state: false,
            value: 1
            },
        }
    },
    methods: {
        playCurrentSong() {
            // this.audioPlayer.play();
            this.isPlaying = true;
        },
        pause() {
            // this.audioPlayer.pause();
            this.isPlaying = false;
        },
        stop() {
            // this.audioPlayer.currentTime = 0;
        },
        likeSong() {
            this.isLiked = this.isLiked ? false : true;
        },
        repeat() {
            if (!this.loop.state && !this.onRepeat) {
                //firstclick
                this.loop.state = true;
                this.loop.value = 1;
                this.onRepeat = true;
            } else if (this.loop.state && this.onRepeat && this.loop.value === 1) {
                //second click
                this.loop.state = true;
                this.loop.value = "all";
                this.onRepeat = true;
            } else if (this.loop.state && this.onRepeat && this.loop.value === "all") {
                this.loop.state = false;
                this.loop.value = 1;
                this.onRepeat = false;
            }
        },
        shuffleToggle() {
            // if(this.shuffle == true){}
            this.shuffle = this.shuffle ? false : true;
            // //shuffle the playlist songs and rearrange
            // this.playlist.songs = this.shuffleArray(this.playlist.songs);

            // //reset the playlist index when changed and rest the previous playlist index
            // this.playlist.currentIndex = this.getObjectIndexFromArray(
            //     this.currentSong,
            //     this.playlist.songs
            // );
            // this.previousPlaylistIndex = this.playlist.currentIndex;
        },
    }
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
.repeat-info {
    background-color: #0BA531;
    width: 13px;
    height: 13px;
    border-radius: 8px;
    font-size: 7px;
    line-height: 12px;
    text-align: center;
    right: -12px;
    top: 5px;
    color: #fff;
    text-transform: capitalize;
    letter-spacing: 1px;
}
</style>
