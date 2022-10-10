<template>
    <div>
        <button type="button" class="btn p-1 btn-outline-secondary border-0">
            <font color="gainsboro">
                <i class="material-icons"
                :class="{'gold-location':this.isFavoriteBy, 'animated heatBeat fast':this.gotToFavorite}"
                @click="clickFavorite">grade</i>
            </font>
        </button>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    props: {
        initialIsFavoriteBy: {
            type: Boolean,
            default: false,
        },
        authorized: {
            type: Boolean,
            default: false,
        },
        endpoint: {
            type: String,
        },
    },
    data() {
        return {
            isFavoriteBy: this.initialIsFavoriteBy,
            gotToFavorite: false,
        }
    },

    methods: {
        clickFavorite() {
            if (!this.authorized) {
                alert('お気に入り機能はログイン中のみ使用できます')
                return
            }

            this.isFavoriteBy
                ? this.unfavorite()
                : this.favorite()
        },
        async favorite() {
            await axios.put(this.endpoint)

            this.isFavoriteBy = true
            this.gotToFavorite = true
        },
        async unfavorite() {
            await axios.delete(this.endpoint)

            this.isFavoriteBy = false
            this.gotToFavorite = false
        },
    },
}
</script>

<style>
.material-icons.gold-location {
    color: #ffd700;
}
</style>
