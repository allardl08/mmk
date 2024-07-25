const signUpButton=document.getElementById('signUpButton');
const signInButton=document.getElementById('signInButton');
const signInForm=document.getElementById('signIn');
const signUpForm=document.getElementById('signup');

signUpButton.addEventListener('click',function(){
    signInForm.style.display="none";
    signUpForm.style.display="block";
})
signInButton.addEventListener('click', function(){
    signInForm.style.display="block";
    signUpForm.style.display="none";
})
// Define the handleCredentialResponse function
function handleCredentialResponse(response) {
    try {
        console.log('Google Sign-In response received.');
        const data = jwt_decode(response.credential);
        console.log('Decoded JWT data:', data);

        // Store user data in cookies (if needed)
        Cookies.set('userData', JSON.stringify(data));

        // Redirect to homepage
        window.location.href = 'homepage.php';
    } catch (error) {
        console.error('Error handling Google Sign-In response:', error);
    }
}

// Make sure to include any other JavaScript code you need here