<template>
  <div>
    <div class="code-header">
      <div class="code-button-box">
        <button class="dots"></button>
        <div class="code-header-text">
          404 Error
        </div>
      </div>
    </div>
    <div class="code-editor">
      <ul class="line-numbers"></ul>
      <pre class="content"><code>
  function showPage() {
    console.log("
      404 Error!!! 
      Seite konnte nicht gerendert werden. 
      Ob Sie jemals existiert hat wei&szlig; ich nicht.
    ")
  }
  showPage();
        </code></pre>
        
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
const addLineNumbers = () => {
  const codeContent = document.querySelector('.content code');
  if (codeContent) {
    const lines = codeContent.innerText.split('\n').length;
    const lineNumbers = document.querySelector('.line-numbers');

    for (let i = 1; i <= lines; i++) {
      const li = document.createElement('li');
      li.textContent = i;
      lineNumbers.appendChild(li);
    }
  }
};
onMounted(() => {
  addLineNumbers();
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
    background-color: #1e1e1e;
    color: #d4d4d4;
    font-family: 'Consolas', 'Monaco', monospace;
    border: 1px solid #3c3c3c;
    overflow: hidden;
    text-align: left;
    padding: 0 15px;
  }

  .line-numbers {
    list-style-type: none;
    padding: 0;
    margin: 0;
    background-color: #1e1e1e;
    color: #858585;
    text-align: right;
    padding-right: 10px; /* Beibehaltung des Abstands zwischen Zeilennummern und Code */
    user-select: none;
    flex-shrink: 0;
    font-size: 36px;
    line-height: 48px;
  }

  .line-numbers li {
    height: 36px; /* Angepasst an Zeilenhöhe */
  }

  .content {
    margin: 0;
    padding: 0; /* Entfernt jegliches Padding */
    overflow-x: auto;
    white-space: pre-wrap;
    word-break: normal;
    font-size: 36px;
    line-height: 48px;
  }

  .content pre {
    margin: 0; /* Stellt sicher, dass kein Außenabstand vorhanden ist */
    padding: 0; /* Entfernt jegliches Padding */
  }

  .content code {
    display: block;
  }
</style>