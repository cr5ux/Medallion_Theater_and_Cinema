
    var searchForm=document.getElementById('s');
    var search=document.getElementById('Search');
    var searched=document.getElementById('searchedMovie');
    document.getElementsByClassName
      
    searchForm.addEventListener('submit',function(e){
        e.preventDefault();
        var xhttp= new XMLHttpRequest();

        xhttp.open('POST','search.php',true);
        xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhttp.onload=function()
        {  
           searched.innerHTML=this.responseText;
           setTimeout(() => {
                searched.innerHTML="";
            }, "10000");
        
            
        }

        xhttp.send('search='+search.value);
   
         
    }
    )
    search.addEventListener('search',function(){
  
        var xhttp= new XMLHttpRequest();

        xhttp.open('POST','search.php',true);
        xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");

        xhttp.onload=function()
        {
            searched.innerHTML=this.responseText;
            setTimeout(() => {
                searched.innerHTML="";
            }, "10000");
        }
        xhttp.send('search='+search.value);
    
    }
    )

 