<template>
    <div id="map"
         :lat="lat"
         :lng="lng"
         :zoom="zoom"
         :markerLatLng="markerLatLng"
         :markerName="markerName"
    >
    </div>
</template>

<script>
import L from 'leaflet'

export default {
  name: 'maa',
  props: {
    lat: {
      type: Number,
      default: 33.1375
    },
    lng: {
      type: Number,
      default: 56.2170
    },
    zoom: {
      type: Number,
      default: 6
    },
    markerLatLng: {
      type: Array,
      default: ''
    },
    markerName: {
      type: Array,
      default: ''
    }
  },
  data () {
    return {
      map: null,
      tileLayer: null,
      layers: [{
        id: 0,
        name: 'markers',
        active: true,
        features: ''
      }]
    }
  },
  created () {
  },
  components: {
  },
  computed: {
  },
  mounted () {
    this.initMap();
    this.initLayers();
  },
  methods: {
    initMap () {
      this.map = L.map('map').setView([this.lat, this.lng], this.zoom);
      this.tileLayer = L.tileLayer.wms('http://map.ir/shiveh', {
        layers: 'Shiveh:ShivehGSLD256',
        format: 'image/png',
        attribution: '&copy; <a href="http://corp.map.ir">Map.ir</a>'
      },
          [
              {
                  header: "x-api-key",
                  value: "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBmZDk3M2ZlMDA2OGJjYTdiMTk0NzhlNzIyMmE2YmExNmQ2NzQ2Y2Y2NmNmYWRiYzY5ZTFjNzY5MTE0NDNkMThmMjA4YjM1NDU5NmY0MDQyIn0.eyJhdWQiOiIxMjEiLCJqdGkiOiIwZmQ5NzNmZTAwNjhiY2E3YjE5NDc4ZTcyMjJhNmJhMTZkNjc0NmNmNjZjZmFkYmM2OWUxYzc2OTExNDQzZDE4ZjIwOGIzNTQ1OTZmNDA0MiIsImlhdCI6MTU2MzEwNTA4NywibmJmIjoxNTYzMTA1MDg3LCJleHAiOjE1NjU3ODM0ODYsInN1YiI6IiIsInNjb3BlcyI6WyJiYXNpYyJdfQ.HrYGA0yJcBwF9k7W7Z2mrWlaHzsiXrqF6lp83k6yicNjKEaTLSBcegn4UAFVdzJcN96-zauDV0KSTHRhiTL0gqEL0z5bcL7Wf_74E5KeWjoD7_AM411Ym-fEYE2tNdNydsk30aawA09-MHa0-mBKpjT3ocQrBIhsc03k0qfQ9vVsGkzShQkDZzZ7oMq6wsrCsnsJ5nA-ZyubQo5Ngg_HLjHC0GOKacY3HFahccSp33dLm56mobOQSNbubCJ4dLC8v9GoqTAQqPVuI_kablccgMPYPD6R1f6Dll4Lt2txk0zd1qhZMxmrh8pFTds208QOwA1tVzo4RbBJ63zWZi2X7w"
              }
          ]);
      this.tileLayer.addTo(this.map)
    },
    initLayers () {
      var markers = [];
      if (this.markerLatLng.length > 0) {
        for (var i = 0; i < this.markerLatLng.length; i++) {
          markers[i] = {
            id: i,
            name: this.markerName[i],
            type: 'marker',
            coords: this.markerLatLng[i]
          }
        }
        this.layers[0].features = markers
      }
      this.layers.forEach((layer) => {
        var markerFeatures = layer.features;
        markerFeatures.forEach((feature) => {
          feature.leafletObject = L.marker(feature.coords)
            .bindPopup(feature.name).addTo(this.map)
        })
      })
    }
  }
}
</script>

<style>
</style>
