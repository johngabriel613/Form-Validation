var password = document.querySelectorAll('.password')
var repeatPass = document.querySelector('.repeat-password')
var openPass = document.querySelectorAll('.eye1')
var closePass = document.querySelectorAll('.eye2')


for (i = 0; i < openPass.length; ++i) {
  openPass[i].addEventListener('click', () => {
        openEye(password[0])
        openEye(password[1])
        openEye(repeatPass)
  })
}
for (i = 0; i < closePass.length; ++i) {
    closePass[i].addEventListener('click', () => {
          closeEye(password[0])
          closeEye(password[1])
          closeEye(repeatPass)

    })
  }
function openEye(element){
    if(element.type == "password"){
        element.type ="text"
        for (i = 0; i < openPass.length; ++i) {
            openPass[i].style.display = "none"
            }
        }
        for (i = 0; i < closePass.length; ++i) {
            closePass[i].style.display = "block"
        }
}
function closeEye(element){
    if(element.type == "text"){
        element.type = "password"
        for (i = 0; i < openPass.length; ++i) {
            openPass[i].style.display = "block"
            }
        }
        for (i = 0; i < closePass.length; ++i) {
            closePass[i].style.display = "none"
        }
}


const login = document.querySelectorAll('.wrapper span')
const wrapper = document.querySelectorAll('.wrapper')

login[0].addEventListener('click', () => {
    wrapper[0].classList.add('active')
    wrapper[1].classList.add('active')
})

login[1].addEventListener('click', () => {
    wrapper[0].classList.remove('active')
    wrapper[1].classList.remove('active')
})


const lastName = document.querySelector('.last-name')
const firstName = document.querySelector('.first-name')
const middleName = document.querySelector('.middle-name')
const courseID = document.querySelector('.course-id')
const emailInput = document.querySelectorAll('.email')
const passwordInput = document.querySelectorAll('.password')
const confirmPasswordInput = document.querySelector('.repeat-password')
const form = document.querySelectorAll('.form')
const field = document.querySelector('.field')

form[0].addEventListener('submit', (e) =>{

    validateLogin()
    e.preventDefault()

})

form[1].addEventListener('submit', (e) =>{

    validateSignup()
    e.preventDefault()

})

function validateLogin(){
    //email
    if(emailInput[0].value.trim()==''){
        setError(emailInput[0], '*Email can not be empty')
    }else if(isEmailValid(emailInput[0].value)){
        setSuccess(emailInput[0])
    }
    else{
        setError(emailInput[0], '*Please enter a valid email address')
    }

    //password
    if(passwordInput[0].value.trim()==''){
        setError(passwordInput[0], '*Password can not be empty')
    }else if(passwordInput[0].value.trim().length <= 6){
        setError(passwordInput[0], '*Password must have minimum of 6 characters')
    }else if(passwordInput[0].value.trim().length >= 24){
        setError(passwordInput[0], '*Password must have maximum of 24 characters')
    }else{
        setSuccess(passwordInput[0])
    }

    
}

function validateSignup(){
//Last name
if(lastName.value.trim()==''){
    setError(lastName, '*Last name is required')
}else if(isNameValid(lastName.value)){
    setError(lastName, '*Last name must not contain numbers')
}else{
    setSuccess(lastName)
}

//First name
if(firstName.value.trim()==''){
    setError(firstName, '*First name is required')
}else if(isNameValid(firstName.value)){
    setError(firstName, '*First name must not contain numbers')
}else{
    setSuccess(firstName)
}

//Middle name
if(middleName.value.trim()==''){
    setError(middleName, '*Middle name is required')
}else if(isNameValid(middleName.value)){
    setError(middleName, '*Middle name must not contain numbers')
}else{
    setSuccess(middleName)
}

//Course ID
if(courseID.value.trim()== ''){
    setError(courseID, '*Course ID is required')
}else{
    setSuccess(courseID)
}

//email
if(emailInput[1].value.trim()==''){
    setError(emailInput[1], '*Email can not be empty')
}else if(isEmailValid(emailInput[1].value)){
    setSuccess(emailInput[1])
}
else{
    setError(emailInput[1], '*Please enter a valid email address')
}

//password
if(passwordInput[1].value.trim()==''){
    setError(passwordInput[1], '*Password can not be empty')
}else if(passwordInput[1].value.trim().length <= 6){
    setError(passwordInput[1], '*Password must have minimum of 6 characters')
}else if(passwordInput[1].value.trim().length >= 24){
    setError(passwordInput[1], '*Password must have maximum of 24 characters')
}else{
    setSuccess(passwordInput[1])
}

//repeat password
if(confirmPasswordInput.value.trim()== ''){
    setError(confirmPasswordInput, '*Password do not match')
}else if(confirmPasswordInput.value == passwordInput[1].value){
    setSuccess(confirmPasswordInput)
}else{
    setError(confirmPasswordInput, '*Password do not match')
}
}



function setError(element, errorMessage){
    const parent = element.parentElement
    if(parent.classList.contains('success')){
        parent.classList.remove('success')
    }
    parent.classList.add('error')
    paragraph = parent.querySelector('p')
    paragraph.textContent = errorMessage
}

function setSuccess(element){
    const parent = element.parentElement
    if(parent.classList.contains('error')){
        parent.classList.remove('error')
    }
    parent.classList.add('success')
}

function isEmailValid(email){
    const reg =  /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    return reg.test(email)
}

function isNameValid(name){
    const hasNumber = /\d+/
    return hasNumber.test(name)
}

