package robogp.train;



import java.awt.FlowLayout;
import robogp.matchmanager.RobotMarker;
import robogp.robodrome.Direction;
import robogp.robodrome.Robodrome;
import robogp.robodrome.view.RobodromeView;




/**
 *
 * @author Stefano
 */
public class Training {
    private static Training singleInstance;
    private final ProgramController programController;
    private final RobodromeView toShow;
    private final RobotMarker robot; 
    private final State state;

    private Training (RobodromeView robodromeView,Robodrome robodrome){
        this.toShow=robodromeView;
        robot = new RobotMarker("robot-blue", "blue");  
        toShow.placeRobot(robot, Direction.E, 5, 0, true);
        this.programController=new ProgramController(toShow,robot,robodrome);
        state= State.getInstance(); 
    }
    
    public static Training getInstance(RobodromeView robodromeView,Robodrome robodrome) {
        if (Training.singleInstance == null) {
            Training.singleInstance = new Training(robodromeView,robodrome);
        }
        return Training.singleInstance;
    }
    
    public static Training getInstance() {
        return Training.singleInstance;
    }
    
     public void start() {
        state.setStarted();
        programController.addInstruction("Move1");
        programController.run();
     } 
}
