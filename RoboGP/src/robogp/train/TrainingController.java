package robogp.train;

import robogp.robodrome.Robodrome;
import robogp.robodrome.view.RobodromeView;

/**
 *
 * @author Stefano
 */
public class TrainingController  {
     public static Training startTrainig(RobodromeView  toShow,Robodrome robodrome){
         return Training.getInstance(toShow,robodrome);
     }
     public static void StartProgram(){
          Training training = Training.getInstance();
          training.start();
     }
}
