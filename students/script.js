//for sign-in and log-in switching of container :)  
    document.addEventListener("DOMContentLoaded", function() {
        var logInCont = document.getElementById("log-incont");
        var signUpCont = document.getElementById("sign-incont");

    function togglePages() {

        if (logInCont.style.display === "none") {
            logInCont.style.display = "flex";
        } else {
            logInCont.style.display = "none";
        }

        if (signUpCont.style.display === "none") {
            signUpCont.style.display = "flex";
        } else {
            signUpCont.style.display = "none";
        }
    }
    var createAcctLink = document.querySelector(".logInbutton");
        if (createAcctLink) {
            createAcctLink.addEventListener("click", togglePages);
        }
    }
);

// for Home hero image
    document.addEventListener("DOMContentLoaded", function () {
    setInterval(function () {
        var bckground = document.getElementById("imgSchool").style.backgroundImage;
            if (bckground.includes("school.png")) {
                document.getElementById("imgSchool").style.backgroundImage = "url(media/school2.png)";
            } 
            else if (bckground.includes("school2.png")){
                document.getElementById("imgSchool").style.backgroundImage = "url(media/school3.png)";
            }
            else {
            document.getElementById("imgSchool").style.backgroundImage = "url(media/school.png)";
            }
        }, 5000);
    }
);
// for SIGN_IN AND LOG_IN ID STUDENT
    document.addEventListener('DOMContentLoaded', function () {
        var studentIDInput = document.getElementById('studentIDInput');

        studentIDInput.addEventListener('input', function () {
            if (!this.value.startsWith('20')) {
                this.value = '20' + this.value;
            }
        });
    });
//for prompting message 
    document.addEventListener('DOMContentLoaded', function () {
        const signInForm = document.querySelector('#sign-incont');
        const signInPasswordInput = document.querySelector('#sign-incont input[name="sign_in_password"]');
        const signInConfirmPasswordInput = document.querySelector('#sign-incont input[name="sign_in_confirmPassword"]');
    
        signInForm.addEventListener('submit', function (event) {
            if (signInPasswordInput.value.length < 8 || signInConfirmPasswordInput.value.length < 8) {
                event.preventDefault();
                alert("Your password must be at least 8 characters long.");
            } else if (signInPasswordInput.value !== signInConfirmPasswordInput.value) {
                event.preventDefault();
                alert("Passwords do not match.");
            }
        });
    });
    
        
/* Judel's script */
document.addEventListener("DOMContentLoaded", function () {
    var g = document.getElementById("rowrowyourboat");

    function f() {
        if (g.style.transform === "translateY(-110%)" || g.style.transform === "") {
            g.style.transform = "translateY(0)";
        } else {
            g.style.transform = "translateY(-110%)";
        }
    }

    var buttonStep1 = document.getElementById("step-1");
    var buttonX = document.getElementById("close-button-enroll");

    if (buttonStep1) {
        buttonStep1.addEventListener("click", f);
    }

    if(buttonX) {
        buttonX.addEventListener("click", f)
    }
});


function modalClose(){
    
    var l = document.getElementById("modal-box");
    var g = document.getElementById("rowrowyourboat");

    if(l.style.display === "none" || l.style.display === "") {
        l.style.display = "block";
    }else {
        l.style.display = "none";
        g.style.transform = "translateY(-110%)";
    }

}