<template>
    <div>

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-0">
                    <div class="col-sm-3">
                        <h5 class="m-0 text-dark">مانیتورینگ کم کاری تیروئید نوزادان</h5>
                    </div><!-- /.col -->
                    <div class="col-sm-2 m-0 p-0">

                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container-fluid">

            <div class="row" v-if="$gate.isAdmin() ||$gate.isRiasat() || $gate.isBimaGVagir() || $gate.isBehvarz()">
                <div class="col-lg-12" id="myMap">

                    <div class="card bg-info-gradient" id="coldChainMapHelp">

                        <div class="card-header no-border ">
                            <h3 class="card-title">
                                راهنما
                            </h3>

                            <div class="card-tools">
                                <button class="btn bg-info btn-sm" data-widget="collapse" type="button">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button class="btn bg-info btn-sm" data-widget="remove" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body small">
                            <div class="small ">
                                <div class="card bg-info-gradient">

                                    <div class="row">
                                        <div class="col-8">

                                            نوع نامشخص
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16"
                                                           v-model="show_diagnosis_1"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">

                                            نوع گذرا
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16"
                                                           v-model="show_diagnosis_2"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">


                                            نوع دائمی
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16"
                                                           v-model="show_diagnosis_3"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-info-gradient">
                                    <div class="row">
                                        <div class="col-8">

                                            قطع درمان
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16"
                                                           v-model="show_status_2"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">

                                            تحت درمان
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16"
                                                           v-model="show_status_1"/>
                                        </div>
                                    </div>
                                </div>


                                <div class="card bg-info-gradient">
                                    <div class="row">
                                        <div class="col-8">
                                            <img alt="" src="/images/vendor/leaflet/dist/shabake.png">
                                            شبکه بهداشت
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16" v-model="show_point_shabake"/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-8">
                                            <img alt="" src="/images/vendor/leaflet/dist/shahri.png">
                                            مراکز سلامت
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16" v-model="show_point_marakez"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            <img alt="" src="/images/vendor/leaflet/dist/home.png">
                                            خانه بهداشت
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16" v-model="show_point_home"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            <img alt="" src="/images/vendor/leaflet/dist/paygah.png">
                                            پایگاه بهداشت
                                        </div>
                                        <div class="col-4 p-0">
                                            <toggle-button :labels="{checked: 'بله', unchecked: 'خیر'}" :value="true"
                                                           :height="16" v-model="show_point_paygah"/>
                                        </div>
                                    </div>

                                </div>


                            </div>


                            <form v-if="$gate.isOstan()">
                                <select @change="loadTemps(),loadPoints()" class="form-control"
                                        id="county_id" name="county_id" v-model="county_id">
                                    <option value="">همه شهرستانها</option>
                                    <option :key="index"
                                            :value="r.id"
                                            v-for="(r,index) in counties"
                                            v-if="r.id!=9"
                                    >
                                        {{r.name}}
                                    </option>
                                </select>
                            </form>
                            <button @click="
                            tileProviders[1].visible=true,
                            tileProviders[0].visible=false,
                            tileProviders[2].visible=false,
                            tileProviders[3].visible=false,
                            tileProviders[4].visible=false,
                            loadTemps" class="btn bg-info btn-sm" type="button">
                                <i class="fa fa-map small"></i>
                            </button>
                            <button @click="
                            tileProviders[2].visible=true,
                            tileProviders[1].visible=false,
                            tileProviders[0].visible=false,
                            tileProviders[3].visible=false,
                            tileProviders[4].visible=false,
                            loadTemps" class="btn bg-info btn-sm" type="button">
                                <i class="fa fa-map-o small"></i>
                            </button>
                            <button @click="
                            tileProviders[0].visible=true,
                            tileProviders[1].visible=false,
                            tileProviders[2].visible=false,
                            tileProviders[3].visible=false,
                            tileProviders[4].visible=false,
                            loadTemps" class="btn bg-info btn-sm" type="button">
                                <i class="fa fa-map-signs small"></i>
                            </button>
                            <button @click="
                            tileProviders[3].visible=true,
                            tileProviders[1].visible=false,
                            tileProviders[2].visible=false,
                            tileProviders[0].visible=false,
                            tileProviders[4].visible=false,
                            loadTemps" class="btn bg-info btn-sm" type="button">
                                <i class="fa fa-map-marker small"></i>
                            </button>
                            <button @click="
                            tileProviders[4].visible=true,
                            tileProviders[1].visible=false,
                            tileProviders[2].visible=false,
                            tileProviders[0].visible=false,
                            tileProviders[3].visible=false,
                            loadTemps" class="btn bg-info btn-sm" type="button">
                                <i class="fa fa-map-pin small"></i>
                            </button>

                        </div>
                        <!-- /.card-body -->

                    </div>



                     <!--<span>{{ currentCenter }} زوم فعلی {{ currentZoom }}</span>-->

                    <l-map
                        :center="center"
                        :zoom="zoom"
                        @update:center="centerUpdate"
                        @update:zoom="zoomUpdate"
                        style="height:720px;"
                    >
                        <l-tile-layer :key="tileProvider.name"
                                      :name="tileProvider.name"
                                      :url="tileProvider.url"
                                      :visible="tileProvider.visible"
                                      v-for="tileProvider in tileProviders"

                        />
                        <v-marker-cluster>
                        <span :key="index" v-for="(marker,index) in markers">
                    <l-marker :lat-lng="marker"   v-if="mapWatch(marker)">

                        <l-popup class="vazir">
             <span class="label-info">
               {{marker.full_name}}
             </span>

                            <br/>
                            مشخصات:
                            <br/>متولد:
                            {{marker.birth_at|myDate1}}
                            <br/>
                            تحت پوشش:
                            {{marker.region_point.region_center.region_county.name}} -
                            {{marker.region_point.region_center.name}} -
                            {{marker.region_point.name}}
                            <br/>
                            تشخیص:
                            {{diagnosisCheck(marker.diagnosis)}}
                            <br/>
                            وضعیت درمان:
                            {{statusCheck(marker.status)}}
                            <br/>
                            تاریخ تشخیص:
                            {{marker.diagnosis_at|myDate1}}
                        </l-popup>
                        <l-icon

                            icon-url='/images/vendor/leaflet/dist/marker-icon.png'
                            shadow-url='/images/vendor/leaflet/dist/marker-shadow.png'
                        />

                    </l-marker>


    </span>
                        </v-marker-cluster>
                        <span v-for="marker2 in markers2" v-if="mapWatch2(marker2)">
                    <l-marker :lat-lng="marker2" >


                        <l-icon
                            :icon-url=iconCheck2(marker2)
                            :iconSize="[40, 40]"
                        />
<l-popup class="vazir">
             <span class="label-info">
               {{marker2.name}}
             </span>
    <br>

    {{marker2.region_center.name}}
    <br>


            <span v-if="marker2.develop!=undefined">
                   جمعیت تحت پوشش:
               {{marker2.develop.population}}
                    <br/>
            </span>
            <span v-if="marker2.population!=undefined">
                   جمعیت تحت پوشش:
               {{marker2.population}}
                    <br/>
            </span>
</l-popup>

                    </l-marker>


    </span>

                    </l-map>
                </div>
            </div>
            <!-- end is admin -->
            <div v-if="!($gate.isAdmin() ||$gate.isRiasat() || $gate.isBimaGVagir() || $gate.isBehvarz())">
                <not-found></not-found>
            </div>
        </div>
    </div>
</template>

<script>

    import {LMap, LTileLayer, LMarker, LPopup, LIcon} from "vue2-leaflet";
    import Vue2LeafletMarkercluster from 'vue2-leaflet-markercluster';
    import {latLng} from "leaflet";
    import {ToggleButton} from 'vue-js-toggle-button'

    // Import stylesheet

    import "leaflet.markercluster/dist/MarkerCluster.css";
    import "leaflet.markercluster/dist/MarkerCluster.Default.css";


    Vue.component('ToggleButton', ToggleButton);

    export default {
        name: "CdThyroid",

        components: {
            LMap,
            LTileLayer,
            LMarker,
            LPopup,
            LIcon,

            'v-marker-cluster': Vue2LeafletMarkercluster

        },
        data() {
            return {
                tileProviders: [
                    {
                        name: 'Parsijoo',
                        visible: true,
                        url: 'http://developers.parsijoo.ir/web-service/v1/map/?type=tile&x={x}&y={y}&z={z}&apikey=897f18a7e1c0407286ce168d9fdf1b09',
                    },
                    {
                        name: 'OpenStreetMap',
                        visible: false,
                        url: 'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
                    },
                    {
                        name: 'OpenTopoMap',
                        visible: false,
                        url: 'http://{s}.tile.opentopomap.org/{z}/{x}/{y}.png',

                    },
                    {
                        name: 'toop',
                        visible: false,
                        url: 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}',

                    },
                    {
                        name: 'toop2',
                        visible: false,
                        url: 'https://tiles.wmflabs.org/hikebike/{z}/{x}/{y}.png',

                    },
                ],
                counties: {},
                county_id: "",




                mapFilter: '',


                show_point_home: false,
                show_point_paygah: false,
                show_point_shabake: false,
                show_point_marakez: false,

                show_diagnosis_1:true,
                show_diagnosis_2:true,
                show_diagnosis_3:true,
                show_status_1:true,
                show_status_2:true,




                selectedPoint: '',
                population: '',
                user_county_id: '',
                markers: {},
                markers2: {},
                zoom: 9,
                center: latLng(this.$gate.user.region_point.lat, this.$gate.user.region_point.lng),

                attribution: '',
                currentZoom: 9,
                currentCenter: latLng(36.425703, 48.213501),



            };
        },

        methods: {
            loadCounties() {
                axios.get("/api/countyList").then(({data}) => (this.counties = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود لیست شهرستان رخ داد'
                    });
                });


            },
            loadTemps() {
                this.$Progress.start();
                if (this.$gate.isOstan()) {
                    this.user_county_id = this.county_id;
                } else {
                    this.user_county_id = this.$gate.user.region_point.region_center.county_id;
                    this.zoom = 10;
                }
                axios.get("/api/cd/thyroid/ListByCounty/" + this.user_county_id).then(({data}) => (this.markers = data)).then(() => {
                    //  console.log(this.markers);
                    this.$Progress.finish();
                }).catch(() => {
                    toast.fire({

                        type: 'error',
                        title: 'خطایی در لود نقاط رخ داد'

                    });
                    this.$Progress.fail();
                });


            },
            zoomUpdate(zoom) {
                this.currentZoom = zoom;
            },
            centerUpdate(center) {
                this.currentCenter = center;
            },

            diagnosisCheck(val) {
                if (val == 1)
                    val = 'وارد نشده';

                else if (val == 2)
                    val = 'نوع گذرا';

                else val = 'نوع دائم';
                return val;
            },
            statusCheck(val) {
                if (val == 2)
                    val = 'قطع درمان';

                else  val = 'تحت درمان';

                return val;
            },


            iconCheck2(val) {
                if (val.type_id == '5')
                    val = '/images/vendor/leaflet/dist/home.png';
                else if (val.type_id == '6')
                    val = '/images/vendor/leaflet/dist/paygah.png';
                else if (val.type_id == '1')
                    val = '/images/vendor/leaflet/dist/shabake.png';
                else if (val.type_id == '2')
                    val = '/images/vendor/leaflet/dist/shahri.png';
                else if (val.type_id == '3')
                    val = '/images/vendor/leaflet/dist/shahri-rostaei.png';
                else if (val.type_id == '4')
                    val = '/images/vendor/leaflet/dist/rostaei.png';

                return val;
            },


            mapWatch(marker) {
                let x = [];
                if (this.show_diagnosis_1)
                {
                    x[1] = marker.diagnosis === 1;
                }

                if (this.show_diagnosis_2)
                {
                    x[2] = marker.diagnosis === 2;
                }
                if (this.show_diagnosis_3)
                {
                    x[3] = marker.diagnosis === 3;
                }

                if (this.show_status_1)
                {
                    x[4] = marker.status === 1;
                }
                if (this.show_status_2)
                {
                    x[5] = marker.status === 2;
                }


                if (this.show_latest)
                {
                    x[14] = !this.connectionChack(marker.updated_at);
                } else {
                    x[14] = true;
                }

                return (((x[1] || x[2] ||x[3])&&(x[4]|| x[5])) && (x[14]));
                //  return x.find(element => element === true);
            },
            mapWatch2(point) {
                let x = [];
                if (this.show_point_shabake) // agar corona mosbat bod
                {
                    x[1] = point.type_id === 1;
                }
                if (this.show_point_marakez) // agar corona mosbat bod
                {
                    x[2] = ((point.type_id === 2) || (point.type_id === 3) || (point.type_id === 4));
                }
                if (this.show_point_home) // agar corona mosbat bod
                {
                    x[3] = point.type_id === 5;
                }
                if (this.show_point_paygah) // agar corona manfi bod
                {
                    x[4] = point.type_id === 6;
                }
                //return (x[1] || x[2] || x[3] || x[4]);
                return x.find(element => element === true);
            },

            loadPoints() {
                if (this.$gate.isOstan()) {
                    this.user_county_id = this.county_id;

                } else {
                    this.user_county_id = this.$gate.user.region_point.region_center.county_id;
                    this.zoom = 10;
                }
                axios.get("api/region/pointByCounty/" + this.user_county_id).then(({data}) => (this.markers2 = data)).then(() => {
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
//console.log(this.subDate(Date(), Date()));


            this.loadCounties();
            this.loadTemps();

            this.loadPoints();


            //setInterval(this.loadTemps, 300000);
            // setInterval(this.loadStat, 300000);



        }
    };
</script>

