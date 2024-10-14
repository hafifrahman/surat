// function search(searchInputId, url) {
//     const searchInput = document.querySelector(searchInputId);
//     const btn = document.querySelector(".clear-query");
//     const resetBtn = document.querySelector(".reset-btn");
//     const searchBtn = document.querySelector(".search-btn");
//     const content = document.querySelector(".card");
//     const tbody = document.querySelector("tbody");
//     const loading = document.querySelector(".loading-query");

//     const fetchData = (query = "") => {
//         content.classList.add("opacity-50");
//         loading.classList.remove("hidden");

//         const getUrl = query ? `${url}?q=${query}` : url;
//         fetch(getUrl, {
//             headers: { "X-Requested-With": "XMLHttpRequest" },
//         })
//             .then((response) => response.json())
//             .then((data) => {
//                 tbody.innerHTML = data.html;
//                 content.classList.remove("opacity-50");
//                 loading.classList.add("hidden");
//                 initModals();
//             })
//             .catch((error) => console.error("Error:", error));
//     };

//     searchBtn.addEventListener("click", () => {
//         const query = searchInput.value.trim();
//         if (!query) return searchInput.focus();
//         fetchData(query);
//         btn.classList.add("hidden");
//         resetBtn.classList.remove("hidden");
//         searchBtn.classList.add("hidden");
//     });

//     searchInput.addEventListener("keyup", () => {
//         btn.classList.toggle("hidden", !searchInput.value.trim());
//         resetBtn.classList.add("hidden");
//         searchBtn.classList.remove("hidden");
//     });

//     searchInput.addEventListener("keydown", (e) => {
//         if (e.key === "Enter") {
//             e.preventDefault();
//             searchBtn.click();
//         }
//     });

//     btn.addEventListener("click", () => {
//         searchInput.value = "";
//         btn.classList.add("hidden");
//         searchInput.focus();
//     });

//     resetBtn.addEventListener("click", () => {
//         searchInput.value = "";
//         fetchData();
//         btn.classList.add("hidden");
//         resetBtn.classList.add("hidden");
//         searchBtn.classList.remove("hidden");
//     });

//     const initModals = () => {
//         const modalTriggers = document.querySelectorAll(
//             "[data-modal-target], [data-modal-toggle]"
//         );
//         const closeModals = document.querySelectorAll("[data-modal-hide]");

//         modalTriggers.forEach((trigger) => {
//             trigger.addEventListener("click", (e) => {
//                 const element = document.getElementById(
//                     e.currentTarget.getAttribute("data-modal-target")
//                 );
//                 new Modal(element).show();
//             });
//         });

//         closeModals.forEach((button) => {
//             button.addEventListener("click", (e) => {
//                 const element = document.getElementById(
//                     e.currentTarget.getAttribute("data-modal-hide")
//                 );
//                 new Modal(element).hide();
//             });
//         });
//     };
// }

document.addEventListener("DOMContentLoaded", function () {
    const input = document.querySelector('input[type="search"]');

    if (input) {
        const clearBtn = document.querySelector(".clear-query");
        const resetBtn = document.querySelector(".reset-query");
        const searchBtn = document.querySelector(".search-btn");

        if (input.value.length > 0) {
            resetBtn.classList.remove("hidden");
            searchBtn.classList.add("hidden");
        }

        input.addEventListener("input", function () {
            if (input.value.length > 0) {
                clearBtn.classList.remove("hidden");
                resetBtn.classList.add("hidden");
                searchBtn.classList.remove("hidden");
            } else {
                clearBtn.classList.add("hidden");
                resetBtn.classList.remove("hidden");
                searchBtn.classList.add("hidden");
            }
        });

        clearBtn.addEventListener("click", function () {
            input.value = "";
            clearBtn.classList.add("hidden");
            input.focus();
        });

        resetBtn.addEventListener("click", function () {
            input.value = "";
        });
    }
});
