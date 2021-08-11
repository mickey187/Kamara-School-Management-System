




const movePages = document.querySelector(".movePages");
const studentFirstNextBtn = document.querySelector(".studentNextButton");
const studentFirstPreviousBtn = document.querySelector(".studentPreviousButton");
const studentSecondNextBtn = document.querySelector(".studentSecondNextButton");
const studentSecondPreviousBtn = document.querySelector(".studentSecondPreviousButton");
const studentThirdNextBtn = document.querySelector(".studentThirdNextButton");
const studentThirdPreviousBtn = document.querySelector(".studentThirdPreviousButton");
const studentSubmitBtn = document.querySelector(".studentSubmitButton");



var studentFirstName = document.getElementById("studentFirstName")
studentFirstName.oninput=function(){
        if ((studentFirstName.value).length >= 3){
            setSuccessFor(studentFirstName);
        }if((studentFirstName.value).length < 3){
            setDefaultFor(studentFirstName,"please stop messing arround enter only valid input");   
        }if((studentFirstName.value).length > 20  ){
            setErorFor(studentFirstName,"you reach maximum length");
        }

};

var studentMiddleName = document.getElementById("studentMiddleName")
studentMiddleName.oninput=function(){
    if((studentMiddleName.value).length>= 3){
        setSuccessFor(studentMiddleName);
    }if((studentMiddleName.value).length< 3){
        setDefaultFor(studentMiddleName,"enter correct number")
    }if((studentMiddleName.value).length > 20){
        setErorFor(studentMiddleName,"you reach maximum length ")
    }
};

var studentLastName = document.getElementById("studentLastName")
studentLastName.oninput=function(){
    if((studentLastName.value).length>= 3){
        setSuccessFor(studentLastName);
    }if((studentLastName.value).length < 3){
        setDefaultFor(studentLastName,"enter correct number")
    }if((studentLastName.value).length > 20){
        setErorFor(studentLastName,"you reach the max length")
    }
};

var studentBirthDate = document.getElementById("studentBirthDate")
studentBirthDate.oninput=function(){
    if((studentBirthDate.value).length >=3){
        setSuccessFor(studentBirthDate);
    }if((studentBirthDate.value).length <3){
        setDefaultFor(studentBirthDate,"enter the correct number")
    }if((studentBirthDate.value).length > 20){
        setErorFor(studentBirthDate,"you reach max length")
    }
};

var studentBirthPlace = document.getElementById("studentBirthPlace")
studentBirthPlace.oninput=function(){
    if((studentBirthPlace.value).length >=3){
        setSuccessFor(studentBirthPlace);
    }if((studentBirthPlace.value).length <3){
        setDefaultFor(studentBirthPlace,"enter the correct number")
    }if((studentBirthPlace.value).length > 20){
        setErorFor(studentBirthPlace,"you reach max length")
    }
};

var studentCitizen = document.getElementById("studentCitizen")
studentCitizen.oninput=function(){
    if((studentCitizen.value).length >= 3){
        setSuccessFor(studentCitizen);
    }if((studentCitizen.value).length < 3){
        setDefaultFor(studentCitizen,"enter the correct number")
    }if((studentCitizen.value).length > 20){
        setErorFor(studentCitizen,"you reach the max length")
    }
};

var studentGrade = document.getElementById("studentGrade")
studentGrade.oninput = function(){
    if((studentGrade.value).length >= 3){
        setSuccessFor(studentGrade);
    }if((studentGrade.value).length < 3){
        setDefaultFor(studentGrade,"enter the correct number")
    }if((studentGrade.value).length > 20){
        setErorFor(studentGrade,"you reach the max length")
    }
};

var studentStream = document.getElementById("studentStream")
studentStream.oninput = function(){
    if((studentStream.value).length >= 3){
        setSuccessFor(studentStream);
    }if((studentStream.value).length < 3){
        setDefaultFor(studentStream,"enter the correct number")
    }if((studentStream.value).length > 20){
        setErorFor(studentStream,"you reach the max length")
    }
};

studentFirstNextBtn.addEventListener("click",function(){
    var studentFirstName = document.getElementById("studentFirstName")
    var studentMiddleName = document.getElementById("studentMiddleName")
    var studentLastName = document.getElementById("studentLastName")
    var studentBirthDate = document.getElementById("studentBirthDate")
    var studentBirthPlace = document.getElementById("studentBirthPlace")
    var studentGender = document.getElementById("studentGender")
    var studentCitizen = document.getElementById("studentCitizen")
    var studentGrade = document.getElementById("studentGrade")
    var studentStream = document.getElementById("studentStream")
    var studentImage = document.getElementById("img-pro")

    if(studentImage.value.trim() === ''){         

        setErorFor(studentImage,"Image can not be empty")   
     }else{
         setSuccessFor(studentImage)
     }

if((studentFirstName.value).length<3){
         setDefaultFor(studentFirstName,"First name can not be min length")
        }else{
            setSuccessFor(studentFirstName)
        }

  if((studentMiddleName.value).length<3){
      setDefaultFor(studentMiddleName,"Middle name can not be min length")

     }else{
            setSuccessFor(studentMiddleName)
        }
    
    if((studentLastName.value).length<3){
            setDefaultFor(studentLastName,"Last name can not be min length")

        }else{
            setSuccessFor(studentLastName)
        }

       if((studentBirthDate.value).length<3){
            setDefaultFor(studentBirthDate,"Birth date can not be min length")

        }else{
            setSuccessFor(studentBirthDate)
        }
    if((studentBirthPlace.value).length < 3){
            setDefaultFor(studentBirthPlace,"Birth place can not be min length")

        }else{
            setSuccessFor(studentBirthPlace)
        } 

     if((studentGender.value).length<3){
            setDefaultFor(studentGender,"Gender can not be min length")

        }else{
            setSuccessFor(studentGender)
        }

     if((studentCitizen.value).length<3){
            setDefaultFor(studentCitizen,"citizenship can not be min length")

        }else{
            setSuccessFor(studentCitizen)
        }
      if((studentGrade.value).length<3){
            setDefaultFor(studentGrade,"grade can not be min length")

        }else{
            setSuccessFor(studentGrade)
        }
    if((studentStream.value).length <3){
        setDefaultFor(studentStream,"stream can not be min length")
    }else{
        setSuccessFor(studentStream)
    }

if(
    studentImage.value.trim() === '' ||
    (studentFirstName.value).length < 3 ||
   ( studentMiddleName.value).length < 3 ||
    (studentLastName.value).length < 3 ||
    (studentBirthDate.value).length < 3 ||
    (studentBirthPlace.value).length < 3 ||
    (studentGender.value).length < 3 ||
    (studentCitizen.value).length < 3 ||
    (studentGrade.value).length < 3 ||
    (studentStream.value).length < 3

    ){

    }else{
            movePages.style.marginLeft = "-25%";
            bullet[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            current += 1;
    }
    
})

studentFirstPreviousBtn.addEventListener("click", function() {
    movePages.style.marginLeft = "0%";
    bullet[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    current -= 1;
});

var studentPreviousSchool = document.getElementById('studentPreviousSchool')
studentPreviousSchool.oninput = function (){
    if((studentPreviousSchool.value).length >= 3){
        setSuccessFor(studentPreviousSchool);
    }if((studentPreviousSchool.value).length < 3){
        setDefaultFor(studentPreviousSchool,"insert valid school name");
    }if((studentPreviousSchool.value).length > 20){
        setErorFor(studentPreviousSchool,"reach maximum input number")
    }
};

var studentTransferReason = document.getElementById('studentTransferReason')
studentTransferReason.oninput=function(){
    if((studentTransferReason.value).length >= 2){
        setSuccessFor(studentTransferReason);
    }if((studentTransferReason.value).length < 2){
        setDefaultFor(studentTransferReason,"please enter the valid reason")
    }if((studentTransferReason.value).length > 20){
        setErorFor(studentTransferReason,"you reach max length")
    }
};

 var studentExpelsionStatus =document.getElementById('studentExpelsiionStatus')
 studentExpelsionStatus.oninput=function(){
     if((studentExpelsionStatus.value).length >= 2){
        setSuccessFor(studentExpelsionStatus);
    }if((studentExpelsionStatus.value).length < 2){
        setDefaultFor(studentExpelsionStatus,"please enter the valid status")
    }if((studentExpelsionStatus.value).length > 20){
        setErorFor(studentExpelsionStatus,"you reach max length")
    }
 };

  var studentSespensionStatus = document.getElementById('studentSespensionStatus')
  studentSespensionStatus.oninput=function(){
      if((studentSespensionStatus.value).length >= 2){
        setSuccessFor(studentSespensionStatus);
    }if((studentSespensionStatus.value).length < 2){
        setDefaultFor(studentSespensionStatus,"please enter the valid sespension status")
    }if((studentSespensionStatus.value).length > 20){
        setErorFor(studentSespensionStatus,"you reach max length")
    }
  };

  var studentSpecialEducation = document.getElementById('studentSpecialEducation')
  studentSpecialEducation.oninput=function(){
       if((studentSpecialEducation.value).length >= 2){
        setSuccessFor(studentSpecialEducation);
    }if((studentSpecialEducation.value).length < 2){
        setDefaultFor(studentSpecialEducation,"please enter the valid special education")
    }if((studentSpecialEducation.value).length > 20){
        setErorFor(studentSpecialEducation,"you reach max length")
    }
  };

  var studentNativeLanguage = document.getElementById('studentNativeLanguage')
  studentNativeLanguage.oninput=function(){
       if((studentNativeLanguage.value).length >= 3){
        setSuccessFor(studentNativeLanguage);
    }if((studentNativeLanguage.value).length < 3){
        setDefaultFor(studentNativeLanguage,"please enter the valid native language")
    }if((studentNativeLanguage.value).length > 20){
        setErorFor(studentNativeLanguage,"you reach max length")
    }     
  };

  var studentDisability = document.getElementById('studentDisability')
  studentDisability.oninput=function(){
       if((studentDisability.value).length >= 2){
        setSuccessFor(studentDisability);
    }if((studentDisability.value).length < 2){
        setDefaultFor(studentDisability,"please enter the valid disability")
    }if((studentDisability.value).length > 20){
        setErorFor(studentDisability,"you reach max length")
    } 
  };

  var studentMedicalCondition = document.getElementById('studentMedicalCondition')
  studentMedicalCondition.oninput=function(){
      if((studentMedicalCondition.value).length >= 2){
        setSuccessFor(studentMedicalCondition);
    }if((studentMedicalCondition.value).length < 2){
        setDefaultFor(studentMedicalCondition,"please enter the valid medical condition")
    }if((studentMedicalCondition.value).length > 20){
        setErorFor(studentMedicalCondition,"you reach max length")
    } 
  };

  var studentBloodType = document.getElementById('studentBloodType')
  studentBloodType.oninput=function(){
      if((studentBloodType.value).length <= 3){
        setSuccessFor(studentBloodType);
    }if((studentBloodType.value).length > 3){
        setDefaultFor(studentBloodType,"please enter the valid blood type")
    }if((studentBloodType.value).length > 4){
        setErorFor(studentBloodType,"you reach max length")
    }
  };

studentSecondNextBtn.addEventListener("click",function(){
    var studentPreviousSchool = document.getElementById('studentPreviousSchool')
    var studentTransferReason = document.getElementById('studentTransferReason')
    var studentExpelsiionStatus = document.getElementById('studentExpelsiionStatus')
    var studentSespensionStatus = document.getElementById('studentSespensionStatus')
    var studentSpecialEducation = document.getElementById('studentSpecialEducation')
    var studentNativeLanguage = document.getElementById('studentNativeLanguage')
    var studentDisability = document.getElementById('studentDisability')
    var studentMedicalCondition = document.getElementById('studentMedicalCondition')
    var studentBloodType = document.getElementById('studentBloodType')

    if((studentPreviousSchool.value).length < 3){
        setDefaultFor(studentPreviousSchool,"student previos school can not be min length")
    }else{
        setSuccessFor(studentPreviousSchool)
    }

    if((studentTransferReason.value).length < 2){
        setDefaultFor(studentTransferReason,"student previos school can not be min length")
    }else{
        setSuccessFor(studentTransferReason)
    }

    if((studentExpelsiionStatus.value).length < 2){
        setDefaultFor(studentExpelsiionStatus,"student previos school can not be min length")
    }else{
        setSuccessFor(studentExpelsiionStatus)
    }

    if((studentSespensionStatus.value).length < 2){
        setDefaultFor(studentSespensionStatus,"student previos school can not be min length")
    }else{
        setSuccessFor(studentSespensionStatus)
    }

    if((studentSpecialEducation.value).length < 2){
        setDefaultFor(studentSpecialEducation,"student previos school can not be min length")
    }else{
        setSuccessFor(studentSpecialEducation)
    }

    if((studentNativeLanguage.value).length < 3){
        setDefaultFor(studentNativeLanguage,"student previos school can not be min length")
    }else{
        setSuccessFor(studentNativeLanguage)
    }

    if((studentDisability.value).length < 2){
        setDefaultFor(studentDisability,"student previos school can not be min length")
    }else{
        setSuccessFor(studentDisability)
    }

    if((studentMedicalCondition.value).length < 2){
        setDefaultFor(studentMedicalCondition,"student previos school can not be min length")
    }else{
        setSuccessFor(studentMedicalCondition)
    }

    if((studentBloodType.value).length > 3){
        setDefaultFor(studentBloodType,"student previos school can not be max length")
    }else{
        setSuccessFor(studentBloodType)
    }

    if(
        (studentPreviousSchool.value).length < 3 ||
        (studentTransferReason.value).length < 2 ||
        (studentExpelsiionStatus.value).length < 2 ||
        (studentSespensionStatus.value).length < 2 ||
        (studentSpecialEducation.value).length < 2 ||
        (studentNativeLanguage.value).length < 3 ||
        (studentDisability.value).length < 2 ||
        (studentMedicalCondition.value).length < 2 ||
        (studentBloodType.value).length > 3
    ){

    }else{
        movePages.style.marginLeft = "-50%";
            bullet[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            current += 1;
    }
});

var parentFirstName = document.getElementById('parentFirstName')
parentFirstName.oninput=function(){
     if((parentFirstName.value).length >= 3){
        setSuccessFor(parentFirstName);
    }if((parentFirstName.value).length < 3){
        setDefaultFor(parentFirstName,"please enter the valid parent name")
    }if((parentFirstName.value).length > 20){
        setErorFor(parentFirstName,"you reach max length")
    }
};

 var parentMiddleName = document.getElementById('parentMiddleName')
 parentMiddleName.oninput=function(){
      if((parentMiddleName.value).length >= 3){
        setSuccessFor(parentMiddleName);
    }if((parentMiddleName.value).length < 3){
        setDefaultFor(parentMiddleName,"please enter the valid parent name")
    }if((parentMiddleName.value).length > 20){
        setErorFor(parentMiddleName,"you reach max length")
    }
 };

  var parentLastName = document.getElementById('parentLastName')
  parentLastName.oninput=function(){
      if((parentLastName.value).length >= 3){
        setSuccessFor(parentLastName);
    }if((parentLastName.value).length < 3){
        setDefaultFor(parentLastName,"please enter the valid parent name")
    }if((parentLastName.value).length > 20){
        setErorFor(parentLastName,"you reach max length")
    }
  };

  var parentGender = document.getElementById('parentGender')
  parentGender.oninput=function(){
       if((parentGender.value).length >= 3){
        setSuccessFor(parentGender);
    }if((parentGender.value).length < 3){
        setDefaultFor(parentGender,"please enter the valid parent name")
    }if((parentGender.value).length > 20){
        setErorFor(parentGender,"you reach max length")
    }
  };

  var parentRelation = document.getElementById('parentRelation')
  parentRelation.oninput=function(){
      if((parentRelation.value).length >= 3){
        setSuccessFor(parentRelation);
    }if((parentRelation.value).length < 3){
        setDefaultFor(parentRelation,"please enter the valid parent name")
    }if((parentRelation.value).length > 20){
        setErorFor(parentRelation,"you reach max length")
    }
  };


    studentThirdNextBtn.addEventListener("click", function(){

    var parentFirstName = document.getElementById('parentFirstName')
    var parentMiddleName = document.getElementById('parentMiddleName')
    var parentLastName = document.getElementById('parentLastName')
    var parentGender = document.getElementById('parentGender')
    var parentRelation = document.getElementById('parentRelation')
    var parentEmergencyContact = document.getElementById('parentEmergencyContact')
    var parentPriority = document.getElementById('parentPriority')

    if((parentFirstName.value).length<3){
        setDefaultFor(parentFirstName,'parent first name can not be min length')

    }else{
        setSuccessFor(parentFirstName)
    }

    if((parentMiddleName.value).length<3){
        setDefaultFor(parentMiddleName,"parent middle name can not be min length")

    }else{
        setSuccessFor(parentMiddleName)
    }

    if((parentLastName.value).length<3){
        setDefaultFor(parentLastName,"parent last name can not be min length")

    }else{
        setSuccessFor(parentLastName)
    }

    if((parentGender.value).length<3){
        setSuccessFor(parentGender,"parent gender can not be min length")

    }else{
        setSuccessFor(parentGender)
    }

    if((parentRelation.value).length<3){
        setDefaultFor(parentRelation,"parent relation can not be min length")

    }else{
        setSuccessFor(parentRelation)
    }

    if(parentEmergencyContact.value.trim()=== ''){
        setErorFor(parentEmergencyContact,"parent emergency contact can not be min length")

    }else{
        setSuccessFor(parentEmergencyContact)
    }

    if(parentPriority.value.trim()=== ''){
        setErorFor(parentPriority,"parent priority can not be null")

    }else{
        setSuccessFor(parentPriority)
    }

    if(
        (parentFirstName.value).length < 3||
        (parentMiddleName.value).length < 3 ||
        (parentLastName.value).length < 3 ||
        (parentGender.value).length < 3 ||
        (parentRelation.value).length < 3 ||
        parentEmergencyContact.value.trim() === '' ||
        parentPriority.value.trim() === ''

    ){

    }else{
             movePages.style.marginLeft = "-75%";
            bullet[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            current += 1;
    }
});

studentSecondPreviousBtn.addEventListener("click",function(){

            movePages.style.marginLeft = "-25%";
            bullet[current - 2].classList.remove("active");
            progressText[current - 2].classList.remove("active");
            progressCheck[current - 2].classList.remove("active");
            current -= 1;
})

studentThirdPreviousBtn.addEventListener("click",function(){
    
    movePages.style.marginLeft = "-50%";
    bullet[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    current -= 1;
});

var studentParentCity = document.getElementById('parentCity')
studentParentCity.oninput = function (){
    if((studentParentCity.value).length >= 3){
        setSuccessFor(studentParentCity);
    }if((studentParentCity.value).length < 3){
        setDefaultFor(studentParentCity,"insert valid parent name")
    }if((studentParentCity.value).length > 20){
        setErorFor(studentParentCity,"you reach the maximum length")
    }
};

var parentSubCity = document.getElementById('parentSubCity')
parentSubCity.oninput=function(){
     if((parentSubCity.value).length >= 3){
        setSuccessFor(parentSubCity);
    }if((parentSubCity.value).length < 3){
        setDefaultFor(parentSubCity,"please enter the valid city")
    }if((parentSubCity.value).length > 20){
        setErorFor(parentSubCity,"you reach max length")
    }
};


studentSubmitBtn.addEventListener("click", function(){
    var studentParentCity = document.getElementById('parentCity')
    var parentSubCity = document.getElementById('parentSubCity')
    var parentKebele = document.getElementById('parentKebele')
    var parentHouseNumber = document.getElementById('parentHouseNumber')
    var parentPOB = document.getElementById('parentPOB')
    var parentEmail = document.getElementById('parentEmail')
    var parentPhone1 = document.getElementById('parentPhone1')
    var parentPhone2 = document.getElementById('parentPhone2')

    if((studentParentCity.value).length < 3){
        setDefaultFor(studentParentCity,"can not be minimum length")
    }else{
        setSuccessFor(studentParentCity)
    }

      if((parentSubCity.value).length<3){
        setDefaultFor(parentSubCity,"parent subb city can not be min length")

    }else{
        setSuccessFor(parentSubCity)
    }

    if(parentKebele.value.trim() === ''){
        setErorFor(parentKebele,"parent kebele can not be null")

    }else{
        setSuccessFor(parentKebele)
    }

    if(parentHouseNumber.value.trim() === ''){
        setErorFor(parentHouseNumber,"parent house number can not be null")

    }else{
        setSuccessFor(parentHouseNumber)
    }

    if(parentPOB.value.trim() === ''){
        setErorFor(parentPOB,"parent post box is can not be null")

    }else{
        setSuccessFor(parentPOB)
    }

    if(parentEmail.value.trim() === ''){
        setErorFor(parentEmail,"parent email can not be null")

    }else{
        setSuccessFor(parentEmail)
    }

    if(parentPhone1.value.trim() === ''){
        setErorFor(parentPhone1,"parent phone number can not be null")

    }else{
        setSuccessFor(parentPhone1)
    }

    if(parentPhone2.value.trim()=== ''){
        setErorFor(parentPhone2,"parent phone number 2 can not be null")

    }else{
        setSuccessFor(parentPhone2)
    }

    if(
        studentParentCity.value.trim === '' ||
        parentSubCity.value.trim === '' ||
        parentKebele.value.trim === '' ||
        parentHouseNumber.value.trim === '' ||
        parentPOB.value.trim === '' ||
        parentEmail.value.trim === '' ||
        parentPhone1.value.trim === '' ||
        parentPhone2.value.trim === ''
    ){

    }else{
           movePages.style.marginLeft = "-75%";
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

function alphaOnly(event) {
  var key = event.keyCode;
  return ((key >= 65 && key <= 90) || key == 8);
};

function allCharacter(event){
    var special = event.keyCode;
    return ((special >=65  && special <= 90) || special == 8 ||  32 ||  43 || 
    special >=47 && special < 58);
};