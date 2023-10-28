import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import {Vue3TailwindPagination} from "vue-3-tailwind-css-pagination";
import '../css/app.css'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faTrashAlt, faPenToSquare } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faTrashAlt)
library.add(faPenToSquare)


createInertiaApp({
  resolve: async (name) => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })

    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) });
        app.component('Vue3TailwindPagination', Vue3TailwindPagination);
        app.use(plugin);
        app.component('font-awesome-icon', FontAwesomeIcon)
        app.mount(el);
    },
})
