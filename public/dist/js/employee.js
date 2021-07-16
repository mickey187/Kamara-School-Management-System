const slidePage = document.querySelector(".slidePage");
const firstNextBtn = document.querySelector(".nextBtn");
const prevBtnSec = document.querySelector(".prev-1");
const nextBtnSec = document.querySelector(".next-1");
const prevBtnThird = document.querySelector(".prev-2");
const nextBtnThird = document.querySelector(".next-2");
const prevBtnFourth = document.querySelector(".prev-3");
const submitBtn = document.querySelector(".submitBtn");
const progressText = document.querySelectorAll(".step p");
const progressCheck = document.querySelectorAll(".step .check");
const bullet = document.querySelectorAll(".step .bullet");
const teacher = document.getElementById('job_position_selecter');


let max = 4;
let current = 1;

teacher.addEventListener("change", function(){
    const place_of_study = document.getElementById('place_of_study');
    const teacher_traning_year = document.getElementById('teacher_traning_year');
    const debut_as_a_teacher = document.getElementById('debut_as_a_teacher');
    const date_of_study = document.getElementById('date_of_study');
    const teacher_traning_institute = document.getElementById('teacher_traning_institute');
    const field_of_study = document.getElementById('field_of_study');
    const teacher_traning_program = document.getElementById('teacher_traning_program');

    if(teacher.value==="1"){
        place_of_study.style.display = "block";
        teacher_traning_year.style.display = "block";
        debut_as_a_teacher.style.display = "block";
        teacher_traning_institute.style.display = "block";
        date_of_study.style.display = "block";
        field_of_study.style.display = "block";
        teacher_traning_program.style.display = "block";
       
    }else{
        place_of_study.style.display = "none";
        teacher_traning_year.style.display = "none";
        debut_as_a_teacher.style.display = "none";
        teacher_traning_institute.style.display = "none";
        date_of_study.style.display = "none";
        field_of_study.style.display = "none";
        teacher_traning_program.style.display = "none";
    }

});
window.addEventListener("load", function(){
    const place_of_study = document.getElementById('place_of_study');
    const teacher_traning_year = document.getElementById('teacher_traning_year');
    const debut_as_a_teacher = document.getElementById('debut_as_a_teacher');
    const date_of_study = document.getElementById('date_of_study');
    const teacher_traning_institute = document.getElementById('teacher_traning_institute');
    const field_of_study = document.getElementById('field_of_study');
    const teacher_traning_program = document.getElementById('teacher_traning_program');

    if(teacher.value==="1"){
        place_of_study.style.display = "block";
        teacher_traning_year.style.display = "block";
        debut_as_a_teacher.style.display = "block";
        teacher_traning_institute.style.display = "block";
        date_of_study.style.display = "block";
        field_of_study.style.display = "block";
        teacher_traning_program.style.display = "block";

    }else{
        
        place_of_study.style.display = "none";
        teacher_traning_year.style.display = "none";
        debut_as_a_teacher.style.display = "none";
        teacher_traning_institute.style.display = "none";
        date_of_study.style.display = "none";
        field_of_study.style.display = "none";
        teacher_traning_program.style.display = "none";
    }

});
firstNextBtn.addEventListener("click", function() {
    slidePage.style.marginLeft = "-25%";
    bullet[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    current += 1;
});
nextBtnSec.addEventListener("click", function() {
    slidePage.style.marginLeft = "-50%";
    bullet[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    current += 1;
});
nextBtnThird.addEventListener("click", function() {
    slidePage.style.marginLeft = "-75%";
    bullet[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    current += 1;
});
submitBtn.addEventListener("click", function() {
    slidePage.style.marginLeft = "-75%";
    bullet[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    current += 1;
    setTimeout(function() {
        alert("You're successfully inserted your data");
        location.reload();
    }, 800);
});
prevBtnSec.addEventListener("click", function() {
    slidePage.style.marginLeft = "0%";
    bullet[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    current -= 1;
});
prevBtnThird.addEventListener("click", function() {
    slidePage.style.marginLeft = "-25%";
    bullet[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    current -= 1;
});
prevBtnFourth.addEventListener("click", function() {
    slidePage.style.marginLeft = "-50%";
    bullet[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    current -= 1;
});
