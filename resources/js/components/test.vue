<template>
    <l-map style="height: 600px" :zoom="zoom" :center="center">
        <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
        <span :key="index" v-for="(marker,index) in markers"  >
            <l-polygon v-if="((marker.area!='undefined') && (marker.area!='null') && (marker.area!='')) "
                :fillColor="fillColor"
                :fillOpacity="fillOpacity"
                :lat-lngs="marker.area"
                :color="color"
            ></l-polygon>

        </span>
    </l-map>
</template>

<script>
import { LMap, LTileLayer, LPolygon } from "vue2-leaflet";

export default {
    components: {
        LMap,
        LTileLayer,
        LPolygon,
    },
    data() {
        return {
            url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
            attribution:
                '&copy; <a target="_blank" href="http://osm.org/copyright">OpenStreetMap</a> contributors',
            zoom: 12,
            center: [36.151965, 49.216732],
                color: "pink",
                fillColor: "pink",
                fillOpacity:1,
                markers: {},
        };

    },
    methods:{
        loadAreas() {
            axios.get("api/region/areaByCounty/2").then(({data}) => (this.markers = data)).then(() => {
                //  console.log(this.markers);
            }).catch(() => {
                toast.fire({

                    type: 'error',
                    title: 'خطایی در لود نقاط رخ داد'
                });
            });

        },
    },
    created() {

        this.loadAreas();
    }
};
</script>

<style>
</style>
