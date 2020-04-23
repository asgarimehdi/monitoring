<template>
    <div>
        <date-picker  :auto-submit="true"
            v-model="date"
            format="YYYY-MM-DD"
        />

    </div>
</template>

<script>
    import VuePersianDatetimePicker from 'vue-persian-datetime-picker'
    export default {
        data(){
            return {
                date: '',
            }
        },
        components: {
            datePicker: VuePersianDatetimePicker
        }
    }
</script>
