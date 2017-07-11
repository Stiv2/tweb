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
     private final RobodromeAction robodromeAction; 
     private final RobodromeView toShow;
     private final RobotMarker robot; 

    public ProgramController(RobodromeView toShow, RobotMarker robot,Robodrome robodrome){
         this.toShow=toShow;
         this.robot=robot;
         robodromeAction=new RobodromeAction (toShow,robodrome,0,5,robot);    
     }
    
    public void addInstruction(String instr){
    Program.getInstance(instr,toShow,robot,robodromeAction); 
    }
    
    public void run(){
       Program program=Program.getInstance(null,toShow,robot,robodromeAction);
       program.run();
    }
    
}
