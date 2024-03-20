<template>
  <div>
    <div class="code-header">
      <div class="code-button-box">
        <button class="dots"></button>
        <div class="code-header-text">
          Meine Skills
        </div>
      </div>
    </div>
    <div class="code-editor">
      <ul class="line-numbers"></ul>
      <pre ref="codeContentRef" class="content"><code class="language-javascript">
  function Skills() {
    let skills = [
      { skill: 'HTML5     ', level: 'Das was man für den Betrieb so braucht' },
      { skill: 'CSS3      ', level: 'Die notwendigsten Dinge (lerne da aber auch noch)' },
      { skill: 'Javascript', level: 'Das was ich brauche nicht mehr und nicht weniger' },
      { skill: 'PHP       ', level: 'Ich kann damit arbeiten und sicher anzeigen' },
      { skill: 'Vue.JS    ', level: 'Ein klein wenig, die Seite hier ist damit gemacht' }
    ];
  
    console.log(skills);
  }
  
  Skills();  
      </code></pre>
        
    </div>
  </div>
</template>

<script setup>
hljs.highlightAll();
import { onMounted, ref } from 'vue';

const codeContentRef = ref(null);

const adjustLineNumbersForBreakpoint = () => {
  if (!codeContentRef.value) return;

  const containerWidth = codeContentRef.value.offsetWidth;
  let estimatedLines = 17;
  if (containerWidth <= 800) {
    estimatedLines = 22;
  }
  if (containerWidth <= 700) {
    estimatedLines = 22;
  }
  if (containerWidth <= 600) {
    estimatedLines = 25;
  }
  if (containerWidth <= 500) {
    estimatedLines = 27;
  }
  if (containerWidth <= 450) {
    estimatedLines = 27;
  }
  if (containerWidth <= 400) {
    estimatedLines = 33;
  }
  if (containerWidth <= 300) {
    estimatedLines = 36;
  }
  if (containerWidth <= 275) {
    estimatedLines = 38;
  }
  // Anpassung für weitere Breakpoints

  const lineNumbers = document.querySelector('.line-numbers');
  lineNumbers.innerHTML = '';

  for (let i = 1; i <= estimatedLines; i++) {
    const li = document.createElement('li');
    li.textContent = i;
    lineNumbers.appendChild(li);
  }
};

onMounted(() => {
  adjustLineNumbersForBreakpoint();
  window.addEventListener('resize', adjustLineNumbersForBreakpoint);
  hljs.highlightAll();
});
</script>

<style scoped>

  .dots {
    position: relative;
    top: 2px;
    left: 2px;
    width: 110px;

    --red: #fc199a;
    --yellow: #ffcc00;
    --green: #61e2ff;
    --close: radial-gradient(circle, var(--red), var(--red) 7px, transparent 8px);
    --min: radial-gradient(circle, var(--yellow), var(--yellow) 7px, transparent 8px);
    --max: radial-gradient(circle, var(--green), var(--green) 7px, transparent 8px);
    background: var(--close) -28px no-repeat,
                var(--min) -2px no-repeat,
                var(--max) 24px no-repeat;
    filter: brightness(0.5);
    opacity: 0.75;
    cursor: pointer;
    border: none;
  }
  .code-header {
    display: inline-flex;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    border: 1px solid gray;
    margin: 0;
    width: 100%;
  }
  .code-button-box {
    display: flex;
    text-align: left;
    width: 100%;
    padding: 10px;
    margin: 0;
  }
  .code-header-text {
    position: relative;
    display: block;
    text-align: center;
    width: 100%;
    color: red;
    text-transform: uppercase;
    font-weight: 900;
    font-family: monospace;
    font-size: 18px;
  }
  .code-editor {
    display: flex;
    background-color:#652487;
    background-image:linear-gradient(160deg,#652487 0,#443ac3 35%,#0174b7 68%,#04988e 100%);
    color: #d4d4d4;
    font-family: 'Consolas', 'Monaco', monospace;
    border: 1px solid #3c3c3c;
    overflow: hidden;
    text-align: left;
    padding: 0 15px;
  }
  .hljs {
    background-color: transparent;
    background-image: none;
  }
  .line-numbers {
    list-style-type: none;
    padding: 0;
    margin: 0;
    background-color: transparent;
    color: #858585;
    text-align: right;
    padding-right: 10px; /* Beibehaltung des Abstands zwischen Zeilennummern und Code */
    user-select: none;
    flex-shrink: 0;
    font-size: 18px;
    line-height: 21px;
  }

  .line-numbers li {
    height: 21px; /* Angepasst an Zeilenhöhe */
  }

  .content {
    margin: 0;
    padding: 0; /* Entfernt jegliches Padding */
    overflow-x: auto;
    white-space: pre-wrap;
    word-break: break-all;
    font-size: 18px;
    line-height: 21px;
  }

  .content pre {
    margin: 0; /* Stellt sicher, dass kein Außenabstand vorhanden ist */
    padding: 0; /* Entfernt jegliches Padding */
  }

  .content code {
    display: block;
  }
</style>