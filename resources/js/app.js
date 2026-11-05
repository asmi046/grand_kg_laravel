import { createApp } from 'vue/dist/vue.esm-bundler'
import CookiesWarning from "./components/CookiesWarning.vue"
import CompanyModal from "./components/CompanyModal.vue"
import "./vendor/mobile-menu/mobile-menu.js"

if (document.querySelector("#modal_app")) {
    const mobile_app = createApp({
        components: {
            CookiesWarning,
            CompanyModal,
        },
        setup() { }
    })

    // axios не подключаем через app.use(): он является функцией,
    // и Vue вызвал бы его как плагин (axios(app)), что приводит
    // к переполнению стека на разборе объекта приложения.
    // Компоненты импортируют axios напрямую.
    mobile_app.mount("#modal_app");
}
