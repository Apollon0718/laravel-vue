<template>
    <div class="form-group">
        <label class="control-label" :for="id" v-if="id">
            <slot></slot>
        </label>
        <textarea :rows="rows" :id="id" :class="classes"
                  class="form-control" :name="name" @input="updateValue($event.target.value)"
                  @blur="blur($event.target.value)" :placeholder="placeholder">{{value}}</textarea>
    </div>
</template>
<script>
    export default {
        props: {
            name: {
                type: String,
                required: true,
                validator: value => {
                    return value !== '';
                }
            },
            id: {},
            classes: {
                type: String
            },
            value: {},
            placeholder: {},
            rows: {
                default: 5
            },
        },
        mounted() {
        },
        computed: {},
        watch: {
            value:function (newValue) {
                if(newValue === '' || newValue === null){
                    $('[name='+this.name+']').val("")
                }
            }
        },
        methods: {
            enterKeyPressed() {
                this.$emit('enter');
            },
            updateValue(value) {
                this.$emit('input', value);
            },
            blur(value) {
                this.$emit('blur', value);
            },
        },
        destroyed() {
            if (this.$el && this.$el.parentNode) {
                this.$el.parentNode.removeChild(this.$el)
            }
        }
    }
</script>