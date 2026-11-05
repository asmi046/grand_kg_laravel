<template>
    <Transition name="fade">
        <div v-if="loading || company" class="popup_wrapper company-popup-wrapper" @click.self="close">
            <div class="popup company-popup" role="dialog" aria-modal="true"
                :aria-label="company ? company.title : 'Загрузка данных компании'">
                <button v-if="company" type="button" class="popup__close company-popup__close" aria-label="Закрыть"
                    @click="close">
                    <svg class="sprite_icon"><use xlink:href="#icon-close"></use></svg>
                </button>

                <p v-if="loading" class="company-popup__loading">Загрузка данных…</p>

                <template v-else-if="company">
                    <div class="company-popup__logo">
                        <img v-if="company.img" :src="company.img" :alt="company.title" loading="lazy" />
                        <span v-else class="company-popup__placeholder">{{ initial }}</span>
                    </div>

                    <h3 class="company-popup__title">{{ company.title }}</h3>

                    <span v-if="company.is_own_project" class="company-popup__badge">Собственный проект</span>

                    <dl class="company-popup__meta">
                        <div v-if="company.region" class="company-popup__row">
                            <dt>Регион</dt>
                            <dd>{{ company.region }}</dd>
                        </div>
                        <div v-if="company.years" class="company-popup__row">
                            <dt>Период работы</dt>
                            <dd>{{ company.years }}</dd>
                        </div>
                    </dl>

                    <div v-if="company.sections.length" class="company-popup__group">
                        <p class="company-popup__group-title">Разделы</p>
                        <ul class="company-popup__list">
                            <li v-for="section in company.sections" :key="section.url">
                                <a :href="section.url">{{ section.title }}</a>
                            </li>
                        </ul>
                    </div>

                    <div v-if="company.subsections.length" class="company-popup__group">
                        <p class="company-popup__group-title">Услуги</p>
                        <ul class="company-popup__list">
                            <li v-for="subsection in company.subsections" :key="subsection.url">
                                <a :href="subsection.url">{{ subsection.title }}</a>
                            </li>
                        </ul>
                    </div>

                    <a v-if="company.url" class="button company-popup__site" :href="company.url" target="_blank"
                        rel="noopener">Сайт компании</a>
                </template>
            </div>
        </div>
    </Transition>
</template>

<script setup>
import { ref, computed, onMounted, onBeforeUnmount } from 'vue';
import axios from 'axios';

const company = ref(null);
const loading = ref(false);

const initial = computed(() => (company.value?.title || '').trim().charAt(0).toUpperCase());

function close() {
    company.value = null;
    loading.value = false;
}

async function openCompany(url) {
    loading.value = true;

    try {
        const { data } = await axios.get(url);
        company.value = data;
    } catch (error) {
        console.error('Не удалось загрузить данные компании', error);
        close();
    } finally {
        loading.value = false;
    }
}

function onDocumentClick(event) {
    const trigger = event.target instanceof Element
        ? event.target.closest('[data-company-url]')
        : null;

    if (!trigger) {
        return;
    }

    event.preventDefault();
    openCompany(trigger.dataset.companyUrl);
}

function onKeydown(event) {
    if (event.key === 'Escape') {
        close();
    }
}

onMounted(() => {
    document.addEventListener('click', onDocumentClick);
    document.addEventListener('keydown', onKeydown);
});

onBeforeUnmount(() => {
    document.removeEventListener('click', onDocumentClick);
    document.removeEventListener('keydown', onKeydown);
});
</script>
