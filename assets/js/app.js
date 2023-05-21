let viewport = document.getElementById("viewport").offsetWidth //ширина слайдера
let btnNext = document.getElementById("next") //вперед
let btnPrev = document.getElementById("prev") //назад
let slider = document.querySelector("div.slider") //сам слайдер
let index = 0

function next() {
  if (index < 4) { 
    index++
  } else {
    index = 0
  }
  slider.style.left = -index * viewport + "px"
}
// функция выполнения кнопки вперед

function prev() {
  if (index > 0) {
    index--;
  } else { 
    index = 4;
  }
  slider.style.left = -index * viewport + "px"
}

// функция выполнения кнопки назад

window.addEventListener('DOMContentLoaded', () => setInterval(() => next(), 3500))
// перелистывание слайдера автоматически
 
btnNext.addEventListener("click", () => next())

 
btnPrev.addEventListener("click", () => prev())