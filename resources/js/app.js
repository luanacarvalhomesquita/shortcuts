import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import {Vue3TailwindPagination} from "vue-3-tailwind-css-pagination";
import '../css/app.css'

createInertiaApp({
  resolve: async (name) => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })

    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) });
        app.component('Vue3TailwindPagination', Vue3TailwindPagination);
        app.use(plugin);
        app.mount(el);
    },
})
