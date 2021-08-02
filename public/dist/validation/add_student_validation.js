



const slidePage = document.querySelector(".slidePage");
const firstNextBtn = document.querySelector(".stud_nextBtn")
const prevBtnSec = document.querySelector(".stud_prev-1");
const nextBtnSec = document.querySelector(".stud_next-1");
const prevBtnThird = document.querySelector(".stud_prev-2");
const nextBtnThird = document.querySelector(".stud_next-2");
const prevBtnFourth = document.querySelector(".stud_prev-3");
const submitBtn = document.querySelector(".stud_submitBtn");

var studFirstName = document.getElementById("studentFirstName")
studFirstName.oninput=function(){
        if ((studFirstName.value).length >= 3){
            setSuccessFor(studFirstName);
        }if((studFirstName.value).length < 3){
            setDefaultFor(studFirstName,"please stop messing arround enter only valid input");   
        }if((studFirstName.value).length > 20  ){
            setErorFor(studFirstName,"you reach maximum length");
        }

};


var studMiddleName = document.getElementById("studentMiddleName")
studMiddleName.oninput=function(){
    if((studMiddleName.value).length>= 3){
        setSuccessFor(studMiddleName);
    }if((studMiddleName.value).length< 3){
        setDefaultFor(studMiddleName,"enter correct number")
    }if((studMiddleName.value).length > 20){
        setErorFor(studMiddleName,"you reach maximum length ")
    }
};

var studLastName = document.getElementById("studentLastName")
studLastName.oninput=function(){
    if((studLastName.value).length>= 3){
        setSuccessFor(studLastName);
    }if((studLastName.value).length < 3){
        setDefaultFor(studLastName,"enter correct number")
    }if((studLastName.value).length > 20){
        setErorFor(studLastName,"you reach the max length")
    }
};

var studBirthDate = document.getElementById("studentBirthDate")
studentBirthDate.oninput=function(){
    if((studentBirthDate.value).length >=3){
        setSuccessFor(studentBirthDate);
    }if((studentBirthDate.value).length <3){
        setDefaultFor(studentBirthDate,"enter the correct number")
    }if((studentBirthDate.value).length > 20){
        setErorFor(studentBirthDate,"you reach max length")
    }
};

var studCitizen = document.getElementById("studentCitizen")
studCitizen.oninput=function(){
    if((studCitizen.value).length >= 3){
        setSuccessFor(studCitizen);
    }if((studCitizen.value).length < 3){
        setDefaultFor(studCitizen,"enter the correct number")
    }if((studCitizen.value).length > 20){
        setErorFor(studCitizen,"you reach the max length")
    }
};

function check(){

}

firstNextBtn.addEventListener("click",function(){
    var studFirstName = document.getElementById("studentFirstName")
    var studMiddleName = document.getElementById("studentMiddleName")
    var studLastName = document.getElementById("studentLastName")
    var studBirthDate = document.getElementById("studentBirthDate")
    var studBirthPlace = document.getElementById("studentBirthPlace")
    var studGender = document.getElementById("studentGender")
    var studCitizen = document.getElementById("studentCitizen")
    var studGrade = document.getElementById("studentGrade")
    var studImage =document.getElementById("img-pro")

     if(studImage.value.trim() === ''){         

        setErorFor(studImage,"Image can not be empty")   
     }else{
         setSuccessFor(studImage)
     }

     if((studFirstName.value).length<3){
         setDefaultFor(studFirstName,"First name can not be min length")
        }else{
            setSuccessFor(studFirstName)
        }

        if((studMiddleName.value).length<3){
            setDefaultFor(studMiddleName,"Middle name can not be min length")

        }else{
            setSuccessFor(studMiddleName)
        }

        if((studLastName.value).length<3){
            setDefaultFor(studLastName,"Last name can not be min length")

        }else{
            setSuccessFor(studLastName)
        }

        if((studBirthDate.value).length<3){
            setDefaultFor(studBirthDate,"Birth date can not be min length")

        }else{
            setSuccessFor(studBirthDate)
        }

        if((studBirthPlace.value).length<3){
            setDefaultFor(studBirthPlace,"Birth place can not be min length")

        }else{
            setSuccessFor(studBirthPlace)
        }

        if((studGender.value).length<3){
            setDefaultFor(studGender,"Gender can not be min length")

        }else{
            setSuccessFor(studGender)
        }

        if((studCitizen.value).length<3){
            setDefaultFor(studCitizen,"citizenship can not be min length")

        }else{
            setSuccessFor(studCitizen)
        }
        if((studGrade.value).length<3){
            setDefaultFor(studGrade,"grade can not be min length")

        }else{
            setSuccessFor(studGrade)
        }

     if(
         studImage.value.trim() === '' ||
         (studFirstName.value).length < 3 ||
        ( studMiddleName.value).length < 3 ||
         (studLastName.value).length < 3 ||
        ( studBirthDate.value).length < 3 ||
         (studBirthPlace.value).length < 3 ||

         (studGender.value).length < 3 ||
         (studCitizen.value).length < 3 ||
         (studGrade.value).length < 3 
     ){


     }else{
            slidePage.style.marginLeft = "-25%";
            bullet[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            current += 1;
     }
})
function setDefaultFor(input, message) {              

    const formControll = input.parentElement;
    const small = formControll.querySelector('small');
    small.innerText = message;
    formControll.className = 'field warning';
     
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
    // alert('success')
}

prevBtnSec.addEventListener("click", function() {
    slidePage.style.marginLeft = "0%";
    bullet[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    current -= 1;
});

var studPreviousSchool = document.getElementById('studentPreviousSchool')
studPreviousSchool.oninput=function(){
    if ((studPreviousSchool.value).length >= 3){
            setSuccessFor(studPreviousSchool);
        }if((studFirstName.value).length < 3){
            setDefaultFor(studPreviousSchool,"please enter the valid name");   
        }if((studFirstName.value).length > 20  ){
            setErorFor(studPreviousSchool,"you reach maximum length");
        }
};

var studTransferReason = document.getElementById('studentTransferReason')
studTransferReason.oninput=function(){
    if((studTransferReason.value).length >= 3){
        setSuccessFor(studTransferReason);
    }if((studTransferReason.value).length < 3){
        setDefaultFor(studTransferReason,"please enter the valid reason")
    }if((studTransferReason.value).length > 20){
        setErorFor(studTransferReason,"you reach max length")
    }
};

 var studExpelsionStatus =document.getElementById('studentExpelsiionStatus')
 studExpelsionStatus.oninput=function(){
     if((studExpelsionStatus.value).length >= 3){
        setSuccessFor(studExpelsionStatus);
    }if((studExpelsionStatus.value).length < 3){
        setDefaultFor(studExpelsionStatus,"please enter the valid status")
    }if((studExpelsionStatus.value).length > 20){
        setErorFor(studExpelsionStatus,"you reach max length")
    }
 };

  var studSespensionStatus = document.getElementById('studentSespensionStatus')
  studSespensionStatus.oninput=function(){
      if((studSespensionStatus.value).length >= 3){
        setSuccessFor(studSespensionStatus);
    }if((studSespensionStatus.value).length < 3){
        setDefaultFor(studSespensionStatus,"please enter the valid sespension status")
    }if((studSespensionStatus.value).length > 20){
        setErorFor(studSespensionStatus,"you reach max length")
    }
  };

  var studSpecialEducation = document.getElementById('studentSpecialEducation')
  studSpecialEducation.oninput=function(){
       if((studSpecialEducation.value).length >= 3){
        setSuccessFor(studSpecialEducation);
    }if((studSpecialEducation.value).length < 3){
        setDefaultFor(studSpecialEducation,"please enter the valid special education")
    }if((studSpecialEducation.value).length > 20){
        setErorFor(studSpecialEducation,"you reach max length")
    }
  };

  var studNativeLanguage = document.getElementById('studentNativeLanguage')
  studNativeLanguage.oninput=function(){
       if((studNativeLanguage.value).length >= 3){
        setSuccessFor(studNativeLanguage);
    }if((studNativeLanguage.value).length < 3){
        setDefaultFor(studNativeLanguage,"please enter the valid native language")
    }if((studNativeLanguage.value).length > 20){
        setErorFor(studNativeLanguage,"you reach max length")
    }     
  };

  var studDisability = document.getElementById('studentDisability')
  studDisability.oninput=function(){
       if((studDisability.value).length >= 3){
        setSuccessFor(studDisability);
    }if((studDisability.value).length < 3){
        setDefaultFor(studDisability,"please enter the valid disability")
    }if((studDisability.value).length > 20){
        setErorFor(studDisability,"you reach max length")
    } 
  };

  var studMedicalCondition = document.getElementById('studentMedicalCondition')
  studMedicalCondition.oninput=function(){
      if((studMedicalCondition.value).length >= 3){
        setSuccessFor(studMedicalCondition);
    }if((studMedicalCondition.value).length < 3){
        setDefaultFor(studMedicalCondition,"please enter the valid medical condition")
    }if((studMedicalCondition.value).length > 20){
        setErorFor(studMedicalCondition,"you reach max length")
    } 
  };

  var studBloodType = document.getElementById('studentBloodType')
  studBloodType.oninput=function(){
      if((studBloodType.value).length >= 3){
        setSuccessFor(studBloodType);
    }if((studBloodType.value).length < 3){
        setDefaultFor(studBloodType,"please enter the valid blood type")
    }if((studBloodType.value).length > 20){
        setErorFor(studBloodType,"you reach max length")
    }
  };

nextBtnSec.addEventListener("click",function(){
    var studPreviousSchool = document.getElementById('studentPreviousSchool')
    var studTransferReason = document.getElementById('studentTransferReason')
    var studExpelsionStatus =document.getElementById('studentExpelsiionStatus')
    var studSespensionStatus = document.getElementById('studentSespensionStatus')
    var studSpecialEducation = document.getElementById('studentSpecialEducation')
    var studNativeLanguage = document.getElementById('studentNativeLanguage')
    var studDisability = document.getElementById('studentDisability')
    var studMedicalCondition = document.getElementById('studentMedicalCondition')
    var studBloodType = document.getElementById('studentBloodType')

    if((studPreviousSchool.value).length<3){
    setDefaultFor(studPreviousSchool,"student previos school can not be min length")
        
   }else{
        setSuccessFor(studPreviousSchool)
    }

    if((studTransferReason.value).length<3){
        setDefaultFor(studTransferReason,"student transfer reason can not be min length")

    }else{
        setSuccessFor(studTransferReason)
    }

    if((studExpelsionStatus.value).length<3){
        setDefaultFor(studExpelsionStatus,"student expelsion status can not be min length")

    }else{
        setSuccessFor(studExpelsionStatus)
    }

    if((studSespensionStatus.value).length<3){
        setDefaultFor(studSespensionStatus,"student sespension status can not be min length")

    }else{
        setSuccessFor(studSespensionStatus)
    }

    if((studSpecialEducation.value).length<3){
        setDefaultFor(studSpecialEducation,"student special education can not be min length")

    }else{
        setSuccessFor(studSpecialEducation)
    }

    if((studNativeLanguage.value).length<3){
        setDefaultFor(studNativeLanguage,"student native language can not be min length")

    }else{
        setSuccessFor(studNativeLanguage)
    }

    if((studDisability.value).length<3){
        setDefaultFor(studDisability,"student disability can not be min length")

    }else{
        setSuccessFor(studDisability)
    }

    if((studMedicalCondition.value).length<3){
        setDefaultFor(studMedicalCondition,"student medical condition can not be min length")

    }else{
        setSuccessFor(studMedicalCondition)
    }

    if((studBloodType.value).length<3){
        setDefaultFor(studBloodType,"student blod typecan not be min length")

    }else{
        setSuccessFor(studBloodType)
    }
        // alert('before')
    if(
        (studPreviousSchool.value).length < 3 ||
       ( studTransferReason.value).length < 3  ||
        (studExpelsionStatus.value). length < 3  ||
       ( studSespensionStatus.value). length < 3  ||
        (studSpecialEducation.value). length < 3  ||
        (studNativeLanguage.value). length < 3  ||
        (studDisability.value). length < 3  ||
        (studMedicalCondition.value). length < 3  ||
        (studBloodType.value). length < 3 
    ){
        
    }
    else{
       
        slidePage.style.marginLeft = "-50%";
            bullet[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            current += 1;
    }

  
});

var paFirstName = document.getElementById('parentFirstName')
paFirstName.oninput=function(){
     if((paFirstName.value).length >= 3){
        setSuccessFor(paFirstName);
    }if((paFirstName.value).length < 3){
        setDefaultFor(paFirstName,"please enter the valid parent name")
    }if((paFirstName.value).length > 20){
        setErorFor(paFirstName,"you reach max length")
    }
};

 var paMiddleName = document.getElementById('parentMiddleName')
 paMiddleName.oninput=function(){
      if((paMiddleName.value).length >= 3){
        setSuccessFor(paMiddleName);
    }if((paMiddleName.value).length < 3){
        setDefaultFor(paMiddleName,"please enter the valid parent name")
    }if((paFirstName.value).length > 20){
        setErorFor(paMiddleName,"you reach max length")
    }
 };

  var paLastName = document.getElementById('parentLastName')
  paLastName.oninput=function(){
      if((paLastName.value).length >= 3){
        setSuccessFor(paLastName);
    }if((paLastName.value).length < 3){
        setDefaultFor(paLastName,"please enter the valid parent name")
    }if((paLastName.value).length > 20){
        setErorFor(paLastName,"you reach max length")
    }
  };

  var paGender = document.getElementById('parentGender')
  paGender.oninput=function(){
       if((paGender.value).length >= 3){
        setSuccessFor(paGender);
    }if((paGender.value).length < 3){
        setDefaultFor(paGender,"please enter the valid parent name")
    }if((paGender.value).length > 20){
        setErorFor(paGender,"you reach max length")
    }
  };

  var paRelation = document.getElementById('parentRelation')
  paRelation.oninput=function(){
      if((paRelation.value).length >= 3){
        setSuccessFor(paRelation);
    }if((paRelation.value).length < 3){
        setDefaultFor(paRelation,"please enter the valid parent name")
    }if((paRelation.value).length > 20){
        setErorFor(paRelation,"you reach max length")
    }
  };


    nextBtnThird.addEventListener("click", function(){

    var paFirstName = document.getElementById('parentFirstName')
    var paMiddleName = document.getElementById('parentMiddleName')
    var paLastName = document.getElementById('parentLastName')
    var paGender = document.getElementById('parentGender')
    var paRelation = document.getElementById('parentRelation')
    var paEmergencyContact = document.getElementById('parentEmergencyContact')
    var paPriority = document.getElementById('parentPriority')

    if((paFirstName.value).length<3){
        setDefaultFor(paFirstName,'parent first name can not be min length')

    }else{
        setSuccessFor(paFirstName)
    }

    if((paMiddleName.value).length<3){
        setDefaultFor(paMiddleName,"parent middle name can not be min length")

    }else{
        setSuccessFor(paMiddleName)
    }

    if((paLastName.value).length<3){
        setDefaultFor(paLastName,"parent last name can not be min length")

    }else{
        setSuccessFor(paLastName)
    }

    if((paGender.value).length<3){
        setSuccessFor(paGender,"parent gender can not be min length")

    }else{
        setSuccessFor(paGender)
    }

    if((paRelation.value).length<3){
        setDefaultFor(paRelation,"parent relation can not be min length")

    }else{
        setSuccessFor(paRelation)
    }

    if(paEmergencyContact.value.trim()=== ''){
        setErorFor(paEmergencyContact,"parent emergency contact can not be min length")

    }else{
        setSuccessFor(paEmergencyContact)
    }

    if(paPriority.value.trim()=== ''){
        setErorFor(paPriority,"parent priority can not be null")

    }else{
        setSuccessFor(paPriority)
    }

    if(
        (paFirstName.value).length < 3||
        (paMiddleName.value).length < 3 ||
        (paLastName.value).length < 3 ||
        (paGender.value).length < 3 ||
        (paRelation.value).length < 3 ||
        paEmergencyContact.value.trim() === '' ||
        paPriority.value.trim() === ''

    ){

    }else{
             slidePage.style.marginLeft = "-75%";
            bullet[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            current += 1;
    }
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
var paCity = document.getElementById('parentCity')
paCity.oninput=function(){
     if((paCity.value).length >= 3){
        setSuccessFor(paCity);
    }if((paCity.value).length < 3){
        setDefaultFor(paCity,"please enter the valid parent name")
    }if((paCity.value).length > 20){
        setErorFor(paCity,"you reach max length")
    }
};
var paSubCity = document.getElementById('parentSubCity')
paSubCity.oninput=function(){
     if((paSubCity.value).length >= 3){
        setSuccessFor(paSubCity);
    }if((paSubCity.value).length < 3){
        setDefaultFor(paSubCity,"please enter the valid city")
    }if((paSubCity.value).length > 20){
        setErorFor(paCity,"you reach max length")
    }
};

submitBtn.addEventListener("click", function() {

    var paCity = document.getElementById('parentCity')
    var paSubCity = document.getElementById('parentSubCity')
    var paKebele = document.getElementById('parentKebele')
    var paHouseNumber = document.getElementById('parentHouseNumber')
    var paPOB = document.getElementById('parentPOB')
    var paEmail = document.getElementById('parentEmail')
    var paPhone1 = document.getElementById('parentPhone1')
    var paPhone2 = document.getElementById('parentPhone2')

    if((paCity.value).length<3){
        setDefaultFor(paCity,"parent city can not be min length")

    }else{
        setSuccessFor(paCity)
    }

    if((paSubCity.value).length<3){
        setDefaultFor(paSubCity,"parent subb city can not be min length")

    }else{
        setSuccessFor(paSubCity)
    }

    if(paKebele.value.trim() === ''){
        setErorFor(paKebele,"parent kebele can not be null")

    }else{
        setSuccessFor(paKebele)
    }

    if(paHouseNumber.value.trim() === ''){
        setErorFor(paHouseNumber,"parent house number can not be null")

    }else{
        setSuccessFor(paHouseNumber)
    }

    if(paPOB.value.trim() === ''){
        setErorFor(paPOB,"parent post box is can not be null")

    }else{
        setSuccessFor(paPOB)
    }

    if(paEmail.value.trim() === ''){
        setErorFor(paEmail,"parent email can not be null")

    }else{
        setSuccessFor(paEmail)
    }

    if(paPhone1.value.trim() === ''){
        setErorFor(paPhone1,"parent phone number can not be null")

    }else{
        setSuccessFor(paPhone1)
    }

    if(paPhone2.value.trim()=== ''){
        setErorFor(paPhone2,"parent phone number 2 can not be null")

    }

    if(
        paCity.value.trim === '' ||
        paSubCity.value.trim === '' ||
        paKebele.value.trim === '' ||
        paHouseNumber.value.trim === '' ||
        paPOB.value.trim === '' ||
        paEmail.value.trim === '' ||
        paPhone1.value.trim === '' ||
        paPhone2.value.trim === ''
    ){

    }else{
             slidePage.style.marginLeft = "-75%";
             bullet[current - 1].classList.add("active");
             progressText[current - 1].classList.add("active");
             progressCheck[current - 1].classList.add("active");
             current += 1;   
              setTimeout(function() {
        alert("You're successfully inserted your data");
        location.reload();
    }, 800);
    }

});



function alphaOnly(event) {
  var key = event.keyCode;
  return ((key >= 65 && key <= 90) || key == 8);
};



   

    
    

     
   