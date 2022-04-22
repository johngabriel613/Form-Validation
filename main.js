var x = document.querySelectorAll('.password')
var y = document.querySelectorAll('.eye1')
var z = document.querySelectorAll('.eye2')


y[0].addEventListener('click', () => {
    x[0].type = "text"
    y[0].style.display = "none"
    z[0].style.display = "block"
})

z[0].addEventListener('click', () => {
    x[0].type = "password"
    y[0].style.display = "block"
    z[0].style.display = "none"
})


y[1].addEventListener('click', () => {
    x[1].type = "text"
    y[1].style.display = "none"
    z[1].style.display = "block"
})

z[1].addEventListener('click', () => {
    x[1].type = "password"
    y[1].style.display = "block"
    z[1].style.display = "none"
})

y[2].addEventListener('click', () => {
    x[2].type = "text"
    y[2].style.display = "none"
    z[2].style.display = "block"
})

z[2].addEventListener('click', () => {
    x[2].type = "password"
    y[2].style.display = "block"
    z[2].style.display = "none"
})

const login = document.querySelectorAll('.wrapper span')
const form = document.querySelectorAll('.wrapper')

login[0].addEventListener('click', () => {
    form[0].classList.add('active')
    form[1].classList.add('active')
})

login[1].addEventListener('click', () => {
    form[0].classList.remove('active')
    form[1].classList.remove('active')
})