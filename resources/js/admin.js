let tabs = document.querySelectorAll(".tab");


for (let index = 0; index < tabs.length; index++) {
    const tab = tabs[index];
    tab.addEventListener("click", () => {

        if (!tab.classList.contains("active")) {
            tab.classList.toggle("active")

        }
        else{
            tab.classList.remove("active")


        }
    })

}
