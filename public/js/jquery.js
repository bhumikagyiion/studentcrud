//     $(document).ready(function(){
  
//   $("#mobile").on("blur", function(){
//         var mobNum = $(this).val();
//         var filter = /^\d*(?:\.\d{1,2})?$/;

//           if (filter.test(mobNum)) {
//             if(mobNum.length==10){
//                   alert("valid");
//               $("#mobile-valid").removeClass("hidden");
//               $("#folio-invalid").addClass("hidden");
//              } else {
//                 alert('Please put 10  digit mobile number');
//                $("#folio-invalid").removeClass("hidden");
//                $("#mobile-valid").addClass("hidden");
//                 return false;
//               }
//             }
//             else {
//               alert('Not a valid number');
//               $("#folio-invalid").removeClass("hidden");
//               $("#mobile-valid").addClass("hidden");
//               return false;
//            }
    
//   });
  
// });

$(document).ready(function() {

    $('.mobile').on('keypress', function(e) {
   
               var $this = $(this);
               var regex = new RegExp("^[0-9\b]+$");
               var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
               // for 10 digit number only
               if ($this.val().length > 9) {
                   e.preventDefault();
                   return false;
               }
               if (e.charCode < 54 && e.charCode > 47) {
                   if ($this.val().length == 0) {
                       e.preventDefault();
                       return false;
                   } else {
                       return true;
                   }
   
               }
               if (regex.test(str)) {
                   return true;
               }
               e.preventDefault();
               return false;
           });
   
      });