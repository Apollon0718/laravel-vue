<template>
    <div class="form-group">
        <label class="btn btn-success" :class="{disabled: typeof value === 'string'}">
            <div class="select-button">
                <span v-if="value">Selected File: {{value.name}}</span>
                <span v-else>Select File</span>
            </div>
            <input class="hide" :disabled="typeof value === 'string'" :name="name" :multiple="multiple" type="file" @change="handleFileChange"/>
        </label>
        <img v-if="typeof value === 'string'" :src="value" alt="" width="100%" class="img-rounded">
    </div>
</template>

<script>
    export default {
        props: {
            value: {
                type: [File, String]
            },
            name: {},
            multiple: {
                type: Boolean,
                default: false
            }
        },
        methods: {
            handleFileChange(e) {
                this.$emit('input', e.target.files[0])
            }
        }
    }
</script>

<style scoped>
</style>