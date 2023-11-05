<template>
    <div class="col-span-11 lg:col-span-11 relative">
        <input
            type="text"
            id="text-filter"
            placeholder="O que você está procurando?"
            class="input w-full pr-10"
            :value="valueText"
            @change="updateValue"
            required
        />
        <a
            v-if="showClearIcon"
            @click="clearMethod"
            class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer focus:outline-none"
        >
            <img src="/icons/times.svg" alt="Clear" class="icon-sm"/>
        </a>
    </div>
</template>

<script>
import ButtonBasic from '@/Components/ButtonBasic.vue';

export default {
    components: {
        ButtonBasic
    },
    props: {
        valueText: {
            type: String,
            default: '',
        },
        updateValue: {
            type: Function,
            required: true,
        },
        clearMethod: {
            type: Function,
            required: true,
        },
    },
    computed: {
        showClearIcon() {
            return this.valueText && this.valueText.length > 0;
        }
    }
};
</script>

