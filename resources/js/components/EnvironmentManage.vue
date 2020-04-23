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
                               ثبت اطلاعات
                                <i class="fa fa-eyedropper fa-fw"></i>
                            </button>
                        </h3>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>ردیف</th>
                                <th>آیتم</th>
                                <th>مقدار</th>
                                <th>وضعیت</th>
                                <th>نام نقطه</th>
                                <th>ثبت کننده</th>
                                <th>تاریخ</th>
                                <th>تغییر</th>

                            </tr>
                            <tr v-for="value in values.data" :key="value.id" class="small">
                                <td>{{value.id}}</td>
                                <td>{{value.environment_item.name}}</td>
                                <td>{{value.value}}</td>
                                <td>{{value.status}}</td>
                                <td>{{value.region_point.name}}</td>
                                <td>{{value.user.name}}</td>
                                <td>{{value.created_at|myDate}}</td>
                                <td>
                                    <a href="#" @click="editModal(value)">
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

                        <pagination :data="values" @pagination-change-page="getResults"></pagination>

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div v-if="!$gate.isAdmin()">
            <not-found></not-found>
        </div>
        <!-- Modal -->
        <div class="modal rtl fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewValue"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="editmode">ویرایش اطلاعات </h5>
                        <h5 class="modal-title" v-show="!editmode">ثبت اطلاعات جدید</h5>
                    </div>
                    <form @submit.prevent="editmode ? updateValue() : createValue()">
                        <div class="modal-body">

                            <div class="input-group mb-3">
                                <select name="environment_item_id" v-model="form.environment_item_id" id="environment_item_id" class="form-control"
                                        :class="{ 'is-invalid': form.errors.has('environment_item_id') }">
                                    <option value="" selected>انتخاب آیتم مورد نظر</option>
                                    <option
                                        v-for="r in environment_items"
                                        :value="r.id"
                                    >
                                        {{r.name}}
                                    </option>
                                </select>

                                <has-error :form="form" field="environment_item_id"></has-error>
                            </div>
                            <div class="input-group mb-3">
                                <input v-model="form.value" type="text" name="value"
                                       placeholder="مقدار"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('value') }">

                                <has-error :form="form" field="value"></has-error>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
                            <button type="submit" v-show="!editmode" class="btn btn-primary">ثبت</button>
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
                values: {},
                environment_items: {},
                form: new Form({
                    id: '',
                    name: '',
                    environment_item_id: '',
                    r: '',
                    value: '',
                })
            }
        },
        methods: {
            getResults(page = 1) {
                axios.get('api/environment/valueList?page=' + page)
                    .then(response => {
                        this.values = response.data;
                    });
            },
            updateValue() {
                this.$Progress.start();
                //console.log('editmode');
                this.form.put('api/environment/value/' + this.form.id)
                    .then(() => {
                        this.$emit('ValueTableChanged');
                        $('#addNew').modal('hide');
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
            editModal(value) {
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(value);
            },
            newModal() {
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
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
                        this.form.delete('/api/environment/value/' + id).then(() => {
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
                if (this.$gate.isAdmin()) {
                    this.$Progress.start();
                    axios.get("api/environment/valueList").then(({data}) => (this.values = data)).then(() => {
                        this.$Progress.finish();
                    }).catch(() => {
                        this.$Progress.fail();
                        toast.fire({
                            type: 'error',
                            title: 'خطایی در لود مقادیر بهداشت محیط رخ داد'
                        });
                    });
                }
            },
            loadItems() {
                axios.get("api/environment/itemList").then(({data}) => (this.environment_items = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });

            },
            createValue() {
                this.$Progress.start();
                this.form.post('api/environment/value')
                    .then(() => {
                        this.$emit('ValueTableChanged');
                        $('#addNew').modal('hide');
                        toast.fire({
                            type: 'success',
                            title: 'اطلاعات با موقفیت ثبت شد'
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
                axios.get('api/environment/findValue?q=' + query)
                    .then((data) => {
                        this.users = data.data
                    })
                    .catch(() => {

                    })
            });
            this.loadValues();
            this.loadItems();
            this.$on('ValueTableChanged', () => {
                this.loadValues();
            });

        }

    }
</script>
