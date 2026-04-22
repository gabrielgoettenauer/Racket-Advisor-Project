<template>
  <div class="page">
    <img class="watermark" :src="logoPath" alt="AMA Sport" />

    <header class="topbar">
      <img class="logo" :src="logoPath" alt="AMA Sport" />
    </header>

    <main class="content">
      <section class="center-block">
        <div class="top-icon">👤</div>

        <h1>
          Analisando <span>seu perfil...</span>
        </h1>

        <p class="step">Passo 2 de 6</p>

        <div class="progress-wrap">
          <div class="progress-line">
            <div class="progress-fill"></div>
          </div>
          <div class="progress-dot"></div>
        </div>

        <h2>
          Seu <span>estilo</span> em quadra
        </h2>

        <div class="question-block">
          <div class="question-title">
            <span class="question-icon">🎯</span>
            <p>Seu jogo é mais focado em...</p>
          </div>

          <div class="options-grid">
            <button
              class="option-card"
              :class="{ selected: selectedStyle === 'ataque-aereo' }"
              @click="selectStyle('ataque-aereo')"
            >
              <div class="option-left">
                <div class="icon-circle">🏐</div>
                <div class="text-group">
                  <strong>Ataque Aéreo</strong>
                  <span>(Smash, Voleio agressivo)</span>
                </div>
              </div>

              <div class="check">
                <div class="radio" :class="{ active: selectedStyle === 'ataque-aereo' }">
                  <span v-if="selectedStyle === 'ataque-aereo'">✓</span>
                </div>
              </div>
            </button>

            <button
              class="option-card"
              :class="{ selected: selectedStyle === 'giro-volume' }"
              @click="selectStyle('giro-volume')"
            >
              <div class="option-left">
                <div class="icon-circle">📊</div>
                <div class="text-group">
                  <strong>Gosto de Volume</strong>
                  <span>(Slice, Topspin)</span>
                </div>
              </div>

              <div class="check">
                <div class="radio" :class="{ active: selectedStyle === 'giro-volume' }">
                  <span v-if="selectedStyle === 'giro-volume'">✓</span>
                </div>
              </div>
            </button>

            <button
              class="option-card"
              :class="{ selected: selectedStyle === 'toque-defesa' }"
              @click="selectStyle('toque-defesa')"
            >
              <div class="option-left">
                <div class="icon-circle">🛡️</div>
                <div class="text-group">
                  <strong>Toques e Defesa</strong>
                  <span>(Drop-shot, Lob)</span>
                </div>
              </div>

              <div class="check">
                <div class="radio" :class="{ active: selectedStyle === 'toque-defesa' }">
                  <span v-if="selectedStyle === 'toque-defesa'">✓</span>
                </div>
              </div>
            </button>
          </div>
        </div>

        <div class="question-block second">
          <div class="question-title">
            <span class="question-icon">🎯</span>
            <p>Com que frequência você acerta o <span>sweet spot</span> (centro da raquete)?</p>
          </div>

          <div class="options-grid">
            <button
              class="option-card"
              :class="{ selected: selectedSweetSpot === 'quase-sempre' }"
              @click="selectSweetSpot('quase-sempre')"
            >
              <div class="option-left">
                <div class="icon-circle">🎯</div>
                <div class="text-group">
                  <strong>Quase sempre</strong>
                </div>
              </div>

              <div class="check">
                <div class="radio" :class="{ active: selectedSweetSpot === 'quase-sempre' }">
                  <span v-if="selectedSweetSpot === 'quase-sempre'">✓</span>
                </div>
              </div>
            </button>

            <button
              class="option-card"
              :class="{ selected: selectedSweetSpot === 'maioria-das-vezes' }"
              @click="selectSweetSpot('maioria-das-vezes')"
            >
              <div class="option-left">
                <div class="icon-circle">📊</div>
                <div class="text-group">
                  <strong>Na maioria das vezes</strong>
                </div>
              </div>

              <div class="check">
                <div class="radio" :class="{ active: selectedSweetSpot === 'maioria-das-vezes' }">
                  <span v-if="selectedSweetSpot === 'maioria-das-vezes'">✓</span>
                </div>
              </div>
            </button>

            <button
              class="option-card"
              :class="{ selected: selectedSweetSpot === 'raramente' }"
              @click="selectSweetSpot('raramente')"
            >
              <div class="option-left">
                <div class="icon-circle">✖</div>
                <div class="text-group">
                  <strong>Raramente</strong>
                  <span>(Precisa de sweet spot grande)</span>
                </div>
              </div>

              <div class="check">
                <div class="radio" :class="{ active: selectedSweetSpot === 'raramente' }">
                  <span v-if="selectedSweetSpot === 'raramente'">✓</span>
                </div>
              </div>
            </button>
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
import { computed, onMounted, ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()

const logoPath = '/images/logo-ama.png'

const selectedStyle = ref('')
const selectedSweetSpot = ref('')

onMounted(() => {
  const savedStyle = localStorage.getItem('quiz_style')
  const savedSweetSpot = localStorage.getItem('quiz_sweet_spot')

  if (savedStyle) selectedStyle.value = savedStyle
  if (savedSweetSpot) selectedSweetSpot.value = savedSweetSpot
})

const canProceed = computed(() => {
  return selectedStyle.value && selectedSweetSpot.value
})

function selectStyle(value) {
  selectedStyle.value = value
}

function selectSweetSpot(value) {
  selectedSweetSpot.value = value
}

function goBack() {
  router.push('/nivel')
}

function goNext() {
  if (!canProceed.value) return

  localStorage.setItem('quiz_style', selectedStyle.value)
  localStorage.setItem('quiz_sweet_spot', selectedSweetSpot.value)

  router.push('/lesao')
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
  margin-top: 8px;
}

.center-block {
  width: 100%;
  max-width: 1120px;
  text-align: center;
}

.top-icon {
  width: 64px;
  height: 64px;
  margin: 0 auto 14px;
  border-radius: 18px;
  border: 1px solid #d9dee5;
  background: rgba(255, 255, 255, 0.72);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 28px;
  color: #19889a;
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
  width: 32%;
  height: 100%;
  background: linear-gradient(90deg, #2ca0ff, #2978ff);
  border-radius: 999px;
}

.progress-dot {
  position: absolute;
  left: 32%;
  transform: translateX(-50%);
  width: 18px;
  height: 18px;
  border-radius: 50%;
  background: #2b87ff;
  box-shadow: 0 0 0 4px rgba(43, 135, 255, 0.15);
}

h2 {
  margin: 46px 0 0;
  font-size: 34px;
  font-weight: 500;
  color: #141c28;
}

h2 span {
  color: #1d7f94;
  font-weight: 700;
}

.question-block {
  margin: 34px auto 0;
  max-width: 1040px;
}

.question-block.second {
  margin-top: 34px;
}

.question-title {
  display: flex;
  align-items: center;
  gap: 14px;
  margin-bottom: 16px;
  text-align: left;
}

.question-title p {
  margin: 0;
  font-size: 22px;
  color: #2d3748;
}

.question-title p span {
  color: #1d7f94;
  font-weight: 700;
}

.question-icon {
  width: 56px;
  height: 56px;
  border-radius: 50%;
  background: #e8f1f2;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 26px;
}

.options-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 18px;
}

.option-card {
  border: 1.5px solid transparent;
  border-radius: 20px;
  background: rgba(255, 255, 255, 0.96);
  padding: 18px 20px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  cursor: pointer;
  transition: 0.2s ease;
  text-align: left;
  min-height: 126px;
  box-shadow: 0 6px 16px rgba(0, 0, 0, 0.04);
}

.option-card:hover {
  transform: translateY(-1px);
  box-shadow: 0 10px 22px rgba(0, 0, 0, 0.08);
}

.option-card.selected {
  border-color: #4b9dff;
  background: rgba(235, 244, 255, 0.96);
  box-shadow: 0 10px 24px rgba(75, 157, 255, 0.12);
}

.option-left {
  display: flex;
  align-items: center;
  gap: 18px;
}

.icon-circle {
  width: 70px;
  height: 70px;
  border-radius: 50%;
  background: #edf3f5;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 28px;
  color: #1d7f94;
  flex-shrink: 0;
}

.text-group {
  display: flex;
  flex-direction: column;
}

.text-group strong {
  font-size: 20px;
  color: #1a2432;
}

.text-group span {
  margin-top: 4px;
  font-size: 16px;
  color: #6d7684;
}

.check {
  margin-left: 16px;
}

.radio {
  width: 34px;
  height: 34px;
  border-radius: 50%;
  border: 3px solid #cfd6df;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-size: 17px;
  font-weight: 700;
  background: transparent;
}

.radio.active {
  background: #2b87ff;
  border-color: #2b87ff;
}

.actions {
  max-width: 1040px;
  margin: 34px auto 0;
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
  min-width: 460px;
  height: 82px;
  border: none;
  border-radius: 20px;
  background: linear-gradient(90deg, #2c9cff, #256ef1);
  color: white;
  font-size: 24px;
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

  .options-grid {
    grid-template-columns: 1fr;
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

  .question-title {
    align-items: flex-start;
  }

  .question-title p {
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
    font-size: 18px;
  }

  .text-group span {
    font-size: 14px;
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