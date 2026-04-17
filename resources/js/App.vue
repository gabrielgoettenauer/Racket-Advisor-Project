<template>
  <div class="page">
    <img class="watermark" :src="logoPath" alt="AMA Sport" />

    <header class="topbar">
      <div class="logo-wrap">
        <img class="logo" :src="logoPath" alt="AMA Sport" />
      </div>

      <nav class="menu">
        <a href="#">Ama Sports</a>
        <a href="#">Play Like a PRO</a>
        <a href="#">Lançamentos</a>
      </nav>
    </header>

    <main class="hero-section">
      <section class="hero-left">
        <h1>BEM VINDO AO</h1>
        <h2>Racket Advisor!</h2>

        <p class="intro">
          Cansado de se sentir perdido na escolha<br>
          do seu material de beach tennis ?<br>
          Sentindo dores no braço ?<br>
          Não está rendendo como deveria ?
        </p>

        <p class="highlight">
          Descubra sua Raquete Ideal agora mesmo
        </p>

        <p class="partnership">
          Em parceria com AMA SPORT
        </p>

        <button class="discover-button" @click="nextPage">
          Quero descobrir
        </button>
      </section>

      <section class="hero-right">
        <img class="racket-image" :src="racketPath" alt="Beach Tennis" />
      </section>
    </main>

    <footer class="footer">
  © 2026 Racket Advisor • Em parceria com AMA Sport • Sistema de recomendação para beach tennis
</footer>
  </div>
</template>

<script setup>
const logoPath = '/images/logo-ama.png'
const racketPath = '/images/racket.png'
function nextPage() {
  alert('Agora vamos para a tela 2 👊')
}
</script>

<style>
:global(*) {
  box-sizing: border-box;
}

:global(body) {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background: #f3f3f3;
}

.page {
  position: relative;
  height: 100vh;
  overflow: hidden;
  background: #f3f3f3;
  padding: 24px 42px 32px 42px;
}

.watermark {
  position: absolute;
  inset: 0;
  margin: auto;
  width: 900px;
  max-width: 70vw;
  opacity: 0.025;
  filter: brightness(0);
  pointer-events: none;
  user-select: none;
}

.topbar {
  position: relative;
  z-index: 2;
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
}

.logo {
  width: 95px;
  height: auto;
  display: block;
  filter: brightness(0);
}

.menu {
  display: flex;
  gap: 44px;
  margin-top: 6px;
}

.menu a {
  text-decoration: none;
  color: #222;
  font-size: 14px;
  font-weight: 400;
}

.hero-section {
  position: relative;
  z-index: 2;
  max-width: 1420px;
  margin: 48px auto 0 auto;
  display: grid;
  grid-template-columns: 1.05fr 0.95fr;
  align-items: center;
  column-gap: 40px;
}

.hero-left {
  max-width: 720px;
}

.hero-left h1 {
  margin: 0;
  font-size: 78px;
  line-height: 0.95;
  font-weight: 900;
  color: #000;
  text-shadow: 0 6px 16px rgba(0, 0, 0, 0.16);
}

.hero-left h2 {
  margin: 14px 0 0 0;
  font-size: 72px;
  line-height: 1;
  font-weight: 300;
  color: #000;
}

.intro {
  margin-top: 38px;
  font-size: 20px;
  line-height: 1.22;
  color: #222;
}

.highlight {
  margin-top: 28px;
  font-size: 20px;
  color: #222;
}

.partnership {
  margin-top: 18px;
  font-size: 18px;
  color: #ababab;
}

.discover-button {
  margin-top: 18px;
  width: 265px;
  height: 54px;
  border: none;
  border-radius: 8px;
  background: #3396ea;
  color: #fff;
  font-size: 18px;
  cursor: pointer;
  box-shadow: 0 6px 14px rgba(51, 150, 234, 0.34);
  transition: transform 0.15s ease, box-shadow 0.15s ease;
}

.discover-button:hover {
  transform: translateY(-1px);
  box-shadow: 0 9px 18px rgba(51, 150, 234, 0.40);
}

.hero-right {
  display: flex;
  justify-content: center;
  align-items: center;
}

.racket-image {
  width: 320px;
  max-width: 100%;
  height: auto;
  filter: drop-shadow(0 12px 24px rgba(0, 0, 0, 0.10));
}

@media (max-width: 1200px) {
  .hero-section {
    grid-template-columns: 1fr;
    row-gap: 40px;
    margin-top: 36px;
  }

  .hero-left {
    max-width: 100%;
  }

  .hero-left h1 {
    font-size: 62px;
  }

  .hero-left h2 {
    font-size: 56px;
  }

  .intro,
  .highlight {
    font-size: 18px;
  }

  .partnership {
    font-size: 16px;
  }

  .hero-right {
    justify-content: center;
  }

  .racket-image {
    width: 250px;
  }
}

@media (max-width: 768px) {
  .page {
    padding: 18px 20px 28px 20px;
  }

  .topbar {
    flex-direction: column;
    gap: 16px;
  }

  .menu {
    gap: 18px;
    flex-wrap: wrap;
  }

  .hero-left h1 {
    font-size: 46px;
  }

  .hero-left h2 {
    font-size: 42px;
  }

  .intro,
  .highlight,
  .partnership {
    font-size: 16px;
  }

  .discover-button {
    width: 100%;
  }

  .watermark {
    width: 700px;
    max-width: 120vw;
  }
}

.footer {
  position: fixed;
  bottom: 12px;
  left: 0;
  width: 100%;
  text-align: center;
  font-size: 13px;
  color: #9b9b9b;
  z-index: 2;
}
</style>