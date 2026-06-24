
function showSection(sectionID) {

    const sections = document.querySelectorAll(".section");

  
    sections.forEach(section => {
        section.style.display = "none";
    });


    const activeSection = document.getElementById(sectionID);

    if (activeSection) {
        activeSection.style.display = "block";
    }
}


function goHome() {

    const sections = document.querySelectorAll(".section");

    sections.forEach(section => {
        section.style.display = "none";
    });

    document.getElementById("home").style.display = "block";
}



window.addEventListener("DOMContentLoaded", function () {

    const clearBtn = document.getElementById("clrbtn");

    if (clearBtn) {
        clearBtn.addEventListener("click", function () {
            document.getElementById("studentForm").reset();
        });
    }


    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.get("status") === "success") {

        const toast = document.getElementById("success-toast");

        if (toast) {
            toast.classList.remove("toast-hidden");

            setTimeout(() => {
                toast.style.opacity = "0";

                setTimeout(() => {
                    toast.classList.add("toast-hidden");
                    toast.style.opacity = "1";
                }, 500);

            }, 3000);
        }


        window.history.replaceState({}, document.title, window.location.pathname);
    }

 
    goHome();
});