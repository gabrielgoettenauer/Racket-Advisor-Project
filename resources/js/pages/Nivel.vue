<template>
  <div class="page">
    <img class="watermark" :src="logoPath" alt="AMA Sport" />

    <header class="topbar">
      <img class="logo" :src="logoPath" alt="AMA Sport" />
    </header>

    <main class="content">
      <section class="center-block">
        <p class="step">PASSO 1 DE 6</p>

        <h1>
          Vamos <span>começar!</span>
        </h1>

        <p class="subtitle">
          Responda as perguntas para uma análise precisa.
        </p>

        <div class="progress-wrap">
          <div class="progress-line">
            <div class="progress-fill"></div>
          </div>

          <div class="progress-icon">
            <span>📝</span>
          </div>
        </div>

        <h2>
          Qual seu <span>Nível de Experiência?</span>
        </h2>

        <div class="options">
          <button
            class="option-card"
            :class="{ selected: selectedLevel === 'iniciante' }"
            @click="selectLevel('iniciante')"
          >
            <div class="option-left">
              <div class="icon-circle">🌱</div>

              <div class="text-group">
                <strong>Iniciante</strong>
                <span>(joga a &lt; 6 meses)</span>
              </div>
            </div>

            <div class="check">
              <div class="radio" :class="{ active: selectedLevel === 'iniciante' }">
                <span v-if="selectedLevel === 'iniciante'">✓</span>
              </div>
            </div>
          </button>

          <button
            class="option-card"
            :class="{ selected: selectedLevel === 'intermediario' }"
            @click="selectLevel('intermediario')"
          >
            <div class="option-left">
              <div class="icon-circle">📊</div>

              <div class="text-group">
                <strong>Intermediário</strong>
                <span>(joga entre 1 ano a 3 anos)</span>
              </div>
            </div>

            <div class="check">
              <div class="radio" :class="{ active: selectedLevel === 'intermediario' }">
                <span v-if="selectedLevel === 'intermediario'">✓</span>
              </div>
            </div>
          </button>

          <button
            class="option-card"
            :class="{ selected: selectedLevel === 'avancado' }"
            @click="selectLevel('avancado')"
          >
            <div class="option-left">
              <div class="icon-circle">★</div>

              <div class="text-group">
                <strong>Avançado</strong>
                <span>(joga a + de 3 anos)</span>
              </div>
            </div>

            <div class="check">
              <div class="radio" :class="{ active: selectedLevel === 'avancado' }">
                <span v-if="selectedLevel === 'avancado'">✓</span>
              </div>
            </div>
          </button>
        </div>

        <div class="actions">
          <button class="back-button" @click="goBack">‹</button>

          <button
            class="next-button"
            :disabled="!selectedLevel"
            @click="goNext"
          >
            Próxima etapa <span>→</span>
          </button>
        </div>
      </section>
    </main>
    <footer class="footer-simple">
  © 2026 Racket Advisor. Todos os direitos reservados. Software <strong>Goettenauer</strong>.
</footer>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()

const logoPath = '/images/logo-ama.png'
const selectedLevel = ref('')

onMounted(() => {
  const savedLevel = localStorage.getItem('quiz_level')
  if (savedLevel) {
    selectedLevel.value = savedLevel
  }
})

function selectLevel(level) {
  selectedLevel.value = level
}

function goBack() {
  router.push('/')
}

function goNext() {
  if (!selectedLevel.value) return

  localStorage.setItem('quiz_level', selectedLevel.value)
  router.push('/estilo')
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
    linear-gradient(rgba(245, 247, 249, 0.90), rgba(245, 247, 249, 0.90)),
    url('/images/fundo-inicial.png') no-repeat right center;
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
  margin-top: 10px;
}

.center-block {
  width: 100%;
  max-width: 980px;
  text-align: center;
}

.step {
  margin: 0;
  color: #19889a;
  font-size: 20px;
  font-weight: 700;
  letter-spacing: 0.5px;
}

h1 {
  margin: 8px 0 0;
  font-size: 82px;
  line-height: 0.95;
  font-weight: 900;
  color: #0d1624;
}

h1 span {
  color: #1f95a8;
}

.subtitle {
  margin: 16px 0 0;
  font-size: 24px;
  color: #5a6472;
}

.progress-wrap {
  position: relative;
  width: 100%;
  max-width: 1030px;
  margin: 38px auto 0;
  display: flex;
  justify-content: center;
  align-items: center;
}

.progress-line {
  width: 100%;
  height: 8px;
  background: #d8dde3;
  border-radius: 999px;
  overflow: hidden;
}

.progress-fill {
  width: 22%;
  height: 100%;
  background: linear-gradient(90deg, #1ba8b7, #2576c7);
  border-radius: 999px;
}

.progress-icon {
  position: absolute;
  width: 64px;
  height: 64px;
  border-radius: 50%;
  background: #ffffff;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 28px;
  color: #19889a;
}

h2 {
  margin: 42px 0 0;
  font-size: 30px;
  font-weight: 500;
  color: #141c28;
}

h2 span {
  color: #1d7f94;
  font-weight: 700;
}

.options {
  margin: 28px auto 0;
  max-width: 860px;
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.option-card {
  width: 100%;
  border: 1.5px solid transparent;
  border-radius: 20px;
  background: rgba(255, 255, 255, 0.95);
  padding: 18px 26px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  cursor: pointer;
  transition: 0.2s ease;
  text-align: left;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
}

.option-card:hover {
  transform: translateY(-1px);
  box-shadow: 0 8px 22px rgba(0, 0, 0, 0.08);
}

.option-card.selected {
  border-color: #2aa7bc;
  background: rgba(238, 248, 251, 0.95);
  box-shadow: 0 10px 24px rgba(42, 167, 188, 0.12);
}

.option-left {
  display: flex;
  align-items: center;
  gap: 24px;
}

.icon-circle {
  width: 78px;
  height: 78px;
  border-radius: 50%;
  background: #e7f1f3;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 32px;
}

.text-group {
  display: flex;
  flex-direction: column;
}

.text-group strong {
  font-size: 24px;
  color: #111926;
}

.text-group span {
  margin-top: 4px;
  font-size: 18px;
  color: #707989;
}

.check {
  display: flex;
  align-items: center;
  justify-content: center;
}

.radio {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  border: 3px solid #cfd6df;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-size: 18px;
  font-weight: 700;
  background: transparent;
}

.radio.active {
  background: #18a3b5;
  border-color: #18a3b5;
}

.actions {
  max-width: 860px;
  margin: 34px auto 0;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.back-button {
  width: 64px;
  height: 64px;
  border-radius: 16px;
  border: 1px solid #d7dce3;
  background: rgba(255, 255, 255, 0.95);
  font-size: 40px;
  color: #177f93;
  cursor: pointer;
  box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
}

.next-button {
  min-width: 430px;
  height: 76px;
  border: none;
  border-radius: 20px;
  background: linear-gradient(90deg, #18b0b4, #197ab8);
  color: white;
  font-size: 22px;
  font-weight: 500;
  cursor: pointer;
  box-shadow: 0 10px 24px rgba(24, 154, 184, 0.22);
}

.next-button span {
  margin-left: 12px;
  font-size: 30px;
}

.next-button:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}

.footer-simple {
  position: absolute;
  bottom: 18px;
  left: 0;
  width: 100%;
  text-align: center;
  font-size: 14px;
  color: #7d8794;
  z-index: 2;
}

@media (max-width: 1200px) {
  .page {
    background-position: center right;
  }

  h1 {
    font-size: 62px;
  }

  .subtitle {
    font-size: 20px;
  }

  .text-group strong {
    font-size: 22px;
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
    font-size: 46px;
  }

  h2 {
    font-size: 24px;
  }

  .subtitle {
    font-size: 18px;
  }

  .option-left {
    gap: 14px;
  }

  .icon-circle {
    width: 58px;
    height: 58px;
    font-size: 24px;
  }

  .text-group strong {
    font-size: 20px;
  }

  .text-group span {
    font-size: 15px;
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