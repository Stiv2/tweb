package robogp.robodrome.training;

import java.util.ArrayList;

/**
 *
 * @author Stefano
 */
public class Program implements Runnable {
     private static Program singleInstance;
     private ArrayList <String> instruction ;
     
    public enum State {
         Started, Paused, Interrupted
    };
    
      private State status;
    
    private Program (String instruction){
        this.instruction =new ArrayList();
        this.instruction.add(instruction);
    }
    
    public static Program getInstance(String instruction) {
        if (Program.singleInstance == null) {
            Program.singleInstance = new Program(instruction);
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
     String instr; 
       while ((index < instruction.size())&&( status == State.Started )){
         instr = this.instruction.get(index);
      }
    }
}
