var password = document.querySelector('.password')
var openEye = document.querySelector('.eye1')
var closeEye = document.querySelector('.eye2')

openEye.addEventListener('click', () => {
    showPass(password)
})

closeEye.addEventListener('click', () => {
    showPass(password)
})

function showPass(element){
    if(element.type == "password"){
        element.type="text"
        openEye.style.display = "none"
        closeEye.style.display = "block"
    }else{
        element.type="password"
        openEye.style.display = "block"
        closeEye.style.display = "none"
    }
}

const emailInput = document.querySelector('.email')
const passwordInput =document.querySelector('.password')
const field = document.querySelectorAll('.field')

emailInput.addEventListener('focus', () => {
    if(!emailInput.value){
        field[0].classList.add('fill')
    }
})

emailInput.addEventListener('blur', () => {
    if(!emailInput.value){
        field[0].classList.remove('fill')
    }
})

passwordInput.addEventListener('focus', () => {
    if(!passwordInput.value){
        field[1].classList.add('fill')
    }
})

passwordInput.addEventListener('blur', () => {
    if(!passwordInput.value){
        field[1].classList.remove('fill')
    }
})

