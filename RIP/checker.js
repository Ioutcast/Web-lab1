function check_submit()  {

         let y = parseFloat($('#textfieldY').val().replace(",", "."));
         let x = $("#SelectionX option:selected" ).text();
         let r = $("input[name='R']:checked").val();

         bool = true;
 ans = '';

 
             if(isNaN(x)){
              ans = "Укажите значение X";
             bool =  false;}

         if(isNaN(r)){
             ans = "Укажите значение R";
             bool =  false;
         }


if(isNaN(y)||y<=-3||y>=3){
             $("#textfieldY").css("background-color", "#FDD9D9");
   if(isNaN(y)){
   ans = "Y не является числом";
   }else{
   ans = "Значение Y должно быть в диапазоне (-3;3)" ;
 }
             bool =  false;
         }
         else
         {
             $("#textfieldY").css("background-color", "white");
         }

 	if(bool == false){
 	alert(ans);
	}

	
         return bool;

     }