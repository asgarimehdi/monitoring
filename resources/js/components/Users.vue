<template>
    <!-- /.content-header -->
    <div class="container">
        <div class="row" v-if="$gate.isAdmin()">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <button type="button" class="btn btn-success" @click="newModal" data-toggle="modal"
                                    data-target="#exampleModalCenter">
                                ایجاد کاربر جدید
                                <i class="fa fa-user-plus fa-fw"></i>
                            </button>
                        </h3>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>ردیف</th>
                                <th>نام</th>
                                <th>وضعیت</th>
                                <th>نام کاربری</th>
                                <th>نقش</th>
                                <th>گروه</th>
                                <th>شهرستان</th>
                                <th>تغییر</th>

                            </tr>
                            <tr v-for="user in users.data" :key="user.id">
                                <td>{{user.id}}</td>
                                <td>{{user.name}}</td>
                                <td>{{userOnlineStatus(user.id)}}</td>
                                <td>{{user.username}}</td>
                                <td>{{user.role.name}}</td>
                                <td>{{user.group.name}}</td>
                                <td>{{user.region_point.region_center.region_county.name}}</td>


                                <td>
                                    <a href="#" @click="editModal(user)">
                                        <i class="fa fa-edit blue"></i>
                                    </a>

                                    <!--<a href="#" @click="deleteUser(user.id)">
                                        <i class="fa fa-trash red"></i>
                                    </a>-->
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">

                        <pagination :data="users" @pagination-change-page="getResults"></pagination>

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div v-if="!$gate.isAdmin()">
            <not-found></not-found>
        </div>
        <!-- Modal -->
        <div class="modal rtl fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="editmode" id="addNewLabel">ویرایش اطلاعات کاربر</h5>
                        <h5 class="modal-title" v-show="!editmode" id="addNewLabel">ایجاد کاربر</h5>
                    </div>
                    <form @submit.prevent="editmode ? updateUser() : createUser()">
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <input v-model="form.name" type="text" name="name"
                                       placeholder="نام"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                <div class="input-group-prepend">
                                    <span class="input-group-text pl-5">نام </span>
                                </div>
                                <has-error :form="form" field="name"></has-error>
                            </div>


                            <div class="input-group mb-3">
                                <input v-model="form.username" type="text" name="username"
                                       placeholder="نام کاربری"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('username') }">

                                <div class="input-group-prepend">
                                    <span class="input-group-text">نام کاربری</span>
                                </div>
                                <has-error :form="form" field="username"></has-error>
                            </div>

                            <div class="input-group mb-3">
                                <input v-model="form.password" type="password" placeholder="رمز عبور" name="password"
                                       id="password"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">رمز عبور</span>
                                </div>
                                <has-error :form="form" field="password"></has-error>
                            </div>

                            <div class="input-group mb-3">

                                <select name="role_id" v-model="form.role_id" id="role_id" class="form-control"
                                        :class="{ 'is-invalid': form.errors.has('role_id') }">
                                    <option value="">انتخاب نقش</option>
                                    <option
                                        v-for="r in roles"
                                        :value="r.id"
                                    >
                                        {{r.name}}
                                    </option>
                                </select>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> نقش</span>
                                </div>
                                <has-error :form="form" field="role_id"></has-error>
                            </div>


                            <div class="input-group mb-3">

                                <select name="group_id" v-model="form.group_id" id="group_id" class="form-control"
                                        :class="{ 'is-invalid': form.errors.has('group_id') }">
                                    <option value="">انتخاب گروه</option>
                                    <option
                                        v-for="g in groups"
                                        :value="g.id"
                                    >
                                        {{g.name}}
                                    </option>
                                </select>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">گروه کاربری</span>
                                </div>
                                <has-error :form="form" field="group_id"></has-error>
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

                            <h6 v-show="editmode" v-if="!point_selected" @click="point_selected=true">
                                <i class="fa fa-edit blue"></i> {{form.region_point.name}}
                            </h6>
                            <h6 v-show="!editmode" v-if="!point_selected">
                                <i class="fa fa-eraser blue"></i>محل نهایی انتخاب نشده
                            </h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
                            <button type="submit" v-show="!editmode" class="btn btn-primary">ایجاد</button>
                            <button type="submit" v-show="editmode" class="btn btn-success">ویرایش</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->


</template>

<script>
    export default {
        data() {
            return {
                // Create a new form instance
                editmode: false,
                users: {},
                groups: {},
                roles: {},
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
                    name: '',
                    username: '',
                    password: '',
                    role_id: '',
                    group_id: '',
                    county_id: '',
                    type_id: '',
                    center_id: '',
                    point_id: '',
                    g: '',
                    group: '',
                    r: '',
                    role: '',
                    region_point: ''
                })

            }
        },
        methods: {

            getResults(page = 1) {
                axios.get('api/user?page=' + page)
                    .then(response => {
                        this.users = response.data;
                    });
            },
            updateUser() {
                this.$Progress.start();
                //console.log('editmode');
                this.form.put('api/user/' + this.form.id)
                    .then(() => {
                        this.$emit('UserTableChanged');
                        $('#addNew').modal('hide');
                        toast.fire({
                            type: 'success',
                            title: 'کاربر با موفقیت ویرایش شد'
                        });
                        this.$Progress.finish();
                    })
                    .catch(() => {
                        this.$Progress.fail();
                    });
            },
            editModal(user) {
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(user);
                this.county_selected = false;
                this.type_selected = false;
                this.center_selected = false;
                this.point_selected = false;
            },
            newModal() {
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
                this.county_selected = false;
                this.type_selected = false;
                this.center_selected = false;
                this.point_selected = false;
            },
            deleteUser(id) {
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
                        this.form.delete('/api/user/' + id).then(() => {
                            swal.fire(
                                'پاک شد',
                                'با موفقیت حذف شد',
                                'success'
                            );
                            this.$emit('UserTableChanged');
                        }).catch(() => {
                            swal("Failed!", "خطایی رخ داده", "warning");
                        });

                    }
                })
            },
            loadUsers() {
                if (this.$gate.isAdmin()) {
                    this.$Progress.start();
                    axios.get("api/user").then(({data}) => (this.users = data)).then(() => {
                        this.$Progress.finish();
                    }).catch(() => {
                        this.$Progress.fail();
                        toast.fire({
                            type: 'error',
                            title: 'خطایی در لود اطلاعات رخ داد'
                        });
                    });
                }
            },
            loadGroups() {
                axios.get("api/groupList").then(({data}) => (this.groups = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });

            },
            loadRoles() {
                axios.get("api/roleList").then(({data}) => (this.roles = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
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
                            title: 'خطایی در لود اطلاعات رخ داد'
                        });
                    });
                }


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
            userOnlineStatus(id){

            },
            createUser() {
                this.$Progress.start();
                this.form.post('api/user')
                    .then(() => {
                        this.$emit('UserTableChanged');
                        $('#addNew').modal('hide');
                        toast.fire({
                            type: 'success',
                            title: 'کاربر با موفقیت ایجاد گردید'
                        });
                        this.$Progress.finish();

                    })
                    .catch(() => {
                        this.$Progress.fail();
                    });

            }
        },
        created() {

            Fire.$on('searching', () => {
                let query = this.$parent.search;
                axios.get('api/findUser?q=' + query)
                    .then((data) => {
                        this.users = data.data
                    })
                    .catch(() => {

                    })
            });
            this.loadUsers();
            this.loadGroups();
            this.loadRoles();
            this.loadCounties();
            this.$on('UserTableChanged', () => {
                this.loadUsers();
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


            // setInterval(()=>this.loadUsers(),5000);
        }

    }
</script>
