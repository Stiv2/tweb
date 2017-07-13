package robogp.train;




import java.util.ArrayList;
import robogp.matchmanager.RobotMarker;
import robogp.robodrome.Direction;
import robogp.robodrome.Rotation;
import robogp.robodrome.view.RobodromeAction;


import robogp.robodrome.view.RobodromeView;

/**
 *
 * @author Stefano
 */

public class Program  extends java.util.Observable  implements Runnable  {
     private static Program singleInstance;
     private  final ArrayList <String> instruction ;
     private  final Instructions instructions;
     private final  RobodromeView toShow;
     private final  RobotMarker robot;
     private final  RobodromeAction robodromeAction;
     private Direction direction=Direction.E;

    
      private final State status;
    
    private Program (String instruction,RobodromeView toShow,RobotMarker robot,RobodromeAction robodromeAction){
        this.instruction=new ArrayList(); 
        this.instruction.add(instruction);
        this.instructions=Instructions.getInstance();
        this.toShow = toShow;
        this.robot= robot;
        this.robodromeAction=robodromeAction;
        this.status=State.getInstance();
        
        
    }
    public static Program getInstance(){
        return  Program.singleInstance;
    }
    public static Program getInstance(String instruction) {
        singleInstance.addInstruction (instruction);
        return  Program.singleInstance;
    }

    public ArrayList<String> getInstruction() {
        return instruction;
    }
    
    
    
    public static Program getInstance(String instruction,RobodromeView toShow,RobotMarker robot,RobodromeAction robodromeAction) {
        if (Program.singleInstance == null) {
            Program.singleInstance = new Program(instruction,toShow,robot,robodromeAction);
        }else{
            if (instruction!=null)
                 singleInstance.addInstruction(instruction);
        }
        return  Program.singleInstance;
    }
    
    
    private  void  addInstruction (String instru){
        if (instruction!=null){
          this.instruction.add(instru);
          setChanged();
          notifyObservers();
        }     
          
    }
    
    public void rmInstruction (int instruction){
        this.instruction.remove(instruction+1);  
        setChanged();
        notifyObservers();
    }
    
    public void swapInstruction (int instruction_1,int instruction_2){ 
        
        String instruction1 = this.instruction.get(instruction_1+1);
        this.instruction.set(instruction_1+1,this.instruction.get(instruction_2+1));
        this.instruction.set(instruction_2+1,instruction1);
        System.out.println(instruction1);
        System.out.println(this.instruction.get(instruction_2+1));
        
          setChanged();
          notifyObservers();
          
    }
        
    public void directionRefresh(Rotation rot){
        switch(direction){
            case N:
                switch(rot){
                    case CCW90:
                        direction=Direction.W;
                        break;
                    case CW180:
                        direction=Direction.S;
                        break;
                    case CW90:
                        direction=Direction.E;
                        break;
                     case CCW180:
                        direction=Direction.S;
                        break;
                }
              break;
            case E:
                switch(rot){
                    case CCW90:
                        direction=Direction.N;
                        break;
                    case CW180:
                        direction=Direction.W;
                        break;
                    case CW90:
                        direction=Direction.S;
                        break;
                     case CCW180:
                        direction=Direction.W;
                        break;
                }
             break;
            case S:
                switch(rot){
                    case CCW90:
                        direction=Direction.E;
                        break;
                    case CW180:
                        direction=Direction.N;
                        break;
                    case CW90:
                        direction=Direction.W;
                        break;
                     case CCW180:
                        direction=Direction.N;
                        break;
                }
             break;
            case W:
                switch(rot){
                    case CCW90:
                        direction=Direction.S;
                        break;
                    case CW180:
                        direction=Direction.E;
                        break;
                    case CW90:
                        direction=Direction.N;
                        break;
                     case CCW180:
                        direction=Direction.E;
                        break;
                }
             break;
        }
    }
    

    
    public void run(){
     int index=0;
     Istruction execIinst; 
     
    if (instruction!=null||instructions!=null){
       while ((index < instruction.size())&&( status.getState().equals("started") )){
         for (int i=0; i<instructions.getInstruction().size();i++){
             if (instruction.get(index).equals(instructions.getInstruction().get(i).getName())){
                  execIinst= instructions.getInstruction().get(i); 
                  
                 if(execIinst.getMovement()-robodromeAction.animation(execIinst.getMovement(),direction)!=0){

                      toShow.addRobotMove(robot, robodromeAction.animation(execIinst.getMovement(),direction)-1, direction,execIinst.getRotation());

                   }
                    else {
                      toShow.addRobotMove(robot, execIinst.getMovement(), direction, execIinst.getRotation());
                      directionRefresh(execIinst.getRotation());
                    }
 
                  toShow.addPause(250);
                  robodromeAction.cellAnimation(direction);
                  
                  
                  
            }
          }
         index++; 
       }
     }
    toShow.play();
    instruction.clear();
   }
    
 }

