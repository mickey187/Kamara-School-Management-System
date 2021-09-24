




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


// var studentGrade = document.getElementById("studentGrade")
// studentGrade.oninput = function(){
//     if((studentGrade.value).length >= 3){
//         setSuccessFor(studentGrade);
//     }if((studentGrade.value).length < 3){
//         setDefaultFor(studentGrade,"enter the correct number")
//     }if((studentGrade.value).length > 20){
//         setErorFor(studentGrade,"you reach the max length")
//     }
// };

// var studentStream = document.getElementById("studentStream")
// studentStream.oninput = function(){
//     if((studentStream.value).length >= 3){
//         setSuccessFor(studentStream);
//     }if((studentStream.value).length < 3){
//         setDefaultFor(studentStream,"enter the correct number")
//     }if((studentStream.value).length > 20){
//         setErorFor(studentStream,"you reach the max length")
//     }
// };

studentFirstNextBtn.addEventListener("click",function(){
    // var studentFirstName = $('#studentFirstName').val();
    var studentMiddleName = $('#studentMiddleName').val();
    var studentLastName = $('#studentLastName').val();
    var studentBirthDate = $('#studentBirthDate').val();
    var studentBirthPlace = $('#studentBirthPlace').val();
    var studentGender = $('#studentGender').val();
    var studentCitizen = $('#studentCitizen').val();
    var studentImage = $('#img-pro').val();
    // var studentGrade = document.getElementById("studentGrade")
    // var studentStream = document.getElementById("studentStream")
    

    if(studentFirstName && studentMiddleName && studentLastName && studentBirthDate && studentBirthPlace &&  studentGender && studentCitizen && studentImage)
    {
         movePages.style.marginLeft = "-25%";
            bullet[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            current += 1;
    }else{
         if($('#studentFirstName').val()==="")
            setErorFor(document.getElementById('studentFirstName'),"የተማሪ የመጀመሪያ ስም ባዶ መሆን አይችልም፡፡ ");
        else
            setSuccessFor(document.getElementById('studentFirstName'));

        if($('#studentMiddleName').val()==="")
            setErorFor(document.getElementById('studentMiddleName'),"የተማሪ የአባት ስም ባዶ መሆን አይችልም፡፡ ");
        else
            setSuccessFor(document.getElementById('studentMiddleName'));

        if($('#studentLastName').val()==="")
            setErorFor(document.getElementById('studentLastName'),"የተማሪ የአያት ስም ባዶ መሆን አይችልም፡፡ ");
        else
            setSuccessFor(document.getElementById('studentLastName'));

        if($('#studentGender').val()==="")
            setErorFor(document.getElementById('studentGender'),"የተማሪ ጾታ ባዶ መሆን አይችልም፡፡ ");
        else
            setSuccessFor(document.getElementById('studentGender'));

        if($('#studentCitizen').val()==="")
            setErorFor(document.getElementById('studentCitizen'),"የተማሪ ዜግነት ባዶ መሆን አይችልም፡፡ ");
        else
            setSuccessFor(document.getElementById('studentCitizen'));

        if($('#studentBirthPlace').val()==="")
            setErorFor(document.getElementById('studentBirthPlace'),"የተማሪ ትውልድ ቦታ ባዶ መሆን አይችልም፡፡  ");
        else
            setSuccessFor(document.getElementById('studentBirthPlace'));

        if($('#img-pro').val()==="")
            setErorFor(document.getElementById('img-pro'),"የተማሪ ፎቶ ባዶ መሆን አይችልም፡፡ ");
        else
            setSuccessFor(document.getElementById('img-pro'));

       if($('#studentBirthDate').val()==="")
            setErorFor(document.getElementById('studentBirthDate'),"የተማሪ የልደት ቀን ባዶ መሆን አይችልም፡፡ ");
       else
           setSuccessFor(document.getElementById('studentBirthDate'));   
    }   

});

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
    var studentPreviousSchool = $('#studentPreviousSchool').val();
    var studentTransferReason = $('#studentTransferReason').val();
    var studentExpelsiionStatus = $('#studentExpelsiionStatus').val();
    var studentSespensionStatus = $('#studentSespensionStatus').val();
    var studentSpecialEducation = $('#studentSpecialEducation').val();
    var studentNativeLanguage = $('#studentNativeLanguage').val();
    var studentDisability = $('#studentDisability').val();
    var studentMedicalCondition = $('#studentMedicalCondition').val();
    var studentBloodType = $('#studentBloodType').val();

 if(studentPreviousSchool && studentTransferReason && studentExpelsiionStatus && studentSespensionStatus && 
 studentSpecialEducation && studentNativeLanguage && studentDisability && studentMedicalCondition && studentBloodType)
 {
           movePages.style.marginLeft = "-50%";
            bullet[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            current += 1;
}else{
           if(studentPreviousSchool==="")
                setErorFor(document.getElementById('studentPreviousSchool'),"ከዚህ በፊት የ ተማረበት ት/ቤት ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('studentPreviousSchool'));

            if(studentTransferReason==="")
                setErorFor(document.getElementById('studentTransferReason'),"ካለፈው ት/ቤት የተዘዋወረበት ምክንያት ባዶ መሆን አይችልም፡፡");
            else
                setSuccessFor(document.getElementById('studentTransferReason'));

            if(studentExpelsiionStatus==="")
                setErorFor(document.getElementById('studentExpelsiionStatus'),"ተማሪው ተባሮ ያቃል ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('studentExpelsiionStatus'));

            if(studentSespensionStatus==="")
                setErorFor(document.getElementById('studentSespensionStatus'),"አሁን ላይ ታግዷል ወይ የሚለው ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('studentSespensionStatus'));

            if(studentSpecialEducation==="")
                setErorFor(document.getElementById('studentSpecialEducation'),"የልዩ ት/ት ስልጠና ወስዷል የሚለው ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('studentSpecialEducation'));

            if(studentNativeLanguage==="")
                setErorFor(document.getElementById('studentNativeLanguage'),"በቤት ውስጥ የሚናገረው ቋንቋ ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('studentNativeLanguage'));

            if(studentDisability==="")
                setErorFor(document.getElementById('studentDisability'),"የአካል ጉዳት አለበት ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('studentDisability'));

            if(studentMedicalCondition==="")
                setErorFor(document.getElementById('studentMedicalCondition'),"የጤና ሁኔት ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('studentMedicalCondition'));

            if(studentBloodType==="")
                setErorFor(document.getElementById('studentBloodType'),"የደም አይነት ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('studentBloodType'));
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

    var parentFirstName = $('#parentFirstName').val();
    var parentMiddleName = $('#parentMiddleName').val();
    var parentLastName = $('#parentLastName').val();
    var parentGender = $('#parentGender').val();
    var parentRelation = $('#parentRelation').val();
    var parentEmergencyContact = $('#parentEmergencyContact').val();
    var parentPriority = $('#parentPriority').val();

    if(parentFirstName && parentMiddleName && parentLastName && parentGender && parentRelation && parentEmergencyContact && parentPriority)
    {
            movePages.style.marginLeft = "-75%";
            bullet[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            current += 1;
    }else{
         if($('#parentFirstName').val()==="")
            setErorFor(document.getElementById('parentFirstName'),"የወላጅ የመጀመሪያ ስም ባዶ መሆን አይችልም፡፡ ");
        else
            setSuccessFor(document.getElementById('parentFirstName'));

        if($('#parentMiddleName').val()==="")
            setErorFor(document.getElementById('parentMiddleName'),"የወላጅ የአባት ስም ባዶ መሆን አይችልም፡፡ ");
        else
            setSuccessFor(document.getElementById('parentMiddleName'));

        if($('#parentLastName').val()==="")
            setErorFor(document.getElementById('parentLastName'),"የወላጅ የአያት ስም ባዶ መሆን አይችልም፡፡ ");
        else
            setSuccessFor(document.getElementById('parentLastName'));

        if($('#parentGender').val()==="")
            setErorFor(document.getElementById('parentGender'),"የወላጅ ጾታ ባዶ መሆን አይችልም፡፡ ");
        else
            setSuccessFor(document.getElementById('parentGender'));

        if($('#parentRelation').val()==="")
            setErorFor(document.getElementById('parentRelation'),"ከተማሪው ጋር ያለው ግንኙነት ባዶ መሆን አይችልም፡፡ ");
        else
            setSuccessFor(document.getElementById('parentRelation'));

        if($('#parentEmergencyContact').val()==="")
            setErorFor(document.getElementById('parentEmergencyContact'),"የአደጋ ጌዜ ተጠሪ ባዶ መሆን አይችልም፡፡  ");
        else
            setSuccessFor(document.getElementById('parentEmergencyContact'));

        if($('#parentPriority').val()==="")
            setErorFor(document.getElementById('parentPriority'),"የአደጋ ጌዜ ተጠሪ ቅድሚያ ባዶ መሆን አይችልም፡፡ ");
        else
            setSuccessFor(document.getElementById('parentPriority'));
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
    var studentParentCity =  $('#parentCity').val();
    var parentSubCity = $('#parentSubCity').val();
    var parentKebele = $('#parentKebele').val();
    var parentHouseNumber = $('#parentHouseNumber').val();
    var parentPOB = $('#parentPOB').val();
    var parentEmail = $('#parentEmail').val();
    var parentPhone1 = $('#parentPhone1').val();
    var parentPhone2 = $('#parentPhone2').val();

    if(studentParentCity && parentSubCity && parentKebele && parentHouseNumber && parentPOB && parentEmail && parentPhone1 && parentPhone2)
    {
             movePages.style.marginLeft = "-75%";
             bullet[current - 1].classList.add("active");
             progressText[current - 1].classList.add("active");
             progressCheck[current - 1].classList.add("active");
             current += 1;
    }else{
     if(parentCity==="")
        setErorFor(document.getElementById('parentCity'),"ከተማ ባዶ መሆን አይችልም፡፡ ");
     else
       setSuccessFor(document.getElementById('parentCity'));

     if(parentSubCity==="")
        setErorFor(document.getElementById('parentSubCity'),"ክፍለ ከተማ ባዶ መሆን አይችልም፡፡ ");
     else
        setSuccessFor(document.getElementById('parentSubCity'));

    if(parentKebele==="")
        setErorFor(document.getElementById('parentKebele'),"ቀበሌ ባዶ መሆን አይችልም፡፡ ");
     else
        setSuccessFor(document.getElementById('parentKebele'));

    if(parentHouseNumber==="")
        setErorFor(document.getElementById('parentHouseNumber'),"የቤት ቁጥር ባዶ መሆን አይችልም፡፡ ");
     else
        setSuccessFor(document.getElementById('parentHouseNumber'));

     if(parentPOB==="")
        setErorFor(document.getElementById('parentPOB'),"ፖስታ ሳጥን ባዶ መሆን አይችልም፡፡ ");
     else
         setSuccessFor(document.getElementById('parentPOB'));

     if(parentEmail==="")
        setErorFor(document.getElementById('parentEmail'),"ኢሜል  ባዶ መሆን አይችልም፡፡ ");
     else
        setSuccessFor(document.getElementById('parentEmail'));

    if(parentPhone1==="")
        setErorFor(document.getElementById('parentPhone1'),"ስልክ ቁጥር ባዶ መሆን አይችልም፡፡ ");
     else
        setSuccessFor(document.getElementById('parentPhone1'));

   if(parentPhone2==="")
        setErorFor(document.getElementById('parentPhone2'),"ሁለተኛ ስልክ ቁጥር ባዶ መሆን አይችልም፡፡ ");
    else
      setSuccessFor(document.getElementById('parentPhone2'));
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

function allCharacter(event) {
    var specialCharacter = event.keyCode;
    return ((specialCharacter >= 65 && key <= 90) || specialCharacter == 8 || specialCharacter ==32 ||
    specialCharacter >=47 && specialCharacter <=57 );
};
