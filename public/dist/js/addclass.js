$('#class_label').change(function () {
    var bv = $('#class_label').val();
   
    console.log(bv);
    fetchCourse(bv);


  });
  function fetchCourse(bv) {
    $.ajax({
        type: 'GET', 
        url: 'viewcourse/'+bv,
        dataType : 'json',
        
        success:function (data) {
           var rows = '';
            console.log(data);
         //   data.forEach(d => {
               
         //         rows+= ' <label class="PillList-item" id="subjects">'+
         //                 '<input type="checkbox" name="subjects[]" value="'+d.id+'">'+
         //                '<span class="PillList-label">'+d.subject_name+
         //                '<span class="Icon Icon--checkLight Icon--smallest"><i class="fa fa-check"></i></span>'+
         //                ' </span></label>'
         //    // rows +=' <option value="'+d.floor+'" selected> '+d.floor+ '</option>  ';
         //   });
          // $('#select_subject').html(rows);
           
        },
        error:function (data) {

        }
     }); 
  }

  $('#class_group').change(function(){
   var class_group = $('#class_group').val();
   //var sub_group = $('#class_group').attr('name');
   var sub_group = $(this).find("option:selected").text();
   
   if(sub_group=='KG 1 - KG 3'){
      var sub_group_array_1 = [
         {
            "key":"KG 1",
            "value":"KG 1"
         },
   
         {
            "key":"KG 2",
            "value":"KG 2"
         },
   
         {
            "key":"KG 3",
            "value":"KG 3"
         }
            
      ]
      var rows = '';
     sub_group_array_1.forEach(d=>{

     
     
      rows+= ' <label class="PillList-item" id="subjects">'+
                        '<input type="checkbox" name="classes[]" value="'+d.value+'">'+
                       '<span class="PillList-label">'+d.key+
                       '<span class="Icon Icon--checkLight Icon--smallest"><i class="fa fa-check"></i></span>'+
                       ' </span></label>'
                      
                     });
                     $('#select_class').html(rows);
   }

   else if(sub_group == 'Grade 1 - Grade 4'){
      var  sub_group_array_2 = [
         {
            "key":"Grade 1",
            "value":"Grade 1"
         },
         
         {
            "key":"Grade 2",
            "value":"Grade 2"
         },
   
         {
            "key":"Grade 3",
            "value":"Grade 3"
         },
   
         {
            "key":"Grade 4",
            "value":"Grade 4"
         }
      ]

      var rows = '';
      sub_group_array_2.forEach(d=>{
 
      
      
       rows+= ' <label class="PillList-item" id="subjects">'+
                         '<input type="checkbox" name="classes[]" value="'+d.value+'">'+
                        '<span class="PillList-label">'+d.key+
                        '<span class="Icon Icon--checkLight Icon--smallest"><i class="fa fa-check"></i></span>'+
                        ' </span></label>'
                       
                      });
                      $('#select_class').html(rows);
   }

   else if(sub_group == 'Grade 5 - Grade 6'){
      var sub_group_array_3 = [
         {
            "key":"Grade 5",
            "value":"Grade 5"
         },
   
         {
            "key":"Grade 6",
            "value":"Grade 6"
         }
       ]

       var rows = '';
       sub_group_array_3.forEach(d=>{
  
       
       
        rows+= ' <label class="PillList-item" id="subjects">'+
                          '<input type="checkbox" name="classes[]" value="'+d.value+'">'+
                         '<span class="PillList-label">'+d.key+
                         '<span class="Icon Icon--checkLight Icon--smallest"><i class="fa fa-check"></i></span>'+
                         ' </span></label>'
                        
                       });
                       $('#select_class').html(rows);
   }

   else if(sub_group=='Grade 7 - Grade 8'){
      var sub_group_array_4 = [
         {
            "key":"Grade 7",
            "value":"Grade 7"
         },
   
         {
            "key":"Grade 8",
            "value":"Grade 8"
         }
       ]

       var rows = '';
       sub_group_array_4.forEach(d=>{
  
       
       
        rows+= ' <label class="PillList-item" id="subjects">'+
                          '<input type="checkbox" name="classes[]" value="'+d.value+'">'+
                         '<span class="PillList-label">'+d.key+
                         '<span class="Icon Icon--checkLight Icon--smallest"><i class="fa fa-check"></i></span>'+
                         ' </span></label>'
                        
                       });
                       $('#select_class').html(rows);
   }


   console.log(class_group+" "+sub_group);
   fetchSubjects(class_group);
  });

  function fetchSubjects(class_group) {
   $.ajax({
       type: 'GET', 
       url: 'getsubjects/'+class_group,
       dataType : 'json',
       
       success:function (data) {
          var rows = '';
           console.log(data);
          data.forEach(d => {
              
                rows+= ' <label class="PillList-item" id="subjects">'+
                        '<input type="checkbox" name="subjects[]" value="'+d.id+'">'+
                       '<span class="PillList-label">'+d.subject_name+
                       '<span class="Icon Icon--checkLight Icon--smallest"><i class="fa fa-check"></i></span>'+
                       ' </span></label>'
           // rows +=' <option value="'+d.floor+'" selected> '+d.floor+ '</option>  ';
          });
          $('#select_subject').html(rows);
          
       },
       error:function (data) {

       }
    }); 
 }


  

 