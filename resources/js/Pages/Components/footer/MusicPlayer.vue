<template>
    <div class="component flex items-center justify-between px-5">
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
                    <div class="repeat-info h-3.5 w-3.5 rounded-full text-center text-white capitalize tracking-wide" v-if="onRepeat">{{loop.value}}</div>
                    <!-- <i class="icon ion-ios-repeat" @click="repeat"></i> -->
                </div>
            </div>
            <!-- Fin Botones -->

            <div class="flex items-center justify-center mt-2">
                <div class="time mr-2 font-medium text-gray-100">
                    <p>00:00</p>
                    <!-- {{currentPlayedTime}} -->
                </div>

                <div class="overflow-hidden w-96 h-1 flex rounded progress-bar">
                    <div :style="{width: progressPercentageValue + '%'}" class="bg-white"></div>
                </div>

                <div class="time ml-2 font-medium text-gray-100">
                    <p>00:00</p>
                    <!-- {{duration}} -->
                </div>
            </div>

            <audio :loop="innerLoop" ref="audiofile" :src="defaultSong" preload style="display: none" controls></audio>
        </div>

        <div class="flex items-center mr-4">
            <img src="assets/Mute.png" alt="Shuffle button" class="mr-2" width="25" height="25" v-if="volume == 0" @click="changeVolume">
            <img src="assets/Volume.png" alt="Shuffle button" class="mr-2" width="25" height="25" v-else @click="changeVolume">

            <div class="overflow-hidden w-12 h-1 flex rounded progress-bar">
                <div :style="{width: volume + '%'}" class="bg-white"></div>
                <!-- style={{ width: "30%" }}  style="width:40%" -->
            </div>
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

            defaultSong:
                "https://res.cloudinary.com/dmf10fesn/video/upload/v1548882863/audio/Post_Malone_-_Wow._playvk.com.mp3",
            isLoaded: false,
            isCurrentlyPlaying: "",

            durationSeconds: 0,
            currentSeconds: 0,
            audioPlayer: undefined,
            previousVolume: 35,
            volume: 100,
            autoPlay: false,
            progressPercentageValue: 80,
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
        changeVolume() {
            if (this.volume > 0) {
                this.volume = 0;
            } else {
                this.volume = 100;
            }
            console.log(this.volume);
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
        seek(e) {
            if (this.isLoaded) {
                let el = e.target.getBoundingClientRect();
                let seekPos = (e.clientX - el.left) / el.width;
                let seekPosPercentage = seekPos * 100 + "%";

                /**
                 *  calculating the portion of the song based on where the user clicked
                 *
                 */

                let songPlayTimeAfterSeek = parseInt(
                this.audioPlayer.duration * seekPos
                );

                this.audioPlayer.currentTime = songPlayTimeAfterSeek;

                this.progressPercentageValue = seekPosPercentage;
                console.log(this.progressPercentageValue);
            } else {
                throw new Error("Song Not Loaded");
            }
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
.component{
    background-color: rgba(18, 18, 18, 1);
    border-top: 0.1rem solid #8F8F8F;
}

.progress-bar{
    --tw-bg-opacity: 1;
    background-color: #8F8F8F;
}

.repeat-info {
    background-color: #08a830;
    font-size: 9px;
    line-height: 14px;
}

.progress-container {
    position: relative;
    height: 10px;
    width: auto;
    display: flex;
    align-items: center;
}

.progress {
    background-color: rgba(0, 0, 0, 0.05);
    height: 4px;
    /* width: calc(75% - 30px); */
    width: 100%;
    margin: 0;
    padding: 0 2px;
    border-radius: 0;
    display: flex;
    align-items: center;

    box-shadow: 0 1px 1px rgba(0, 0, 0, .1);
}

.progress-handle {
    display: block;
    position: absolute;
    z-index: 6;
    margin-top: 0;
    margin-left: -2px;
    width: 8px;
    height: 8px;
    border-radius: 100%;
    background-color: #fff;
    box-shadow: 0 1px 6px rgba(0, 0, 0, .2);
    cursor: pointer;

    /* &:hover {
        background-color: #000;
    } */
}

.transparent-seeker-layer {
    /* please do not delete this layer unless you know what you are doing
     this code allows the seeker click position to function well */
    width: 100%;
    height: 6px;
    background-color: transparent;
    position: absolute;
    cursor: pointer;
    z-index: 5;

}

.bar {
    width: 0;
    background-color: #fff;
    height: 4px;
    position: absolute;
}

</style>
