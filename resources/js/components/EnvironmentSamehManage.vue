<template>
    <!-- /.content-header -->
    <div class="container-fluid">
        <div class="row" v-if="$gate.isAdmin()|| $gate.isEnvironment()|| $gate.isBehvarz()">
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
                                <th>ردیف</th>

                                <th>مقدار</th>

                                <th>نام نقطه</th>
                                <th>ثبت کننده</th>
                                <th>تاریخ</th>
                                <th>تغییر</th>

                            </tr>
                            <tr v-for="value in values.data" :key="value.id" class="small">
                                <td>{{value.id}}</td>

                                <td  v-bind:class="{ 'bg-success': value.status===1,'bg-warning': value.status===0,'bg-danger': value.status===2 }">
                                    {{value.value}}
                                </td>
                                <td>
                                    {{value.region_point.region_center.region_county.name}} -

                                    {{value.region_point.name}}
                                </td>
                                <td>{{value.user.name}}</td>
                                <td>{{value.created_at|myDate1}}</td>
                                <td>
                                    <a href="#" @click="edit(value)">
                                        <i class="fa fa-edit blue"></i>
                                    </a>
                                    /
                                    <a href="#" @click="deleteValue(value.id)">
                                        <i class="fa fa-trash red"></i>
                                    </a>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">

                        <pagination :data="values" size="small" :limit="8" @pagination-change-page="getResults"></pagination>

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row" v-if="$gate.isAdmin()|| $gate.isEnvironment()|| $gate.isBehvarz()">
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
                                <input :class="{ 'is-invalid': form.errors.has('value') }" class="form-control" name="value"

                                       type="text" v-model="form.value">
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">مقدار </span>
                                </div>
                                <has-error :form="form" field="value"></has-error>
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
                                        v-if="g.id==2 || g.id==3 || g.id==4"
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
                                <date-picker  :auto-submit="true" :class="{ 'is-invalid': form.errors.has('created_at') }"
                                              v-model="form.created_at"
                                              format="YYYY-MM-DD"
                                              displayFormat="jYYYY/jMM/jDD"
                                              :max="maxPicker"
                                              :min="minPicker"
                                />
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">تاریخ نمونه</span>
                                </div>
                                <has-error :form="form" field="created_at"></has-error>
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

        </div>
        <div v-if="!($gate.isAdmin()|| $gate.isEnvironment()|| $gate.isBehvarz())">
            <not-found></not-found>
        </div>
    </div>
    <!-- Button trigger modal -->
</template>

<script>
    import { LMap, LTileLayer, LMarker, LPopup,LIcon,LCircle } from "vue2-leaflet";
    import VuePersianDatetimePicker from 'vue-persian-datetime-picker';

    import { latLng } from "leaflet";
    var moment = require('moment-jalaali');
    export default {


        components: {
            datePicker: VuePersianDatetimePicker

        },
        data() {
            return {
                maxPicker:moment(new Date()).format('YYYY-MM-DD'),
                minPicker:moment(new Date()).subtract(14, 'days').format('YYYY-MM-DD'),

                num:1,
                editmode: false,
                values: {},

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


                    value: '',

                    county_id: '',
                    type_id: '',
                    center_id: '',
                    point_id: '',
                    created_at:'',


                })
            }
        },
        methods: {
            getResults(page = 1) {
                axios.get('api/environment/sameh/valueList?page=' + page)
                    .then(response => {
                        this.values = response.data;
                    });
            },
            edit(value) {
                this.editmode = true;
                this.form.reset();
                // $('#addNew').modal('show');
                this.form.fill(value);

            },
            closeForm(){
                this.form.reset();
                this.editmode = false;
            },
            /**/
            updateValue() {
                this.$Progress.start();

                this.form.put('api/environment/sameh/value/' + this.form.id)
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
                        this.form.delete('/api/environment/sameh/value/' + id).then(() => {
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

                    this.$Progress.start();
                    axios.get("api/environment/sameh/valueList").then(({data}) => (this.values = data)).then(() => {
                        this.$Progress.finish();
                    }).catch(() => {
                        this.$Progress.fail();
                        toast.fire({
                            type: 'error',
                            title: 'خطایی در لود مقادیر بهداشت محیط رخ داد'
                        });
                    });

            },
            createValue() {
                this.$Progress.start();
                this.form.post('api/environment/sameh/value')
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

        },
        created() {


            this.loadValues();

            this.$on('ValueTableChanged', () => {
                this.loadValues();
            });


            //this.loadItems();
            this.loadCounties();

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
