package robogp.robodrome.training;


import robogp.matchmanager.RobotMarker;
import robogp.robodrome.Robodrome;



/**
 *
 * @author Stefano
 */
public class Training {
    private static Training singleInstance;
    private final Robodrome robodrome;
    private Program program; 
    
    public enum State {
         Started, Paused, Interrupted
    };
    
    private State status;
    
    private Training (String rbdName){
        String rbdFileName = "robodromes/" + rbdName + ".txt";
        this.robodrome = new Robodrome(rbdFileName);
        
    }
    
    public static Training getInstance(String rbdName) {
        if (Training.singleInstance == null) {
            Training.singleInstance = new Training(rbdName);
        }
        return Training.singleInstance;
    }
    
     public void start() {
        this.status = State.Started;
        program.run(); 
       
     } 
    
}
