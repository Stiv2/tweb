package robogp.robodrome.view;

import robogp.robodrome.BoardCell;
import robogp.robodrome.Direction;
import robogp.robodrome.Robodrome;


/**
 *
 * @author Stefano
 */
public class RobodromeAction  implements RobodromeAnimationObserver  { 
    private final  RobodromeView toShow;
    private final Robodrome robodrome;

    private  int posX;
    private int posY;
    
   public  RobodromeAction (RobodromeView toShow,Robodrome robodrome,int posx,int posy) {
       this.posX=posx;
       this.posY=posy;
       this.toShow=toShow;
       this.robodrome=robodrome;  
       this.toShow.addObserver(this);
   }
   
 public  int animation(int movement,Direction dir){
    int move=0;
     switch(dir){
        case E:
        for (int i=posX;i<posX+movement;i++){ 
          BoardCell cell = robodrome.getCell(i, posY);
          System.out.println(cell.getType());
            if(cell.hasWall(Direction.E))
                    break;
          move++;
        }
        posX+=move;
        break;
        
        case W:
        for (int i=posX;i>posX-movement;i--){ 
         BoardCell cell = robodrome.getCell(i, posY);
            System.out.println(cell.getType());
            if(cell.hasWall(Direction.W))
                    break;
          move++;
        }
        posX-=move;
        break;

        case N:
        for (int i=posY;i>posY-movement;i--){ 
          BoardCell cell = robodrome.getCell(posX, i);
          System.out.println(cell.getType());
            if(cell.hasWall(Direction.N))
                    break;
          move++;
        }
        posY-=move;
        break;

        case S:
        for (int i=posY;i<posY+movement;i++){ 
         BoardCell cell = robodrome.getCell(posX, i);
         System.out.println(cell.getType());
            if(cell.hasWall(Direction.S))
                    break;
          move++;
        }
        posY+=move;
        break;
     }
     System.out.println(move+","+movement);
    return move;            
   }
     
     
   
   

    
    @Override
    public void animationFinished() {
       BoardCell cell = robodrome.getCell(posX, posY);
            
        
        

    }

    @Override
    public void animationStarted() {
        
      
    }

   
}
