<template>
    <!-- /.content-header -->
    <div class="container-fluid">
        <div class="row" v-if="$gate.isAdmin()||$gate.isBehvarz()||$gate.isKarshenasNazer()||($gate.isGroup_admin() && $gate.isBimaVagir())">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">

                        </h3>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tbody>
                            <tr>

                                <th>نام</th>
                                <th>تاریخ تولد</th>
                                <th>تاریخ تشخیص</th>
                                <th>مرکز تحت پوشش</th>
                                <th>تغییر</th>

                            </tr>
                            <tr v-for="(finil , index) in finils.data" :key="index" class="small">

                                <td>{{finil.full_name}}</td>



                                <td>{{finil.birth_at|myDate1}}</td>
                                <td>{{finil.diagnosis_at|myDate1}}</td>
                                <td>
                                    {{finil.region_point.region_center.region_county.name}} -
                                    {{finil.region_point.region_center.name}} -
                                    {{finil.region_point.name}}
                                </td>


                                <td>
                                    <a href="#" @click="edit(finil)" >
                                        <i class="fa fa-edit blue"></i>
                                    </a>
                                    /
                                    <a href="#" @click="deleteValue(finil.id)">
                                        <i class="fa fa-trash red"></i>
                                    </a>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">

                        <pagination :data="finils" size="small" :limit="8" @pagination-change-page="getResults"></pagination>

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row" v-if="$gate.isAdmin()||$gate.isBehvarz()||$gate.isKarshenasNazer()||($gate.isGroup_admin() && $gate.isBimaVagir())">
            <div class="col-md-6">
                <div class="card">

                    <form @submit.prevent="editmode ? updateValue() : createValue()">
                        <div class="card-header">
                            <h5 class="card-title" v-show="editmode">ویرایش اطلاعات </h5>
                            <h5 class="card-title" v-show="!editmode">ثبت اطلاعات جدید</h5>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <input :class="{ 'is-invalid': form.errors.has('national_code') }" class="form-control" name="national_code"

                                       type="text" v-model="form.national_code">
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">کدملی</span>
                                </div>
                                <has-error :form="form" field="national_code"></has-error>
                            </div>

                            <div class="input-group mb-3">
                                <input :class="{ 'is-invalid': form.errors.has('lat') }" class="form-control" name="lat"

                                       type="text" v-model="form.lat">
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">عرض جغرافیایی</span>
                                </div>
                                <has-error :form="form" field="lat"></has-error>
                            </div>
                            <div class="input-group mb-3">
                                <input :class="{ 'is-invalid': form.errors.has('lng') }" class="form-control" name="lng"

                                       type="text" v-model="form.lng">
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">طول جغرافیایی</span>
                                </div>
                                <has-error :form="form" field="lng"></has-error>
                            </div>


                        </div>
                        <div class="card-footer">
                            <button class="btn btn-danger" @click="closeForm()" type="button">بستن</button>
                            <button class="btn btn-primary" type="submit" v-show="!editmode">ثبت</button>
                            <button class="btn btn-success" type="submit" v-show="editmode">ویرایش</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <l-map
                        :zoom="zoom"
                        :center="center"
                        style="height:450px;width:100%"
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
        <div v-if="!($gate.isAdmin()||$gate.isBehvarz()||$gate.isKarshenasNazer()||($gate.isGroup_admin() && $gate.isBimaVagir()))">
            <not-found></not-found>
        </div>
    </div>
    <!-- Button trigger modal -->
</template>

<script>
    import { LMap, LTileLayer, LMarker, LPopup,LIcon,LCircle } from "vue2-leaflet";
    import VuePersianDatetimePicker from 'vue-persian-datetime-picker';

    import { latLng } from "leaflet";
    export default {
        props:['corona_id'],

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
                url: "http://{s}.tile.osm.org/{z}/{x}/{y}.png",
                //url: "http://developers.parsijoo.ir/web-service/v1/map/?type=tile&x={x}&y={y}&z={z}&apikey=897f18a7e1c0407286ce168d9fdf1b09",
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
                },
                num:1,
                editmode: false,

                finils:{},
                counties: {},
                types: {},
                centers: {},
                points: {},
                county_selected: false,
                type_selected: false,
                center_selected: false,
                point_selected: false,
                user_county: '',
                form: new Form({
                    id: '',

                    national_code: '',
                    corona_id:this.corona_id,
                    lat: '',
                    lng: '',



                })
            }
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
                this.form.lat=this.markerLatLng.lat.toFixed(6);
                this.form.lng=this.markerLatLng.lng.toFixed(6);
            },
            getResults(page = 1) {
                axios.get('api/cd/finil/PaginateByCounty?page=' + page)
                    .then(response => {
                        this.finils = response.data;
                    });
            },

            edit(value) {
                this.editmode = true;
                this.form.reset();
               // $('#addNew').modal('show');
                this.form.fill(value);
                this.markerLatLng.lat=this.form.lat;
                this.markerLatLng.lng=this.form.lng;

            },
            closeForm(){
                this.form.reset();
                this.editmode = false;
            },
            /**/
            updateValue() {
                this.$Progress.start();

                this.form.put('api/cd/finil/' + this.form.id)
                    .then(() => {
                        this.$emit('ValueTableChanged');
                       this.closeForm();
                        toast.fire({
                            type: 'success',
                            title: 'اطلاعات با موفقیت ویرایش شد'
                        });
                        this.$Progress.finish();
                    })
                    .catch(() => {
                        this.$Progress.fail();
                    });
            },

            deleteValue(id) {
                swal.fire({
                    title: 'آیا اطمینان دارید؟',
                    text: "این عملیات غیر قابل بازگشت است",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'بله حذف کن!',
                    cancelButtonText: 'بیخیال'
                }).then((result) => {
                    if (result.value) {
                        this.form.delete('/api/cd/finil/' + id).then(() => {
                            swal.fire(
                                'پاک شد',
                                'با موفقیت حذف شد',
                                'success'
                            );
                            this.$emit('ValueTableChanged');
                        }).catch(() => {
                            swal("Failed!", "خطایی رخ داده", "warning");
                        });

                    }
                })
            },
            loadValues() {
                if (this.$gate.isAdminOrGroup_admin()) {
                    this.$Progress.start();
                    axios.get("api/cd/finil/PaginateByCounty").then(({data}) => (this.finils = data)).then(() => {
                        this.$Progress.finish();
                    }).catch(() => {
                        this.$Progress.fail();
                        toast.fire({
                            type: 'error',
                            title: 'خطایی در لود لیست فینیل رخ داد'
                        });
                    });
                }
            },
            createValue() {
                this.$Progress.start();
                this.form.post('api/cd/corona/contact')
                    .then(() => {
                        this.$emit('ValueTableChanged');

                        toast.fire({
                            type: 'success',
                            title: 'اطلاعات با موقفیت ثبت شد'
                        });
                        this.form.reset();
                        this.$Progress.finish();

                    })
                    .catch(() => {
                        this.$Progress.fail();
                    });

            },
        },
        created() {

            Fire.$on('searching', () => {
                let query = this.$parent.search;
                axios.get('api/cd/finil/findValue?q=' + query)
                    .then((data) => {
                        this.finils = data.data
                    })
                    .catch(() => {

                    })
            });
            this.loadValues();
            //this.loadItems();

            this.$on('ValueTableChanged', () => {
                this.loadValues();
            });


        }

    }
</script>
