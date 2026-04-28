<template>
    <div class="page">
        <img class="watermark" :src="logoPath" alt="AMA Sport" />

        <header class="topbar">
            <img class="logo" :src="logoPath" alt="AMA Sport" />
        </header>

        <main class="content">
            <section class="center-block">
                <h1>Foco na <span>saúde!</span></h1>

                <p class="step">Passo 3 de 6</p>

                <div class="progress-wrap">
                    <div class="progress-line">
                        <div class="progress-fill"></div>
                    </div>
                    <div class="progress-dot"></div>
                </div>

                <h2>Seu <span>físico</span> e saúde</h2>

                <div class="panel">
                    <div class="panel-title">
                        <span class="panel-icon">⏱</span>
                        <p>Seu físico e saúde</p>
                    </div>

                    <div class="inner-card">
                        <div class="question-group">
                            <p class="question-text">
                                Como você avalia sua força no braço e punho?
                            </p>

                            <div class="strength-scale">
                                <div class="strength-line"></div>

                                <button
                                    v-for="value in [1, 2, 3, 4, 5]"
                                    :key="value"
                                    class="strength-dot"
                                    :class="{
                                        active: selectedStrength === value,
                                    }"
                                    @click="selectStrength(value)"
                                >
                                    {{ value }}
                                </button>
                            </div>

                            <div class="strength-labels">
                                <span>(1=Baixa/Pouca resistência)</span>
                                <span>(5=Muito Alta/Forte)</span>
                            </div>
                        </div>

                        <div class="divider"></div>

                        <div class="question-group">
                            <p class="question-text">
                                Você tem dor ou histórico de lesões no ombro,
                                cotovelo ou punho?
                            </p>

                            <div class="button-options">
                                <button
                                    class="choice-button"
                                    :class="{
                                        selected: selectedInjury === 'sim',
                                    }"
                                    @click="selectedInjury = 'sim'"
                                >
                                    ✓ Sim
                                </button>

                                <button
                                    class="choice-button"
                                    :class="{
                                        selected: selectedInjury === 'nao',
                                    }"
                                    @click="selectedInjury = 'nao'"
                                >
                                    ✓ Não
                                </button>
                            </div>
                        </div>

                        <div class="question-group">
                            <p class="question-text">
                                Com que frequência você treina ou joga Beach
                                Tennis por semana?
                            </p>

                            <div class="button-options frequency">
                                <button
                                    class="choice-button small"
                                    :class="{
                                        selected: selectedFrequency === '1-2',
                                    }"
                                    @click="selectedFrequency = '1-2'"
                                >
                                    1 - 2 vezes
                                </button>

                                <button
                                    class="choice-button small"
                                    :class="{
                                        selected: selectedFrequency === '3-5',
                                    }"
                                    @click="selectedFrequency = '3-5'"
                                >
                                    3 - 5 vezes
                                </button>

                                <button
                                    class="choice-button small"
                                    :class="{
                                        selected: selectedFrequency === '6-7',
                                    }"
                                    @click="selectedFrequency = '6-7'"
                                >
                                    6 - 7 vezes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="actions">
                    <button class="back-button" @click="goBack">‹</button>

                    <button
                        class="next-button"
                        :disabled="!canProceed"
                        @click="goNext"
                    >
                        Próxima etapa <span>→</span>
                    </button>
                </div>
            </section>
        </main>
    </div>
</template>

<script setup>
import { computed, onMounted, ref } from "vue";
import { useRouter } from "vue-router";

const router = useRouter();
const logoPath = "/images/logo-ama.png";

const selectedStrength = ref(null);
const selectedInjury = ref("");
const selectedFrequency = ref("");

onMounted(() => {
    const savedStrength = localStorage.getItem("quiz_strength");
    const savedInjury = localStorage.getItem("quiz_injury");
    const savedFrequency = localStorage.getItem("quiz_frequency");

    if (savedStrength) selectedStrength.value = Number(savedStrength);
    if (savedInjury) selectedInjury.value = savedInjury;
    if (savedFrequency) selectedFrequency.value = savedFrequency;
});

const canProceed = computed(() => {
    return (
        selectedStrength.value &&
        selectedInjury.value &&
        selectedFrequency.value
    );
});

function selectStrength(value) {
    selectedStrength.value = value;
}

function goBack() {
    router.push("/estilo");
}

function goNext() {
    if (!canProceed.value) return;

    localStorage.setItem("quiz_strength", String(selectedStrength.value));
    localStorage.setItem("quiz_injury", selectedInjury.value);
    localStorage.setItem("quiz_frequency", selectedFrequency.value);

    router.push("/orcamento");
}
</script>

<style scoped>
* {
    box-sizing: border-box;
}

.page {
    position: relative;
    min-height: 100vh;
    overflow: hidden;
    background:
        linear-gradient(rgba(245, 247, 249, 0.84), rgba(245, 247, 249, 0.84)),
        url("/images/fundo-inicial.png") no-repeat right center;
    background-size: cover;
    padding: 24px 42px 32px;
}

.watermark {
    position: absolute;
    inset: 0;
    margin: auto;
    width: 900px;
    max-width: 68vw;
    opacity: 0.03;
    filter: brightness(0);
    pointer-events: none;
    user-select: none;
}

.topbar {
    position: relative;
    z-index: 2;
    display: flex;
    justify-content: flex-start;
    align-items: center;
}

.logo {
    width: 95px;
    filter: brightness(0);
}

.content {
    position: relative;
    z-index: 2;
    display: flex;
    justify-content: center;
    margin-top: 8px;
}

.center-block {
    width: 100%;
    max-width: 1120px;
    text-align: center;
}

h1 {
    margin: 0;
    font-size: 84px;
    line-height: 0.95;
    font-weight: 900;
    color: #0d1624;
}

h1 span {
    color: #1f95a8;
}

.step {
    margin: 18px 0 0;
    font-size: 22px;
    color: #1c7f95;
}

.progress-wrap {
    position: relative;
    width: 100%;
    max-width: 760px;
    margin: 24px auto 0;
    display: flex;
    align-items: center;
}

.progress-line {
    width: 100%;
    height: 7px;
    background: #d8dde3;
    border-radius: 999px;
    overflow: hidden;
}

.progress-fill {
    width: 38%;
    height: 100%;
    background: linear-gradient(90deg, #2ca0ff, #2978ff);
    border-radius: 999px;
}

.progress-dot {
    position: absolute;
    left: 38%;
    transform: translateX(-50%);
    width: 18px;
    height: 18px;
    border-radius: 50%;
    background: #2b87ff;
    box-shadow: 0 0 0 4px rgba(43, 135, 255, 0.15);
}

h2 {
    margin: 38px 0 0;
    font-size: 34px;
    font-weight: 500;
    color: #141c28;
}

h2 span {
    color: #1d7f94;
    font-weight: 700;
}

.panel {
    margin: 28px auto 0;
    max-width: 980px;
    background: rgba(255, 255, 255, 0.78);
    border: 1px solid #e6ebf0;
    border-radius: 24px;
    padding: 18px 18px 20px;
    box-shadow: 0 10px 28px rgba(0, 0, 0, 0.05);
    text-align: left;
}

.panel-title {
    display: flex;
    align-items: center;
    gap: 14px;
    font-size: 22px;
    font-weight: 700;
    color: #172131;
    margin-bottom: 14px;
}

.panel-icon {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background: #e8f1f2;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
}

.panel-title p {
    margin: 0;
}

.inner-card {
    border: 1px solid #dfe6ee;
    border-radius: 22px;
    background: rgba(255, 255, 255, 0.65);
    padding: 22px 26px;
}

.question-group + .question-group {
    margin-top: 22px;
}

.question-text {
    margin: 0 0 18px 0;
    font-size: 22px;
    color: #2b3443;
}

.strength-scale {
    position: relative;
    max-width: 720px;
    margin: 0 auto;
    height: 56px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.strength-line {
    position: absolute;
    left: 6%;
    right: 6%;
    top: 50%;
    transform: translateY(-50%);
    height: 6px;
    background: linear-gradient(90deg, #eef2f7, #dbeeff, #eef2f7);
    border-radius: 999px;
}

.strength-dot {
    position: relative;
    z-index: 2;
    width: 56px;
    height: 56px;
    border-radius: 50%;
    border: none;
    background: #61ace8;
    color: white;
    font-size: 18px;
    font-weight: 700;
    cursor: pointer;
    box-shadow: 0 4px 10px rgba(97, 172, 232, 0.18);
}

.strength-dot.active {
    background: linear-gradient(180deg, #2ca0ff, #216ee9);
    width: 64px;
    height: 64px;
    font-size: 28px;
    box-shadow: 0 8px 18px rgba(44, 160, 255, 0.28);
}

.strength-labels {
    display: flex;
    justify-content: space-between;
    margin-top: 12px;
    font-size: 14px;
    color: #6b7484;
}

.divider {
    height: 1px;
    background: #e3e9ef;
    margin: 22px 0 12px;
}

.button-options {
    display: flex;
    gap: 18px;
    flex-wrap: wrap;
}

.choice-button {
    min-width: 170px;
    height: 58px;
    padding: 0 24px;
    border-radius: 14px;
    border: 2px solid #d9e1ea;
    background: rgba(255, 255, 255, 0.92);
    color: #233044;
    font-size: 20px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.2s ease;
}

.choice-button.small {
    min-width: 180px;
}

.choice-button.selected {
    border-color: #2b87ff;
    background: linear-gradient(90deg, #2ca0ff, #256ee8);
    color: white;
    box-shadow: 0 8px 18px rgba(43, 135, 255, 0.22);
}

.actions {
    max-width: 980px;
    margin: 18px auto 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.back-button {
    width: 68px;
    height: 68px;
    border-radius: 18px;
    border: 2px solid #9a78ff;
    background: rgba(255, 255, 255, 0.95);
    font-size: 42px;
    color: #377ff2;
    cursor: pointer;
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.05);
}

.next-button {
    min-width: 420px;
    height: 76px;
    border: none;
    border-radius: 20px;
    background: linear-gradient(90deg, #2c9cff, #256ef1);
    color: white;
    font-size: 22px;
    font-weight: 500;
    cursor: pointer;
    box-shadow: 0 12px 24px rgba(44, 156, 255, 0.22);
}

.next-button span {
    margin-left: 12px;
    font-size: 30px;
}

.next-button:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

@media (max-width: 1200px) {
    h1 {
        font-size: 60px;
    }

    .question-text {
        font-size: 19px;
    }

    .next-button {
        min-width: 320px;
    }
}

@media (max-width: 768px) {
    .page {
        padding: 18px 20px 28px;
    }

    .logo {
        width: 80px;
    }

    h1 {
        font-size: 42px;
    }

    h2 {
        font-size: 28px;
    }

    .question-text {
        font-size: 17px;
    }

    .strength-dot {
        width: 46px;
        height: 46px;
        font-size: 16px;
    }

    .strength-dot.active {
        width: 54px;
        height: 54px;
        font-size: 22px;
    }

    .button-options {
        flex-direction: column;
    }

    .choice-button,
    .choice-button.small {
        width: 100%;
        min-width: auto;
    }

    .actions {
        flex-direction: column;
        gap: 18px;
    }

    .next-button {
        width: 100%;
        min-width: auto;
    }
}
</style>
