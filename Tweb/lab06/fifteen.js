/* 
    Created on : 28-dic-2016, 15.33.06
    Author     : Stefano Benedetto
    Lab6 (File fifteen.js)
  
Function that cofigure the puzzle game changing the div elements and the css proprieties
of the "puzzlearea div" squares.
*/
//gost position var
var gostPosTop =  4;
var gostPosLeft = 4;

window.onload = function() {
backgroundimage(); 
initialposition(); 
var shuffle = document.getElementById("shufflebutton");
    shuffle.onclick = squareShuffle;
};

/*function initialposition place,initalize and renomine the "puzzlearea div"*/
function initialposition () {
    var squares = document.querySelectorAll("#puzzlearea div");
    for (var i = 0; i < squares.length; i++) {
       //placing
       var j = Math.floor(i%4);
       squares[i].style.marginLeft= parseInt(j*100) + "px";
       var k = Math.floor(i/4);
       squares[i].style.marginTop = parseInt(k*100) + "px";
       //mouseover observe function
       squares[i].observe("mousedown",squareMove);
       squares[i].observe("mouseover",canMove);
       squares[i].observe("mouseout",mouseout);
       //div setting
       var string="div_"+parseInt(j+1)+"_"+parseInt(k+1);
       squares[i].setAttribute("id",string);
    }
}

/*Function backgroundimage dividing background image in the puzzles squares*/
function backgroundimage() {
    var squares = document.querySelectorAll("#puzzlearea div");
    for (var i = 0; i < squares.length; i++) {
      squares[i].style.backgroundImage = "url('background.jpg')";
      //the divided partition of image 
      squares[i].style.backgroundPositionX= parseInt(-i*100) + "px";
      var j = Math.floor(i/4);
      squares[i].style.backgroundPositionY= parseInt(-(j)*100) + "px";
      
    }
  }
  
/*Function move move element of 100 pixel for the given direction*/
  function move(element,direction){
       if (direction==="down")
       element.style.marginTop= parseInt(element.style.marginTop)+ 100 + "px";  
       if (direction==="up")
       element.style.marginTop= parseInt(element.style.marginTop)- 100 + "px";
       if (direction==="left")
        element.style.marginLeft= parseInt(element.style.marginLeft)- 100 + "px";
       if (direction==="right")
       element.style.marginLeft= parseInt(element.style.marginLeft)+ 100 + "px";
  }
 
 /*Function mover call move for the element in the "gostpostion" its distance is 1 position 
  * top or down or one position left and right and change its div value.
  */
 function mover (posLeft,posTop,element) {
    var string="div_"+parseInt(gostPosLeft)+"_"+parseInt(gostPosTop);
      
     if (posTop===gostPosTop){
         if ((gostPosLeft-posLeft)===1){
              move (element,"right");
              gostPosLeft=posLeft;
              element.setAttribute("id",string);
              return;
         }
            
         if((gostPosLeft-posLeft)===-1){
             move (element,"left");
             gostPosLeft=posLeft;
             element.setAttribute("id",string);
             return;
       }
     }
    
    if (posLeft===gostPosLeft){
         if ((gostPosTop-posTop)===1){
                move (element,"down");  
                gostPosTop=posTop;
                element.setAttribute("id",string);
                return;
         }
         
         if ((gostPosTop-posTop)===-1){
             move (element,"up"); 
             gostPosTop=posTop;
             element.setAttribute("id",string);
             return;
         }
      }
 }
 
/*Function squareMove call mover after a mousedown event */
  function squareMove(event){    
      var posLeft= Math.floor((event.pageX-374.500)/100);
      var posTop = Math.floor((event.pageY-33.656)/100);
     
      var element= elementByPosition (posLeft,posTop);
      mover (posLeft,posTop,element);
  }

/*Function canMove color red the square selected by mouseover if it can be moved*/ 
function canMove(event){
//distance from "gostpiece" 
var disLeft= Math.floor((event.pageX-374.500)/100)-gostPosLeft;
var disTop = Math.floor((event.pageY-33.656)/100)-gostPosTop;
disLeft=Math.abs(disLeft);
disTop=Math.abs(disTop);

var element= elementByPosition (Math.floor((event.pageX-374.500)/100),Math.floor((event.pageY-33.656)/100));
  
    if ((disTop===0 && disLeft===1)||(disLeft===0 && disTop===1))
          element.style.color="red";   
   
}
/*Function mouseout recolor black the square after a mouseout event*/ 
  function mouseout (event)  {
      this.style.color="black";   
  }
  

/*Function squareShuffle shuffle the puzzle after a pression of the shuffle button
 * by a random call (600->800) of mover function with random element
 */
  function squareShuffle (){
       var times= Math.floor(Math.random() *200)+600;
      for (var i=0; i<times;i++){
          //getting the random position
          var posTop =  Math.floor (Math.random() * 4)+1;
          var posLeft =  Math.floor (Math.random() * 4)+1;
 
          var element= elementByPosition (posLeft,posTop);
          if (element!==null)
               mover (posLeft,posTop,element);
              
      }
  }

/*Function elementByPosition return the div element of the given cordinates*/
function elementByPosition (posLeft,posTop){
       var string= "div_"+parseInt(posLeft)+"_"+parseInt(posTop);
       return  document.getElementById(string);
}