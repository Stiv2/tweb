package robogp.robodrome.training;

import java.util.ArrayList;
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
     private int robot;
     
    public enum State {
         Started, Paused, Interrupted
    };
    
      private State status;
    
    private Program (String instruction,RobodromeView toShow,int robot){
        this.instruction =new ArrayList();
        this.instruction.add(instruction);
        this.instructions=Instructions.getInstance();
        this.toShow = toShow;
        this.robot= robot;
        
    }
    
    public static Program getInstance(String instruction,RobodromeView toShow,int robot) {
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
     
    if (instructions!=null||instructions!=null){
       while ((index < instruction.size())&&( status == State.Started )){
         for (int i=0; i<instructions.getInstruction().size();i++){
             if (this.instruction.get(index).equals(instructions.getInstruction().get(i).getName())){
                 execIinst= instructions.getInstruction().get(i);
                  toShow.addRobotMove(robot,execIinst.getMovement(),Direction.W,execIinst.getRotation());
             }
      }
    }
   }
  }
}
