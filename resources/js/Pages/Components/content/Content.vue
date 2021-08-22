<template>
    <div class="content flex flex-col">
        <div class="header h-20 w-full flex flex-row-reverse items-center">
            <div class="logout h-1" @click.prevent="logout">
                <p>Cerrar sesión</p>
            </div>
            <!-- <div class="line"></div>
            <h1 class="m-4 font-bold text-header">Premium</h1>
            <h1 class="m-4 font-bold text-header">Ayuda</h1>
            <h1 class="m-4 font-bold text-header">Descargar</h1> -->
        </div>
        <div class="info flex flex-col">
            <div class="info-title m-4">
                <h1 class="font-extrabold text-4xl">Buenas noches</h1>
            </div>
            <div class="info-songs m-4">
                <a class="info-wrap-song" v-for="playlist of playlists" :key="playlist.id" :href="'/playlist/'+playlist.id" >
                    <div class="info-wrap-img">
                        <img :src="playlist.url_image" alt="image" srcset="" />
                    </div>
                    <div class="info-song-text p-4 flex items-center">
                        <h1 class="font-semibold color-white">{{playlist.name}}</h1>
                    </div>
                </a>
            </div>
        </div>
        <div class="songs flex flex-col">
            <div class="info-title m-4">
                <h1 class="font-extrabold text-2xl">
                    Reproducido recientemente
                </h1>
            </div>
            <div class="list-songs m-4">
                <div class="wrap-song">
                    <div class="wrap-img-song">
                        <img src="/music/Desvelado.jpg" alt="image" srcset="" />
                    </div>
                    <div class="wrap-text-song">
                        <h1 class="font-semibold color-white">Desvelado</h1>
                        <p class="font-thin color-white">Bobby Pulido</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Content",
    props: {
        playlists: Object
    },
    methods: {
            logout() {
                this.$inertia.post(route('logout'));
            }
        }
};
</script>

<style scoped>
.color-white {
    color: #ffffff;
}

.content {
    background: rgb(5, 91, 83);
    background: linear-gradient(
        180deg,
        rgba(5, 91, 83, 1) 0%,
        rgba(18, 18, 18, 1) 49%,
        rgba(18, 18, 18, 1) 100%
    );
    overflow-y: auto;
}

.logout {
    align-items: center;
    background-color: rgba(0, 0, 0, 0.7);
    border: 0;
    border-radius: 23px;
    color: #fff;
    cursor: pointer;
    display: flex;
    gap: 8px;
    height: 32px;
    justify-content: center;
    margin-inline-start: 16px;
    min-width: 32px;
    padding: 2px 10px;
    position: relative;
    margin: 16px;
}

.logout:hover {
    background-color: #282828;
}

.line {
    background: #fff;
    height: 25px;
    margin: 16px;
    width: 1px;
}

.text-header {
    color: #ffffff;
}

.text-header:hover {
    transform: scale(1.04);
}

.info {
    margin-bottom: 16px;
    min-height: 224px;
    position: relative;
}

.info-title {
    color: #ffffff;
}

.info-songs {
    display: grid;
    grid-auto-rows: auto;
    grid-template-rows: 1fr;
    overflow-y: hidden;
    grid-gap: 24px;
    grid-template-columns: repeat(4, 1fr);
}

.info-wrap-song {
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 4px;
    height: 80px;
    position: relative;
    -webkit-transition: background-color 0.3s ease;
    transition: background-color 0.3s ease;
    display: flex;
    user-select: none;
}

.info-wrap-song:hover {
    background: rgba(255, 255, 255, 0.2);
}

.info-wrap-img {
    min-height: 80px;
    min-width: 80px;
}

.info-wrap-img img {
    width: 100%;
    height: 100%;
}

.list-songs {
    display: grid;
    grid-gap: 24px;
    grid-template-columns: repeat(6, 1fr);
    grid-auto-rows: 0;
    grid-template-rows: 1fr;
    overflow-y: hidden;
}

.wrap-song {
    -webkit-box-flex: 1;
    background: #181818;
    border-radius: 4px;
    -ms-flex: 1;
    flex: 1;
    isolation: isolate;
    padding: 16px;
    position: relative;
    -webkit-transition: background-color 0.3s ease;
    transition: background-color 0.3s ease;
    width: 100%;
}

.wrap-song:hover{
    background: #282828;
}

.wrap-img-song{
    margin-bottom: 16px;
    position: relative;
}

.wrap-text-song{
    min-height: 62px;
}
</style>
