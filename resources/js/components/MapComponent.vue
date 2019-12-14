<template>

  <l-map :zoom=14 :center="[36.15335,49.2344141]">
    <l-tile-layer url="https://developers.parsijoo.ir/web-service/v1/map/?type=tile&x={x}&y={y}&z={z}&apikey=627973149c2041b184e31259821d1306"></l-tile-layer>
    <l-marker :lat-lng="[36.15335,49.2344141]"></l-marker>
    <l-marker :lat-lng="[36.18335,49.2844141]"></l-marker>
  </l-map>

</template>
<script>

import {LMap, LTileLayer, LMarker } from 'vue2-leaflet';
export default {
    name: 'app',
    components: {
        LMap,
        LTileLayer,
        LMarker
    }
}
</script>