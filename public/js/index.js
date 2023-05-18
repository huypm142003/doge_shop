let slide_index = 0;
let slide_play = true;
let slides = document.querySelectorAll(".slide");

hideAllSlide = () => {
    slides.forEach((e) => {
        e.classList.remove("active");
    });
};

showSlide = () => {
    hideAllSlide();
    if (slides[slide_index]) {
        slides[slide_index].classList.add("active");
    }
};

nextSlide = () =>
    (slide_index = slide_index + 1 === slides.length ? 0 : slide_index + 1);

prevSlide = () =>
    (slide_index = slide_index - 1 < 0 ? slides.length - 1 : slide_index - 1);

const slide = document.querySelector(".slider");
if (slide) {
    slide.addEventListener("mouseover", () => (slide_play = false));
    slide.addEventListener("mouseleave", () => (slide_play = true));
}

let slide_next = document.querySelector(".slide-next");
if (slide_next) {
    slide_next.addEventListener("click", () => {
        nextSlide();
        showSlide();
    });
}

let slide_prev = document.querySelector(".slide-prev");
if (slide_prev) {
    slide_prev.addEventListener("click", () => {
        prevSlide();
        showSlide();
    });
}

showSlide();

setInterval(() => {
    if (!slide_play) return;
    nextSlide();
    showSlide();
}, 3000);

let filter_col = document.querySelector("#filter-col");

let filter_toggle = document.querySelector("#filter-toggle");
if (filter_toggle) {
    filter_toggle.addEventListener("click", () =>
        filter_col.classList.toggle("active")
    );
}

let filter_close = document.querySelector("#filter-close");
if (filter_close) {
    filter_close.addEventListener("click", () =>
        filter_col.classList.toggle("active")
    );
}

document.querySelectorAll(".product-img-item").forEach((e) => {
    e.addEventListener("click", () => {
        let img = e.querySelector("img").getAttribute("src");
        document.querySelector("#product-img > img").setAttribute("src", img);
    });
});

// let view_all_description = document.querySelector("#view-all-description");
// if (view_all_description) {
//     view_all_description.addEventListener("click", () => {
//         let content = document.querySelector('.product-detail-description-content');
//         content.classList.toggle('active');
//         document.querySelector('#view-all-description').innerHTML = content.classList.contains('active') ? 'view less' : 'view all';
//     });
// }

document
    .querySelector("#mb-menu-toggle")
    .addEventListener("click", () =>
        document.querySelector("#header-wrapper").classList.add("active")
    );

document
    .querySelector("#mb-menu-close")
    .addEventListener("click", () =>
        document.querySelector("#header-wrapper").classList.remove("active")
    );

document.querySelectorAll(".minus").forEach((e) => {
    e.addEventListener("click", () => {
        let input = e.parentNode.querySelector("input");
        if (input.value > 1) {
            input.value = parseInt(input.value) - 1;
        }
        console.log(input.value);
    });
});

document.querySelectorAll(".plus").forEach((e) => {
    e.addEventListener("click", () => {
        let input = e.parentNode.querySelector("input");
        input.value = parseInt(input.value) + 1;
        console.log(input.value);
    });
});
