const authModal = document.querySelector('.auth-modal')
const loginLink = document.querySelector('.login-link')
const registerLink = document.querySelector('.register-link')

const profileBox = document.querySelector('.profile-box')
const avatarCircle = document.querySelector('.avatar-circle')

const alertBox = document.querySelector('.alert-box')





registerLink.addEventListener('click', () => authModal.classList.add('slide'));
loginLink.addEventListener('click', () => authModal.classList.remove('slide'));

if(avatarCircle)avatarCircle.addEventListener('click', () => profileBox.classList.toggle('show'))

if(alertBox){
setTimeout(() => alertBox.classList.add('show'), 50)

setTimeout(() => {
    alertBox.classList.remove('show');
    setTimeout(() => alertBox.remove(), 1000)
}, 6000)
}