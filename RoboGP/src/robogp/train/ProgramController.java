package robogp.train;

import robogp.matchmanager.RobotMarker;
import robogp.robodrome.Robodrome;
import robogp.robodrome.view.RobodromeAction;
import robogp.robodrome.view.RobodromeView;

/**
 *
 * @author Stefano
 */
public class ProgramController {
     private static ProgramController singleInstance;
     private final RobodromeAction robodromeAction; 
     private final RobodromeView toShow;
     private final RobotMarker robot; 

    private ProgramController(RobodromeView toShow, RobotMarker robot,Robodrome robodrome){
         this.toShow=toShow;
         this.robot=robot;
         robodromeAction=new RobodromeAction (toShow,robodrome,robot);    
     }
    
    public void addInstruction(String instr){
    Program.getInstance(instr,toShow,robot,robodromeAction); 
    }
    
    public void removeInstruction(int instr){
       Program program=Program.getInstance(null,toShow,robot,robodromeAction);
       program.rmInstruction(instr);
    }
    
   public void swapInstruction(int instr1,int instr2){
       Program program=Program.getInstance(null,toShow,robot,robodromeAction);
       program.swapInstruction(instr1, instr2);
    }
    public void initialpos(int posx,int posy){
        robodromeAction.SetInitialPos(posx, posy);
    }
    public void run(){
       Program program=Program.getInstance("",toShow,robot,robodromeAction);
       program.run();
    }
    
    public static ProgramController getInstance(RobodromeView toShow, RobotMarker robot,Robodrome robodrome) {
        
        if (ProgramController.singleInstance == null) {
            ProgramController.singleInstance = new ProgramController(toShow,robot,robodrome); 
        }
        return  ProgramController.singleInstance;
    }
    public static ProgramController getInstance(){
         return  ProgramController.singleInstance;
    }
    
    public Program getProgramInstance(){
        return Program.getInstance("", toShow, robot, robodromeAction);
    }
    
}
