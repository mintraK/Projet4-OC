document.getElementById("mail").addEventListener("blur", function (e) {
        
    // Correspond à une chaîne de la forme xxx@yyy.zzz
    var regexCourriel = /.+@.+\..+/;
    var validiteCourriel = "";
    if (!regexCourriel.test(e.target.value)) {
    document.getElementById("helpmail").style.display = "block";
    document.getElementById("helpmail").textContent = "Adresse invalide" ;
    e.preventDefault();
    e.stopPropagation();
    }
    else{
    document.getElementById("helpmail").style.display = "none";
    document.getElementById("helpmail").textContent = "Utilisez autre émail" ;
    e.preventDefault();
    e.stopPropagation();
    }
    
});

document.getElementById("repwd").addEventListener("blur",function(e){


if( document.getElementById("pwd").value!= e.target.value){
    // mots de passe ne sont pas identique
    document.getElementById("helprepwd").style.display = "block";
    e.preventDefault();
    e.stopPropagation(); //rester sur la page  
}
else{
    
    document.getElementById("helprepwd").style.display = "none";
    e.preventDefault();
    e.stopPropagation(); //rester sur la page  
}

});

document.getElementById("pwd").addEventListener("blur",function(e){

    if(document.getElementById("repwd").value.length!=0 ){
        if( document.getElementById("repwd").value!= e.target.value){
            // mots de passe ne sont pas identique
            document.getElementById("helprepwd").style.display = "block";
            e.preventDefault();
            e.stopPropagation(); //rester sur la page  
        }
        else{
            
            document.getElementById("helprepwd").style.display = "none";
            e.preventDefault();
            e.stopPropagation(); //rester sur la page  
        }

    }

});
