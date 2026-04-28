<template>
    <div class="result-page">
        <img class="watermark" :src="logoPath" alt="AMA Sport" />

        <header class="topbar">
            <img class="logo" :src="logoPath" alt="AMA Sport" />
        </header>

        <div v-if="loading" class="loading-screen">
            Buscando sua raquete ideal...
        </div>
        <section v-if="mainRacket && secondRacket" class="result-section">
            <div class="hero-top">
                <h1>Atleta, encontramos sua <span>raka ideal!</span></h1>

                <p class="subtitle">Aqui está o seu match</p>
            </div>

            <div class="hero-content">
                <div class="racket-visual">
                    <div class="racket-card-bg"></div>
                    <img
                        class="racket-image"
                        :src="mainImage"
                        :alt="mainRacket.name"
                    />
                    <div class="racket-base"></div>
                </div>

                <div class="spec-card">
                    <div class="spec-header">
                        <div class="badge">★</div>
                        <div>
                            <h2>{{ mainRacket?.name }}</h2>
                            <p class="brand">{{ mainRacket.brand }}</p>
                        </div>
                    </div>

                    <div class="spec-grid">
                        <div class="spec-column">
                            <div
                                class="spec-item"
                                v-for="item in mainSpecsLeft"
                                :key="item.label"
                            >
                                <div class="spec-icon">{{ item.icon }}</div>
                                <div>
                                    <strong>{{ item.label }}</strong>
                                    <p>{{ item.value }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="spec-divider"></div>

                        <div class="spec-column">
                            <div
                                class="spec-item"
                                v-for="item in mainSpecsRight"
                                :key="item.label"
                            >
                                <div class="spec-icon">{{ item.icon }}</div>
                                <div>
                                    <strong>{{ item.label }}</strong>
                                    <p>{{ item.value }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="action-row">
                        <button class="back-button" @click="goBack">
                            ‹ Voltar
                        </button>
                        <a
                            href="https://www.amasport.com.br/"
                            target="_blank"
                            class="site-button"
                        >
                            Ver Site AMA →
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section
            v-if="mainRacket && secondRacket"
            class="result-section second-section"
        >
            <div class="hero-top">
                <h1>Sua <span>segunda opção</span></h1>

                <p class="subtitle">
                    Outra excelente escolha para o seu perfil
                </p>
            </div>

            <div class="hero-content">
                <div class="racket-visual">
                    <div class="racket-card-bg"></div>
                    <img
                        class="racket-image second"
                        :src="secondImage"
                        :alt="secondRacket?.name"
                    />
                    <div class="racket-base"></div>
                </div>

                <div class="spec-card">
                    <div class="spec-header">
                        <div class="badge secondary">✓</div>
                        <div>
                            <h2>{{ secondRacket?.name }}</h2>
                            <p class="brand">{{ secondRacket?.brand }}</p>
                        </div>
                    </div>

                    <div class="spec-grid">
                        <div class="spec-column">
                            <div
                                class="spec-item"
                                v-for="item in secondSpecsLeft"
                                :key="item.label"
                            >
                                <div class="spec-icon">{{ item.icon }}</div>
                                <div>
                                    <strong>{{ item.label }}</strong>
                                    <p>{{ item.value }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="spec-divider"></div>

                        <div class="spec-column">
                            <div
                                class="spec-item"
                                v-for="item in secondSpecsRight"
                                :key="item.label"
                            >
                                <div class="spec-icon">{{ item.icon }}</div>
                                <div>
                                    <strong>{{ item.label }}</strong>
                                    <p>{{ item.value }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="action-row">
                        <button class="site-button secondary-btn">
                            Ver Site AMA →
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
import { ref, onMounted, computed } from "vue";
import { useRouter } from "vue-router";

const router = useRouter();
const logoPath = "/images/logo-ama.png";

const loading = ref(true);
const mainRacket = ref(null);
const secondRacket = ref(null);

function goBack() {
    router.push("/orcamento");
}

function slugify(name) {
    return name.toLowerCase().replace(/\s+/g, "-");
}

const mainImage = computed(() => {
    if (!mainRacket.value) return "/images/racket.png";
    return `/images/${slugify(mainRacket.value.name)}.png`;
});

const secondImage = computed(() => {
    if (!secondRacket.value) return "/images/racket.png";
    return `/images/${slugify(secondRacket.value.name)}.png`;
});

function buildSpecs(racket) {
    if (!racket) return { left: [], right: [] };

    return {
        left: [
            { icon: "◫", label: "FACE", value: racket.material_face },
            { icon: "◪", label: "EVA", value: racket.eva },
            { icon: "⚖", label: "PESO", value: racket.weight + " gramas" },
            {
                icon: "☰",
                label: "ESPESSURA",
                value: racket.thickness_mm + " mm",
            },
        ],
        right: [
            { icon: "📏", label: "BALANCE", value: racket.balance },
            { icon: "🎯", label: "NÍVEL", value: racket.level },
            { icon: "⚡", label: "PERFIL", value: racket.power_control },
            { icon: "💰", label: "PREÇO", value: "R$ " + racket.price },
        ],
    };
}

const mainSpecsLeft = computed(() => buildSpecs(mainRacket.value).left);
const mainSpecsRight = computed(() => buildSpecs(mainRacket.value).right);

const secondSpecsLeft = computed(() => buildSpecs(secondRacket.value).left);
const secondSpecsRight = computed(() => buildSpecs(secondRacket.value).right);

async function loadRecommendation() {
    try {
        const level = localStorage.getItem("quiz_level") || "";
        const style = localStorage.getItem("quiz_style") || "";
        const sweet_spot = localStorage.getItem("quiz_sweet_spot") || "";
        const strength = localStorage.getItem("quiz_strength") || "";
        const injury = localStorage.getItem("quiz_injury") || "";
        const frequency = localStorage.getItem("quiz_frequency") || "";
        const budget = localStorage.getItem("quiz_budget") || "";

        const params = new URLSearchParams({
            level,
            style,
            sweet_spot,
            strength,
            injury,
            frequency,
            budget,
        });

        const response = await fetch(`/recommend?${params.toString()}`);
        const data = await response.json();

        mainRacket.value = data.main;
        secondRacket.value = data.second;
    } catch (error) {
        console.error(error);
    } finally {
        loading.value = false;
    }
}

onMounted(loadRecommendation);
</script>

<style scoped>
* {
    box-sizing: border-box;
}

.result-page {
    position: relative;
    min-height: 100vh;
    background:
        linear-gradient(rgba(245, 247, 249, 0.83), rgba(245, 247, 249, 0.83)),
        url("/images/fundo-inicial.png") no-repeat right center;
    background-size: cover;
    padding: 24px 42px 60px;
    overflow-x: hidden;
    font-family: Arial, Helvetica, sans-serif;
}

.watermark {
    position: fixed;
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
}

.logo {
    width: 95px;
    filter: brightness(0);
}

.result-section {
    position: relative;
    z-index: 2;
    max-width: 1280px;
    margin: 10px auto 0;
    padding-bottom: 80px;
}

.second-section {
    padding-top: 40px;
}

.hero-top {
    text-align: center;
}

.hero-top h1 {
    margin: 0;
    font-size: 72px;
    line-height: 1;
    font-weight: 900;
    color: #0d1624;
}

.hero-top h1 span {
    color: #246fd8;
}

.subtitle {
    margin: 18px 0 0;
    font-size: 22px;
    color: #4f5866;
}

.progress-wrap {
    position: relative;
    width: 100%;
    max-width: 980px;
    margin: 28px auto 0;
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
    width: 36%;
    height: 100%;
    background: linear-gradient(90deg, #2ca0ff, #2978ff);
}

.progress-dot {
    position: absolute;
    left: 36%;
    transform: translateX(-50%);
    width: 20px;
    height: 20px;
    background: #58a8ff;
    border-radius: 50%;
    box-shadow: 0 0 0 4px rgba(88, 168, 255, 0.18);
}

.hero-content {
    margin-top: 38px;
    display: grid;
    grid-template-columns: 420px 1fr;
    gap: 34px;
    align-items: center;
}

.racket-visual {
    position: relative;
    min-height: 640px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.racket-card-bg {
    position: absolute;
    width: 320px;
    height: 420px;
    background: linear-gradient(
        180deg,
        rgba(232, 240, 250, 0.92),
        rgba(214, 226, 243, 0.92)
    );
    clip-path: polygon(
        20% 0%,
        80% 0%,
        100% 25%,
        100% 75%,
        80% 100%,
        20% 100%,
        0% 75%,
        0% 25%
    );
    box-shadow: 0 14px 30px rgba(0, 0, 0, 0.08);
}

.racket-image {
    position: relative;
    z-index: 2;
    width: 250px;
    filter: drop-shadow(0 16px 24px rgba(0, 0, 0, 0.14));
}

.racket-image.second {
    width: 235px;
}

.racket-base {
    position: absolute;
    bottom: 42px;
    width: 230px;
    height: 34px;
    border-radius: 50%;
    background: linear-gradient(180deg, #f5f8fc, #dfe8f4);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12);
}

.spec-card {
    background: rgba(255, 255, 255, 0.82);
    border: 1px solid #e5eaf0;
    border-radius: 28px;
    padding: 34px 38px;
    box-shadow: 0 14px 28px rgba(0, 0, 0, 0.06);
    backdrop-filter: blur(4px);
}

.spec-header {
    display: flex;
    align-items: center;
    gap: 18px;
}

.badge {
    width: 62px;
    height: 62px;
    border-radius: 18px;
    background: linear-gradient(180deg, #2f8cff, #225ed1);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 34px;
    font-weight: 700;
}

.badge.secondary {
    background: linear-gradient(180deg, #32b7d7, #1b8ba8);
}

.spec-header h2 {
    margin: 0;
    font-size: 38px;
    color: #0d1624;
    font-weight: 900;
}

.brand {
    margin: 6px 0 0;
    font-size: 20px;
    color: #246fd8;
    font-weight: 700;
}

.spec-grid {
    margin-top: 28px;
    display: grid;
    grid-template-columns: 1fr 1px 1fr;
    gap: 28px;
}

.spec-divider {
    background: #d9e0e8;
    width: 1px;
}

.spec-column {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.spec-item {
    display: grid;
    grid-template-columns: 58px 1fr;
    gap: 14px;
    align-items: start;
}

.spec-icon {
    width: 58px;
    height: 58px;
    border-radius: 50%;
    border: 1px solid #d8e1ea;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #3268cc;
    font-size: 26px;
    background: rgba(255, 255, 255, 0.72);
}

.spec-item strong {
    display: block;
    font-size: 18px;
    color: #1b2433;
    margin-bottom: 4px;
}

.spec-item p {
    margin: 0;
    font-size: 16px;
    color: #4f5866;
    line-height: 1.35;
}

.action-row {
    margin-top: 28px;
    display: flex;
    gap: 16px;
    align-items: center;
}

.back-button {
    min-width: 150px;
    height: 62px;
    border-radius: 18px;
    border: 2px solid #8c73ff;
    background: rgba(255, 255, 255, 0.95);
    color: #1f2b3a;
    font-size: 24px;
    cursor: pointer;
}

.site-button {
    min-width: 320px;
    height: 68px;
    border: none;
    border-radius: 20px;
    background: linear-gradient(90deg, #2c9cff, #256ef1);
    color: white;
    font-size: 22px;
    font-weight: 500;
    cursor: pointer;
    box-shadow: 0 12px 24px rgba(44, 156, 255, 0.22);
}

.secondary-btn {
    min-width: 280px;
}

@media (max-width: 1200px) {
    .hero-top h1 {
        font-size: 52px;
    }

    .hero-content {
        grid-template-columns: 1fr;
    }

    .racket-visual {
        min-height: 420px;
    }

    .spec-grid {
        grid-template-columns: 1fr;
    }

    .spec-divider {
        display: none;
    }
}

@media (max-width: 768px) {
    .result-page {
        padding: 18px 20px 40px;
    }

    .logo {
        width: 80px;
    }

    .hero-top h1 {
        font-size: 40px;
    }

    .subtitle {
        font-size: 18px;
    }

    .spec-header h2 {
        font-size: 28px;
    }

    .action-row {
        flex-direction: column;
    }

    .loading-screen {
        min-height: 70vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 42px;
        font-weight: 700;
        color: #246fd8;
    }

    .site-button,
    .back-button {
        width: 100%;
        min-width: auto;
    }
}
</style>
