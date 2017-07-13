package robogp.train;

import robogp.robodrome.Robodrome;
import robogp.robodrome.view.RobodromeView;

/**
 *
 * @author Stefano
 */
public class TrainingController  {
     public static ProgramController startTrainig(RobodromeView  toShow,Robodrome robodrome){
         Training.getInstance(toShow,robodrome);
         return  Training.getController();
     }
     public static void StartProgram(){
          Training training = Training.getInstance();
          training.start();
     }
     public static void placeRobot(int posx,int posy){
          Training training = Training.getInstance();
          training.placeRobot(posx, posy);
     }
}
