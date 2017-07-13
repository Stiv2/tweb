package robogp.robodrome.view;

import robogp.matchmanager.RobotMarker;
import robogp.robodrome.BeltCell;
import robogp.robodrome.BoardCell;
import robogp.robodrome.Direction;
import robogp.robodrome.FloorCell;
import robogp.robodrome.PitCell;
import robogp.robodrome.Robodrome;
import robogp.robodrome.Rotation;



/**
 *
 * @author Stefano
 */
public class RobodromeAction  implements RobodromeAnimationObserver  { 
    private final  RobodromeView toShow;
    private final Robodrome robodrome;
    private final RobotMarker robot;

    private  int posX;
    private int posY;
    private  int startPosx;
    private  int startPosy;
    
    
   public  RobodromeAction (RobodromeView toShow,Robodrome robodrome,RobotMarker robot) {
       this.posX=0;
       this.posY=5;
       this.startPosx=0;
       this.startPosy=5;
       this.toShow=toShow;
       this.robodrome=robodrome;  
       this.toShow.addObserver(this);
       this.robot= robot;
   }
  
 public  int animation(int movement,Direction dir){
    int move=0;
     switch(dir){
        case E:
        for (int i=posX;i<posX+movement;i++){
            
            if(!searchWall(robodrome.getCell(posY,i),Direction.E)&&
                    !searchWall(robodrome.getCell(posY,i+1),Direction.W)){
                move++;
            }
        }
        System.out.println(move+""+posX+""+movement);
         posX=posX+move;
        break;
        
        case W:
        for (int i=posX;i>posX-movement;i--){ 
           
           if(!searchWall(robodrome.getCell(posY,i),Direction.W)&&
                    !searchWall(robodrome.getCell(posY,i-1),Direction.E))
                  move++;
        }
        System.out.println(move+""+posX+""+dir);
         posX=posX-move;
        break;

        case N:
        for (int i=posY;i>posY-movement;i--){ 
          
            if(!searchWall(robodrome.getCell(i,posX),Direction.N)&&
                    !searchWall(robodrome.getCell(i-1,posX),Direction.S))
                move++;
        }
        System.out.println(move+""+posY+""+dir);
         posY=posY-move;
        break;

        case S:
        for (int i=posY;i<posY+movement;i++){ 
            
            if(!searchWall(robodrome.getCell(i,posX),Direction.S)&&
                    !searchWall(robodrome.getCell(i+1,posX),Direction.N))
                 move++;
        }
        System.out.println(move+""+posY+""+dir);
        posY=posY+move;
        break;
     }
    return move;            
   }
     
     
   
  private boolean searchWall(BoardCell cell,Direction direction){
       char type =cell.getType();
       boolean flag=false;
       switch (type) {
            case 'F':
            FloorCell f=(FloorCell)cell;
            if (f.hasWall(direction)){
                flag =true;
            }
                break;
            case 'P':
            PitCell p=(PitCell)cell;
            if (p.hasWall(direction)){
                flag =true;
            }         
                break;
            case 'B':
                flag=false;
                break;
            case 'E':
             flag=false;
                break;
              
        }

      return flag; 
   }

 
public  void cellAnimation (Direction direction) {
    BoardCell cell=robodrome.getCell(posY,posX);
    switch (cell.getType()) {
            case 'F':
            
                break;
            case 'P':
            toShow.addRobotFall(robot);
            posX=startPosx;
            posY=startPosy;
                break;     
            case 'E':
            BeltCell e=(BeltCell)cell;
            toShow.addRobotMove(robot, 2,e.getOutputDirection() , Rotation.NO);
            animation(2,e.getOutputDirection());
                break;    
            case 'B':
            BeltCell b=(BeltCell)cell;
            toShow.addRobotMove(robot, 1,b.getOutputDirection() , Rotation.NO);
            animation(1,b.getOutputDirection()); 
            
                break;
              
        }
   }

public void SetInitialPos(int posx,int posy){
    this.startPosx=posx;
    this.startPosy=posy;
    posX=startPosx;
    posY=startPosy;
    
}
    
    @Override
   public void animationFinished() {
       // toShow.placeRobot(robot, Direction.E, startPosy, startPosx, true);
      
       
    }

    @Override
    public void animationStarted() {
        
      
    }

   
}
