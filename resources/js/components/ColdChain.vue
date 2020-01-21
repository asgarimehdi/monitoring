<template>
    <div class="container">

        <div class="row"  v-if="$gate.isAdminOrGroup_admin()">
            <div class="col-sm-12" id="coldChainMap">
                <div class="card bg-info-gradient"  id="coldChainMapHelp">
                    <div class="card-header no-border ">
                        <h3 class="card-title">

                            راهنما
                        </h3>

                        <div class="card-tools">
                            <button type="button" class="btn bg-info btn-sm" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn bg-info btn-sm" data-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="btn-group-toggle" role="group" aria-label="Basic example">
                            <button class="btn btn-primary btn-sm text-right col-12" @click="show_high_temp=!show_high_temp">
                                <img src="/images/vendor/leaflet/dist/marker-red.png"  alt="">
                                دما بیش از حد مجاز
                            </button>

                            <br>
                            <button class="btn btn-primary btn-sm text-right col-12" @click="show_low_temp=!show_low_temp">
                                <img src="/images/vendor/leaflet/dist/marker-freeze.png"  alt="">
                                دما کمتر از حد مجاز
                            </button>
                            <br>
                            <button class="btn btn-primary btn-sm text-right col-12" @click="show_normal_temp=!show_normal_temp">
                                <img src="/images/vendor/leaflet/dist/marker-ok.png"  alt="">
                                دمای طبیعی
                            </button>
                            <br>
                            <button class="btn btn-primary btn-sm text-right col-12" @click="show_disconnect=!show_disconnect">
                                <img src="/images/vendor/leaflet/dist/marker-icon.png"  alt="">
                                ارتباط قطع
                            </button>

                            <hr>
                        </div>
                        <form v-if="$gate.isOstan()">
                            <select @change="loadTemps()" name="county_id"
                                    v-model="county_id" id="county_id" class="form-control">
                                <option  value=""  >همه شهرستان</option>
                                <option v-if="r.id!=9"
                                    v-for="r in counties"
                                    :value="r.id"

                                >
                                    {{r.name}}
                                </option>
                            </select>
                        </form>
                    </div>
                    <!-- /.card-body -->

                </div>


                <h4> زنجیره سرما</h4>
                <!-- <span>{{ currentCenter }} زوم فعلی {{ currentZoom }}</span>-->

                <l-map
                    :zoom="zoom"
                    :center="center"
                    style="height:700px;"
                    @update:center="centerUpdate"
                    @update:zoom="zoomUpdate"
                >
                    <l-tile-layer :url="url" :attribution="attribution" />

                    <l-marker v-for="marker in markers"  :lat-lng="marker"
                              v-if="marker.device
                  && highTempCheck(marker.device.temp)
                  && disconnectCheck(marker.device.updated_at)
                  && lowTempCheck(marker.device.temp)
                  && normalTempCheck(marker.device.temp)">
                        <l-popup style="text-align: right;font-family: vazir">
             <span class="label-info">
               {{marker.name}}
             </span>
                            <br/>
                            دما:
                            {{marker.device.temp}}
                            <br/>
                            برق:

                            {{powerCheck(marker.device.power)}}
                            <br/>

                            سنسور:

                            {{sensorCheck(marker.device.sensor)}}
                            <br/>

                            آخرین اتصال:

                            {{marker.device.updated_at|myDate}}
                            <br/>


                        </l-popup>
                        <l-icon
                            :icon-url=iconCheck(marker.device)
                        />
                    </l-marker>
                </l-map>
            </div>
        </div>
        <!-- end is admin -->
        <div v-if="!$gate.isAdminOrGroup_admin()">
            <not-found></not-found>
        </div>
    </div>
</template>

<script>
    import { LMap, LTileLayer, LMarker, LPopup,LIcon } from "vue2-leaflet";

    import { latLng } from "leaflet";
    export default {
        name: "ColdChain",

        components: {
            LMap,
            LTileLayer,
            LMarker,
            LPopup,
            LIcon
        },
        data() {
            return {
                counties: {},
                county_id:"",
                show_high_temp:true,
                show_low_temp:true,
                show_normal_temp:true,
                show_cut_temp:true,
                show_disconnect:false,
                user_county_id:'',

                markers : {},
                zoom: 9,
                center: latLng(this.$gate.user.region_point.lat, this.$gate.user.region_point.lng),
                //url: "http://{s}.tile.osm.org/{z}/{x}/{y}.png",
                  url: "http://developers.parsijoo.ir/web-service/v1/map/?type=tile&x={x}&y={y}&z={z}&apikey=897f18a7e1c0407286ce168d9fdf1b09",
                attribution:'',
                currentZoom: 9,
                currentCenter: latLng(36.425703, 48.213501),

            };
        },
        computed: {

        },
        methods: {
            loadCounties() {
                axios.get("api/countyList").then(({data}) => (this.counties = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود لیست شهرستان رخ داد'
                    });
                });


            },
            highTempCheck(temp){
                if(this.show_high_temp){
                    return true;
                }
                else{
                    if (temp >8)
                        return false;
                    else
                        return true;}
            },
            lowTempCheck(temp){
                if(this.show_low_temp){
                    return true;
                }
                else{
                    if (temp <2)
                        return false;
                    else
                        return true;}
            },
            normalTempCheck(temp){
                if(this.show_normal_temp){
                    return true;
                }
                else{
                    if ((temp >=2)&&(temp <=8))
                        return false;
                    else
                        return true;}
            },
            connectionChack(date) {
                var moment = require('moment-jalaali');
                var date2=(moment().subtract(1, 'days'));
                var date=(moment(date));

                return    moment(date2).isSameOrAfter(date);
                //   moment('2010-10-20').isSameOrAfter('2010-10-19'); // true

            },
            disconnectCheck(date){
                if(this.show_disconnect){
                    return true;
                }
                else{
                    if (this.connectionChack(date))
                        return false;
                    else
                        return true;}
            },
            loadTemps(){
                if(this.$gate.isOstan()){
                    this.user_county_id= this.county_id;

                }
                else{
                    this. user_county_id=this.$gate.user.region_point.region_center.county_id;
                    this.zoom=10;
                }
                axios.get("api/tempListByCounty/"+this.user_county_id).then(({data}) => (this.markers = data)).then(() => {
                    //  console.log(this.markers);
                }).catch(() => {
                    toast.fire({

                        type: 'error',
                        title: 'خطایی در لود دمای نقاط رخ داد'
                    });
                });

            },
            zoomUpdate(zoom) {
                this.currentZoom = zoom;
            },
            centerUpdate(center) {
                this.currentCenter = center;
            },

            powerCheck(val){
                if (val==1)
                    val='وصل';
                else val='قطع';
                return val;
            },
            sensorCheck(val){
                if (val==1)
                    val='وصل';
                else val='قطع';
                return val;
            },
            iconCheck(val){
               // console.log(this.connectionChack(val.updated_at));
                if(this.connectionChack(val.updated_at)){
                    val='/images/vendor/leaflet/dist/marker-icon.png';
                }
                else if (val.temp>8)
                    val='/images/vendor/leaflet/dist/marker-red.png';
                else if (val.temp<2)
                    val='/images/vendor/leaflet/dist/marker-freeze.png';
                else if (val.temp<9 && val.temp>1)
                    val='/images/vendor/leaflet/dist/marker-ok.png';
                else
                    val='/images/vendor/leaflet/dist/marker-icon.png';
                return val;
            },
            dateCheck(date){
                var moment = require('moment-jalaali');
                return (moment(date).fromNow());

            }
        },

        mounted() {
//console.log(this.subDate(Date(), Date()));
            this.loadCounties();
            this.loadTemps();
            setInterval(this.loadTemps , 10000);
        }
    };
</script>
