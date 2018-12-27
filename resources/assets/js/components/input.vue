<template>
    <div class="form-group">
        <label class="control-label" :for="id" v-if="id">
            <slot></slot>
        </label>
        <input :type="type" :id="id" :class="classes" class="form-control" :name="name" :value="value"
               @input="onInput" :placeholder="placeholder" @blur="onBlur"
               :readonly="readonly"
               :disabled="disabled" :required="required">
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
            type: {
                type: String,
                validator: value => {
                    return ['hidden', 'text', 'number', 'email', 'tel'].indexOf(value) > -1;
                },
                default: 'text'
            },
            id: {},
            classes: {
                type: String
            },
            value: {
                default: null
            },
            placeholder: {
                type: String
            },
            readonly: {
                type: Boolean,
                default: false
            },
            disabled: {
                default: false
            },
            required: {
                type: Boolean,
                default: false
            },
        },
        computed: {},
        mounted() {
        },
        created() {
        },
        watch: {},
        methods: {
            onBlur() {
                this.$emit('blur')
            },
            onInput(e) {
                this.$emit('input', e.target.value)
            },
        },
        destroyed() {
            if (this.$el && this.$el.parentNode) {
                this.$el.parentNode.removeChild(this.$el)
            }
        }
    }
</script>