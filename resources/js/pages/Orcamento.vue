<template>
    <div class="screen">
        <img class="watermark" :src="logoPath" alt="AMA Sport" />

        <header class="top">
            <img :src="logoPath" class="logo" alt="AMA Sport" />
        </header>

        <div class="content">
            <h1>Página de Orçamento (Budget)</h1>
            <p class="step">Passo 4 de 6</p>

            <div class="progress">
                <div class="bar"></div>
            </div>

            <h2>Falta pouco! Qual seu orçamento estimado?</h2>

            <div class="box">
                <div
                    v-for="item in options"
                    :key="item"
                    class="option"
                    :class="{ active: selected === item }"
                    @click="selected = item"
                >
                    {{ item }}
                    <span v-if="selected === item" class="check">✓</span>
                </div>
            </div>

            <button class="next" :disabled="!selected" @click="goNext">
                Ver minha raquete →
            </button>

            <button class="back" @click="router.push('/lesao')">
                ← Voltar
            </button>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";

const router = useRouter();

const logoPath = "/images/logo-ama.png";

const selected = ref("");

const options = ["R$1600 - R$1800", "R$1900 - R$2300", "R$1400 - R$2700"];

function goNext() {
    if (!selected.value) return;

    localStorage.setItem("quiz_budget", selected.value);
    router.push("/resultado");
}
</script>

<style scoped>
* {
    box-sizing: border-box;
}

.screen {
    position: relative;
    min-height: 100vh;
    overflow: hidden;
    padding: 24px 42px 32px;
    font-family: Arial, Helvetica, sans-serif;
    background:
        linear-gradient(rgba(245, 247, 249, 0.84), rgba(245, 247, 249, 0.84)),
        url("/images/fundo-inicial.png") no-repeat right center;
    background-size: cover;
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
}

.top {
    position: relative;
    z-index: 2;
}

.logo {
    width: 95px;
    filter: brightness(0);
}

.content {
    position: relative;
    z-index: 2;
    max-width: 980px;
    margin: 10px auto 0;
    text-align: center;
}

h1 {
    margin: 0;
    font-size: 64px;
    color: #121b28;
}

.step {
    font-size: 26px;
    margin: 18px 0 24px;
}

.progress {
    height: 10px;
    background: #dfe6ef;
    border-radius: 20px;
    overflow: hidden;
    margin-bottom: 35px;
}

.bar {
    width: 72%;
    height: 100%;
    background: #1e88ff;
}

h2 {
    font-size: 34px;
    margin-bottom: 30px;
}

.box {
    background: rgba(255, 255, 255, 0.65);
    padding: 30px;
    border-radius: 20px;
    backdrop-filter: blur(8px);
}

.option {
    padding: 28px 32px;
    font-size: 34px;
    background: #fff;
    margin-bottom: 20px;
    border-radius: 18px;
    cursor: pointer;
    font-weight: 700;
    text-align: left;
    position: relative;
    border: 2px solid transparent;
    transition: 0.2s;
}

.option:hover {
    transform: scale(1.01);
}

.option.active {
    border-color: #2196f3;
    background: #eef6ff;
}

.check {
    position: absolute;
    right: 28px;
    top: 50%;
    transform: translateY(-50%);
    color: #1e88ff;
    font-size: 28px;
}

.next {
    margin-top: 35px;
    padding: 22px 60px;
    font-size: 34px;
    border: none;
    border-radius: 18px;
    background: #1e88ff;
    color: #fff;
    cursor: pointer;
}

.next:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.back {
    margin-top: 20px;
    display: block;
    background: none;
    border: none;
    font-size: 28px;
    cursor: pointer;
}
</style>
