package robogp.train;




import java.util.ArrayList;
import robogp.matchmanager.RobotMarker;
import robogp.robodrome.Direction;


import robogp.robodrome.view.RobodromeView;

/**
 *
 * @author Stefano
 */

public class Program implements Runnable {
     private static Program singleInstance;
     private ArrayList <String> instruction ;
     private final Instructions instructions; 
     private RobodromeView toShow;
     private RobotMarker robot;

    
      private State status;
    
    private Program (String instruction,RobodromeView toShow,RobotMarker robot){
        this.instruction =new ArrayList<String>();
        this.instruction.add(instruction);
        this.instructions=Instructions.getInstance();
        this.toShow = toShow;
        this.robot= robot;
        this.status=State.getInstance();
        
    }
    
    public static Program getInstance(String instruction,RobodromeView toShow,RobotMarker robot) {
        if (Program.singleInstance == null) {
            Program.singleInstance = new Program(instruction,toShow,robot);
        }
        return  Program.singleInstance;
    }
    
    public void  addInstruction (String instruction){
           this.instruction.add(instruction);
    }
    
    public void rmInstruction (String instruction){
        this.instruction.remove(instruction);  
    }
    
    public void swapInstruction (String instruction_1,String instruction_2){
     
          int index=instruction.indexOf(instruction_1);
          instruction.add(index, instruction_2);
          index=instruction.indexOf(instruction_2);
          instruction.add(index,instruction_1);
    }
    
    public void run(){
     int index=0;
     Istruction execIinst; 
     
    
     

    if (instruction!=null||instructions!=null){
       while ((index < instruction.size())&&( status.getState().equals("started") )){
          System.out.print(instruction.get(index));
         for (int i=0; i<instructions.getInstruction().size();i++){
             if (instruction.get(index).equals(instructions.getInstruction().get(i).getName())){
                  execIinst= instructions.getInstruction().get(i);
                  toShow.addRobotMove(robot, execIinst.getMovement(), Direction.E, execIinst.getRotation());

             }
      }
      index++; 
    }
   }
    
  }
 }

