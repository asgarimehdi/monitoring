<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                 <span>
                     {{ lat}}
                     {{ lng}}
                 </span>
                <l-map
                    :zoom="zoom"
                    :center="center"
                    style="height:500px;width:100%"
                    @update:center="centerUpdate"
                    @update:zoom="zoomUpdate"

                >
                    <l-tile-layer :url="url" :attribution="attribution" />
                    <l-marker  :lat-lng="markerLatLng" :draggable="true"  @update:latLng="latlngUpdate">
                    </l-marker>
                    <l-circle
                            :lat-lng="circle.center"
                            :radius="circle.radius"
                            :color="circle.color"
                    />
                </l-map>
            </div>
        </div>

    </div>
</template>

<script>
    import { LMap, LTileLayer, LMarker, LPopup,LIcon,LCircle } from "vue2-leaflet";

    import { latLng } from "leaflet";
    export default {
        name: "draggable-map",

        components: {
            LMap,
            LTileLayer,
            LMarker,
            LPopup,
            LIcon,
            LCircle
        },
        data() {
            return {
                zoom: 14,
                center: latLng(this.$gate.user.region_point.lat, this.$gate.user.region_point.lng),
                //url: "http://{s}.tile.osm.org/{z}/{x}/{y}.png",
                url: "http://developers.parsijoo.ir/web-service/v1/map/?type=tile&x={x}&y={y}&z={z}&apikey=897f18a7e1c0407286ce168d9fdf1b09",
                attribution:'',
                currentZoom: 9,
                currentCenter: latLng(this.$gate.user.region_point.lat, this.$gate.user.region_point.lng),
                markerLatLng: [this.$gate.user.region_point.lat, this.$gate.user.region_point.lng],
                lat:'',
                lng:'',
                circle: {
                    center: [this.$gate.user.region_point.lat, this.$gate.user.region_point.lng],
                    radius: 100,
                    color: 'yellow',
                }
            };
        },
        methods: {
            zoomUpdate(zoom) {
                this.currentZoom = zoom;
            },
            centerUpdate(center) {
                this.currentCenter = center;
            },
            latlngUpdate(latlng) {
                this.markerLatLng = latlng;
                this.lat=this.markerLatLng.lat.toFixed(6);
                this.lng=this.markerLatLng.lng.toFixed(6);
            },
        },

        mounted() {
        }
    };
</script>
