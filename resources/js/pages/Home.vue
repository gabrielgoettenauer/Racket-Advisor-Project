<template>
  <div class="page">
    <img class="watermark" :src="logoPath" alt="AMA Sport" />

    <header class="topbar">
      <img class="logo" :src="logoPath" alt="AMA Sport" />

      <nav class="menu">
        <a href="#">Ama Sports</a>
        <a href="#">Play Like a PRO</a>
        <a href="#">Lançamentos</a>
      </nav>
    </header>

    <main class="hero-section">
      <section class="hero-left">
        <h1>BEM VINDO AO</h1>
        <h2>RACKET ADVISOR!</h2>

        <div class="accent-line"></div>

        <p class="intro">
          Cansado de se sentir perdido na escolha<br>
          do seu material de beach tennis?<br>
          Sentindo dores no braço?<br>
          Não está rendendo como deveria?
        </p>

        <p class="highlight">
          Descubra sua Raquete Ideal agora mesmo
        </p>

        <div class="partnership-row">
          <span class="handshake">🤝</span>
          <p class="partnership">
            Em parceria com <strong>AMA SPORT</strong>
          </p>
        </div>

        <button class="discover-button" @click="nextPage">
          Quero descobrir <span>→</span>
        </button>

        <div class="benefits-card">
          <div class="benefit">
            <div class="benefit-icon">🎯</div>
            <div class="benefit-text">
              <strong>RECOMENDAÇÃO</strong>
              <span>PERSONALIZADA</span>
            </div>
          </div>

          <div class="divider"></div>

          <div class="benefit">
            <div class="benefit-icon">🛡️</div>
            <div class="benefit-text">
              <strong>ESCOLHA COM</strong>
              <span>SEGURANÇA</span>
            </div>
          </div>

          <div class="divider"></div>

          <div class="benefit">
            <div class="benefit-icon">📈</div>
            <div class="benefit-text">
              <strong>MAIS DESEMPENHO</strong>
              <span>EM QUADRA</span>
            </div>
          </div>
        </div>
      </section>
    </main>

    <footer class="footer-simple">
  © 2026 Racket Advisor. Todos os direitos reservados. Software <strong>Goettenauer</strong>.
</footer>
  </div>
</template>

<script setup>
import { useRouter } from 'vue-router'

const router = useRouter()
const logoPath = '/images/logo-ama.png'

function nextPage() {
  router.push('/nivel')
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
    linear-gradient(rgba(245, 247, 249, 0.86), rgba(245, 247, 249, 0.86)),
    url('/images/fundo-inicial.png') no-repeat right center;
  background-size: cover;
  padding: 24px 42px 0;
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
  justify-content: space-between;
  align-items: center;
}

.logo {
  width: 95px;
  filter: brightness(0);
}

.menu {
  display: flex;
  gap: 44px;
}

.menu a {
  text-decoration: none;
  color: #1f2937;
  font-size: 14px;
  font-weight: 500;
}

.hero-section {
  position: relative;
  z-index: 2;
  max-width: 1480px;
  margin: 36px auto 0;
}

.hero-left {
  max-width: 780px;
}

.hero-left h1 {
  margin: 0;
  font-size: 84px;
  line-height: 0.95;
  font-weight: 900;
  color: #0d1726;
}

.hero-left h2 {
  margin: 8px 0 0;
  font-size: 86px;
  line-height: 0.95;
  font-weight: 900;
  background: linear-gradient(90deg, #1d8797, #16b0bb, #2970c8);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.accent-line {
  width: 72px;
  height: 6px;
  border-radius: 999px;
  background: #20a8b7;
  margin-top: 24px;
}

.intro {
  margin-top: 30px;
  font-size: 27px;
  line-height: 1.25;
  color: #1f2937;
}

.highlight {
  margin-top: 28px;
  font-size: 24px;
  font-weight: 700;
  color: #18212f;
}

.partnership-row {
  margin-top: 22px;
  display: flex;
  align-items: center;
  gap: 12px;
}

.handshake {
  font-size: 34px;
}

.partnership {
  margin: 0;
  font-size: 20px;
  color: #7a8594;
}

.partnership strong {
  color: #1c8ea1;
}

.discover-button {
  margin-top: 26px;
  width: 420px;
  height: 72px;
  border: none;
  border-radius: 16px;
  background: linear-gradient(90deg, #17b0b4, #1483b2);
  color: white;
  font-size: 24px;
  font-weight: 700;
  cursor: pointer;
  box-shadow: 0 12px 26px rgba(21, 144, 181, 0.24);
}

.discover-button span {
  margin-left: 12px;
  font-size: 30px;
}

.benefits-card {
  margin-top: 34px;
  width: 760px;
  max-width: 100%;
  background: rgba(255, 255, 255, 0.92);
  border-radius: 24px;
  padding: 22px 28px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  box-shadow: 0 10px 26px rgba(0, 0, 0, 0.08);
}

.benefit {
  display: flex;
  align-items: center;
  gap: 14px;
}

.benefit-icon {
  font-size: 30px;
}

.benefit-text {
  display: flex;
  flex-direction: column;
}

.benefit-text strong,
.benefit-text span {
  font-size: 15px;
  color: #1f2937;
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
  .hero-left h1 {
    font-size: 64px;
  }

  .hero-left h2 {
    font-size: 66px;
  }

  .intro {
    font-size: 22px;
  }

  .benefits-card {
    width: 100%;
    flex-direction: column;
    align-items: flex-start;
    gap: 18px;
  }

}

@media (max-width: 900px) {
  .page {
    padding: 18px 20px 110px;
  }

  .topbar {
    flex-direction: column;
    gap: 16px;
    align-items: flex-start;
  }

  .menu {
    flex-wrap: wrap;
    gap: 16px;
  }

  .hero-left h1 {
    font-size: 48px;
  }

  .hero-left h2 {
    font-size: 50px;
  }

  .intro {
    font-size: 18px;
  }

  .highlight {
    font-size: 20px;
  }

  .discover-button {
    width: 100%;
    font-size: 22px;
  }

}
</style>