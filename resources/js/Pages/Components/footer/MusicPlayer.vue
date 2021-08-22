<template>
    <div class="component flex items-center justify-between px-5">
        <div class="flex max-w-xs">
            <img src="/music/AnotherOneBitesTheDust.jpg" alt="Img Song" width="70" height="70">

            <div class="flex items-center ml-4">
                <div>
                    <p class="text-base font-semibold text-gray-100">{{currentSong.title}}</p>
                    <!-- Tema {{song.title}} -->
                    <p class="text-xs font-normal text-white">{{currentSong.artist}}</p>
                    <!-- Artista {{song.artist}}  -->
                </div>
            </div>

            <div class="flex items-center ml-4">
                <div>
                    <img src="/assets/Corazon.png" alt="Img Song" width="20" height="20" v-if="!isLiked" @click="likeSong">
                    <img src="/assets/CorazonColoreado.png" alt="Img Song" width="20" height="20" v-else @click="likeSong">
                </div>
            </div>
        </div>

        <div class="flex flex-col mr-12">
            <!-- Inicio Botones -->
            <div class="flex items-center justify-center">
                <div class="mr-6">
                    <img src="/assets/Suffle.png" alt="Shuffle button" width="20" height="20" v-if="!shuffle" @click="shuffleToggle">
                    <img src="/assets/SuffleActivado.png" alt="Shuffle button" width="20" height="20" v-else @click="shuffleToggle">
                    <!-- <i class="icon ion-ios-shuffle" ></i> -->
                </div>

                <div class="mr-6">
                    <img src="/assets/SkipBackward.png" alt="Skip Backward button" width="20" height="20" @click="skip('backward')">
                    <!-- <i class="icon ion-ios-skip-backward" @click="skip('backward')"></i> -->
                </div>

                <div class="">
                    <img src="/assets/Play.png" alt="Shuffle button" width="35" height="35" v-if="!isPlaying" @click="playCurrentSong">
                    <!-- <i class="icon ion-ios-play" v-if="!isPlaying" @click="playCurrentSong"></i> -->
                    <img src="/assets/Pause.png" alt="Shuffle button" width="35" height="35" v-else @click="pause">
                    <!-- <i class="icon ion-ios-pause" v-else @click="pause"></i> -->
                </div>

                <div class="ml-6">
                    <img src="/assets/SkipForward.png" alt="Skip Forward button" width="20" height="20" @click="skip('forward')">
                    <!-- <i class="icon ion-ios-skip-forward" @click="skip('forward')"></i> -->
                </div>

                <div class="flex ml-6">
                    <img src="/assets/Repeat.png" alt="Shuffle button" width="20" height="20" v-if="!onRepeat" @click="repeat">
                    <img src="/assets/RepeatActivado.png" alt="Shuffle button" width="20" height="20" v-else @click="repeat">
                    <div class="repeat-info h-3.5 w-3.5 rounded-full text-center text-white capitalize tracking-wide" v-if="onRepeat">{{loop.value}}</div>
                    <!-- <i class="icon ion-ios-repeat" @click="repeat"></i> -->
                </div>
            </div>
            <!-- Fin Botones -->

            <div class="flex items-center justify-center mt-1">
                <div class="text-xs mr-2 font-normal text-gray-100">
                    <p>{{currentPlayedTime}}</p>
                    <!-- 00:00 -->
                </div>

                <div class="overflow-hidden h-1 flex rounded progress-bar gray-color">
                    <!-- w-96 -->
                    <div :style="{width: progressPercentageValue + '%'}" class="bg-white"></div>
                    <!-- progressPercentageValue -->
                </div>

                <div class="text-xs ml-2 font-normal text-gray-100">
                    <p>{{duration}}</p>
                    <!-- 00:00 -->
                </div>
            </div>

            <audio :loop="innerLoop" ref="audiofile" :src="defaultSong" preload style="display: none" controls></audio>
        </div>

        <div class="flex items-center mr-4">
            <img src="/assets/Mute.png" alt="Shuffle button" class="mr-2" width="20" height="20" v-if="volume == 0" @click="mute">
            <img src="/assets/Volume.png" alt="Shuffle button" class="mr-2" width="20" height="20" v-else @click="mute">

            <div class="overflow-hidden w-20 h-1 flex rounded gray-color">
                <div :style="{width: volume + '%'}" class="bg-white"></div>
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
                "/music/AnotherOneBitesTheDust.mp3",
            isLoaded: false,
            isCurrentlyPlaying: "",

            durationSeconds: 0,
            currentSeconds: 0,
            audioPlayer: undefined,
            previousVolume: 35,
            volume: 100,
            autoPlay: false,
            progressPercentageValue: 80,

            currentSong: {
                id: "",
                title: "Another one bites the dust",
                artist: "Queen",
                album: "",
                url: "",
                cover_art_url: ""
            },
        }
    },
    created() {
        this.innerLoop = this.loop.state;
    },

    mounted() {
        this.audioPlayer = this.$el.querySelectorAll("audio")[0];
        this.initPlayer();
    },
    computed: {
        currentPlayedTime() {
        return this.formatTime(this.currentSeconds);
        },
        duration() {
        return this.formatTime(this.durationSeconds);
        },
        progressPercentage() {
        return parseInt(this.currentSeconds / this.durationSeconds * 100);
        },
        muted() {
        //this returns true or false
        return this.volume / 100 === 0;
        }
    },
    methods: {
        playCurrentSong() {
            this.audioPlayer.play();
            this.isPlaying = true;
        },
        pause() {
            this.audioPlayer.pause();
            this.isPlaying = false;
        },
        stop() {
            this.audioPlayer.currentTime = 0;
        },
        mute() {
            //this.muted is a computed variable available down below
            this.audioPlayer.muted = !this.audioPlayer.muted
            if (this.volume > 0) {
                this.volume = 0;
            } else {
                this.volume = 100;
            }
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
        skip(direction) {
            if (direction === "forward") {
                this.playlist.currentIndex += 1;
            } else if (direction === "backward") {
                this.playlist.currentIndex -= 1;
            }

            /**if the current Index of the playlist is greater or equal to the length of the playlist songs (the index is out of range)
             reset the index to 0. It could also mean that the playlist is at its end. */

            if (this.playlist.currentIndex >= this.playlist.songs.length) {
                this.playlist.currentIndex = 0;
            }

            if (this.playlist.currentIndex < 0) {
                this.playlist.currentIndex = this.playlist.songs.length - 1;
            }

            this.audioPlayer.src = this.playlist.songs[
                this.playlist.currentIndex
            ].url;
            this.setCurrentSong(this.playlist.songs[this.playlist.currentIndex]);

            //the code below checks if a song is playing so it can go ahead and auto play
            if (this.isPlaying) {
                this.audioPlayer.play();
            }
        },
        shuffleToggle() {
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
        initPlayer() {
            this.audioPlayer.src = this.playlist.songs[0].url;
            this.setCurrentSong(this.playlist.songs[0]);

            this.audioPlayer.addEventListener("timeupdate", this.updateTimer);
            this.audioPlayer.addEventListener("loadeddata", this.load);
            this.audioPlayer.addEventListener("pause", () => {
                this.isPlaying = false;
            });
            this.audioPlayer.addEventListener("play", () => {
                this.isPlaying = true;
            });

            this.audioPlayer.addEventListener("ended", this.playNextSongInPlaylist);
        },
        play(song = {}) {
            if (typeof song === "object") {
                if (this.isLoaded) {
                    //check if song exists in playlist
                    if (this.currentSong.id === song.id && this.isPlaying) {
                        this.pause();
                    } else if (this.currentSong.id === song.id && !this.isPlaying) {
                        this.playCurrentSong();
                    } else if (this.currentSong.id !== song.id) {
                        if (!this.containsObjectWithSameId(song, this.playlist.songs)) {
                        this.addToPlaylist(song);
                        } else {
                        console.log("playMethod", "song already in playlist");
                        }

                        this.setAudio(song.url);
                        this.setCurrentSong(song);
                        this.playlist.currentIndex = this.getObjectIndexFromArray(
                        song,
                        this.playlist.songs
                        );
                        this.previousPlaylistIndex = this.playlist.currentIndex;
                        this.audioPlayer.play();
                    }
                } else {
                this.setAudio(song.url);
                this.audioPlayer.play();
                }
            this.isPlaying = true;
            } else {
                throw new Error("Type Error : Song must be an object");
            }
        },
        load() {
            if (this.audioPlayer.readyState >= 2) {
                this.isLoaded = true;
                this.durationSeconds = parseInt(this.audioPlayer.duration);
            } else {
                throw new Error("Failed to load sound file.");
            }
        },
        formatTime(secs) {
        var minutes = Math.floor(secs / 60) || 0;
        var seconds = Math.floor(secs - minutes * 60) || 0;
        return minutes + ":" + (seconds < 10 ? "0" : "") + seconds;
        },
        setAudio(song) {
        this.audioPlayer.src = song;
        },
        setCurrentSong(song) {
            this.currentSong.id = song.id;
            this.currentSong.title = song.title;
            this.currentSong.artist = song.artist;
            this.currentSong.album = song.album;
            this.currentSong.url = song.url;
            this.currentSong.cover_art_url = song.cover_art_url;

            this.previousPlaylistIndex = this.playlist.currentIndex;
        },
    }
}
</script>

<style scoped>
.component{
    background-color: rgba(18, 18, 18, 1);
    border-top: 0.1rem solid #8F8F8F;
}

.progress-bar{
    width: 30rem;
}

.gray-color{
    --tw-bg-opacity: 1;
    background-color: #8F8F8F;
}

.repeat-info {
    background-color: #08a830;
    font-size: 9px;
    line-height: 14px;
}
</style>
