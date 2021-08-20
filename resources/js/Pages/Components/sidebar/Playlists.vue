<template>
    <div class="content h-48">
        <ul>
            <li v-for="playlist of playlists" :key="playlist.id" class="text-white text-opacity-75 m-2 text-sm">
                {{playlist.name}}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name:'Playlists',
    props:['playlists'],
    data() {
        return {
            
        }
    },
}
</script>

<style scoped>
.content {
    overflow-y: auto;
}

.content::-webkit-scrollbar {
    width: 10px;
    height: 6px;
  }
  .content::-webkit-scrollbar-track {
    border-radius: 10px;
    background: rgba(136, 136, 136, 0.1);
  }
  .content::-webkit-scrollbar-thumb{
    border-radius: 10px;
    background: rgba(0,0,0,0.2);
  }
  .content::-webkit-scrollbar-thumb:hover{
  	background: rgba(0,0,0,0.4);
  }
  .content::-webkit-scrollbar-thumb:active{
  	background: rgba(0,0,0,.9);
  }
</style>
