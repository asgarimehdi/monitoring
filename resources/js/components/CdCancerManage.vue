<template>
    <!-- /.content-header -->
    <div class="container-fluid">
        <div class="row" v-if="$gate.isAdmin()||($gate.isGroup_admin() && $gate.isBimaGVagir())">
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
                            <tr v-for="(cancer , index) in cancers.data" :key="index" class="small">

                                <td>{{cancer.full_name}}</td>



                                <td>{{cancer.birth_at|myDate2}}</td>
                                <td>{{cancer.diagnosis_at|myDate2}}</td>
                                <td>
                                    {{cancer.region_point.region_center.region_county.name}} -
                                    {{cancer.region_point.region_center.name}} -
                                    {{cancer.region_point.name}}
                                </td>


                                <td>
                                    <a href="#" @click="edit(cancer)" >
                                        <i class="fa fa-edit blue"></i>
                                    </a>
                                    /
                                    <a href="#" @click="deleteValue(cancer.id)">
                                        <i class="fa fa-trash red"></i>
                                    </a>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">

                        <pagination :data="cancers" size="small" :limit="8" @pagination-change-page="getResults"></pagination>

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row" v-if="$gate.isAdmin()||($gate.isGroup_admin() && $gate.isBimaGVagir())">
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
                                <input :class="{ 'is-invalid': form.errors.has('full_name') }" class="form-control" name="full_name"

                                       type="text" v-model="form.full_name">
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">نام </span>
                                </div>
                                <has-error :form="form" field="full_name"></has-error>
                            </div>

                            <div class="input-group mb-3">
                                <select :class="{ 'is-invalid': form.errors.has('sex') }" class="form-control"
                                        name="sex" v-model="form.sex">
                                    <option value="1">
                                        مرد
                                    </option>
                                    <option value="2">
                                        زن
                                    </option>
                                </select>
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">جنسیت</span>
                                </div>
                                <has-error :form="form" field="sex"></has-error>
                            </div>

                            <div class="input-group mb-3">
                                <input :class="{ 'is-invalid': form.errors.has('job') }" class="form-control" name="job"

                                       type="text" v-model="form.job">
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">شغل</span>
                                </div>
                                <has-error :form="form" field="job"></has-error>
                            </div>
                            <div class="input-group mb-3">
                                <select :class="{ 'is-invalid': form.errors.has('type_id') }" class="form-control"
                                        name="type_id" v-model="form.type_id">
                                    <option
                                        v-for="g in cancer_type"
                                        :value="g.id"
                                    >
                                        {{g.name}}
                                    </option>

                                </select>
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">نوع سرطان</span>
                                </div>
                                <has-error :form="form" field="type_id"></has-error>
                            </div>
                            <div class="input-group mb-3">
                                <select :class="{ 'is-invalid': form.errors.has('detection_type') }" class="form-control"
                                        name="detection_type" v-model="form.detection_type">
                                    <option value="1">
                                        بالینی
                                    </option>
                                    <option value="2">
                                        پاتولوژی
                                    </option>
                                    <option value="3">
                                        سیماری مرگ
                                    </option>
                                    <option value="4">
                                        سایر
                                    </option>
                                </select>
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">نوع تشخیص</span>
                                </div>
                                <has-error :form="form" field="detection_type"></has-error>
                            </div>

                            <div class="input-group mb-3" v-if="(point_selected) || (!editmode)">

                                <select name="county_id" v-model="form.county_id" id="county_id" class="form-control"
                                        ref="c"
                                        :class="{ 'is-invalid': form.errors.has('county_id') }"
                                        @input="$emit('countySelected')">
                                    <option
                                        v-for="g in counties"
                                        :value="g.id"
                                    >
                                        {{g.name}}
                                    </option>
                                </select>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">شهرستان</span>
                                </div>
                                <has-error :form="form" field="county_id"></has-error>
                            </div>
                            <div class="input-group mb-3" v-if="county_selected">
                                <select name="type_id" v-model="form.type_id" id="type_id" class="form-control"
                                        :class="{ 'is-invalid': form.errors.has('type_id') }"
                                        @change="$emit('typeSelected')">
                                    <option
                                        v-for="g in types"
                                        :value="g.id"
                                        v-if="g.id==5 || g.id==6"
                                    >
                                        {{g.name}}
                                    </option>
                                </select>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">نوع</span>
                                </div>
                                <has-error :form="form" field="type_id"></has-error>
                            </div>
                            <div class="input-group mb-3" v-if="type_selected">
                                <select name="center_id" v-model="form.center_id" id="center_id" class="form-control"
                                        :class="{ 'is-invalid': form.errors.has('center_id') }"
                                        @change="$emit('centerSelected')">
                                    <option
                                        v-for="g in centers"
                                        :value="g.id"
                                    >
                                        {{g.name}}
                                    </option>
                                </select>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">مرکز</span>
                                </div>
                                <has-error :form="form" field="type_id"></has-error>
                            </div>
                            <div class="input-group mb-3" v-show="center_selected">

                                <select name="point_id" v-model="form.point_id" id="point_id" class="form-control"
                                        :class="{ 'is-invalid': form.errors.has('point_id') }"
                                        @change="$emit('pointSelected')">
                                    <option
                                        v-for="g in points"
                                        :value="g.id"
                                    >
                                        {{g.name}}
                                    </option>
                                </select>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">نقطه</span>
                                </div>
                                <has-error :form="form" field="point_id"></has-error>
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
                            <div class="input-group mb-3">
                                <date-picker  :auto-submit="true" :class="{ 'is-invalid': form.errors.has('diagnosis_at') }"
                                              v-model="form.diagnosis_at"
                                              format="YYYY-MM-DD"
                                              displayFormat="jYYYY/jMM/jDD"
                                              :max="maxPicker"
                                />
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">تاریخ تشخیص</span>
                                </div>
                                <has-error :form="form" field="diagnosis_at"></has-error>
                            </div>
                            <div class="input-group mb-3">
                                <date-picker  :auto-submit="true" :class="{ 'is-invalid': form.errors.has('birth_at') }"
                                              v-model="form.birth_at"
                                              format="YYYY-MM-DD"
                                              displayFormat="jYYYY/jMM/jDD"
                                              :max="maxPicker"
                                />
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">تاریخ تولد</span>
                                </div>
                                <has-error :form="form" field="birth_at"></has-error>
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
                        style="height:950px;width:100%"
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
        <div v-if="!($gate.isAdmin()||($gate.isGroup_admin() && $gate.isBimaGVagir()))">
            <not-found></not-found>
        </div>
    </div>
    <!-- Button trigger modal -->
</template>

<script>
    import { LMap, LTileLayer, LMarker, LPopup,LIcon,LCircle } from "vue2-leaflet";
    import VuePersianDatetimePicker from 'vue-persian-datetime-picker';

    import { latLng } from "leaflet";
    let moment = require('moment-jalaali');
    export default {


        components: {
            LMap,
            LTileLayer,
            LMarker,
            LPopup,
            LIcon,
            LCircle,
            datePicker: VuePersianDatetimePicker
        },
        data() {
            return {
                maxPicker:moment(new Date()).format('YYYY-MM-DD'),
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
                cancer_type: {},
                cancers:{},
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

                    full_name: '',

                    birth_at: '',
                    sex: '',
                    detection_type: '',
                    job: '',
                    lat: '',
                    lng: '',
                    county_id: '',
                    type_id: '',
                    center_id: '',
                    point_id: '',
                    diagnosis_at:'',


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
                axios.get('api/cd/cancer/PaginateByCounty?page=' + page)
                    .then(response => {
                        this.cancers = response.data;
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

                this.form.put('api/cd/cancer/' + this.form.id)
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
                        this.form.delete('/api/cd/cancer/' + id).then(() => {
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
                    axios.get("api/cd/cancer/PaginateByCounty").then(({data}) => (this.cancers = data)).then(() => {
                        this.$Progress.finish();
                    }).catch(() => {
                        this.$Progress.fail();
                        toast.fire({
                            type: 'error',
                            title: 'خطایی در لود لیست سرطان رخ داد'
                        });
                    });
                }
            },
            createValue() {
                this.$Progress.start();
                this.form.post('api/cd/cancer')
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
            loadCounties() {
                this.user_county = this.$gate.user.region_point.region_center.county_id;
                if (this.$gate.isOstan()) {
                    axios.get("api/countyList").then(({data}) => (this.counties = data)).then(() => {
                    }).catch(() => {
                        toast.fire({
                            type: 'error',
                            title: 'خطایی در لود اطلاعات رخ داد'
                        });
                    });
                } else {
                    axios.get("api/county/" + this.user_county).then(({data}) => (this.counties = data)).then(() => {

                    }).catch(() => {
                        toast.fire({
                            type: 'error',
                            title: 'خطایی در لود لیست شهرستان رخ داد'
                        });
                    });
                }
                //console.log(this.counties);

            },
            loadTypes() {
                axios.get("api/typeList").then(({data}) => (this.types = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });


            },
            loadCenters() {
                axios.get("api/centerList/" + this.form.county_id + "/" + this.form.type_id).then(({data}) => (this.centers = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });

            },
            loadPoints() {
                axios.get("api/pointList/" + this.form.center_id + "/" + this.form.type_id).then(({data}) => (this.points = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });

            },
            loadTypeList() {
                if (this.$gate.isOstan()) {
                    this.user_county_id = this.county_id;

                } else {
                    this.user_county_id = this.$gate.user.region_point.region_center.county_id;
                    this.zoom = 10;
                }
                axios.get("api/cd/cancer/typeList" ).then(({data}) => (this.cancer_type = data)).then(() => {
                    //  console.log(this.markers);
                }).catch(() => {
                    toast.fire({

                        type: 'error',
                        title: 'خطایی در لود انواع سرطان رخ داد'
                    });
                });

            },
        },
        created() {

            Fire.$on('searching', () => {
                let query = this.$parent.search;
                axios.get('api/cd/cancer/findValue?q=' + query)
                    .then((data) => {
                        this.cancers = data.data
                    })
                    .catch(() => {

                    })
            });
            this.loadValues();
            this.loadTypeList();
            //this.loadItems();
            this.loadCounties();
            this.$on('ValueTableChanged', () => {
                this.loadValues();
            });
            this.$on('countySelected', () => {
//if(this.$refs.c.value){}
                this.loadTypes();
                this.county_selected = true;
                this.type_selected = false;
                this.center_selected = false;
                //  this.point_selected=false;
            });

            this.$on('typeSelected', () => {
                // console.log(this.$refs.c.value);
                this.loadCenters();
                this.type_selected = true;
                this.center_selected = false;
                // this.point_selected=false;
            });
            this.$on('centerSelected', () => {
                this.loadPoints();
                this.center_selected = true;
                // this.point_selected=false;
            });
            this.$on('pointSelected', () => {

                this.point_selected = true;
            });

        }

    }
</script>
