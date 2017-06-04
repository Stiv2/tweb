/*   Created on : 02-feb-2017,
     Author     : Stefano Benedetto 
     Progetto Finale (java3.js) 
 * Parte di gestione ajax della pagina principale aono presenti funzioni standard 
 * viste durante il corso 
 * 
 */
window.onload = function() {
    //richiesta ajax all'avvio 
    new Ajax.Request("search-all.php", 
        {
            method: "GET",
            onSuccess: showPage,
            onFailure: ajaxFailed,     
            onException: ajaxFailed
        }
    );
   
       $("big-link-1").onclick = categoryClick;
       
   
};

function showPage(ajax) {

    // dopo aver ricevuto i dati vegono completati i vari dati della pagina principale 
   var personal = ajax.responseXML.getElementsByTagName("personal")[0];
   var titleNode  = personal.getElementsByTagName("name")[0];
   var title  = titleNode.firstChild.nodeValue;
   
      var h5 = document.createElement("h5");
      h5.innerHTML ="Welcome ,"+title+" Love to see you back.";
      $("col-md-12").appendChild(h5);
    
    var adressNode  = personal.getElementsByTagName("adress")[0];
    var adress = adressNode.firstChild.nodeValue;
      
      var h4 = document.createElement("h4");
      h4.innerHTML =adress;
      $("panel-body").appendChild(h4);
    
    var frequencyNode  = personal.getElementsByTagName("frequency")[0];
    var frequency = frequencyNode.firstChild.nodeValue;
      
      var p1 = document.createElement("p");
     
      if (frequency==="munt"){
        p1.innerHTML ="every month";
       }
      else{
        p1.innerHTML ="every week";
      }  
      p1.className="main-text";
    $("text-box1").appendChild(p1);  
    
    var dateNode  = personal.getElementsByTagName("date")[0];
    var date = dateNode.firstChild.nodeValue;
    
      var p2 = document.createElement("p");
      p2.className="main-text";
      p2.innerHTML =date;
      $("text-box2").appendChild(p2);
      
    var ordersNode  = personal.getElementsByTagName("orders")[0];
    var orders = ordersNode.firstChild.nodeValue;
    
      var p3 = document.createElement("p");
      p3.className="main-text";
      p3.innerHTML =orders ;
      $("text-box3").appendChild(p3);
   
    var product = ajax.responseXML.getElementsByTagName("product");
    for (var i = 0; i < product.length; i++) {
        var productNode  = product[i].getElementsByTagName("name")[0];
        var productName =  productNode.firstChild.nodeValue;
        var avalbNode  = product[i].getElementsByTagName("avalb")[0];
        var productavalb =  avalbNode.firstChild.nodeValue;
        var pakageNode  = product[i].getElementsByTagName("pakage")[0];
        var pakage =  pakageNode.firstChild.nodeValue;
        var priceNode  = product[i].getElementsByTagName("price")[0];
        var price =  priceNode.firstChild.nodeValue;
        
        var tableNode=document.getElementsByTagName("tbody")[0];
        var tr = document.createElement("tr");
        var td = document.createElement("td");
        td.innerHTML=i+1;
        tr.appendChild(td);
        tableNode.appendChild(tr);
        tr.appendChild(td);
        var td2 = document.createElement("td");
        td2.innerHTML=productName;
        tr.appendChild(td2);
        var td3 = document.createElement("td");
        td3.innerHTML=productavalb;
        tr.appendChild(td3);
        var td4 = document.createElement("td");
        td4.innerHTML=pakage;
        tr.appendChild(td4);
        var td5 = document.createElement("td");
        td5.innerHTML=price ;
        tr.appendChild(td5);
        
        
        
    }
    
}
//chiamata ajax nel caso venga cliccato il link offert 
function categoryClick() {
    $("big-link-1").style.visibility = "hidden";
    
    new Ajax.Request("search-offer.php", 
        {
            method: "GET",
          
            onSuccess: showOffert,
            onFailure: ajaxFailed,
            onException: ajaxFailed
        }
    );
}
//completamento parte offert stesso principio della funzione precedente
function showOffert(ajax) {
     var product = ajax.responseXML.getElementsByTagName("offert");
       for (var i = 0; i < product.length; i++) {
        var productNode  = product[i].getElementsByTagName("name")[0];
        var productName =  productNode.firstChild.nodeValue;
        var descrNode  = product[i].getElementsByTagName("descr")[0];
        var priceNode  = product[i].getElementsByTagName("price")[0];
        var productPrice =  priceNode.firstChild.nodeValue;
        var descr= descrNode.firstChild.nodeValue;
        
        var li = document.createElement("li");
        li.innerHTML = productName;
        li.style.color="white";
        li.style.fontSize ="20px";
        $("main-menu").appendChild(li);
        var li2 = document.createElement("li");
        li2.innerHTML = descr;
        $("main-menu").appendChild(li2);
         var li3 = document.createElement("li");
        li3.innerHTML = "Scount "+productPrice+" $";
        li3.style.color="white";
        $("main-menu").appendChild(li3);
        
    }
    
}

//gestione delle eccezzioni
function ajaxFailed(ajax, exception) {
	var errorMessage = "Error making Ajax request:\n\n";
	if (exception) {
		errorMessage += "Exception: " + exception.message;
	} else {
		errorMessage += "Server status:\n" + ajax.status + " " + ajax.statusText + 
		                "\n\nServer response text:\n" + ajax.responseText;
	}
	alert(errorMessage);
}