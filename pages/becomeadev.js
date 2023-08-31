/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


const joinBtn = document.getElementById("join-btn");
const modal = document.querySelector(".modal");
const closeBtn = document.querySelector(".close");
const form = document.querySelector(".modal-content form");

joinBtn.addEventListener("click", () => {
    modal.style.display = "block";
});

closeBtn.addEventListener("click", () => {
    modal.style.display = "none";
});

form.addEventListener("submit", (e) => {
    e.preventDefault();
    // Handle form submission logic here
    console.log("Form submitted!");
    modal.style.display = "none";
});




