let close_modal = document.querySelector(".close_modal"),
edit_modal = document.querySelector(".edit_modal");

let close = document.querySelector(".close")
close.addEventListener("click", (e) => {
    e.preventDefault();
    close_modal.classList.toggle("hidden")
})

