const slidePage = document.querySelector(".slidePage");
const firstNextBtn = document.querySelector(".nextBtn");
const firstNextBtn2 = document.querySelector(".nextBtn").childNodes[0].text;
const prevBtnSec = document.querySelector(".prev-1");
const prevBtnSecP = document.querySelector(".prev-p");
const nextBtnSec = document.querySelector(".next-1");
const prevBtnThird = document.querySelector(".prev-2");
const nextBtnThird = document.querySelector(".next-2");
const prevBtnFourth = document.querySelector(".prev-3");
const submitBtn = document.querySelector(".submitBtn");
const submitBtnP = document.querySelector(".submitBtnP");
const progressText = document.querySelectorAll(".step p");
const progressCheck = document.querySelectorAll(".step .check");
const bullet = document.querySelectorAll(".step .bullet");
// Validation
const studentFname = document.getElementById('studentFirstName');
const studentMname = document.getElementById('studentMiddleName');
const studentLname = document.getElementById('studentLastName');
const studentBirthDate = document.getElementById('studentBirthDate');
const studentBirthPlace = document.getElementById('studentBirthPlace');
const studentGender = document.getElementById('studentGender');
const studentCitizen = document.getElementById('studentCitizen');
const studentGrade = document.getElementById('studentGrade');
const studentImage = document.getElementById('img-pro');


//validation
let isValid = false;
let max = 4;
let current = 1;
let maxp = 2;
let currentp = 1;

function register(v){
    const registration = document.getElementById('register1').textContent;
    registerStudent(registration);
}


function checkinputs() {
    var sfName = studentFname.value.trim();
    var smName = studentMname.value.trim();
    var slName = studentLname.value.trim();
    var sbDate = studentBirthDate.value.trim();
    var sbPlace = studentBirthPlace.value.trim();
    var sGender = studentGender.value.trim();
    var sCitizen = studentCitizen.value.trim();
    var sGrade = studentGrade.value.trim();
    var sImage = studentImage.value.trim();
    if (sImage === '') {
        setErorFor(studentImage, 'image is not loaded! ');
    } else {
        setSuccessFor(studentImage);
    }
    if (sfName === '') {
        setErorFor(studentFname, 'First name cannot be blank');
    } else {
        setSuccessFor(studentFname);
    }
    if (smName === '') {
        setErorFor(studentMname, 'Middle name cannot be blank');
    } else {
        setSuccessFor(studentMname);
    }
    if (slName === '') {
        setErorFor(studentLname, 'Last name cannot be blank');
    } else {
        setSuccessFor(studentLname);
    }
    if (sbDate === '') {
        setErorFor(studentBirthDate, 'Birth date cannot be blank');
    } else {
        setSuccessFor(studentBirthDate);
    }
    if (sbPlace === '') {
        setErorFor(studentBirthPlace, 'Birth place cannot be blank');
    } else {
        setSuccessFor(studentBirthPlace);
    }
    if (sGender === '') {
        setErorFor(studentGender, 'Gender cannot be blank');
    } else {
        setSuccessFor(studentGender);
    }
    if (sCitizen === '') {
        setErorFor(studentCitizen, 'Gender cannot be blank');
    } else {
        setSuccessFor(studentCitizen);
    }
    if (sGrade === '') {
        setErorFor(studentGrade, 'Gender cannot be blank');
    } else {
        setSuccessFor(studentGrade);
    }

}

function checkinputsEdit() {

    var sfName = studentFname.value.trim();
    var smName = studentMname.value.trim();
    var slName = studentLname.value.trim();
    var sGender = studentGender.value.trim();
    alert('from checkinput: ' + sGender);
    if (sfName === '') {
        setErorFor(studentFname, 'First name cannot be blank');
    } else {
        setSuccessFor(studentFname);
    }
    if (smName === '') {
        setErorFor(studentMname, 'Middle name cannot be blank');
    } else {
        setSuccessFor(studentMname);
    }
    if (slName === '') {
        setErorFor(studentLname, 'Last name cannot be blank');
    } else {
        setSuccessFor(studentLname);
    }
    if (sGender === '') {
        setErorFor(studentGender, 'Gender cannot be blank');
    } else {
        setSuccessFor(studentGender);
    }


}

function numberOnly(input) {
    var num = /[^0-9]/gi;
    input.value = input.value.replace(num, "");
}

function setErorFor(input, message) {
    const formControll = input.parentElement;
    const small = formControll.querySelector('small');
    small.innerText = message;
    formControll.className = 'field error';
}

function setSuccessFor(input) {
    const formControll = input.parentElement;
    formControll.className = 'field success';
}


firstNextBtn.addEventListener("click", function() {
    // checkinputs();
    if (firstNextBtn.value === '1') {
        //  alert('edit');
        if (false
            // studentFname.value == '' ||
            // studentMname.value == '' ||
            // studentLname.value == '' ||
            // studentBirthDate.value == ''
        ) {
            checkinputsEdit();
        } else {

            //  checkinputsEdit();
            slidePage.style.marginLeft = "-25%";
            bullet[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            current += 1;
        }
    } else if (firstNextBtn.value === '2') {
        //alert('edit parent');
        if (false
            // studentFname.value == '' ||
            // studentMname.value == '' ||
            // studentLname.value == '' ||
            // studentBirthDate.value == ''
        ) {
            checkinputsEdit();
        } else {

            // checkinputsEdit();
            slidePage.style.marginLeft = "-25%";
            bullet[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            current += 1;
        }
        } else {
            if (studentImage.value == '' ||
                studentFname.value == '' ||
                studentMname.value == '' ||
                studentLname.value == '' ||
                studentBirthDate.value == '' ||
                studentBirthPlace.value == '' ||
                studentGender.value == '' ||
                studentCitizen.value == '' ||
                studentGrade.value == '') {
                checkinputs();
            } else {
                checkinputs();
                slidePage.style.marginLeft = "-25%";
                bullet[current - 1].classList.add("active");
                progressText[current - 1].classList.add("active");
                progressCheck[current - 1].classList.add("active");
                current += 1;
            }
        }


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

prevBtnSecP.addEventListener("click", function() {
    slidePage.style.marginLeft = "0%";
    bullet[currentp - 2].classList.remove("active");
    progressText[currentp - 2].classList.remove("active");
    progressCheck[currentp - 2].classList.remove("active");
    currentp -= 1;
});

submitBtnP.addEventListener("click", function() {
    slidePage.style.marginLeft = "-50%";
    bullet[currentp - 1].classList.add("active");
    progressText[currentp - 1].classList.add("active");
    progressCheck[currentp - 1].classList.add("active");
    currentp += 1;
    setTimeout(function() {
        alert("You're successfully inserted your data");

        location.reload();
    }, 800);
});


function registerStudent(id) {
    $.ajax({
        type: 'GET',
        url: 'register/'+id,
        dataType : 'json',

        success:function (data) {
          alert('good');

        },
        error:function (data) {

        }
     });
  }
